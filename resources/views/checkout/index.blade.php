@extends('layouts.app')
@section('title', 'Commande — TEE/SHOP')

@section('content')
<section class="container mx-auto px-4 py-12 max-w-6xl">
    <h1 class="text-5xl font-display mb-8">Finaliser la commande</h1>

    <form action="{{ route('checkout.store') }}" method="POST" class="grid lg:grid-cols-3 gap-8">
        @csrf

        <div class="lg:col-span-2 space-y-8">
            {{-- Adresse de livraison --}}
            <div class="card p-6">
                <h2 class="text-2xl font-display mb-5">1. Adresse de livraison</h2>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Adresse</label>
                        <input type="text" name="shipping_address" value="{{ old('shipping_address', auth()->user()->address) }}" class="input" required>
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Ville</label>
                        <input type="text" name="shipping_city" value="{{ old('shipping_city', auth()->user()->city) }}" class="input" required>
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Code postal</label>
                        <input type="text" name="shipping_postal_code" value="{{ old('shipping_postal_code', auth()->user()->postal_code) }}" class="input" required>
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Pays</label>
                        <input type="text" name="shipping_country" value="{{ old('shipping_country', auth()->user()->country ?? 'Belgique') }}" class="input" required>
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Téléphone</label>
                        <input type="text" name="shipping_phone" value="{{ old('shipping_phone', auth()->user()->phone) }}" class="input" required>
                    </div>
                </div>
            </div>

            {{-- Livraison (US11) --}}
            <div class="card p-6">
                <h2 class="text-2xl font-display mb-5">2. Choix du transporteur</h2>
                <div class="space-y-3">
                    @php
                        $carriers = [
                            'bpost' => ['label' => 'bpost — Belgique', 'time' => '2-3 jours', 'price' => 5.95],
                            'dpd' => ['label' => 'DPD', 'time' => '2-4 jours', 'price' => 6.95],
                            'ups' => ['label' => 'UPS', 'time' => '1-2 jours', 'price' => 8.95],
                            'dhl' => ['label' => 'DHL Express', 'time' => '24h', 'price' => 9.95],
                        ];
                    @endphp
                    @foreach($carriers as $code => $info)
                        <label class="flex items-center justify-between p-4 border-2 border-ink/20 cursor-pointer hover:border-ink has-[:checked]:border-ink has-[:checked]:bg-ink/5">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="shipping_carrier" value="{{ $code }}" {{ $loop->first ? 'checked' : '' }} required>
                                <div>
                                    <p class="font-semibold">{{ $info['label'] }}</p>
                                    <p class="text-xs text-ink/60">{{ $info['time'] }}</p>
                                </div>
                            </div>
                            <span class="font-display text-lg">{{ number_format($info['price'], 2, ',', ' ') }} €</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Paiement (US10) --}}
            <div class="card p-6">
                <h2 class="text-2xl font-display mb-5">3. Paiement</h2>
                <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 mb-4 text-sm">
                    <p><strong>Mode test Stripe</strong> — Utilise la carte <code class="bg-yellow-100 px-1">4242 4242 4242 4242</code>, n'importe quelle date future et n'importe quel CVC.</p>
                </div>
                <label class="flex items-center gap-3 p-4 border-2 border-ink/20 has-[:checked]:border-ink has-[:checked]:bg-ink/5 cursor-pointer">
                    <input type="radio" name="payment_method" value="card" checked>
                    <span class="font-semibold">Carte bancaire (Stripe)</span>
                </label>
            </div>

            {{-- Notes --}}
            <div class="card p-6">
                <h2 class="text-2xl font-display mb-5">4. Notes (optionnel)</h2>
                <textarea name="notes" rows="3" class="input" placeholder="Indications pour le livreur, instructions spéciales…">{{ old('notes') }}</textarea>
            </div>
        </div>

        {{-- Récap --}}
        <aside class="card p-6 h-fit sticky top-32">
            <h2 class="text-2xl font-display mb-4">Récapitulatif</h2>
            <div class="space-y-3 mb-4">
                @foreach($cart->items as $item)
                    <div class="flex justify-between text-sm">
                        <div>
                            <p class="font-semibold">{{ $item->product->name }}</p>
                            <p class="text-xs text-ink/60">x{{ $item->quantity }} @if($item->size) · {{ $item->size }} @endif</p>
                        </div>
                        <span>{{ number_format($item->subtotal(), 2, ',', ' ') }} €</span>
                    </div>
                @endforeach
            </div>
            <div class="border-t border-ink/10 pt-4 space-y-2 text-sm">
                <div class="flex justify-between"><span>Sous-total</span><span>{{ number_format($cart->totalPrice(), 2, ',', ' ') }} €</span></div>
                <div class="flex justify-between text-ink/60"><span>Frais de port</span><span>variable</span></div>
            </div>
            <div class="flex justify-between font-display text-2xl mt-4 mb-6 border-t border-ink/10 pt-4">
                <span>Total HT*</span>
                <span>{{ number_format($cart->totalPrice(), 2, ',', ' ') }} €+</span>
            </div>
            <button type="submit" class="btn-primary w-full">Payer avec Stripe →</button>
            <p class="text-xs text-ink/50 mt-3 text-center">Paiement 100% sécurisé via Stripe</p>
        </aside>
    </form>
</section>
@endsection
