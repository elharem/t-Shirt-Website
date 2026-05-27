<?php $__env->startSection('title', 'Produits'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex justify-between items-center mb-6">
    <h1 class="text-4xl font-display">Produits</h1>
    <a href="<?php echo e(route('admin.products.create')); ?>" class="btn-primary">+ Nouveau produit</a>
</div>

<div class="card overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-ink text-cream text-xs uppercase tracking-widest">
            <tr>
                <th class="px-4 py-3 text-left">Image</th>
                <th class="px-4 py-3 text-left">Nom</th>
                <th class="px-4 py-3 text-left">Catégorie</th>
                <th class="px-4 py-3 text-right">Prix</th>
                <th class="px-4 py-3 text-right">Stock</th>
                <th class="px-4 py-3 text-center">Actif</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="border-t border-ink/5 hover:bg-ink/5">
                    <td class="px-4 py-3">
                        <img src="<?php echo e($product->image_url); ?>" alt="" class="w-12 h-12 object-cover" onerror="this.src='https://placehold.co/60'">
                    </td>
                    <td class="px-4 py-3 font-semibold"><?php echo e($product->name); ?></td>
                    <td class="px-4 py-3"><?php echo e($product->category->name); ?></td>
                    <td class="px-4 py-3 text-right font-display"><?php echo e(number_format($product->price, 2, ',', ' ')); ?> €</td>
                    <td class="px-4 py-3 text-right"><?php echo e($product->stock); ?></td>
                    <td class="px-4 py-3 text-center"><?php echo e($product->is_active ? '✓' : '✕'); ?></td>
                    <td class="px-4 py-3 text-right">
                        <a href="<?php echo e(route('admin.products.edit', $product)); ?>" class="text-accent underline text-xs">Éditer</a>
                        <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" method="POST" class="inline" onsubmit="return confirm('Supprimer ?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="text-red-600 underline text-xs ml-2">Suppr</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<div class="mt-6"><?php echo e($products->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/admin/products/index.blade.php ENDPATH**/ ?>