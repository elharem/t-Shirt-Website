<?php echo csrf_field(); ?>
<div class="grid md:grid-cols-2 gap-4">
    <div class="md:col-span-2">
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Nom *</label>
        <input type="text" name="name" value="<?php echo e(old('name', $product->name ?? '')); ?>" class="input" required>
    </div>
    <div>
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Catégorie *</label>
        <select name="category_id" class="input" required>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cat->id); ?>" <?php echo e(old('category_id', $product->category_id ?? '') == $cat->id ? 'selected' : ''); ?>><?php echo e($cat->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div>
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Prix (€) *</label>
        <input type="number" name="price" step="0.01" value="<?php echo e(old('price', $product->price ?? '')); ?>" class="input" required>
    </div>
    <div>
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Stock *</label>
        <input type="number" name="stock" value="<?php echo e(old('stock', $product->stock ?? 0)); ?>" class="input" required>
    </div>
    <div>
        <label class="flex items-center gap-2 mt-7">
            <input type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', $product->is_active ?? true) ? 'checked' : ''); ?>>
            <span class="text-sm font-semibold uppercase tracking-widest">Actif</span>
        </label>
    </div>
    <div class="md:col-span-2">
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Description *</label>
        <textarea name="description" rows="4" class="input" required><?php echo e(old('description', $product->description ?? '')); ?></textarea>
    </div>
    <div class="md:col-span-2">
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">URL image</label>
        <input type="text" name="image" value="<?php echo e(old('image', $product->image ?? '')); ?>" class="input" placeholder="https://...">
        <p class="text-xs text-ink/60 mt-1">Ou téléverse un fichier :</p>
        <input type="file" name="image_file" class="mt-1">
    </div>
    <div>
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Tailles (séparées par virgules)</label>
        <input type="text" name="sizes_csv"
               value="<?php echo e(old('sizes_csv', isset($product) && is_array($product->sizes) ? implode(', ', $product->sizes) : '')); ?>"
               class="input" placeholder="S, M, L, XL">
    </div>
    <div>
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Couleurs (séparées par virgules)</label>
        <input type="text" name="colors_csv"
               value="<?php echo e(old('colors_csv', isset($product) && is_array($product->colors) ? implode(', ', $product->colors) : '')); ?>"
               class="input" placeholder="Noir, Blanc, Rouge">
    </div>
</div>
<div class="mt-6 flex gap-3">
    <button class="btn-primary"><?php echo e(isset($product) ? 'Enregistrer' : 'Créer'); ?></button>
    <a href="<?php echo e(route('admin.products.index')); ?>" class="btn-outline">Annuler</a>
</div>


<div class="bg-white rounded-xl border border-ink/10 shadow-sm overflow-hidden mt-6">
    <div class="px-6 py-4 border-b border-ink/5 flex items-center gap-3">
        <div class="w-8 h-8 rounded-lg bg-blue-500 flex items-center justify-center text-white text-xs font-bold">G</div>
        <div>
            <h2 class="font-semibold text-sm">SEO du produit</h2>
            <p class="text-xs text-ink/40">Optimise le référencement de cette page produit</p>
        </div>
    </div>
    <div class="p-6 space-y-4">

        <div>
            <div class="flex justify-between items-center mb-1.5">
                <label class="text-xs font-semibold uppercase tracking-wider text-ink/70">Meta titre</label>
                <span class="text-xs font-mono px-2 py-0.5 rounded-full bg-gray-100 text-ink/50" id="meta-title-count">
                    <?php echo e(strlen(old('meta_title', $product->meta_title ?? ''))); ?>/70
                </span>
            </div>
            <input type="text" name="meta_title"
                   value="<?php echo e(old('meta_title', $product->meta_title ?? '')); ?>"
                   class="w-full border border-ink/15 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-accent transition"
                   maxlength="70"
                   placeholder="<?php echo e($product->name ?? 'Nom du produit'); ?> — TEE/SHOP"
                   oninput="document.getElementById('meta-title-count').textContent = this.value.length+'/70'">
            <p class="text-xs text-ink/40 mt-1">Si vide, le nom du produit sera utilisé automatiquement.</p>
        </div>

        <div>
            <div class="flex justify-between items-center mb-1.5">
                <label class="text-xs font-semibold uppercase tracking-wider text-ink/70">Meta description</label>
                <span class="text-xs font-mono px-2 py-0.5 rounded-full bg-gray-100 text-ink/50" id="meta-desc-count">
                    <?php echo e(strlen(old('meta_description', $product->meta_description ?? ''))); ?>/160
                </span>
            </div>
            <textarea name="meta_description" rows="3"
                      class="w-full border border-ink/15 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-accent transition resize-none"
                      maxlength="160"
                      placeholder="Description courte du produit pour Google..."
                      oninput="document.getElementById('meta-desc-count').textContent = this.value.length+'/160'"><?php echo e(old('meta_description', $product->meta_description ?? '')); ?></textarea>
            <p class="text-xs text-ink/40 mt-1">Si vide, la description du produit sera utilisée automatiquement.</p>
        </div>

        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-ink/70 mb-1.5">Mots-clés</label>
            <input type="text" name="meta_keywords"
                   value="<?php echo e(old('meta_keywords', $product->meta_keywords ?? '')); ?>"
                   class="w-full border border-ink/15 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-accent transition"
                   placeholder="t-shirt noir, coton bio, oversize, ...">
            <p class="text-xs text-ink/40 mt-1">Séparés par des virgules, spécifiques à ce produit.</p>
        </div>

    </div>
</div>
<?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/admin/products/_form.blade.php ENDPATH**/ ?>