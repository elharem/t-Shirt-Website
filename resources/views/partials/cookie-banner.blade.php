{{-- Bannière de consentement cookies (RGPD) --}}
@if(!request()->cookie('cookie_consent'))
<div x-data="{ open: true }"
     x-show="open"
     x-transition:enter="transition ease-out duration-500"
     x-transition:enter-start="opacity-0 translate-y-full"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-full"
     class="fixed bottom-0 left-0 right-0 z-[100] bg-ink text-cream border-t-4 border-accent shadow-2xl">
    <div class="container mx-auto px-4 py-5">
        <div class="flex flex-col md:flex-row items-start md:items-center gap-4 md:gap-6">

            <div class="flex-1">
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-2xl">🍪</span>
                    <h3 class="font-display text-xl uppercase tracking-wide">On parle cookies ?</h3>
                </div>
                <p class="text-sm text-cream/80 leading-relaxed">
                    On utilise des cookies pour faire fonctionner ce site (panier, connexion) et améliorer ton expérience.
                    Tu peux les accepter, les refuser, ou consulter
                    <a href="{{ route('cookies.show') }}" class="underline hover:text-accent">notre politique cookies</a>
                    pour en savoir plus.
                </p>
            </div>

            <div class="flex gap-3 w-full md:w-auto shrink-0">
                <form action="{{ route('cookies.store') }}" method="POST" class="flex-1 md:flex-none">
                    @csrf
                    <input type="hidden" name="choice" value="rejected">
                    <button type="submit"
                            @click="open = false"
                            class="w-full md:w-auto px-5 py-2.5 border-2 border-cream/40 text-cream text-sm uppercase tracking-wider font-semibold hover:bg-cream/10 transition">
                        Refuser
                    </button>
                </form>
                <form action="{{ route('cookies.store') }}" method="POST" class="flex-1 md:flex-none">
                    @csrf
                    <input type="hidden" name="choice" value="accepted">
                    <button type="submit"
                            @click="open = false"
                            class="w-full md:w-auto px-5 py-2.5 bg-accent text-white text-sm uppercase tracking-wider font-semibold hover:bg-accent/90 transition">
                        Accepter
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
