@extends('layouts.admin')
@section('title', 'Commandes')

@section('content')
<h1 class="text-4xl font-display mb-6">Commandes</h1>

<form method="GET" class="card p-4 mb-6 flex flex-wrap gap-3 items-end">
    <div class="flex-1 min-w-[200px]">
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Recherche</label>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="N° commande..." class="input">
    </div>
    <div>
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Statut</label>
        <select name="status" class="input">
            <option value="">Tous</option>
            @foreach(\App\Models\Order::STATUSES as $key => $label)
                <option value="{{ $key }}" {{ request('status') === $key ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn-primary">Filtrer</button>
    @if(request('search') || request('status'))
        <a href="{{ route('admin.orders.index') }}" class="btn-outline">Réinitialiser</a>
    @endif
</form>

<div class="card overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-ink text-cream text-xs uppercase tracking-widest">
            <tr>
                <th class="px-4 py-3 text-left">N° commande</th>
                <th class="px-4 py-3 text-left">Client</th>
                <th class="px-4 py-3 text-left">Date</th>
                <th class="px-4 py-3 text-right">Total</th>
                <th class="px-4 py-3 text-left">Statut</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr class="border-t border-ink/5 hover:bg-ink/5">
                    <td class="px-4 py-3 font-semibold">{{ $order->order_number }}</td>
                    <td class="px-4 py-3">{{ $order->user->first_name ?? '' }} {{ $order->user->name }}</td>
                    <td class="px-4 py-3 text-xs">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td class="px-4 py-3 text-right font-display">{{ number_format($order->total, 2, ',', ' ') }} €</td>
                    <td class="px-4 py-3">{{ $order->status_label }}</td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.orders.show', $order) }}" class="text-accent underline text-xs">Voir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $orders->links() }}</div>
@endsection
