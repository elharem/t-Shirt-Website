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
    if (config('app.env') === 'production') {
        \Illuminate\Support\Facades\URL::forceScheme('https');
    }

    // Fix Vite manifest path pour Vite 5
    \Illuminate\Support\Facades\Vite::useManifestFilename('.vite/manifest.json');

    // Panier dans toutes les vues
    \Illuminate\Support\Facades\View::composer('*', function ($view) {
        $count = 0;
        if (auth()->check()) {
            $cart = \App\Models\Cart::where('user_id', auth()->id())->with('items')->first();
            $count = $cart ? $cart->items->sum('quantity') : 0;
        } else {
            $cart = \App\Models\Cart::where('session_id', session()->getId())->with('items')->first();
            $count = $cart ? $cart->items->sum('quantity') : 0;
        }
        $view->with('cartCount', $count);
    });
}
}