<?php $__env->startSection('title', 'Commande — TEE/SHOP'); ?>

<?php $__env->startSection('content'); ?>
<section class="container mx-auto px-4 py-12 max-w-6xl">
    <h1 class="text-5xl font-display mb-8">Finaliser la commande</h1>

    <form action="<?php echo e(route('checkout.store')); ?>" method="POST" class="grid lg:grid-cols-3 gap-8">
        <?php echo csrf_field(); ?>

        <div class="lg:col-span-2 space-y-8">
            
            <div class="card p-6">
                <h2 class="text-2xl font-display mb-5">1. Adresse de livraison</h2>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Adresse</label>
                        <input type="text" name="shipping_address" value="<?php echo e(old('shipping_address', auth()->user()->address)); ?>" class="input" required>
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Ville</label>
                        <input type="text" name="shipping_city" value="<?php echo e(old('shipping_city', auth()->user()->city)); ?>" class="input" required>
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Code postal</label>
                        <input type="text" name="shipping_postal_code" value="<?php echo e(old('shipping_postal_code', auth()->user()->postal_code)); ?>" class="input" required>
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Pays</label>
                        <input type="text" name="shipping_country" value="<?php echo e(old('shipping_country', auth()->user()->country ?? 'Belgique')); ?>" class="input" required>
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Téléphone</label>
                        <input type="text" name="shipping_phone" value="<?php echo e(old('shipping_phone', auth()->user()->phone)); ?>" class="input" required>
                    </div>
                </div>
            </div>

            
            <div class="card p-6">
                <h2 class="text-2xl font-display mb-5">2. Choix du transporteur</h2>
                <div class="space-y-3">
                    <?php
                        $carriers = [
                            'bpost' => ['label' => 'bpost — Belgique', 'time' => '2-3 jours', 'price' => 5.95],
                            'dpd' => ['label' => 'DPD', 'time' => '2-4 jours', 'price' => 6.95],
                            'ups' => ['label' => 'UPS', 'time' => '1-2 jours', 'price' => 8.95],
                            'dhl' => ['label' => 'DHL Express', 'time' => '24h', 'price' => 9.95],
                        ];
                    ?>
                    <?php $__currentLoopData = $carriers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="flex items-center justify-between p-4 border-2 border-ink/20 cursor-pointer hover:border-ink has-[:checked]:border-ink has-[:checked]:bg-ink/5">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="shipping_carrier" value="<?php echo e($code); ?>" <?php echo e($loop->first ? 'checked' : ''); ?> required>
                                <div>
                                    <p class="font-semibold"><?php echo e($info['label']); ?></p>
                                    <p class="text-xs text-ink/60"><?php echo e($info['time']); ?></p>
                                </div>
                            </div>
                            <span class="font-display text-lg"><?php echo e(number_format($info['price'], 2, ',', ' ')); ?> €</span>
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="card p-6">
                <h2 class="text-2xl font-display mb-5">3. Paiement</h2>
                <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 mb-4 text-sm">
                    <p><strong>Mode test Stripe</strong> — Utilise la carte <code class="bg-yellow-100 px-1">4242 4242 4242 4242</code>, n'importe quelle date future et n'importe quel CVC.</p>
                </div>
                <label class="flex items-center gap-3 p-4 border-2 border-ink/20 has-[:checked]:border-ink has-[:checked]:bg-ink/5 cursor-pointer">
                    <input type="radio" name="payment_method" value="card" checked>
                    <span class="font-semibold">Carte bancaire (Stripe)</span>
                </label>
            </div>

            
            <div class="card p-6">
                <h2 class="text-2xl font-display mb-5">4. Notes (optionnel)</h2>
                <textarea name="notes" rows="3" class="input" placeholder="Indications pour le livreur, instructions spéciales…"><?php echo e(old('notes')); ?></textarea>
            </div>
        </div>

        
        <aside class="card p-6 h-fit sticky top-32">
            <h2 class="text-2xl font-display mb-4">Récapitulatif</h2>
            <div class="space-y-3 mb-4">
                <?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex justify-between text-sm">
                        <div>
                            <p class="font-semibold"><?php echo e($item->product->name); ?></p>
                            <p class="text-xs text-ink/60">x<?php echo e($item->quantity); ?> <?php if($item->size): ?> · <?php echo e($item->size); ?> <?php endif; ?></p>
                        </div>
                        <span><?php echo e(number_format($item->subtotal(), 2, ',', ' ')); ?> €</span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="border-t border-ink/10 pt-4 space-y-2 text-sm">
                <div class="flex justify-between"><span>Sous-total</span><span><?php echo e(number_format($cart->totalPrice(), 2, ',', ' ')); ?> €</span></div>
                <div class="flex justify-between text-ink/60"><span>Frais de port</span><span>variable</span></div>
            </div>
            <div class="flex justify-between font-display text-2xl mt-4 mb-6 border-t border-ink/10 pt-4">
                <span>Total HT*</span>
                <span><?php echo e(number_format($cart->totalPrice(), 2, ',', ' ')); ?> €+</span>
            </div>
            <button type="submit" class="btn-primary w-full">Payer avec Stripe →</button>
            <p class="text-xs text-ink/50 mt-3 text-center">Paiement 100% sécurisé via Stripe</p>
        </aside>
    </form>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/checkout/index.blade.php ENDPATH**/ ?>