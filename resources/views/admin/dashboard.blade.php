@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<h1 class="text-4xl font-display mb-8">Dashboard</h1>

{{-- KPI --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
    <div class="card p-5">
        <p class="text-xs uppercase tracking-widest text-ink/60 mb-1">Chiffre d'affaires</p>
        <p class="font-display text-3xl">{{ number_format($totalRevenue, 2, ',', ' ') }} €</p>
    </div>
    <div class="card p-5">
        <p class="text-xs uppercase tracking-widest text-ink/60 mb-1">Commandes</p>
        <p class="font-display text-3xl">{{ $totalOrders }}</p>
    </div>
    <div class="card p-5">
        <p class="text-xs uppercase tracking-widest text-ink/60 mb-1">Clients</p>
        <p class="font-display text-3xl">{{ $totalCustomers }}</p>
    </div>
    <div class="card p-5">
        <p class="text-xs uppercase tracking-widest text-ink/60 mb-1">Produits</p>
        <p class="font-display text-3xl">{{ $totalProducts }}</p>
    </div>
</div>

<div class="grid lg:grid-cols-3 gap-6 mb-8">
    {{-- Graphique CA --}}
    <div class="lg:col-span-2 card p-5">
        <h2 class="text-xl font-display mb-4">Ventes (30 derniers jours)</h2>
        <canvas id="salesChart" height="100"></canvas>
    </div>

    {{-- Statut commandes --}}
    <div class="card p-5">
        <h2 class="text-xl font-display mb-4">Commandes par statut</h2>
        <canvas id="statusChart"></canvas>
    </div>
</div>

<div class="grid lg:grid-cols-2 gap-6">
    {{-- Top produits --}}
    <div class="card p-5">
        <h2 class="text-xl font-display mb-4">Top 5 produits</h2>
        @if($topProducts->isEmpty())
            <p class="text-sm text-ink/60">Pas encore de ventes.</p>
        @else
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left border-b border-ink/10 text-xs uppercase tracking-widest text-ink/60">
                        <th class="pb-2">Produit</th>
                        <th class="pb-2 text-right">Qté</th>
                        <th class="pb-2 text-right">CA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topProducts as $p)
                        <tr class="border-b border-ink/5">
                            <td class="py-2">{{ $p->product_name }}</td>
                            <td class="py-2 text-right">{{ $p->total_sold }}</td>
                            <td class="py-2 text-right font-display">{{ number_format($p->revenue, 2, ',', ' ') }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    {{-- Commandes récentes --}}
    <div class="card p-5">
        <h2 class="text-xl font-display mb-4">Commandes récentes</h2>
        @if($recentOrders->isEmpty())
            <p class="text-sm text-ink/60">Pas encore de commandes.</p>
        @else
            <div class="space-y-2 text-sm">
                @foreach($recentOrders as $order)
                    <a href="{{ route('admin.orders.show', $order) }}" class="flex justify-between items-center py-2 border-b border-ink/5 hover:text-accent">
                        <div>
                            <p class="font-semibold">{{ $order->order_number }}</p>
                            <p class="text-xs text-ink/60">{{ $order->user->first_name ?? '' }} {{ $order->user->name }} · {{ $order->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-display">{{ number_format($order->total, 2, ',', ' ') }} €</p>
                            <p class="text-xs">{{ $order->status_label }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script type="module">
import Chart from 'chart.js/auto';

// Sales chart
const salesData = @json($salesByDay);
new Chart(document.getElementById('salesChart'), {
    type: 'line',
    data: {
        labels: salesData.map(d => d.date),
        datasets: [{
            label: 'CA quotidien (€)',
            data: salesData.map(d => d.total),
            borderColor: '#ff4500',
            backgroundColor: 'rgba(255, 69, 0, 0.1)',
            borderWidth: 2,
            tension: 0.3,
            fill: true,
        }]
    },
    options: { responsive: true, plugins: { legend: { display: false } } }
});

// Status chart
const statusData = @json($statusBreakdown);
new Chart(document.getElementById('statusChart'), {
    type: 'doughnut',
    data: {
        labels: Object.keys(statusData),
        datasets: [{
            data: Object.values(statusData),
            backgroundColor: ['#0a0a0a', '#ff4500', '#22c55e', '#3b82f6', '#a855f7', '#ef4444'],
        }]
    },
    options: { responsive: true }
});
</script>
@endpush
@endsection
