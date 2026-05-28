@extends('layouts.app')
@section('title', $query ? 'Recherche : ' . $query : 'Recherche')

@section('content')
<section class="container mx-auto px-4 py-12">
    <p class="text-xs uppercase tracking-[0.3em] text-accent mb-2">Recherche</p>
    @if($query)
        <h1 class="text-5xl font-display mb-2">Résultats pour « {{ $query }} »</h1>
        <p class="text-ink/60 mb-10">{{ $products->total() }} produit{{ $products->total() > 1 ? 's' : '' }} trouvé{{ $products->total() > 1 ? 's' : '' }}</p>
    @else
        <h1 class="text-5xl font-display mb-10">Rechercher un produit</h1>
    @endif

    <form action="{{ route('products.search') }}" method="GET" class="mb-10 max-w-xl">
        <div class="flex gap-2">
            <input type="search" name="q" value="{{ $query }}" placeholder="Que cherches-tu ?" class="input flex-1" autofocus>
            <button type="submit" class="btn-primary">Chercher</button>
        </div>
    </form>

    @if($products->isEmpty() && $query)
        <div class="text-center py-20 border-2 border-dashed border-ink/20">
            <div class="text-5xl mb-4">🔍</div>
            <p class="text-2xl font-display mb-3">Aucun résultat pour « {{ $query }} »</p>
            <p class="text-ink/60 mb-6">Essaie avec d'autres mots-clés.</p>
            <div class="flex gap-3 justify-center">
                <a href="{{ route('products.index') }}" class="btn-outline">Tous les produits</a>
                <a href="{{ route('categories.index') }}" class="btn-primary">Voir les catégories</a>
            </div>
        </div>
    @elseif($products->isNotEmpty())
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                @include('partials.product-card', ['product' => $product])
            @endforeach
        </div>
        <div class="mt-12">{{ $products->links() }}</div>
    @endif
</section>
@endsection