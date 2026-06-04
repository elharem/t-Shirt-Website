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
<body class="bg-gray-50 min-h-screen flex">

    {{-- Sidebar --}}
    <aside class="w-64 bg-ink text-cream min-h-screen sticky top-0 flex flex-col" style="background: #0f0f0f;">

        {{-- Logo --}}
        <div class="px-6 py-5 border-b border-white/5">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="w-8 h-8 bg-accent rounded-lg flex items-center justify-center text-white font-bold text-sm">T</div>
                <div>
                    <div class="text-base font-display leading-none">TEE<span class="text-accent">/</span>SHOP</div>
                    <div class="text-xs text-white/30 uppercase tracking-widest leading-none mt-0.5">Back-office</div>
                </div>
            </a>
        </div>

        {{-- User card --}}
        <div class="px-4 py-4 border-b border-white/5">
            <div class="flex items-center gap-3 bg-white/5 rounded-xl px-3 py-2.5">
                <div class="w-8 h-8 rounded-full bg-accent flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                    {{ strtoupper(substr(auth()->user()->first_name ?? auth()->user()->name, 0, 1)) }}
                </div>
                <div class="min-w-0">
                    <p class="text-xs font-semibold text-white truncate">{{ auth()->user()->first_name }} {{ auth()->user()->name }}</p>
                    <p class="text-xs text-white/40 truncate">Administrateur</p>
                </div>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-3 py-4 space-y-0.5">
            <p class="text-xs uppercase tracking-widest text-white/20 px-3 mb-2">Navigation</p>

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-accent text-white font-medium' : 'text-white/60 hover:bg-white/8 hover:text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v5a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm10 0a1 1 0 011-1h4a1 1 0 011 1v2a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zm10-3a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1h-4a1 1 0 01-1-1v-7z"/>
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin.products.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm transition-all {{ request()->routeIs('admin.products.*') ? 'bg-accent text-white font-medium' : 'text-white/60 hover:bg-white/8 hover:text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/>
                </svg>
                Produits
                @php $productCount = \App\Models\Product::count(); @endphp
                @if($productCount)
                    <span class="ml-auto text-xs bg-white/10 text-white/60 px-2 py-0.5 rounded-full">{{ $productCount }}</span>
                @endif
            </a>

            <a href="{{ route('admin.categories.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm transition-all {{ request()->routeIs('admin.categories.*') ? 'bg-accent text-white font-medium' : 'text-white/60 hover:bg-white/8 hover:text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 8V5a2 2 0 012-2z"/>
                </svg>
                Catégories
            </a>

            <a href="{{ route('admin.orders.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm transition-all {{ request()->routeIs('admin.orders.*') ? 'bg-accent text-white font-medium' : 'text-white/60 hover:bg-white/8 hover:text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
                Commandes
                @php $pendingOrders = \App\Models\Order::where('status', 'pending')->count(); @endphp
                @if($pendingOrders)
                    <span class="ml-auto text-xs bg-accent text-white px-2 py-0.5 rounded-full">{{ $pendingOrders }}</span>
                @endif
            </a>

            <div class="pt-3 pb-1">
                <p class="text-xs uppercase tracking-widest text-white/20 px-3 mb-2">Marketing</p>
            </div>

            

            <a href="{{ route('admin.seo') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm transition-all {{ request()->routeIs('admin.seo*') ? 'bg-accent text-white font-medium' : 'text-white/60 hover:bg-white/8 hover:text-white' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                SEO & Référencement
            </a>
        </nav>

        {{-- Footer sidebar --}}
        <div class="px-3 py-4 border-t border-white/5 space-y-1">
            <a href="{{ route('home') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-white/40 hover:bg-white/8 hover:text-white transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Voir la boutique
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-white/40 hover:bg-red-500/10 hover:text-red-400 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Déconnexion
                </button>
            </form>
        </div>
    </aside>

    {{-- Main content --}}
    <main class="flex-1 min-h-screen">

        {{-- Top bar --}}
        <div class="bg-white border-b border-gray-100 px-8 py-4 flex items-center justify-between sticky top-0 z-10">
            <div>
                <h2 class="text-sm font-semibold text-gray-800">@yield('title', 'Dashboard')</h2>
                <p class="text-xs text-gray-400">TEE/SHOP Admin</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" target="_blank"
                   class="text-xs border border-gray-200 rounded-lg px-3 py-1.5 text-gray-500 hover:border-accent hover:text-accent transition">
                    ↗ Voir le site
                </a>
                <div class="w-8 h-8 rounded-full bg-accent flex items-center justify-center text-white text-xs font-bold">
                    {{ strtoupper(substr(auth()->user()->first_name ?? auth()->user()->name, 0, 1)) }}
                </div>
            </div>
        </div>

        <div class="p-8">
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl mb-6 flex items-center gap-2 text-sm">
                    <span>✓</span> {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl mb-6 flex items-center gap-2 text-sm">
                    <span>✕</span> {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </div>
    </main>

    @include('partials.cookie-banner')
    @stack('scripts')
</body>
</html>