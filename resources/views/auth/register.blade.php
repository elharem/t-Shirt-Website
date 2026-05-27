@extends('layouts.app')
@section('title', 'Inscription — TEE/SHOP')

@section('content')
<section class="container mx-auto px-4 py-16 max-w-xl">
    <h1 class="text-5xl font-display mb-2">Inscription</h1>
    <p class="text-ink/60 mb-8">Rejoins la communauté TEE/SHOP.</p>

    <form action="{{ route('register') }}" method="POST" class="space-y-5">
        @csrf

        {{-- Identité --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Prénom *</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}" class="input" required>
                @error('first_name')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Nom *</label>
                <input type="text" name="name" value="{{ old('name') }}" class="input" required>
                @error('name')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- Adresse (nouveaux champs US5) --}}
        <div>
            <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Adresse *</label>
            <input type="text" name="address" value="{{ old('address') }}" class="input" required placeholder="Rue et numéro">
            @error('address')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Code postal *</label>
                <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="input" required>
                @error('postal_code')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Ville *</label>
                <input type="text" name="city" value="{{ old('city') }}" class="input" required>
                @error('city')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- Courriel + mot de passe --}}
        <div>
            <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Courriel *</label>
            <input type="email" name="email" value="{{ old('email') }}" class="input" required>
            @error('email')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Mot de passe *</label>
            <input type="password" name="password" class="input" required>
            @error('password')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Confirmer le mot de passe *</label>
            <input type="password" name="password_confirmation" class="input" required>
        </div>

        <p class="text-xs text-ink/60">Tous les champs marqués * sont obligatoires.</p>

        <button class="btn-primary w-full">Créer mon compte</button>
    </form>

    <p class="text-center mt-6 text-sm">
        Déjà inscrit ? <a href="{{ route('login') }}" class="underline font-semibold">Se connecter</a>
    </p>
</section>
@endsection