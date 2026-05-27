@csrf
<div class="grid md:grid-cols-2 gap-4">
    <div class="md:col-span-2">
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Nom *</label>
        <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" class="input" required>
    </div>
    <div>
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Catégorie *</label>
        <select name="category_id" class="input" required>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Prix (€) *</label>
        <input type="number" name="price" step="0.01" value="{{ old('price', $product->price ?? '') }}" class="input" required>
    </div>
    <div>
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Stock *</label>
        <input type="number" name="stock" value="{{ old('stock', $product->stock ?? 0) }}" class="input" required>
    </div>
    <div>
        <label class="flex items-center gap-2 mt-7">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
            <span class="text-sm font-semibold uppercase tracking-widest">Actif</span>
        </label>
    </div>
    <div class="md:col-span-2">
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Description *</label>
        <textarea name="description" rows="4" class="input" required>{{ old('description', $product->description ?? '') }}</textarea>
    </div>
    <div class="md:col-span-2">
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">URL image</label>
        <input type="text" name="image" value="{{ old('image', $product->image ?? '') }}" class="input" placeholder="https://...">
        <p class="text-xs text-ink/60 mt-1">Ou téléverse un fichier :</p>
        <input type="file" name="image_file" class="mt-1">
    </div>
    <div>
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Tailles (séparées par virgules)</label>
        <input type="text" name="sizes_csv"
               value="{{ old('sizes_csv', isset($product) && is_array($product->sizes) ? implode(', ', $product->sizes) : '') }}"
               class="input" placeholder="S, M, L, XL">
    </div>
    <div>
        <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Couleurs (séparées par virgules)</label>
        <input type="text" name="colors_csv"
               value="{{ old('colors_csv', isset($product) && is_array($product->colors) ? implode(', ', $product->colors) : '') }}"
               class="input" placeholder="Noir, Blanc, Rouge">
    </div>
</div>
<div class="mt-6 flex gap-3">
    <button class="btn-primary">{{ isset($product) ? 'Enregistrer' : 'Créer' }}</button>
    <a href="{{ route('admin.products.index') }}" class="btn-outline">Annuler</a>
</div>
