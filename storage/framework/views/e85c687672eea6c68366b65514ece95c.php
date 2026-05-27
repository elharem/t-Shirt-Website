<?php $__env->startSection('title', 'Catégories'); ?>

<?php $__env->startSection('content'); ?>
<h1 class="text-4xl font-display mb-6">Catégories</h1>

<div class="grid lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 card overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-ink text-cream text-xs uppercase tracking-widest">
                <tr>
                    <th class="px-4 py-3 text-left">Nom</th>
                    <th class="px-4 py-3 text-left">Slug</th>
                    <th class="px-4 py-3 text-right">Produits</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t border-ink/5">
                        <td class="px-4 py-3 font-semibold"><?php echo e($cat->name); ?></td>
                        <td class="px-4 py-3 text-ink/60"><?php echo e($cat->slug); ?></td>
                        <td class="px-4 py-3 text-right"><?php echo e($cat->products_count); ?></td>
                        <td class="px-4 py-3 text-right">
                            <form action="<?php echo e(route('admin.categories.destroy', $cat)); ?>" method="POST" class="inline" onsubmit="return confirm('Supprimer ?')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button class="text-red-600 underline text-xs">Suppr</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <div class="card p-6 h-fit">
        <h2 class="text-2xl font-display mb-4">+ Nouvelle catégorie</h2>
        <form action="<?php echo e(route('admin.categories.store')); ?>" method="POST" class="space-y-3">
            <?php echo csrf_field(); ?>
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Nom</label>
                <input type="text" name="name" class="input" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Description</label>
                <textarea name="description" rows="3" class="input"></textarea>
            </div>
            <button class="btn-primary w-full">Créer</button>
        </form>
    </div>
</div>

<div class="mt-6"><?php echo e($categories->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>