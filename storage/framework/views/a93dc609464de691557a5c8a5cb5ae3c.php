<?php $__env->startSection('title', 'Inscription — TEE/SHOP'); ?>

<?php $__env->startSection('content'); ?>
<section class="container mx-auto px-4 py-16 max-w-xl">
    <h1 class="text-5xl font-display mb-2">Inscription</h1>
    <p class="text-ink/60 mb-8">Rejoins la communauté TEE/SHOP.</p>

    <form action="<?php echo e(route('register')); ?>" method="POST" class="space-y-5">
        <?php echo csrf_field(); ?>

        
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Prénom *</label>
                <input type="text" name="first_name" value="<?php echo e(old('first_name')); ?>" class="input" required>
                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Nom *</label>
                <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="input" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        
        <div>
            <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Adresse *</label>
            <input type="text" name="address" value="<?php echo e(old('address')); ?>" class="input" required placeholder="Rue et numéro">
            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Code postal *</label>
                <input type="text" name="postal_code" value="<?php echo e(old('postal_code')); ?>" class="input" required>
                <?php $__errorArgs = ['postal_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Ville *</label>
                <input type="text" name="city" value="<?php echo e(old('city')); ?>" class="input" required>
                <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        
        <div>
            <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Courriel *</label>
            <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="input" required>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Mot de passe *</label>
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
            <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Confirmer le mot de passe *</label>
            <input type="password" name="password_confirmation" class="input" required>
        </div>

        <p class="text-xs text-ink/60">Tous les champs marqués * sont obligatoires.</p>

        <button class="btn-primary w-full">Créer mon compte</button>
    </form>

    <p class="text-center mt-6 text-sm">
        Déjà inscrit ? <a href="<?php echo e(route('login')); ?>" class="underline font-semibold">Se connecter</a>
    </p>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/auth/register.blade.php ENDPATH**/ ?>