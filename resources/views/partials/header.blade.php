<header class="border-b-2 border-ink bg-cream sticky top-0 z-50">
    {{-- Top marquee --}}
    <div class="bg-ink text-cream py-1.5 overflow-hidden">
        <div class="flex whitespace-nowrap marquee-track">
            @for ($i = 0; $i < 4; $i++)
                <span class="mx-8 text-xs uppercase tracking-widest">★ Livraison gratuite dès 50€ ★ Retours offerts ★ Production éthique en Europe ★ Code WELCOME10 pour -10% ★</span>
            @endfor
        </div>
    </div>

    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <a href="{{ route('home') }}" class="text-3xl font-display tracking-tight">
            TEE<span class="text-accent">/</span>SHOP
        </a>

        {{-- Navigation + recherche --}}
<div class="hidden md:flex items-center gap-6 flex-1 mx-8">
    <nav class="flex items-center gap-6 text-sm uppercase tracking-wider font-medium">
        <a href="{{ route('home') }}" class="hover:text-accent transition">Accueil</a>
        <a href="{{ route('categories.index') }}" class="hover:text-accent transition">Catégories</a>
        <a href="{{ route('products.index') }}" class="hover:text-accent transition">Produits</a>
    </nav>

    <form action="{{ route('products.search') }}" method="GET" class="flex-1 max-w-md ml-auto">
        <div class="relative">
            <input type="search" name="q" value="{{ request('q') }}"
                   placeholder="Rechercher un t-shirt..."
                   class="w-full pl-10 pr-4 py-2 bg-cream border border-ink/20 focus:border-ink focus:ring-0 text-sm">
            <button type="submit" class="absolute left-3 top-1/2 -translate-y-1/2 text-ink/50 hover:text-accent">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </button>
        </div>
    </form>
</div>

        <div class="flex items-center gap-4">
            @auth
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="text-sm uppercase tracking-wider font-medium hover:text-accent">
    Bienvenue, {{ auth()->user()->first_name ?? auth()->user()->name }}
</button>
                    <div x-show="open" @click.outside="open = false" x-cloak
                         class="absolute right-0 mt-3 w-52 bg-white border-2 border-ink shadow-lg">
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-ink hover:text-cream text-sm uppercase">Admin</a>
                        @endif
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-ink hover:text-cream text-sm uppercase">Mon profil</a>
                        <a href="{{ route('orders.index') }}" class="block px-4 py-2 hover:bg-ink hover:text-cream text-sm uppercase">Mes commandes</a>
                        <form action="{{ route('logout') }}" method="POST">@csrf
                            <button class="w-full text-left px-4 py-2 hover:bg-accent hover:text-cream text-sm uppercase">Déconnexion</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-sm uppercase tracking-wider font-medium hover:text-accent">Connexion</a>
                <a href="{{ route('register') }}" class="hidden md:inline text-sm uppercase tracking-wider font-medium hover:text-accent">Inscription</a>
            @endauth

            <a href="{{ route('cart.index') }}" class="relative inline-flex items-center justify-center w-10 h-10 border-2 border-ink hover:bg-ink hover:text-cream transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                @if($cartCount > 0)
                    <span class="absolute -top-2 -right-2 bg-accent text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">{{ $cartCount }}</span>
                @endif
            </a>
        </div>
    </div>
</div>
</header>