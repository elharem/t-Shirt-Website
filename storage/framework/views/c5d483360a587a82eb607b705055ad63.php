

<?php $__env->startSection('content'); ?>
<section class="container mx-auto px-4 py-12 max-w-3xl">
    <p class="text-xs uppercase tracking-[0.3em] text-accent mb-2"><?php echo $__env->yieldContent('eyebrow', 'Information'); ?></p>
    <h1 class="text-5xl md:text-6xl font-display mb-3"><?php echo $__env->yieldContent('heading'); ?></h1>
    <?php if (! empty(trim($__env->yieldContent('subtitle')))): ?>
        <p class="text-lg text-ink/60 mb-10"><?php echo $__env->yieldContent('subtitle'); ?></p>
    <?php else: ?>
        <div class="mb-10"></div>
    <?php endif; ?>

    <article class="prose max-w-none">
        <?php echo $__env->yieldContent('page'); ?>
    </article>

    <div class="mt-16 pt-8 border-t border-ink/10 text-sm text-ink/50">
        <p>Dernière mise à jour : <?php echo e(now()->format('d/m/Y')); ?></p>
        <a href="<?php echo e(route('home')); ?>" class="underline mt-2 inline-block">← Retour à l'accueil</a>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/layouts/page.blade.php ENDPATH**/ ?>