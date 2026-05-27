<?php $__env->startSection('title', 'Mes commandes — TEE/SHOP'); ?>

<?php $__env->startSection('content'); ?>
<section class="container mx-auto px-4 py-12 max-w-5xl">
    <h1 class="text-5xl font-display mb-8">Mes commandes</h1>

    <?php if($orders->isEmpty()): ?>
        <div class="text-center py-20 text-ink/60">
            <p class="text-xl mb-4">Aucune commande pour l'instant.</p>
            <a href="<?php echo e(route('products.index')); ?>" class="btn-primary">Commencer mes achats</a>
        </div>
    <?php else: ?>
        <div class="space-y-4">
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('orders.show', $order)); ?>" class="card p-5 flex justify-between items-center group">
                    <div>
                        <p class="font-display text-xl"><?php echo e($order->order_number); ?></p>
                        <p class="text-xs text-ink/60"><?php echo e($order->created_at->format('d/m/Y H:i')); ?> · <?php echo e($order->items->count()); ?> article(s)</p>
                    </div>
                    <div class="text-right">
                        <span class="inline-block px-3 py-1 text-xs uppercase tracking-widest mb-1
                            <?php switch($order->status):
                                case ('paid'): ?> bg-green-100 text-green-800 <?php break; ?>
                                <?php case ('shipped'): ?> bg-blue-100 text-blue-800 <?php break; ?>
                                <?php case ('delivered'): ?> bg-emerald-100 text-emerald-800 <?php break; ?>
                                <?php case ('cancelled'): ?> bg-red-100 text-red-800 <?php break; ?>
                                <?php default: ?> bg-gray-100 text-gray-800
                            <?php endswitch; ?>">
                            <?php echo e($order->status_label); ?>

                        </span>
                        <p class="font-display text-lg"><?php echo e(number_format($order->total, 2, ',', ' ')); ?> €</p>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="mt-10"><?php echo e($orders->links()); ?></div>
    <?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/orders/index.blade.php ENDPATH**/ ?>