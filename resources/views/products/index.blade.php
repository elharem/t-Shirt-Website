@extends('layouts.app')
@section('title', 'Tous les produits — TEE/SHOP')

@section('content')
<section class="container mx-auto px-4 py-12">

    {{-- Header --}}
    <div class="mb-8 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-accent mb-2">Catalogue</p>
            <h1 class="text-6xl font-display">Tous les produits</h1>
        </div>

        {{-- Filtre de tri --}}
        <form method="GET" action="{{ route('products.index') }}" class="flex items-center gap-2">
            <label for="sort" class="text-xs uppercase tracking-widest text-ink/50 whitespace-nowrap">
                Trier par
            </label>
            <select name="sort" id="sort"
                onchange="this.form.submit()"
                class="border border-ink/20 rounded-lg px-3 py-2 text-sm bg-white focus:outline-none focus:border-accent transition cursor-pointer">
                <option value="newest"     {{ $sort === 'newest'     ? 'selected' : '' }}>Nouveautés</option>
                <option value="price_asc"  {{ $sort === 'price_asc'  ? 'selected' : '' }}>Prix croissant</option>
                <option value="price_desc" {{ $sort === 'price_desc' ? 'selected' : '' }}>Prix décroissant</option>
                <option value="name_asc"   {{ $sort === 'name_asc'   ? 'selected' : '' }}>Nom A → Z</option>
                <option value="name_desc"  {{ $sort === 'name_desc'  ? 'selected' : '' }}>Nom Z → A</option>
            </select>
        </form>
    </div>

    {{-- Grille produits --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            @include('partials.product-card', ['product' => $product])
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-12">{{ $products->links() }}</div>

</section>
@endsection