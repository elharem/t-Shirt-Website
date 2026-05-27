@extends('layouts.admin')
@section('title', 'Commande ' . $order->order_number)

@section('content')
<a href="{{ route('admin.orders.index') }}" class="text-xs uppercase tracking-widest underline mb-4 inline-block">← Toutes les commandes</a>
<h1 class="text-4xl font-display mb-2">{{ $order->order_number }}</h1>
<p class="text-ink/60 mb-6">{{ $order->created_at->format('d/m/Y H:i') }}</p>

<div class="grid lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
        <div class="card p-5">
            <h2 class="text-xl font-display mb-4">Articles</h2>
            <table class="w-full text-sm">
                <thead class="border-b border-ink/10 text-xs uppercase tracking-widest text-ink/60">
                    <tr>
                        <th class="text-left pb-2">Produit</th>
                        <th class="text-center pb-2">Qté</th>
                        <th class="text-right pb-2">PU</th>
                        <th class="text-right pb-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr class="border-b border-ink/5">
                            <td class="py-3">
                                <p class="font-semibold">{{ $item->product_name }}</p>
                                <p class="text-xs text-ink/60">
                                    @if($item->size) {{ $item->size }} @endif
                                    @if($item->color) · {{ $item->color }} @endif
                                </p>
                            </td>
                            <td class="text-center">{{ $item->quantity }}</td>
                            <td class="text-right">{{ number_format($item->price, 2, ',', ' ') }} €</td>
                            <td class="text-right font-display">{{ number_format($item->subtotal(), 2, ',', ' ') }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4 pt-4 border-t border-ink/10 space-y-1 text-sm">
                <div class="flex justify-between"><span>Sous-total</span><span>{{ number_format($order->subtotal, 2, ',', ' ') }} €</span></div>
                <div class="flex justify-between"><span>Livraison ({{ $order->carrier_label }})</span><span>{{ number_format($order->shipping_cost, 2, ',', ' ') }} €</span></div>
                <div class="flex justify-between font-display text-xl pt-2"><span>Total</span><span>{{ number_format($order->total, 2, ',', ' ') }} €</span></div>
            </div>
        </div>

        @if($order->notes)
            <div class="card p-5">
                <h3 class="font-display text-lg mb-2">Note client</h3>
                <p class="text-sm">{{ $order->notes }}</p>
            </div>
        @endif
    </div>

    <div class="space-y-6">
        {{-- Mise à jour statut --}}
        <div class="card p-5">
            <h2 class="text-xl font-display mb-4">Statut</h2>
            <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="space-y-3">
                @csrf @method('PUT')
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Statut</label>
                    <select name="status" class="input">
                        @foreach(\App\Models\Order::STATUSES as $key => $label)
                            <option value="{{ $key }}" {{ $order->status === $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">N° de suivi</label>
                    <input type="text" name="tracking_number" value="{{ $order->tracking_number }}" class="input">
                </div>
                <button class="btn-primary w-full">Mettre à jour</button>
            </form>
        </div>

        {{-- Client --}}
        <div class="card p-5">
            <h2 class="text-xl font-display mb-3">Client</h2>
            <p class="font-semibold">{{ $order->user->first_name }} {{ $order->user->name }}</p>
            <p class="text-sm text-ink/60">{{ $order->user->email }}</p>
        </div>

        {{-- Livraison --}}
        <div class="card p-5">
            <h2 class="text-xl font-display mb-3">Livraison</h2>
            <p class="text-sm">{{ $order->shipping_address }}</p>
            <p class="text-sm">{{ $order->shipping_postal_code }} {{ $order->shipping_city }}</p>
            <p class="text-sm">{{ $order->shipping_country }}</p>
            @if($order->shipping_phone)<p class="text-xs text-ink/60 mt-2">📞 {{ $order->shipping_phone }}</p>@endif
            <p class="text-xs text-ink/60 mt-2">Transporteur : <strong>{{ $order->carrier_label }}</strong></p>
        </div>

        {{-- Paiement --}}
        <div class="card p-5">
            <h2 class="text-xl font-display mb-3">Paiement</h2>
            <p class="text-sm">Méthode : <strong>{{ $order->payment_method }}</strong></p>
            <p class="text-sm">Statut : <strong>{{ $order->payment_status }}</strong></p>
            @if($order->payment_id)<p class="text-xs text-ink/60 mt-1">ID : {{ Str::limit($order->payment_id, 20) }}</p>@endif
        </div>
    </div>
</div>
@endsection
