<a href="{{ route('products.show', $product) }}" class="group block">
    <div class="aspect-square bg-cream border border-ink/10 overflow-hidden mb-3 relative">
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
             class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
             onerror="this.src='https://placehold.co/600x600/0a0a0a/f5f1eb?text={{ urlencode($product->name) }}'">
        @if($product->stock < 1)
            <div class="absolute top-2 left-2 bg-red-600 text-white text-xs uppercase tracking-wider px-2 py-1">Épuisé</div>
        @elseif($product->stock < 10)
            <div class="absolute top-2 left-2 bg-accent text-white text-xs uppercase tracking-wider px-2 py-1">Stock limité</div>
        @endif
    </div>
    <p class="text-xs uppercase tracking-widest text-ink/50">{{ $product->category->name ?? '' }}</p>
    <h3 class="font-semibold group-hover:text-accent transition">{{ $product->name }}</h3>
    <p class="font-display text-xl mt-1">{{ number_format($product->price, 2, ',', ' ') }} €</p>
</a>
