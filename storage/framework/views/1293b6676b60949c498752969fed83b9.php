<?php $__env->startSection('title', 'Connexion — TEE/SHOP'); ?>

<?php $__env->startSection('content'); ?>
<section class="container mx-auto px-4 py-16 max-w-md">
    <h1 class="text-5xl font-display mb-2">Connexion</h1>
    <p class="text-ink/60 mb-8">Heureux de te revoir.</p>

    <form action="<?php echo e(route('login')); ?>" method="POST" class="space-y-5">
        <?php echo csrf_field(); ?>
        <div>
            <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Email</label>
            <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="input" required autofocus>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
            <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Mot de passe</label>
            <input type="password" name="password" class="input" required>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <label class="flex items-center gap-2 text-sm">
            <input type="checkbox" name="remember"> Se souvenir de moi
        </label>
        <button class="btn-primary w-full">Se connecter</button>
    </form>

    <p class="text-center mt-6 text-sm">
        Pas encore de compte ? <a href="<?php echo e(route('register')); ?>" class="underline font-semibold">Créer un compte</a>
    </p>

    
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/auth/login.blade.php ENDPATH**/ ?>