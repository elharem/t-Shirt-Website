<?php $__env->startSection('title', 'Mon panier — TEE/SHOP'); ?>

<?php $__env->startSection('content'); ?>
<section class="container mx-auto px-4 py-12">
    <h1 class="text-5xl font-display mb-8">Mon panier</h1>

    <?php if($cart->items->isEmpty()): ?>
        <div class="text-center py-20">
            <p class="text-2xl font-display mb-4">Ton panier est vide.</p>
            <p class="text-ink/60 mb-8">Mais il ne demande qu'à être rempli.</p>
            <a href="<?php echo e(route('products.index')); ?>" class="btn-primary">Voir les produits</a>
        </div>
    <?php else: ?>
        <div class="grid lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-4">
                <?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card p-4 flex gap-4 items-center">
                        <a href="<?php echo e(route('products.show', $item->product)); ?>" class="shrink-0">
                            <img src="<?php echo e($item->product->image_url); ?>" alt="<?php echo e($item->product->name); ?>" class="w-24 h-24 object-cover border border-ink/10"
                                 onerror="this.src='https://placehold.co/200x200/0a0a0a/f5f1eb'">
                        </a>
                        <div class="flex-1 min-w-0">
                            <a href="<?php echo e(route('products.show', $item->product)); ?>" class="font-semibold hover:text-accent"><?php echo e($item->product->name); ?></a>
                            <p class="text-xs text-ink/60 mt-1">
                                <?php if($item->size): ?> Taille : <strong><?php echo e($item->size); ?></strong> <?php endif; ?>
                                <?php if($item->size && $item->color): ?> · <?php endif; ?>
                                <?php if($item->color): ?> Couleur : <strong><?php echo e($item->color); ?></strong> <?php endif; ?>
                            </p>
                            <p class="font-display text-xl mt-1"><?php echo e(number_format($item->price, 2, ',', ' ')); ?> €</p>
                        </div>

                        <form action="<?php echo e(route('cart.update', $item)); ?>" method="POST" class="flex items-center gap-2">
                            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                            <input type="number" name="quantity" value="<?php echo e($item->quantity); ?>" min="1" max="99"
                                   class="input w-20 text-center" onchange="this.form.submit()">
                        </form>

                        <p class="font-display text-lg w-24 text-right"><?php echo e(number_format($item->subtotal(), 2, ',', ' ')); ?> €</p>

                        <form action="<?php echo e(route('cart.remove', $item)); ?>" method="POST">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="text-ink/40 hover:text-red-600 transition p-2" title="Retirer">✕</button>
                        </form>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <form action="<?php echo e(route('cart.clear')); ?>" method="POST" class="text-right">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="text-sm text-ink/60 underline hover:text-red-600">Vider le panier</button>
                </form>
            </div>

            
            <aside class="card p-6 h-fit sticky top-32">
                <h2 class="text-2xl font-display mb-6">Récapitulatif</h2>
                <div class="space-y-3 text-sm border-b border-ink/10 pb-4 mb-4">
                    <div class="flex justify-between"><span>Articles (<?php echo e($cart->totalItems()); ?>)</span><span><?php echo e(number_format($cart->totalPrice(), 2, ',', ' ')); ?> €</span></div>
                    <div class="flex justify-between text-ink/60"><span>Livraison</span><span>Calculée à la suivante étape</span></div>
                </div>
                <div class="flex justify-between font-display text-2xl mb-6">
                    <span>Total</span>
                    <span><?php echo e(number_format($cart->totalPrice(), 2, ',', ' ')); ?> €</span>
                </div>
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('checkout.index')); ?>" class="btn-primary w-full">Commander →</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn-primary w-full">Se connecter pour commander</a>
                    <p class="text-xs text-ink/60 text-center mt-3">Pas encore inscrit ? <a href="<?php echo e(route('register')); ?>" class="underline">Créer un compte</a></p>
                <?php endif; ?>
            </aside>
        </div>
    <?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/cart/index.blade.php ENDPATH**/ ?>