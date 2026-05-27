@extends('layouts.admin')
@section('title', 'Catégories')

@section('content')
<h1 class="text-4xl font-display mb-6">Catégories</h1>

<div class="grid lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 card overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-ink text-cream text-xs uppercase tracking-widest">
                <tr>
                    <th class="px-4 py-3 text-left">Nom</th>
                    <th class="px-4 py-3 text-left">Slug</th>
                    <th class="px-4 py-3 text-right">Produits</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                    <tr class="border-t border-ink/5">
                        <td class="px-4 py-3 font-semibold">{{ $cat->name }}</td>
                        <td class="px-4 py-3 text-ink/60">{{ $cat->slug }}</td>
                        <td class="px-4 py-3 text-right">{{ $cat->products_count }}</td>
                        <td class="px-4 py-3 text-right">
                            <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 underline text-xs">Suppr</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card p-6 h-fit">
        <h2 class="text-2xl font-display mb-4">+ Nouvelle catégorie</h2>
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-3">
            @csrf
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Nom</label>
                <input type="text" name="name" class="input" required>
                @error('name')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Description</label>
                <textarea name="description" rows="3" class="input"></textarea>
            </div>
            <button class="btn-primary w-full">Créer</button>
        </form>
    </div>
</div>

<div class="mt-6">{{ $categories->links() }}</div>
@endsection
