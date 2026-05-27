<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Force HTTPS en production
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // Partage du nombre d'articles du panier dans toutes les vues
        View::composer('*', function ($view) {
            $count = 0;
            if (auth()->check()) {
                $cart = Cart::where('user_id', auth()->id())->with('items')->first();
                $count = $cart ? $cart->items->sum('quantity') : 0;
            } else {
                $cart = Cart::where('session_id', session()->getId())->with('items')->first();
                $count = $cart ? $cart->items->sum('quantity') : 0;
            }
            $view->with('cartCount', $count);
        });
    }
}