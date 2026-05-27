@extends('layouts.app')
@section('title', $product->name . ' — TEE/SHOP')
@section('description', Str::limit($product->description, 150))
@section('og_title', $product->name)
@section('og_description', Str::limit($product->description, 150))
@section('og_image', $product->image_url)

@section('content')
<section class="container mx-auto px-4 py-10">
    <nav class="text-xs uppercase tracking-widest mb-6 text-ink/60">
        <a href="{{ route('home') }}" class="hover:text-accent">Accueil</a> /
        <a href="{{ route('categories.show', $product->category) }}" class="hover:text-accent">{{ $product->category->name }}</a> /
        <span>{{ $product->name }}</span>
    </nav>

    <div class="grid md:grid-cols-2 gap-12">
        {{-- Image --}}
        <div class="aspect-square bg-cream border-2 border-ink overflow-hidden">
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                 class="w-full h-full object-cover"
                 onerror="this.src='https://placehold.co/800x800/0a0a0a/f5f1eb?text={{ urlencode($product->name) }}'">
        </div>

        {{-- Détails --}}
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-accent mb-2">{{ $product->category->name }}</p>
            <h1 class="text-5xl font-display mb-4">{{ $product->name }}</h1>
            <p class="text-3xl font-display mb-6">{{ number_format($product->price, 2, ',', ' ') }} €</p>

            <p class="text-ink/80 mb-8 leading-relaxed">{{ $product->description }}</p>

            <form action="{{ route('cart.add', $product) }}" method="POST" class="space-y-5">
                @csrf

                @if(is_array($product->sizes) && count($product->sizes) > 0)
                    <div>
                        <label class="block text-xs uppercase tracking-widest mb-2 font-semibold">Taille</label>
                        <div class="flex flex-wrap gap-2">
                            @foreach($product->sizes as $i => $size)
                                <label class="cursor-pointer">
                                    <input type="radio" name="size" value="{{ $size }}" {{ $i === 0 ? 'checked' : '' }} class="peer sr-only" required>
                                    <span class="inline-block px-4 py-2 border-2 border-ink/20 peer-checked:bg-ink peer-checked:text-cream peer-checked:border-ink uppercase text-sm font-medium hover:border-ink transition">{{ $size }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if(is_array($product->colors) && count($product->colors) > 0)
                    <div>
                        <label class="block text-xs uppercase tracking-widest mb-2 font-semibold">Couleur</label>
                        <select name="color" class="input">
                            @foreach($product->colors as $color)
                                <option value="{{ $color }}">{{ $color }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div>
                    <label class="block text-xs uppercase tracking-widest mb-2 font-semibold">Quantité</label>
                    <input type="number" name="quantity" value="1" min="1" max="{{ max($product->stock, 1) }}" class="input w-32" required>
                </div>

                @if($product->stock > 0)
                    <button type="submit" class="btn-primary w-full text-lg">
                        Ajouter au panier
                    </button>
                    <p class="text-xs text-ink/50">{{ $product->stock }} en stock</p>
                @else
                    <button disabled class="btn w-full bg-ink/20 text-ink/40 cursor-not-allowed">Épuisé</button>
                @endif
            </form>

            {{-- Partage social produit (US16) --}}
            <div class="border-t border-ink/10 mt-8 pt-6">
                <p class="text-xs uppercase tracking-widest mb-3 text-ink/60">Partager ce produit</p>
                <div class="flex gap-2">
                    <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" rel="noopener"
                       class="w-9 h-9 border border-ink flex items-center justify-center hover:bg-ink hover:text-cream transition">f</a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($product->name) }}" target="_blank" rel="noopener"
                       class="w-9 h-9 border border-ink flex items-center justify-center hover:bg-ink hover:text-cream transition">𝕏</a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener"
                       class="w-9 h-9 border border-ink flex items-center justify-center hover:bg-ink hover:text-cream transition">in</a>
                    <a href="https://wa.me/?text={{ urlencode($product->name . ' ' . url()->current()) }}" target="_blank" rel="noopener"
                       class="w-9 h-9 border border-ink flex items-center justify-center hover:bg-ink hover:text-cream transition">W</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Produits liés --}}
    @if($related->count() > 0)
        <div class="mt-20">
            <h2 class="text-4xl font-display mb-8">Aussi à voir</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($related as $rel)
                    @include('partials.product-card', ['product' => $rel])
                @endforeach
            </div>
        </div>
    @endif
</section>
@endsection
