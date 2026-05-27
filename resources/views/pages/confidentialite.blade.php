@extends('layouts.page')
@section('title', 'Confidentialité — TEE/SHOP')
@section('eyebrow', 'Informations légales')
@section('heading', 'Politique de confidentialité')
@section('subtitle', 'Comment nous traitons tes données personnelles (RGPD).')

@section('page')
<h2 class="text-2xl font-display mb-3 mt-8">1. Responsable du traitement</h2>
<p>Le responsable du traitement des données est TEE/SHOP SRL, Rue de la Loi 16, 1000 Bruxelles. Contact : <a href="mailto:hello@tshirt-store.test" class="underline">hello@tshirt-store.test</a></p>

<h2 class="text-2xl font-display mb-3 mt-8">2. Données collectées</h2>
<ul>
    <li><strong>Identité</strong> : nom, prénom, email</li>
    <li><strong>Livraison</strong> : adresse postale, téléphone</li>
    <li><strong>Paiement</strong> : géré par Stripe — aucune donnée bancaire n'est stockée sur nos serveurs</li>
    <li><strong>Navigation</strong> : cookies de session, adresse IP, préférences de consentement</li>
</ul>

<h2 class="text-2xl font-display mb-3 mt-8">3. Finalités</h2>
<ul>
    <li>Traiter et livrer tes commandes</li>
    <li>Gérer ton compte client</li>
    <li>Assurer le service après-vente</li>
    <li>Respecter nos obligations légales et comptables</li>
</ul>

<h2 class="text-2xl font-display mb-3 mt-8">4. Base légale</h2>
<p>Le traitement est fondé sur l'exécution du contrat (commande), ton consentement (cookies non essentiels) et nos obligations légales (conservation des factures).</p>

<h2 class="text-2xl font-display mb-3 mt-8">5. Durée de conservation</h2>
<ul>
    <li>Compte client : tant que ton compte est actif, puis suppression sous 30 jours</li>
    <li>Factures : 10 ans (obligation comptable belge)</li>
    <li>Cookies : 13 mois maximum</li>
</ul>

<h2 class="text-2xl font-display mb-3 mt-8">6. Tes droits (RGPD)</h2>
<p>Tu disposes des droits suivants, à exercer par email à <a href="mailto:hello@tshirt-store.test" class="underline">hello@tshirt-store.test</a> :</p>
<ul>
    <li>Droit d'accès, de rectification, d'effacement</li>
    <li>Droit à la limitation du traitement</li>
    <li>Droit à la portabilité</li>
    <li>Droit d'opposition</li>
    <li>Droit d'introduire une réclamation auprès de l'<a href="https://www.autoriteprotectiondonnees.be" target="_blank" rel="noopener" class="underline">Autorité de protection des données belge</a></li>
</ul>

<h2 class="text-2xl font-display mb-3 mt-8">7. Cookies</h2>
<p>Voir notre <a href="{{ route('cookies.show') }}" class="underline">politique des cookies</a> détaillée.</p>
@endsection