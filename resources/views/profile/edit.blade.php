@extends('layouts.app')
@section('title', 'Mon profil — TEE/SHOP')

@section('content')
<section class="container mx-auto px-4 py-12 max-w-3xl">
    <h1 class="text-5xl font-display mb-8">Mon profil</h1>

    {{-- Infos perso (US6) --}}
    <div class="card p-6 mb-6">
        <h2 class="text-2xl font-display mb-5">Informations personnelles</h2>
        <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
            @csrf @method('PATCH')
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Prénom</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="input">
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Nom</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="input" required>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="input" required>
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Téléphone</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="input">
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Pays</label>
                    <input type="text" name="country" value="{{ old('country', $user->country) }}" class="input">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Adresse</label>
                    <input type="text" name="address" value="{{ old('address', $user->address) }}" class="input">
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Ville</label>
                    <input type="text" name="city" value="{{ old('city', $user->city) }}" class="input">
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Code postal</label>
                    <input type="text" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}" class="input">
                </div>
            </div>
            <button class="btn-primary">Enregistrer</button>
        </form>
    </div>

    {{-- Mot de passe --}}
    <div class="card p-6 mb-6">
        <h2 class="text-2xl font-display mb-5">Changer de mot de passe</h2>
        <form action="{{ route('profile.password') }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Mot de passe actuel</label>
                <input type="password" name="current_password" class="input" required>
                @error('current_password')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Nouveau mot de passe</label>
                <input type="password" name="password" class="input" required>
                @error('password')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Confirmer</label>
                <input type="password" name="password_confirmation" class="input" required>
            </div>
            <button class="btn-primary">Modifier le mot de passe</button>
        </form>
    </div>

    {{-- Supprimer compte --}}
    <div class="card p-6 border-red-200">
        <h2 class="text-2xl font-display mb-3 text-red-700">Supprimer mon compte</h2>
        <p class="text-sm text-ink/70 mb-4">Cette action est définitive. Toutes tes données seront supprimées.</p>
        <form action="{{ route('profile.destroy') }}" method="POST" class="space-y-3" onsubmit="return confirm('Vraiment supprimer ton compte ?')">
            @csrf @method('DELETE')
            <input type="password" name="password" placeholder="Confirme avec ton mot de passe" class="input" required>
            <button class="btn-danger">Supprimer mon compte</button>
        </form>
    </div>
</section>
@endsection
