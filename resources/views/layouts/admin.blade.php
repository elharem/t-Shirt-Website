<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin — @yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="bg-cream min-h-screen flex">
    {{-- Sidebar --}}
    <aside class="w-64 bg-ink text-cream min-h-screen sticky top-0">
        <div class="p-6 border-b border-cream/10">
            <a href="{{ route('home') }}" class="text-2xl font-display">TEE<span class="text-accent">/</span>SHOP</a>
            <p class="text-xs uppercase tracking-widest text-cream/50 mt-1">Back-office</p>
        </div>
        <nav class="p-4 space-y-1 text-sm">
            <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 hover:bg-cream/10 {{ request()->routeIs('admin.dashboard') ? 'bg-accent text-white' : '' }}">📊 Dashboard</a>
            <a href="{{ route('admin.products.index') }}" class="block px-3 py-2 hover:bg-cream/10 {{ request()->routeIs('admin.products.*') ? 'bg-accent text-white' : '' }}">👕 Produits</a>
            <a href="{{ route('admin.categories.index') }}" class="block px-3 py-2 hover:bg-cream/10 {{ request()->routeIs('admin.categories.*') ? 'bg-accent text-white' : '' }}">📂 Catégories</a>
            <a href="{{ route('admin.orders.index') }}" class="block px-3 py-2 hover:bg-cream/10 {{ request()->routeIs('admin.orders.*') ? 'bg-accent text-white' : '' }}">📦 Commandes</a>
            <a href="{{ route('admin.seo') }}" class="block px-3 py-2 hover:bg-cream/10 {{ request()->routeIs('admin.seo') ? 'bg-accent text-white' : '' }}">🔍 SEO & Partage</a>
        </nav>
        <div class="p-4 absolute bottom-0 w-full border-t border-cream/10">
            <p class="text-xs text-cream/60 mb-2">{{ auth()->user()->first_name }} {{ auth()->user()->name }}</p>
            <a href="{{ route('home') }}" class="text-xs underline">← Retour boutique</a>
            <form action="{{ route('logout') }}" method="POST" class="mt-2">@csrf
                <button class="text-xs text-cream/60 hover:text-accent">Déconnexion</button>
            </form>
        </div>
    </aside>

    {{-- Content --}}
    <main class="flex-1 p-8">
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif
        @yield('content')
    </main>

    @include('partials.cookie-banner')

    @stack('scripts')
</body>
</html>
