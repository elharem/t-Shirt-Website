<?php $__env->startSection('title', 'Tous les produits — TEE/SHOP'); ?>

<?php $__env->startSection('content'); ?>
<section class="container mx-auto px-4 py-12">

    
    <div class="mb-8 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-accent mb-2">Catalogue</p>
            <h1 class="text-6xl font-display">Tous les produits</h1>
        </div>

        
        <form method="GET" action="<?php echo e(route('products.index')); ?>" class="flex items-center gap-2">
            <label for="sort" class="text-xs uppercase tracking-widest text-ink/50 whitespace-nowrap">
                Trier par
            </label>
            <select name="sort" id="sort"
                onchange="this.form.submit()"
                class="border border-ink/20 rounded-lg px-3 py-2 text-sm bg-white focus:outline-none focus:border-accent transition cursor-pointer">
                <option value="newest"     <?php echo e($sort === 'newest'     ? 'selected' : ''); ?>>Nouveautés</option>
                <option value="price_asc"  <?php echo e($sort === 'price_asc'  ? 'selected' : ''); ?>>Prix croissant</option>
                <option value="price_desc" <?php echo e($sort === 'price_desc' ? 'selected' : ''); ?>>Prix décroissant</option>
                <option value="name_asc"   <?php echo e($sort === 'name_asc'   ? 'selected' : ''); ?>>Nom A → Z</option>
                <option value="name_desc"  <?php echo e($sort === 'name_desc'  ? 'selected' : ''); ?>>Nom Z → A</option>
            </select>
        </form>
    </div>

    
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('partials.product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div class="mt-12"><?php echo e($products->links()); ?></div>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/products/index.blade.php ENDPATH**/ ?>