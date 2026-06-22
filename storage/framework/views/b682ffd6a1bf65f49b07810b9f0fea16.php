<?php $__env->startSection('title', 'Catégories — TEE/SHOP'); ?>

<?php $__env->startSection('content'); ?>
<section class="container mx-auto px-4 py-12">
    <div class="mb-10">
        <p class="text-xs uppercase tracking-[0.3em] text-accent mb-2">Explorer</p>
        <h1 class="text-6xl font-display">Toutes les catégories</h1>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('categories.show', $cat)); ?>"
       class="group relative h-64 bg-ink overflow-hidden block">
        <?php if($cat->image_url): ?>
            <img src="<?php echo e($cat->image_url); ?>" alt="<?php echo e($cat->name); ?>"
                 class="absolute inset-0 w-full h-full object-cover opacity-70 group-hover:opacity-90 group-hover:scale-105 transition-all duration-500">
        <?php endif; ?>
        <div class="absolute inset-0 bg-gradient-to-br from-ink/40 to-ink/90"></div>
        <div class="relative h-full p-6 flex flex-col justify-between text-cream">
            <span class="text-xs uppercase tracking-widest opacity-60"><?php echo e($cat->products_count); ?> produits</span>
            <div>
                <h2 class="text-4xl font-display mb-2 group-hover:text-accent transition"><?php echo e($cat->name); ?></h2>
                <p class="text-sm opacity-80"><?php echo e($cat->description); ?></p>
            </div>
        </div>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/categories/index.blade.php ENDPATH**/ ?>