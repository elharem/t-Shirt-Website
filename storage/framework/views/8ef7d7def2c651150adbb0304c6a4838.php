<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<h1 class="text-4xl font-display mb-8">Dashboard</h1>


<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
    <div class="card p-5">
        <p class="text-xs uppercase tracking-widest text-ink/60 mb-1">Chiffre d'affaires</p>
        <p class="font-display text-3xl"><?php echo e(number_format($totalRevenue, 2, ',', ' ')); ?> €</p>
    </div>
    <div class="card p-5">
        <p class="text-xs uppercase tracking-widest text-ink/60 mb-1">Commandes</p>
        <p class="font-display text-3xl"><?php echo e($totalOrders); ?></p>
    </div>
    <div class="card p-5">
        <p class="text-xs uppercase tracking-widest text-ink/60 mb-1">Clients</p>
        <p class="font-display text-3xl"><?php echo e($totalCustomers); ?></p>
    </div>
    <div class="card p-5">
        <p class="text-xs uppercase tracking-widest text-ink/60 mb-1">Produits</p>
        <p class="font-display text-3xl"><?php echo e($totalProducts); ?></p>
    </div>
</div>

<div class="grid lg:grid-cols-3 gap-6 mb-8">
    
    <div class="lg:col-span-2 card p-5">
        <h2 class="text-xl font-display mb-4">Ventes (30 derniers jours)</h2>
        <canvas id="salesChart" height="100"></canvas>
    </div>

    
    <div class="card p-5">
        <h2 class="text-xl font-display mb-4">Commandes par statut</h2>
        <canvas id="statusChart"></canvas>
    </div>
</div>

<div class="grid lg:grid-cols-2 gap-6">
    
    <div class="card p-5">
        <h2 class="text-xl font-display mb-4">Top 5 produits</h2>
        <?php if($topProducts->isEmpty()): ?>
            <p class="text-sm text-ink/60">Pas encore de ventes.</p>
        <?php else: ?>
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left border-b border-ink/10 text-xs uppercase tracking-widest text-ink/60">
                        <th class="pb-2">Produit</th>
                        <th class="pb-2 text-right">Qté</th>
                        <th class="pb-2 text-right">CA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $topProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b border-ink/5">
                            <td class="py-2"><?php echo e($p->product_name); ?></td>
                            <td class="py-2 text-right"><?php echo e($p->total_sold); ?></td>
                            <td class="py-2 text-right font-display"><?php echo e(number_format($p->revenue, 2, ',', ' ')); ?> €</td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    
    <div class="card p-5">
        <h2 class="text-xl font-display mb-4">Commandes récentes</h2>
        <?php if($recentOrders->isEmpty()): ?>
            <p class="text-sm text-ink/60">Pas encore de commandes.</p>
        <?php else: ?>
            <div class="space-y-2 text-sm">
                <?php $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('admin.orders.show', $order)); ?>" class="flex justify-between items-center py-2 border-b border-ink/5 hover:text-accent">
                        <div>
                            <p class="font-semibold"><?php echo e($order->order_number); ?></p>
                            <p class="text-xs text-ink/60"><?php echo e($order->user->first_name ?? ''); ?> <?php echo e($order->user->name); ?> · <?php echo e($order->created_at->diffForHumans()); ?></p>
                        </div>
                        <div class="text-right">
                            <p class="font-display"><?php echo e(number_format($order->total, 2, ',', ' ')); ?> €</p>
                            <p class="text-xs"><?php echo e($order->status_label); ?></p>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script type="module">
import Chart from 'chart.js/auto';

// Sales chart
const salesData = <?php echo json_encode($salesByDay, 15, 512) ?>;
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
const statusData = <?php echo json_encode($statusBreakdown, 15, 512) ?>;
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
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>