@extends('layouts.app')
@section('title', 'Mes commandes — TEE/SHOP')

@section('content')
<section class="container mx-auto px-4 py-12 max-w-5xl">
    <h1 class="text-5xl font-display mb-8">Mes commandes</h1>

    @if($orders->isEmpty())
        <div class="text-center py-20 text-ink/60">
            <p class="text-xl mb-4">Aucune commande pour l'instant.</p>
            <a href="{{ route('products.index') }}" class="btn-primary">Commencer mes achats</a>
        </div>
    @else
        <div class="space-y-4">
            @foreach($orders as $order)
                <a href="{{ route('orders.show', $order) }}" class="card p-5 flex justify-between items-center group">
                    <div>
                        <p class="font-display text-xl">{{ $order->order_number }}</p>
                        <p class="text-xs text-ink/60">{{ $order->created_at->format('d/m/Y H:i') }} · {{ $order->items->count() }} article(s)</p>
                    </div>
                    <div class="text-right">
                        <span class="inline-block px-3 py-1 text-xs uppercase tracking-widest mb-1
                            @switch($order->status)
                                @case('paid') bg-green-100 text-green-800 @break
                                @case('shipped') bg-blue-100 text-blue-800 @break
                                @case('delivered') bg-emerald-100 text-emerald-800 @break
                                @case('cancelled') bg-red-100 text-red-800 @break
                                @default bg-gray-100 text-gray-800
                            @endswitch">
                            {{ $order->status_label }}
                        </span>
                        <p class="font-display text-lg">{{ number_format($order->total, 2, ',', ' ') }} €</p>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="mt-10">{{ $orders->links() }}</div>
    @endif
</section>
@endsection
