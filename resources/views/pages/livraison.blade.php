@extends('layouts.page')
@section('title', 'Livraison — TEE/SHOP')
@section('eyebrow', 'Nos services')
@section('heading', 'Livraison')
@section('subtitle', 'Tout savoir sur l\'expédition de ta commande.')

@section('page')
<h2 class="text-3xl font-display mb-3 mt-8">Modes et délais</h2>
<p>Nous expédions tes commandes en Belgique et dans toute l'Union européenne via plusieurs transporteurs partenaires. Le délai démarre dès réception du paiement.</p>

<div class="grid md:grid-cols-2 gap-4 mt-6">
    <div class="card p-5 not-prose">
        <p class="font-display text-xl mb-1">bpost</p>
        <p class="text-sm text-ink/70">Belgique · 2 à 3 jours ouvrés</p>
        <p class="font-display text-lg mt-2">5,95 €</p>
    </div>
    <div class="card p-5 not-prose">
        <p class="font-display text-xl mb-1">DPD</p>
        <p class="text-sm text-ink/70">Belgique & UE · 2 à 4 jours ouvrés</p>
        <p class="font-display text-lg mt-2">6,95 €</p>
    </div>
    <div class="card p-5 not-prose">
        <p class="font-display text-xl mb-1">UPS</p>
        <p class="text-sm text-ink/70">Belgique & UE · 1 à 2 jours ouvrés</p>
        <p class="font-display text-lg mt-2">8,95 €</p>
    </div>
    <div class="card p-5 not-prose">
        <p class="font-display text-xl mb-1">DHL Express</p>
        <p class="text-sm text-ink/70">Belgique & UE · 24h chrono</p>
        <p class="font-display text-lg mt-2">9,95 €</p>
    </div>
</div>

<h2 class="text-3xl font-display mb-3 mt-10">Suivi de commande</h2>
<p>Une fois ta commande expédiée, tu reçois un email avec un numéro de suivi. Tu peux aussi le retrouver dans <a href="{{ route('orders.index') }}" class="underline">tes commandes</a>.</p>

<h2 class="text-3xl font-display mb-3 mt-10">Livraison gratuite</h2>
<p>La livraison standard (bpost) est <strong>offerte dès 50 € d'achat</strong> en Belgique.</p>
@endsection