@extends('layouts.app')
@section('title', 'Politique des cookies — TEE/SHOP')

@section('content')
<section class="container mx-auto px-4 py-12 max-w-3xl">
    <p class="text-xs uppercase tracking-[0.3em] text-accent mb-2">Informations légales</p>
    <h1 class="text-5xl font-display mb-2">Politique des cookies</h1>
    <p class="text-ink/60 mb-10">Dernière mise à jour : {{ now()->format('d/m/Y') }}</p>

    {{-- Statut actuel --}}
    <div class="card p-5 mb-10 border-2 border-accent">
        <p class="text-xs uppercase tracking-widest text-ink/60 mb-1">Ton statut actuel</p>
        @if(request()->cookie('cookie_consent') === 'accepted')
            <p class="font-display text-2xl text-green-700">✓ Cookies acceptés</p>
        @elseif(request()->cookie('cookie_consent') === 'rejected')
            <p class="font-display text-2xl text-red-700">✕ Cookies refusés</p>
        @else
            <p class="font-display text-2xl">Aucun choix enregistré</p>
        @endif
        <form action="{{ route('cookies.reset') }}" method="POST" class="mt-3">
            @csrf
            <button class="text-sm underline hover:text-accent">Modifier mon choix</button>
        </form>
    </div>

    <div class="prose max-w-none space-y-8">
        <section>
            <h2 class="text-3xl font-display mb-3">Qu'est-ce qu'un cookie ?</h2>
            <p class="text-ink/80 leading-relaxed">
                Un cookie est un petit fichier texte stocké par ton navigateur lorsque tu visites un site web.
                Il permet de mémoriser des informations (préférences, panier, session de connexion) entre tes visites.
            </p>
        </section>

        <section>
            <h2 class="text-3xl font-display mb-3">Quels cookies utilisons-nous ?</h2>

            <div class="space-y-4 mt-4">
                <div class="card p-5">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-display text-xl">Cookies essentiels</h3>
                        <span class="text-xs uppercase tracking-widest bg-green-100 text-green-800 px-2 py-1">Toujours actifs</span>
                    </div>
                    <p class="text-sm text-ink/70 mb-3">Indispensables au fonctionnement du site. Sans eux, impossible de se connecter ou de gérer le panier.</p>
                    <table class="w-full text-xs">
                        <tbody>
                            <tr class="border-t border-ink/10">
                                <td class="py-2 font-mono">tshirt_store_session</td>
                                <td class="py-2 text-ink/60">Maintien de la session utilisateur</td>
                                <td class="py-2 text-right text-ink/60">2h</td>
                            </tr>
                            <tr class="border-t border-ink/10">
                                <td class="py-2 font-mono">XSRF-TOKEN</td>
                                <td class="py-2 text-ink/60">Protection contre les attaques CSRF</td>
                                <td class="py-2 text-right text-ink/60">2h</td>
                            </tr>
                            <tr class="border-t border-ink/10">
                                <td class="py-2 font-mono">cookie_consent</td>
                                <td class="py-2 text-ink/60">Mémorise ton choix sur cette bannière</td>
                                <td class="py-2 text-right text-ink/60">13 mois</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card p-5">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-display text-xl">Cookies de fonctionnalité</h3>
                        <span class="text-xs uppercase tracking-widest bg-blue-100 text-blue-800 px-2 py-1">Optionnels</span>
                    </div>
                    <p class="text-sm text-ink/70 mb-3">Améliorent ton expérience (préférences, panier persistant pour visiteurs anonymes).</p>
                    <table class="w-full text-xs">
                        <tbody>
                            <tr class="border-t border-ink/10">
                                <td class="py-2 font-mono">remember_web_*</td>
                                <td class="py-2 text-ink/60">"Se souvenir de moi" à la connexion</td>
                                <td class="py-2 text-right text-ink/60">5 ans</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card p-5">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-display text-xl">Cookies tiers (Stripe)</h3>
                        <span class="text-xs uppercase tracking-widest bg-purple-100 text-purple-800 px-2 py-1">Paiement</span>
                    </div>
                    <p class="text-sm text-ink/70">
                        Lors d'un paiement, Stripe (notre prestataire de paiement) dépose ses propres cookies pour sécuriser la transaction.
                        Plus d'infos sur la
                        <a href="https://stripe.com/cookies-policy/legal" target="_blank" rel="noopener" class="underline">politique cookies de Stripe</a>.
                    </p>
                </div>
            </div>
        </section>

        <section>
            <h2 class="text-3xl font-display mb-3">Comment gérer tes cookies ?</h2>
            <p class="text-ink/80 leading-relaxed mb-3">
                Tu peux à tout moment modifier ton choix via le bouton "Modifier mon choix" en haut de cette page,
                ou via les paramètres de ton navigateur :
            </p>
            <ul class="space-y-1 text-sm text-ink/70 list-disc list-inside">
                <li><a href="https://support.google.com/chrome/answer/95647" target="_blank" rel="noopener" class="underline">Google Chrome</a></li>
                <li><a href="https://support.mozilla.org/fr/kb/protection-renforcee-contre-pistage-firefox-ordinateur" target="_blank" rel="noopener" class="underline">Mozilla Firefox</a></li>
                <li><a href="https://support.apple.com/fr-fr/guide/safari/sfri11471/mac" target="_blank" rel="noopener" class="underline">Safari</a></li>
                <li><a href="https://support.microsoft.com/fr-fr/microsoft-edge/supprimer-les-cookies-dans-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09" target="_blank" rel="noopener" class="underline">Microsoft Edge</a></li>
            </ul>
        </section>

        <section>
            <h2 class="text-3xl font-display mb-3">Base légale (RGPD)</h2>
            <p class="text-ink/80 leading-relaxed">
                Conformément au Règlement Général sur la Protection des Données (RGPD, UE 2016/679) et à la directive ePrivacy,
                nous demandons ton consentement avant tout dépôt de cookies non essentiels. Les cookies strictement nécessaires
                au fonctionnement du site sont exemptés de cette obligation.
            </p>
        </section>

        <section>
            <h2 class="text-3xl font-display mb-3">Contact</h2>
            <p class="text-ink/80 leading-relaxed">
                Pour toute question relative à cette politique :
                <a href="mailto:hello@tshirt-store.test" class="underline font-semibold">hello@tshirt-store.test</a>
            </p>
        </section>
    </div>
</section>
@endsection
