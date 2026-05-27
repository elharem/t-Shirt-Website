@extends('layouts.app')
@section('title', 'Commande confirmée — TEE/SHOP')

@section('content')
<section class="container mx-auto px-4 py-20 max-w-2xl text-center">
    <div class="text-6xl mb-6">✓</div>
    <h1 class="text-5xl font-display mb-4">Merci !</h1>
    <p class="text-xl text-ink/70 mb-2">Ta commande <strong>{{ $order->order_number }}</strong> est confirmée.</p>
    <p class="text-ink/60 mb-10">Un email récapitulatif te sera envoyé sous peu. Tu peux suivre l'évolution depuis ton espace.</p>

    <div class="card p-6 text-left mb-8">
        <h2 class="text-2xl font-display mb-4">Détails</h2>
        <div class="space-y-2 text-sm">
            <div class="flex justify-between"><span class="text-ink/60">Numéro de commande</span><strong>{{ $order->order_number }}</strong></div>
            <div class="flex justify-between"><span class="text-ink/60">Total</span><strong>{{ number_format($order->total, 2, ',', ' ') }} €</strong></div>
            <div class="flex justify-between"><span class="text-ink/60">Transporteur</span><strong>{{ $order->carrier_label }}</strong></div>
            <div class="flex justify-between"><span class="text-ink/60">Livré à</span><strong>{{ $order->shipping_address }}, {{ $order->shipping_postal_code }} {{ $order->shipping_city }}</strong></div>
        </div>
    </div>

    <div class="flex gap-4 justify-center">
        <a href="{{ route('orders.show', $order) }}" class="btn-primary">Voir ma commande</a>
        <a href="{{ route('products.index') }}" class="btn-outline">Continuer mes achats</a>
    </div>
</section>
@endsection
