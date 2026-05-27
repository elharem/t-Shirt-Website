<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class CheckoutController extends Controller
{
    public function index()
{
    $cart = Cart::where('user_id', auth()->id())->with('items.product')->first();

    if (!$cart || $cart->items->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
    }

    // US5 : marquer le checkout comme en cours
    session(['checkout_in_progress' => true]);

    return view('checkout.index', compact('cart'));
}

    public function store(Request $request)
    {
        $data = $request->validate([
            'shipping_address' => 'required|string|max:255',
            'shipping_city' => 'required|string|max:100',
            'shipping_postal_code' => 'required|string|max:20',
            'shipping_country' => 'required|string|max:100',
            'shipping_phone' => 'required|string|max:30',
            'shipping_carrier' => 'required|in:bpost,dpd,dhl,ups',
            'payment_method' => 'required|in:card,paypal',
            'notes' => 'nullable|string|max:500',
        ]);

        $cart = Cart::where('user_id', auth()->id())->with('items.product')->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        // Calcul du coût de livraison selon le transporteur
        $shippingCosts = ['bpost' => 5.95, 'dpd' => 6.95, 'dhl' => 9.95, 'ups' => 8.95];
        $shippingCost = $shippingCosts[$data['shipping_carrier']];
        $subtotal = $cart->totalPrice();
        $total = $subtotal + $shippingCost;

        // Création de la commande en "pending"
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_number' => 'ORD-' . strtoupper(Str::random(10)),
            'status' => 'pending',
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'total' => $total,
            'payment_method' => $data['payment_method'],
            'payment_status' => 'pending',
            'shipping_carrier' => $data['shipping_carrier'],
            'shipping_address' => $data['shipping_address'],
            'shipping_city' => $data['shipping_city'],
            'shipping_postal_code' => $data['shipping_postal_code'],
            'shipping_country' => $data['shipping_country'],
            'shipping_phone' => $data['shipping_phone'],
            'notes' => $data['notes'] ?? null,
        ]);

        foreach ($cart->items as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'product_name' => $item->product->name,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'size' => $item->size,
                'color' => $item->color,
            ]);
        }

        // Stripe Checkout (mode test)
        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $lineItems = [];
            foreach ($cart->items as $item) {
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => ['name' => $item->product->name],
                        'unit_amount' => (int) ($item->price * 100),
                    ],
                    'quantity' => $item->quantity,
                ];
            }
            // Frais de port en ligne séparée
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => ['name' => 'Livraison (' . $data['shipping_carrier'] . ')'],
                    'unit_amount' => (int) ($shippingCost * 100),
                ],
                'quantity' => 1,
            ];

            $stripeSession = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('checkout.success', $order) . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('checkout.cancel', $order),
                'customer_email' => auth()->user()->email,
                'metadata' => ['order_id' => $order->id],
            ]);

            $order->update(['payment_id' => $stripeSession->id]);

            return redirect($stripeSession->url);
        } catch (\Exception $e) {
            $order->update(['status' => 'cancelled']);
            return back()->with('error', 'Erreur Stripe : ' . $e->getMessage());
        }
    }

    public function success(Request $request, Order $order)
{
    abort_unless($order->user_id === auth()->id(), 403);

    $order->update([
        'status' => 'paid',
        'payment_status' => 'paid',
    ]);

    // Vider le panier
    Cart::where('user_id', auth()->id())->first()?->items()->delete();

    // US5 : checkout terminé
    session()->forget('checkout_in_progress');

    return view('checkout.success', compact('order'));
}

public function cancel(Order $order)
{
        abort_unless($order->user_id === auth()->id(), 403);
        $order->update(['status' => 'cancelled']);

        // US5 : checkout abandonné
        session()->forget('checkout_in_progress');

        return redirect()->route('cart.index')->with('error', 'Paiement annulé.');
}

    
}
