<?php $__env->startSection('title', 'Commandes'); ?>

<?php $__env->startSection('content'); ?>
<h1 class="text-4xl font-display mb-6">Commandes</h1>

<form method="GET" class="card p-4 mb-6 flex flex-wrap gap-3 items-end">
    <div class="flex-1 min-w-[200px]">
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Recherche</label>
        <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="N° commande..." class="input">
    </div>
    <div>
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Statut</label>
        <select name="status" class="input">
            <option value="">Tous</option>
            <?php $__currentLoopData = \App\Models\Order::STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>" <?php echo e(request('status') === $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <button class="btn-primary">Filtrer</button>
    <?php if(request('search') || request('status')): ?>
        <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn-outline">Réinitialiser</a>
    <?php endif; ?>
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
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="border-t border-ink/5 hover:bg-ink/5">
                    <td class="px-4 py-3 font-semibold"><?php echo e($order->order_number); ?></td>
                    <td class="px-4 py-3"><?php echo e($order->user->first_name ?? ''); ?> <?php echo e($order->user->name); ?></td>
                    <td class="px-4 py-3 text-xs"><?php echo e($order->created_at->format('d/m/Y H:i')); ?></td>
                    <td class="px-4 py-3 text-right font-display"><?php echo e(number_format($order->total, 2, ',', ' ')); ?> €</td>
                    <td class="px-4 py-3"><?php echo e($order->status_label); ?></td>
                    <td class="px-4 py-3 text-right">
                        <a href="<?php echo e(route('admin.orders.show', $order)); ?>" class="text-accent underline text-xs">Voir</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<div class="mt-6"><?php echo e($orders->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>