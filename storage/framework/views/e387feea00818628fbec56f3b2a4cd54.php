<?php $__env->startSection('title', $product->name . ' — TEE/SHOP'); ?>
<?php $__env->startSection('description', Str::limit($product->description, 150)); ?>
<?php $__env->startSection('og_title', $product->name); ?>
<?php $__env->startSection('og_description', Str::limit($product->description, 150)); ?>
<?php $__env->startSection('og_image', $product->image_url); ?>

<?php $__env->startSection('content'); ?>
<section class="container mx-auto px-4 py-10">
    <nav class="text-xs uppercase tracking-widest mb-6 text-ink/60">
        <a href="<?php echo e(route('home')); ?>" class="hover:text-accent">Accueil</a> /
        <a href="<?php echo e(route('categories.show', $product->category)); ?>" class="hover:text-accent"><?php echo e($product->category->name); ?></a> /
        <span><?php echo e($product->name); ?></span>
    </nav>

    <div class="grid md:grid-cols-2 gap-12">
        
        <div class="aspect-square bg-cream border-2 border-ink overflow-hidden">
            <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>"
                 class="w-full h-full object-cover"
                 onerror="this.src='https://placehold.co/800x800/0a0a0a/f5f1eb?text=<?php echo e(urlencode($product->name)); ?>'">
        </div>

        
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-accent mb-2"><?php echo e($product->category->name); ?></p>
            <h1 class="text-5xl font-display mb-4"><?php echo e($product->name); ?></h1>
            <p class="text-3xl font-display mb-6"><?php echo e(number_format($product->price, 2, ',', ' ')); ?> €</p>

            <p class="text-ink/80 mb-8 leading-relaxed"><?php echo e($product->description); ?></p>

            <form action="<?php echo e(route('cart.add', $product)); ?>" method="POST" class="space-y-5">
                <?php echo csrf_field(); ?>

                <?php if(is_array($product->sizes) && count($product->sizes) > 0): ?>
                    <div>
                        <label class="block text-xs uppercase tracking-widest mb-2 font-semibold">Taille</label>
                        <div class="flex flex-wrap gap-2">
                            <?php $__currentLoopData = $product->sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="cursor-pointer">
                                    <input type="radio" name="size" value="<?php echo e($size); ?>" <?php echo e($i === 0 ? 'checked' : ''); ?> class="peer sr-only" required>
                                    <span class="inline-block px-4 py-2 border-2 border-ink/20 peer-checked:bg-ink peer-checked:text-cream peer-checked:border-ink uppercase text-sm font-medium hover:border-ink transition"><?php echo e($size); ?></span>
                                </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(is_array($product->colors) && count($product->colors) > 0): ?>
                    <div>
                        <label class="block text-xs uppercase tracking-widest mb-2 font-semibold">Couleur</label>
                        <select name="color" class="input">
                            <?php $__currentLoopData = $product->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($color); ?>"><?php echo e($color); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                <?php endif; ?>

                <div>
                    <label class="block text-xs uppercase tracking-widest mb-2 font-semibold">Quantité</label>
                    <input type="number" name="quantity" value="1" min="1" max="<?php echo e(max($product->stock, 1)); ?>" class="input w-32" required>
                </div>

                <?php if($product->stock > 0): ?>
                    <button type="submit" class="btn-primary w-full text-lg">
                        Ajouter au panier
                    </button>
                    <p class="text-xs text-ink/50"><?php echo e($product->stock); ?> en stock</p>
                <?php else: ?>
                    <button disabled class="btn w-full bg-ink/20 text-ink/40 cursor-not-allowed">Épuisé</button>
                <?php endif; ?>
            </form>

            
            <div class="border-t border-ink/10 mt-8 pt-6">
                <p class="text-xs uppercase tracking-widest mb-3 text-ink/60">Partager ce produit</p>
                <div class="flex gap-2">
                    <a href="https://facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>" target="_blank" rel="noopener"
                       class="w-9 h-9 border border-ink flex items-center justify-center hover:bg-ink hover:text-cream transition">f</a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode(url()->current())); ?>&text=<?php echo e(urlencode($product->name)); ?>" target="_blank" rel="noopener"
                       class="w-9 h-9 border border-ink flex items-center justify-center hover:bg-ink hover:text-cream transition">𝕏</a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo e(urlencode(url()->current())); ?>" target="_blank" rel="noopener"
                       class="w-9 h-9 border border-ink flex items-center justify-center hover:bg-ink hover:text-cream transition">in</a>
                    <a href="https://wa.me/?text=<?php echo e(urlencode($product->name . ' ' . url()->current())); ?>" target="_blank" rel="noopener"
                       class="w-9 h-9 border border-ink flex items-center justify-center hover:bg-ink hover:text-cream transition">W</a>
                </div>
            </div>
        </div>
    </div>

    
    <?php if($related->count() > 0): ?>
        <div class="mt-20">
            <h2 class="text-4xl font-display mb-8">Aussi à voir</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('partials.product-card', ['product' => $rel], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/products/show.blade.php ENDPATH**/ ?>