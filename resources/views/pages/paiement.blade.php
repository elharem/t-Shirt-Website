@extends('layouts.page')
@section('title', 'Moyens de paiement — TEE/SHOP')
@section('eyebrow', 'Nos services')
@section('heading', 'Paiement')
@section('subtitle', 'Des transactions 100% sécurisées.')

@section('page')
<h2 class="text-3xl font-display mb-3 mt-8">Modes acceptés</h2>
<p>Nous acceptons les principaux moyens de paiement via notre prestataire <strong>Stripe</strong>, un leader mondial du paiement en ligne :</p>
<ul>
    <li>Carte bancaire (Visa, Mastercard, American Express)</li>
    <li>Bancontact (Belgique)</li>
    <li>Apple Pay et Google Pay</li>
</ul>

<h2 class="text-3xl font-display mb-3 mt-10">Sécurité</h2>
<p>Aucune donnée bancaire n'est stockée sur nos serveurs. Toutes les transactions passent par les serveurs sécurisés de Stripe, certifié <strong>PCI-DSS niveau 1</strong> — le plus haut niveau de certification pour le traitement des paiements.</p>

<h2 class="text-3xl font-display mb-3 mt-10">Quand suis-je débité ?</h2>
<p>Le débit a lieu au moment de la validation de ta commande. Si pour une raison quelconque ta commande est annulée avant expédition, tu seras intégralement remboursé sous 5 à 10 jours ouvrés.</p>
@endsection