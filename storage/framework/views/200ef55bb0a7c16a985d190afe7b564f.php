<a href="<?php echo e(route('products.show', $product)); ?>" class="group block">
    <div class="aspect-square bg-cream border border-ink/10 overflow-hidden mb-3 relative">
        <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>"
             class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
             onerror="this.src='https://placehold.co/600x600/0a0a0a/f5f1eb?text=<?php echo e(urlencode($product->name)); ?>'">
        <?php if($product->stock < 1): ?>
            <div class="absolute top-2 left-2 bg-red-600 text-white text-xs uppercase tracking-wider px-2 py-1">Épuisé</div>
        <?php elseif($product->stock < 10): ?>
            <div class="absolute top-2 left-2 bg-accent text-white text-xs uppercase tracking-wider px-2 py-1">Stock limité</div>
        <?php endif; ?>
    </div>
    <p class="text-xs uppercase tracking-widest text-ink/50"><?php echo e($product->category->name ?? ''); ?></p>
    <h3 class="font-semibold group-hover:text-accent transition"><?php echo e($product->name); ?></h3>
    <p class="font-display text-xl mt-1"><?php echo e(number_format($product->price, 2, ',', ' ')); ?> €</p>
</a>
<?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/partials/product-card.blade.php ENDPATH**/ ?>