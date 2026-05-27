@extends('layouts.page')
@section('title', 'CGV — TEE/SHOP')
@section('eyebrow', 'Informations légales')
@section('heading', 'Conditions générales de vente')

@section('page')
<h2 class="text-2xl font-display mb-3 mt-8">Article 1 — Objet</h2>
<p>Les présentes conditions générales de vente régissent les relations contractuelles entre TEE/SHOP SRL (ci-après "le Vendeur"), société de droit belge, et toute personne physique ou morale procédant à un achat sur le site tshirt-store.test (ci-après "le Client").</p>

<h2 class="text-2xl font-display mb-3 mt-8">Article 2 — Produits</h2>
<p>Les caractéristiques essentielles des produits (t-shirts) sont présentées sur les fiches descriptives. Les photographies sont non contractuelles. Les produits sont proposés dans la limite des stocks disponibles.</p>

<h2 class="text-2xl font-display mb-3 mt-8">Article 3 — Prix</h2>
<p>Les prix sont indiqués en euros TTC, hors frais de livraison. Le Vendeur se réserve le droit de modifier ses prix à tout moment, étant entendu que le prix figurant sur le site au moment de la commande sera celui appliqué.</p>

<h2 class="text-2xl font-display mb-3 mt-8">Article 4 — Commande</h2>
<p>Toute commande implique l'acceptation pleine et entière des présentes CGV. La commande devient effective après confirmation du paiement.</p>

<h2 class="text-2xl font-display mb-3 mt-8">Article 5 — Paiement</h2>
<p>Le paiement s'effectue en ligne via carte bancaire, traité par notre prestataire Stripe. Les transactions sont sécurisées par cryptage SSL.</p>

<h2 class="text-2xl font-display mb-3 mt-8">Article 6 — Livraison</h2>
<p>Les délais de livraison sont indiqués à titre informatif. Le Vendeur ne peut être tenu responsable des retards imputables aux transporteurs ou à un cas de force majeure.</p>

<h2 class="text-2xl font-display mb-3 mt-8">Article 7 — Droit de rétractation</h2>
<p>Conformément au Code de droit économique belge, le Client dispose d'un délai de 14 jours (étendu à 30 jours par TEE/SHOP à titre commercial) pour exercer son droit de rétractation, sans avoir à motiver sa décision.</p>

<h2 class="text-2xl font-display mb-3 mt-8">Article 8 — Garanties</h2>
<p>Les produits bénéficient de la garantie légale de conformité de 2 ans prévue par les articles 1649 bis et suivants du Code civil belge.</p>

<h2 class="text-2xl font-display mb-3 mt-8">Article 9 — Données personnelles</h2>
<p>Le traitement des données personnelles est régi par notre <a href="{{ route('pages.show', 'confidentialite') }}" class="underline">politique de confidentialité</a>.</p>

<h2 class="text-2xl font-display mb-3 mt-8">Article 10 — Litiges</h2>
<p>Les présentes CGV sont régies par le droit belge. En cas de litige, les tribunaux de Bruxelles seront seuls compétents, après tentative de résolution amiable.</p>
@endsection