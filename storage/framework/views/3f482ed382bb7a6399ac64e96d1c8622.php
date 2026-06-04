<?php $__env->startSection('title', 'Éditer ' . $product->name); ?>

<?php $__env->startSection('content'); ?>
<h1 class="text-4xl font-display mb-6">Éditer le produit</h1>
<div class="card p-6">
    <form action="<?php echo e(route('admin.products.update', $product)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo method_field('PUT'); ?>
        <?php echo $__env->make('admin.products._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>