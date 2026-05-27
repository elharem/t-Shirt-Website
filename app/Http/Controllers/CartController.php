<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Récupère ou crée le panier (user connecté ou session anonyme)
     */
    protected function getCart(): Cart
    {
        if (auth()->check()) {
            return Cart::firstOrCreate(['user_id' => auth()->id()]);
        }
        $sessionId = session()->getId();
        return Cart::firstOrCreate(['session_id' => $sessionId]);
    }

    public function index()
    {
        $cart = $this->getCart();
        $cart->load('items.product');
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Product $product)
    {
        $data = $request->validate([
            'quantity' => 'required|integer|min:1|max:99',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
        ]);

        $cart = $this->getCart();

        $existing = $cart->items()
            ->where('product_id', $product->id)
            ->where('size', $data['size'] ?? null)
            ->where('color', $data['color'] ?? null)
            ->first();

        if ($existing) {
            $existing->quantity += $data['quantity'];
            $existing->save();
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $data['quantity'],
                'price' => $product->price,
                'size' => $data['size'] ?? null,
                'color' => $data['color'] ?? null,
            ]);
        }

        return redirect()->route('cart.index')
            ->with('success', 'Produit ajouté au panier !');
    }

    public function update(Request $request, CartItem $item)
    {
        $this->authorizeItem($item);

        $data = $request->validate([
            'quantity' => 'required|integer|min:1|max:99',
        ]);

        $item->update(['quantity' => $data['quantity']]);

        return back()->with('success', 'Panier mis à jour.');
    }

   public function remove(CartItem $item)
{
    $this->authorizeItem($item);

    // US5 : on ne peut pas supprimer un article si on est en cours de checkout
    if (session()->has('checkout_in_progress')) {
        return back()->with('error', 'Tu ne peux pas modifier ton panier pendant la validation de commande.');
    }

    $item->delete();
    return back()->with('success', 'Produit retiré du panier.');
}

public function clear()
{
    // US5 : on ne peut pas vider le panier si on est en cours de checkout
    if (session()->has('checkout_in_progress')) {
        return back()->with('error', 'Tu ne peux pas vider ton panier pendant la validation de commande.');
    }

    $cart = $this->getCart();
    $cart->items()->delete();
    return back()->with('success', 'Panier vidé.');
}

    protected function authorizeItem(CartItem $item): void
    {
        $cart = $this->getCart();
        abort_unless($item->cart_id === $cart->id, 403);
    }
}
