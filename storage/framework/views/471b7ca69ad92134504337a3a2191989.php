<?php $__env->startSection('title', 'TEE/SHOP — T-shirts uniques'); ?>

<?php $__env->startSection('content'); ?>

<section class="relative bg-cream overflow-hidden border-b-2 border-ink">
    <div class="container mx-auto px-4 py-8 md:py-12 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-accent mb-4">Collection Printemps 2026</p>
            <h1 class="text-6xl md:text-8xl font-display leading-none mb-6">
                Le tee<br>
                que tu<br>
                <span class="text-accent">portes</span>.
            </h1>
            <p class="text-lg text-ink/70 mb-8 max-w-md">
                Des t-shirts pensés comme des œuvres. Coton bio, designs originaux, production éthique en Europe.
            </p>
            <div class="flex gap-4 flex-wrap">
                <a href="<?php echo e(route('products.index')); ?>" class="btn-primary">Découvrir →</a>
                <a href="<?php echo e(route('categories.index')); ?>" class="btn-outline">Catégories</a>
            </div>
        </div>
        <div class="relative">
            <div class="aspect-square bg-ink relative overflow-hidden">
                <img src="https://images.unsplash.com/photo-1503341504253-dff4815485f1?w=800" alt="T-shirt" class="w-full h-full object-cover mix-blend-luminosity opacity-80">
                <div class="absolute bottom-4 left-4 text-cream font-display text-2xl">NEW DROP</div>
            </div>
            <div class="absolute -bottom-6 -left-6 bg-accent text-cream w-32 h-32 flex flex-col items-center justify-center font-display rotate-[-8deg] shadow-xl">
                <span class="text-4xl">-20%</span>
                <span class="text-xs uppercase">1ère cmde</span>
            </div>
        </div>
    </div>
</section>


<section class="container mx-auto px-4 py-16">
    <div class="flex justify-between items-end mb-10">
        <h2 class="text-5xl font-display">Catégories</h2>
        <a href="<?php echo e(route('categories.index')); ?>" class="text-sm uppercase tracking-widest underline">Voir tout</a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('categories.show', $cat)); ?>"
       class="group relative aspect-[3/4] bg-ink overflow-hidden block">
        
        <?php if($cat->image_url): ?>
            <img src="<?php echo e($cat->image_url); ?>" alt="<?php echo e($cat->name); ?>"
                 class="absolute inset-0 w-full h-full object-cover opacity-70 group-hover:opacity-90 group-hover:scale-105 transition-all duration-500">
        <?php endif; ?>
        
        <div class="absolute inset-0 bg-gradient-to-t from-ink via-ink/60 to-ink/20"></div>
        
        <div class="relative h-full flex flex-col justify-end p-4 text-cream">
            <span class="text-xs opacity-60"><?php echo e($cat->products_count); ?> produit<?php echo e($cat->products_count > 1 ? 's' : ''); ?></span>
            <h3 class="text-2xl font-display group-hover:text-accent transition"><?php echo e($cat->name); ?></h3>
        </div>
        <div class="absolute top-2 right-2 text-cream text-xs font-mono opacity-50">0<?php echo e($i + 1); ?></div>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>


<section class="container mx-auto px-4 py-16">
    <div class="flex justify-between items-end mb-10">
        <h2 class="text-5xl font-display">Dernières arrivées</h2>
        <a href="<?php echo e(route('products.index')); ?>" class="text-sm uppercase tracking-widest underline">Voir tout</a>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('partials.product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>


<section class="bg-ink text-cream py-16">
    <div class="container mx-auto px-4 grid md:grid-cols-3 gap-8 text-center">
        <div>
            <div class="text-5xl font-display text-accent mb-2">100%</div>
            <p class="uppercase tracking-widest text-sm">Coton bio certifié</p>
        </div>
        <div>
            <div class="text-5xl font-display text-accent mb-2">48H</div>
            <p class="uppercase tracking-widest text-sm">Livraison express</p>
        </div>
        <div>
            <div class="text-5xl font-display text-accent mb-2">30J</div>
            <p class="uppercase tracking-widest text-sm">Retours gratuits</p>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/home.blade.php ENDPATH**/ ?>