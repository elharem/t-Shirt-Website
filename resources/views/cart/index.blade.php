@extends('layouts.app')
@section('title', 'Mon panier — TEE/SHOP')

@section('content')
<section class="container mx-auto px-4 py-12">
    <h1 class="text-5xl font-display mb-8">Mon panier</h1>

    @if($cart->items->isEmpty())
        <div class="text-center py-20">
            <p class="text-2xl font-display mb-4">Ton panier est vide.</p>
            <p class="text-ink/60 mb-8">Mais il ne demande qu'à être rempli.</p>
            <a href="{{ route('products.index') }}" class="btn-primary">Voir les produits</a>
        </div>
    @else
        <div class="grid lg:grid-cols-3 gap-8">
            {{-- Items --}}
            <div class="lg:col-span-2 space-y-4">
                @foreach($cart->items as $item)
                    <div class="card p-4 flex gap-4 items-center">
                        <a href="{{ route('products.show', $item->product) }}" class="shrink-0">
                            <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-24 h-24 object-cover border border-ink/10"
                                 onerror="this.src='https://placehold.co/200x200/0a0a0a/f5f1eb'">
                        </a>
                        <div class="flex-1 min-w-0">
                            <a href="{{ route('products.show', $item->product) }}" class="font-semibold hover:text-accent">{{ $item->product->name }}</a>
                            <p class="text-xs text-ink/60 mt-1">
                                @if($item->size) Taille : <strong>{{ $item->size }}</strong> @endif
                                @if($item->size && $item->color) · @endif
                                @if($item->color) Couleur : <strong>{{ $item->color }}</strong> @endif
                            </p>
                            <p class="font-display text-xl mt-1">{{ number_format($item->price, 2, ',', ' ') }} €</p>
                        </div>

                        <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center gap-2">
                            @csrf @method('PATCH')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="99"
                                   class="input w-20 text-center" onchange="this.form.submit()">
                        </form>

                        <p class="font-display text-lg w-24 text-right">{{ number_format($item->subtotal(), 2, ',', ' ') }} €</p>

                        <form action="{{ route('cart.remove', $item) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="text-ink/40 hover:text-red-600 transition p-2" title="Retirer">✕</button>
                        </form>
                    </div>
                @endforeach

                <form action="{{ route('cart.clear') }}" method="POST" class="text-right">
                    @csrf @method('DELETE')
                    <button class="text-sm text-ink/60 underline hover:text-red-600">Vider le panier</button>
                </form>
            </div>

            {{-- Récap --}}
            <aside class="card p-6 h-fit sticky top-32">
                <h2 class="text-2xl font-display mb-6">Récapitulatif</h2>
                <div class="space-y-3 text-sm border-b border-ink/10 pb-4 mb-4">
                    <div class="flex justify-between"><span>Articles ({{ $cart->totalItems() }})</span><span>{{ number_format($cart->totalPrice(), 2, ',', ' ') }} €</span></div>
                    <div class="flex justify-between text-ink/60"><span>Livraison</span><span>Calculée à la suivante étape</span></div>
                </div>
                <div class="flex justify-between font-display text-2xl mb-6">
                    <span>Total</span>
                    <span>{{ number_format($cart->totalPrice(), 2, ',', ' ') }} €</span>
                </div>
                @auth
                    <a href="{{ route('checkout.index') }}" class="btn-primary w-full">Commander →</a>
                @else
                    <a href="{{ route('login') }}" class="btn-primary w-full">Se connecter pour commander</a>
                    <p class="text-xs text-ink/60 text-center mt-3">Pas encore inscrit ? <a href="{{ route('register') }}" class="underline">Créer un compte</a></p>
                @endauth
            </aside>
        </div>
    @endif
</section>
@endsection
