@extends('layouts.app')
@section('title', 'Tous les produits — TEE/SHOP')

@section('content')
<section class="container mx-auto px-4 py-12">
    <div class="mb-10">
        <p class="text-xs uppercase tracking-[0.3em] text-accent mb-2">Catalogue</p>
        <h1 class="text-6xl font-display">Tous les produits</h1>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            @include('partials.product-card', ['product' => $product])
        @endforeach
    </div>
    <div class="mt-12">{{ $products->links() }}</div>
</section>
@endsection
