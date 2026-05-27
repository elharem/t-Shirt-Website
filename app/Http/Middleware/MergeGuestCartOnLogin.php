<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MergeGuestCartOnLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (auth()->check() && session()->has('merge_cart_pending')) {
            $sessionId = session('merge_cart_pending');
            $guestCart = Cart::where('session_id', $sessionId)->with('items')->first();

            if ($guestCart) {
                $userCart = Cart::firstOrCreate(['user_id' => auth()->id()]);

                foreach ($guestCart->items as $item) {
                    $existing = $userCart->items()
                        ->where('product_id', $item->product_id)
                        ->where('size', $item->size)
                        ->where('color', $item->color)
                        ->first();

                    if ($existing) {
                        $existing->increment('quantity', $item->quantity);
                    } else {
                        $userCart->items()->create([
                            'product_id' => $item->product_id,
                            'quantity' => $item->quantity,
                            'price' => $item->price,
                            'size' => $item->size,
                            'color' => $item->color,
                        ]);
                    }
                }
                $guestCart->delete();
            }

            session()->forget('merge_cart_pending');
        }

        return $response;
    }
}
