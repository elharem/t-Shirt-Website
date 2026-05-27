<?php $__env->startSection('title', 'Mon profil — TEE/SHOP'); ?>

<?php $__env->startSection('content'); ?>
<section class="container mx-auto px-4 py-12 max-w-3xl">
    <h1 class="text-5xl font-display mb-8">Mon profil</h1>

    
    <div class="card p-6 mb-6">
        <h2 class="text-2xl font-display mb-5">Informations personnelles</h2>
        <form action="<?php echo e(route('profile.update')); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Prénom</label>
                    <input type="text" name="first_name" value="<?php echo e(old('first_name', $user->first_name)); ?>" class="input">
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Nom</label>
                    <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>" class="input" required>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" class="input" required>
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Téléphone</label>
                    <input type="text" name="phone" value="<?php echo e(old('phone', $user->phone)); ?>" class="input">
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Pays</label>
                    <input type="text" name="country" value="<?php echo e(old('country', $user->country)); ?>" class="input">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Adresse</label>
                    <input type="text" name="address" value="<?php echo e(old('address', $user->address)); ?>" class="input">
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Ville</label>
                    <input type="text" name="city" value="<?php echo e(old('city', $user->city)); ?>" class="input">
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Code postal</label>
                    <input type="text" name="postal_code" value="<?php echo e(old('postal_code', $user->postal_code)); ?>" class="input">
                </div>
            </div>
            <button class="btn-primary">Enregistrer</button>
        </form>
    </div>

    
    <div class="card p-6 mb-6">
        <h2 class="text-2xl font-display mb-5">Changer de mot de passe</h2>
        <form action="<?php echo e(route('profile.password')); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Mot de passe actuel</label>
                <input type="password" name="current_password" class="input" required>
                <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Nouveau mot de passe</label>
                <input type="password" name="password" class="input" required>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Confirmer</label>
                <input type="password" name="password_confirmation" class="input" required>
            </div>
            <button class="btn-primary">Modifier le mot de passe</button>
        </form>
    </div>

    
    <div class="card p-6 border-red-200">
        <h2 class="text-2xl font-display mb-3 text-red-700">Supprimer mon compte</h2>
        <p class="text-sm text-ink/70 mb-4">Cette action est définitive. Toutes tes données seront supprimées.</p>
        <form action="<?php echo e(route('profile.destroy')); ?>" method="POST" class="space-y-3" onsubmit="return confirm('Vraiment supprimer ton compte ?')">
            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
            <input type="password" name="password" placeholder="Confirme avec ton mot de passe" class="input" required>
            <button class="btn-danger">Supprimer mon compte</button>
        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/profile/edit.blade.php ENDPATH**/ ?>