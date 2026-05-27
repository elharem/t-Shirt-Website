@extends('layouts.admin')
@section('title', 'Produits')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-4xl font-display">Produits</h1>
    <a href="{{ route('admin.products.create') }}" class="btn-primary">+ Nouveau produit</a>
</div>

<div class="card overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-ink text-cream text-xs uppercase tracking-widest">
            <tr>
                <th class="px-4 py-3 text-left">Image</th>
                <th class="px-4 py-3 text-left">Nom</th>
                <th class="px-4 py-3 text-left">Catégorie</th>
                <th class="px-4 py-3 text-right">Prix</th>
                <th class="px-4 py-3 text-right">Stock</th>
                <th class="px-4 py-3 text-center">Actif</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr class="border-t border-ink/5 hover:bg-ink/5">
                    <td class="px-4 py-3">
                        <img src="{{ $product->image_url }}" alt="" class="w-12 h-12 object-cover" onerror="this.src='https://placehold.co/60'">
                    </td>
                    <td class="px-4 py-3 font-semibold">{{ $product->name }}</td>
                    <td class="px-4 py-3">{{ $product->category->name }}</td>
                    <td class="px-4 py-3 text-right font-display">{{ number_format($product->price, 2, ',', ' ') }} €</td>
                    <td class="px-4 py-3 text-right">{{ $product->stock }}</td>
                    <td class="px-4 py-3 text-center">{{ $product->is_active ? '✓' : '✕' }}</td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.products.edit', $product) }}" class="text-accent underline text-xs">Éditer</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 underline text-xs ml-2">Suppr</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $products->links() }}</div>
@endsection
