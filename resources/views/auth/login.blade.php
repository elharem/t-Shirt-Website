@extends('layouts.app')
@section('title', 'Connexion — TEE/SHOP')

@section('content')
<section class="container mx-auto px-4 py-16 max-w-md">
    <h1 class="text-5xl font-display mb-2">Connexion</h1>
    <p class="text-ink/60 mb-8">Heureux de te revoir.</p>

    <form action="{{ route('login') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="input" required autofocus>
            @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-xs uppercase tracking-widest mb-1 font-semibold">Mot de passe</label>
            <input type="password" name="password" class="input" required>
            @error('password')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <label class="flex items-center gap-2 text-sm">
            <input type="checkbox" name="remember"> Se souvenir de moi
        </label>
        <button class="btn-primary w-full">Se connecter</button>
    </form>

    <p class="text-center mt-6 text-sm">
        Pas encore de compte ? <a href="{{ route('register') }}" class="underline font-semibold">Créer un compte</a>
    </p>

    {{--
    <div class="mt-8 p-4 bg-yellow-50 border-l-4 border-yellow-500 text-xs">
        <p class="font-bold mb-1">Comptes de test :</p>
        <p>👤 Client : <code>client@tshirt-store.test</code> / <code>password</code></p>
        <p>👑 Admin : <code>admin@tshirt-store.test</code> / <code>password</code></p>
    </div>
    --}}
</section>
@endsection
