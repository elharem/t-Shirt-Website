@extends('layouts.page')
@section('title', 'Nous contacter — TEE/SHOP')
@section('eyebrow', 'Aide & support')
@section('heading', 'Nous contacter')
@section('subtitle', 'Une question ? Une remarque ? On répond sous 24h ouvrées.')

@section('page')
<div class="grid md:grid-cols-2 gap-6 not-prose">
    <div class="card p-6">
        <h3 class="font-display text-2xl mb-3">📧 Email</h3>
        <p class="text-ink/70 mb-2">Pour toute question commerciale ou SAV.</p>
        <a href="mailto:hello@tshirt-store.test" class="underline font-semibold">hello@tshirt-store.test</a>
    </div>

    <div class="card p-6">
        <h3 class="font-display text-2xl mb-3">📞 Téléphone</h3>
        <p class="text-ink/70 mb-2">Du lundi au vendredi, 9h-17h.</p>
        <a href="tel:+3221234567" class="underline font-semibold">+32 2 123 45 67</a>
    </div>

    <div class="card p-6">
        <h3 class="font-display text-2xl mb-3">📍 Adresse</h3>
        <p class="text-ink/70">TEE/SHOP SRL<br> Rue Gatti de Gamond 95,<br>1180 Uccle<br>Belgique</p>
    </div>

    <div class="card p-6">
        <h3 class="font-display text-2xl mb-3">⏱ Délai de réponse</h3>
        <p class="text-ink/70">Nous répondons à tous les emails sous <strong>24h ouvrées</strong>. Pour les urgences liées à une commande en cours, privilégie le téléphone.</p>
    </div>
</div>
@endsection