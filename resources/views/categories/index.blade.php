@extends('layouts.app')
@section('title', 'Catégories — TEE/SHOP')

@section('content')
<section class="container mx-auto px-4 py-12">
    <div class="mb-10">
        <p class="text-xs uppercase tracking-[0.3em] text-accent mb-2">Explorer</p>
        <h1 class="text-6xl font-display">Toutes les catégories</h1>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($categories as $cat)
    <a href="{{ route('categories.show', $cat) }}"
       class="group relative h-64 bg-ink overflow-hidden block">
        @if($cat->image_url)
            <img src="{{ $cat->image_url }}" alt="{{ $cat->name }}"
                 class="absolute inset-0 w-full h-full object-cover opacity-70 group-hover:opacity-90 group-hover:scale-105 transition-all duration-500">
        @endif
        <div class="absolute inset-0 bg-gradient-to-br from-ink/40 to-ink/90"></div>
        <div class="relative h-full p-6 flex flex-col justify-between text-cream">
            <span class="text-xs uppercase tracking-widest opacity-60">{{ $cat->products_count }} produits</span>
            <div>
                <h2 class="text-4xl font-display mb-2 group-hover:text-accent transition">{{ $cat->name }}</h2>
                <p class="text-sm opacity-80">{{ $cat->description }}</p>
            </div>
        </div>
    </a>
@endforeach
    </div>
</section>
@endsection
