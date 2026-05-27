@extends('layouts.page')
@section('title', 'FAQ — TEE/SHOP')
@section('eyebrow', 'Aide & support')
@section('heading', 'Questions fréquentes')
@section('subtitle', 'Les réponses aux questions qu\'on nous pose le plus souvent.')

@section('page')
<div class="space-y-3 not-prose" x-data="{ open: null }">
    @php
        $faqs = [
            ['q' => 'Combien de temps pour recevoir ma commande ?', 'a' => 'Selon le transporteur choisi : 24h pour DHL Express, 1-2 jours pour UPS, 2-3 jours pour bpost, 2-4 jours pour DPD.'],
            ['q' => 'Puis-je annuler une commande ?', 'a' => 'Oui, tant qu\'elle n\'a pas été expédiée. Contacte-nous au plus vite par email à hello@tshirt-store.test avec ton numéro de commande.'],
            ['q' => 'Comment connaître ma taille ?', 'a' => 'Consulte notre guide des tailles accessible depuis le footer. En cas de doute entre 2 tailles, prends la plus grande pour les coupes oversize.'],
            ['q' => 'Mon t-shirt rétrécit-il au lavage ?', 'a' => 'Nos t-shirts en coton bio sont pré-lavés pour minimiser le rétrécissement. Lave à 30°C max et sèche à l\'air libre pour conserver leur tenue.'],
            ['q' => 'Livrez-vous en dehors de l\'UE ?', 'a' => 'Pour l\'instant nous livrons uniquement en Belgique et dans l\'Union européenne. D\'autres destinations sont à l\'étude.'],
            ['q' => 'Comment retourner un article ?', 'a' => 'Tu disposes de 30 jours. Connecte-toi, va dans Mes commandes, demande un retour. Les frais de retour sont à notre charge.'],
            ['q' => 'Mon paiement a échoué, que faire ?', 'a' => 'Vérifie que ta carte est valide et que le plafond est suffisant. Si le problème persiste, essaie un autre moyen de paiement ou contacte ta banque.'],
            ['q' => 'Faites-vous des t-shirts personnalisés ?', 'a' => 'Pas pour le moment, mais c\'est une fonctionnalité prévue pour 2027. Inscris-toi à la newsletter pour être tenu au courant.'],
        ];
    @endphp

    @foreach($faqs as $i => $faq)
        <div class="card overflow-hidden">
            <button @click="open === {{ $i }} ? open = null : open = {{ $i }}"
                    class="w-full text-left p-5 flex justify-between items-center hover:bg-ink/5 transition">
                <span class="font-display text-lg">{{ $faq['q'] }}</span>
                <span x-text="open === {{ $i }} ? '−' : '+'" class="text-2xl text-accent font-display"></span>
            </button>
            <div x-show="open === {{ $i }}" x-collapse class="px-5 pb-5 text-ink/80">
                {{ $faq['a'] }}
            </div>
        </div>
    @endforeach
</div>
@endsection