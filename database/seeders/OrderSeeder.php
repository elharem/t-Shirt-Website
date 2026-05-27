<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $customers = User::where('role', 'customer')->get();
        $products = Product::all();

        if ($customers->isEmpty() || $products->isEmpty()) return;

        $statuses = ['paid', 'processing', 'shipped', 'delivered', 'pending'];
        $carriers = ['bpost', 'dpd', 'dhl', 'ups'];

        for ($i = 0; $i < 20; $i++) {
            $customer = $customers->random();
            $createdAt = now()->subDays(rand(0, 60));

            $order = Order::create([
                'user_id' => $customer->id,
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'status' => $statuses[array_rand($statuses)],
                'subtotal' => 0,
                'shipping_cost' => 5.95,
                'total' => 0,
                'payment_method' => 'card',
                'payment_status' => 'paid',
                'shipping_carrier' => $carriers[array_rand($carriers)],
                'shipping_address' => $customer->address ?? 'Rue de la Loi 16',
                'shipping_city' => $customer->city ?? 'Bruxelles',
                'shipping_postal_code' => $customer->postal_code ?? '1000',
                'shipping_country' => 'Belgique',
                'shipping_phone' => $customer->phone,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);

            $subtotal = 0;
            $itemCount = rand(1, 4);
            for ($j = 0; $j < $itemCount; $j++) {
                $product = $products->random();
                $qty = rand(1, 3);
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'quantity' => $qty,
                    'price' => $product->price,
                    'size' => is_array($product->sizes) && count($product->sizes) > 0 ? $product->sizes[array_rand($product->sizes)] : null,
                    'color' => is_array($product->colors) && count($product->colors) > 0 ? $product->colors[array_rand($product->colors)] : null,
                ]);
                $subtotal += $qty * $product->price;
            }

            $order->update([
                'subtotal' => $subtotal,
                'total' => $subtotal + 5.95,
            ]);
        }
    }
}
