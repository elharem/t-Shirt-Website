<?php $__env->startSection('title', $category->name . ' — TEE/SHOP'); ?>

<?php $__env->startSection('content'); ?>
<section class="bg-ink text-cream py-12 border-b-2 border-ink">
    <div class="container mx-auto px-4">
        <nav class="text-xs uppercase tracking-widest mb-4 text-cream/60">
            <a href="<?php echo e(route('home')); ?>" class="hover:text-accent">Accueil</a> /
            <a href="<?php echo e(route('categories.index')); ?>" class="hover:text-accent">Catégories</a> /
            <span><?php echo e($category->name); ?></span>
        </nav>
        <h1 class="text-6xl md:text-7xl font-display"><?php echo e($category->name); ?></h1>
        <p class="text-cream/70 mt-3 max-w-xl"><?php echo e($category->description); ?></p>
    </div>
</section>

<section class="container mx-auto px-4 py-12">
    <?php if($products->isEmpty()): ?>
        <div class="text-center py-20 text-ink/50">
            <p class="text-2xl font-display mb-4">Aucun produit pour le moment.</p>
            <a href="<?php echo e(route('products.index')); ?>" class="btn-outline">Voir tous les produits</a>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('partials.product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="mt-12"><?php echo e($products->links()); ?></div>
    <?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/categories/show.blade.php ENDPATH**/ ?>