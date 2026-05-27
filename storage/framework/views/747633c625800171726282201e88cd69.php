<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Admin — <?php echo $__env->yieldContent('title', 'Dashboard'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('head'); ?>
</head>
<body class="bg-cream min-h-screen flex">
    
    <aside class="w-64 bg-ink text-cream min-h-screen sticky top-0">
        <div class="p-6 border-b border-cream/10">
            <a href="<?php echo e(route('home')); ?>" class="text-2xl font-display">TEE<span class="text-accent">/</span>SHOP</a>
            <p class="text-xs uppercase tracking-widest text-cream/50 mt-1">Back-office</p>
        </div>
        <nav class="p-4 space-y-1 text-sm">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="block px-3 py-2 hover:bg-cream/10 <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-accent text-white' : ''); ?>">📊 Dashboard</a>
            <a href="<?php echo e(route('admin.products.index')); ?>" class="block px-3 py-2 hover:bg-cream/10 <?php echo e(request()->routeIs('admin.products.*') ? 'bg-accent text-white' : ''); ?>">👕 Produits</a>
            <a href="<?php echo e(route('admin.categories.index')); ?>" class="block px-3 py-2 hover:bg-cream/10 <?php echo e(request()->routeIs('admin.categories.*') ? 'bg-accent text-white' : ''); ?>">📂 Catégories</a>
            <a href="<?php echo e(route('admin.orders.index')); ?>" class="block px-3 py-2 hover:bg-cream/10 <?php echo e(request()->routeIs('admin.orders.*') ? 'bg-accent text-white' : ''); ?>">📦 Commandes</a>
            <a href="<?php echo e(route('admin.seo')); ?>" class="block px-3 py-2 hover:bg-cream/10 <?php echo e(request()->routeIs('admin.seo') ? 'bg-accent text-white' : ''); ?>">🔍 SEO & Partage</a>
        </nav>
        <div class="p-4 absolute bottom-0 w-full border-t border-cream/10">
            <p class="text-xs text-cream/60 mb-2"><?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->name); ?></p>
            <a href="<?php echo e(route('home')); ?>" class="text-xs underline">← Retour boutique</a>
            <form action="<?php echo e(route('logout')); ?>" method="POST" class="mt-2"><?php echo csrf_field(); ?>
                <button class="text-xs text-cream/60 hover:text-accent">Déconnexion</button>
            </form>
        </div>
    </aside>

    
    <main class="flex-1 p-8">
        <?php if(session('success')): ?>
            <div class="alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert-error"><?php echo e(session('error')); ?></div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('partials.cookie-banner', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/layouts/admin.blade.php ENDPATH**/ ?>