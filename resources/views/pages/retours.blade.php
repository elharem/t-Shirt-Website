@extends('layouts.page')
@section('title', 'Retours — TEE/SHOP')
@section('eyebrow', 'Nos services')
@section('heading', 'Retours & remboursements')
@section('subtitle', '30 jours pour changer d\'avis, sans poser de questions.')

@section('page')
<h2 class="text-3xl font-display mb-3 mt-8">Délai de rétractation</h2>
<p>Conformément à la législation européenne, tu disposes de <strong>30 jours</strong> à compter de la réception de ta commande pour exercer ton droit de rétractation, sans avoir à justifier ta décision.</p>

<h2 class="text-3xl font-display mb-3 mt-10">Comment retourner un article ?</h2>
<ol>
    <li>Connecte-toi à ton compte et va dans <a href="{{ route('orders.index') }}" class="underline">Mes commandes</a></li>
    <li>Sélectionne la commande concernée et demande un retour</li>
    <li>Imprime l'étiquette de retour pré-payée que nous t'envoyons par email</li>
    <li>Emballe les articles dans leur état d'origine (étiquettes attachées, non portés, non lavés)</li>
    <li>Dépose le colis dans n'importe quel point bpost</li>
</ol>

<h2 class="text-3xl font-display mb-3 mt-10">Remboursement</h2>
<p>Dès réception du colis dans nos entrepôts, ton remboursement est traité sous <strong>5 jours ouvrés</strong> sur ton moyen de paiement initial. Tu recevras un email de confirmation.</p>

<h2 class="text-3xl font-display mb-3 mt-10">Articles non éligibles</h2>
<p>Pour des raisons d'hygiène, les sous-vêtements et articles personnalisés ne sont pas retournables, sauf en cas de défaut.</p>
@endsection