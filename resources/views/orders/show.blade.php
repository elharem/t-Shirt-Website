@extends('layouts.app')
@section('title', 'Commande ' . $order->order_number)

@section('content')
<section class="container mx-auto px-4 py-12 max-w-4xl">
    <a href="{{ route('orders.index') }}" class="text-xs uppercase tracking-widest underline mb-4 inline-block">← Mes commandes</a>
    <h1 class="text-4xl font-display mb-2">Commande {{ $order->order_number }}</h1>
    <p class="text-ink/60 mb-8">Passée le {{ $order->created_at->format('d/m/Y à H:i') }}</p>

    <div class="grid md:grid-cols-3 gap-6 mb-8">
        <div class="card p-4">
            <p class="text-xs uppercase tracking-widest text-ink/60 mb-1">Statut</p>
            <p class="font-display text-xl">{{ $order->status_label }}</p>
        </div>
        <div class="card p-4">
            <p class="text-xs uppercase tracking-widest text-ink/60 mb-1">Transporteur</p>
            <p class="font-display text-xl">{{ $order->carrier_label }}</p>
            @if($order->tracking_number)
                <p class="text-xs mt-1">Suivi : <code>{{ $order->tracking_number }}</code></p>
            @endif
        </div>
        <div class="card p-4">
            <p class="text-xs uppercase tracking-widest text-ink/60 mb-1">Total</p>
            <p class="font-display text-xl">{{ number_format($order->total, 2, ',', ' ') }} €</p>
        </div>
    </div>

    <div class="card p-6 mb-6">
        <h2 class="text-2xl font-display mb-4">Articles</h2>
        <div class="space-y-3">
            @foreach($order->items as $item)
                <div class="flex justify-between border-b border-ink/10 pb-3 last:border-0">
                    <div>
                        <p class="font-semibold">{{ $item->product_name }}</p>
                        <p class="text-xs text-ink/60">
                            x{{ $item->quantity }}
                            @if($item->size) · {{ $item->size }} @endif
                            @if($item->color) · {{ $item->color }} @endif
                        </p>
                    </div>
                    <p class="font-display">{{ number_format($item->subtotal(), 2, ',', ' ') }} €</p>
                </div>
            @endforeach
        </div>
        <div class="mt-4 pt-4 border-t border-ink/10 space-y-1 text-sm">
            <div class="flex justify-between"><span>Sous-total</span><span>{{ number_format($order->subtotal, 2, ',', ' ') }} €</span></div>
            <div class="flex justify-between"><span>Livraison</span><span>{{ number_format($order->shipping_cost, 2, ',', ' ') }} €</span></div>
            <div class="flex justify-between font-display text-xl pt-2"><span>Total</span><span>{{ number_format($order->total, 2, ',', ' ') }} €</span></div>
        </div>
    </div>

    <div class="card p-6">
        <h2 class="text-2xl font-display mb-4">Adresse de livraison</h2>
        <p>{{ $order->shipping_address }}</p>
        <p>{{ $order->shipping_postal_code }} {{ $order->shipping_city }}</p>
        <p>{{ $order->shipping_country }}</p>
        @if($order->shipping_phone)<p class="text-sm text-ink/60 mt-2">{{ $order->shipping_phone }}</p>@endif
    </div>
</section>
@endsection
