@extends('layouts.app')
@section('title', $category->name . ' — TEE/SHOP')

@section('content')
<section class="bg-ink text-cream py-12 border-b-2 border-ink">
    <div class="container mx-auto px-4">
        <nav class="text-xs uppercase tracking-widest mb-4 text-cream/60">
            <a href="{{ route('home') }}" class="hover:text-accent">Accueil</a> /
            <a href="{{ route('categories.index') }}" class="hover:text-accent">Catégories</a> /
            <span>{{ $category->name }}</span>
        </nav>
        <h1 class="text-6xl md:text-7xl font-display">{{ $category->name }}</h1>
        <p class="text-cream/70 mt-3 max-w-xl">{{ $category->description }}</p>
    </div>
</section>

<section class="container mx-auto px-4 py-12">
    @if($products->isEmpty())
        <div class="text-center py-20 text-ink/50">
            <p class="text-2xl font-display mb-4">Aucun produit pour le moment.</p>
            <a href="{{ route('products.index') }}" class="btn-outline">Voir tous les produits</a>
        </div>
    @else
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                @include('partials.product-card', ['product' => $product])
            @endforeach
        </div>
        <div class="mt-12">{{ $products->links() }}</div>
    @endif
</section>
@endsection
