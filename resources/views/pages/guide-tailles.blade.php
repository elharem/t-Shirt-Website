@extends('layouts.page')
@section('title', 'Guide des tailles — TEE/SHOP')
@section('eyebrow', 'Aide & support')
@section('heading', 'Guide des tailles')
@section('subtitle', 'Trouve la taille parfaite pour ton t-shirt.')

@section('page')
<h2 class="text-3xl font-display mb-3 mt-8">Comment mesurer ?</h2>
<ol>
    <li><strong>Poitrine</strong> : mesure horizontalement à l'endroit le plus large.</li>
    <li><strong>Longueur</strong> : du haut de l'épaule jusqu'au bas du t-shirt.</li>
    <li><strong>Manches</strong> : de la couture d'épaule au bout de la manche.</li>
</ol>

<h2 class="text-3xl font-display mb-3 mt-10">Tableau des tailles (Homme & Femme)</h2>
<div class="overflow-x-auto not-prose">
    <table class="w-full text-sm card">
        <thead class="bg-ink text-cream">
            <tr>
                <th class="px-4 py-3 text-left">Taille</th>
                <th class="px-4 py-3 text-right">Poitrine (cm)</th>
                <th class="px-4 py-3 text-right">Longueur (cm)</th>
                <th class="px-4 py-3 text-right">Manches (cm)</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-t border-ink/10"><td class="px-4 py-2 font-semibold">XS</td><td class="px-4 py-2 text-right">86-90</td><td class="px-4 py-2 text-right">66</td><td class="px-4 py-2 text-right">20</td></tr>
            <tr class="border-t border-ink/10"><td class="px-4 py-2 font-semibold">S</td><td class="px-4 py-2 text-right">90-94</td><td class="px-4 py-2 text-right">68</td><td class="px-4 py-2 text-right">21</td></tr>
            <tr class="border-t border-ink/10"><td class="px-4 py-2 font-semibold">M</td><td class="px-4 py-2 text-right">94-100</td><td class="px-4 py-2 text-right">70</td><td class="px-4 py-2 text-right">22</td></tr>
            <tr class="border-t border-ink/10"><td class="px-4 py-2 font-semibold">L</td><td class="px-4 py-2 text-right">100-108</td><td class="px-4 py-2 text-right">72</td><td class="px-4 py-2 text-right">23</td></tr>
            <tr class="border-t border-ink/10"><td class="px-4 py-2 font-semibold">XL</td><td class="px-4 py-2 text-right">108-116</td><td class="px-4 py-2 text-right">74</td><td class="px-4 py-2 text-right">24</td></tr>
            <tr class="border-t border-ink/10"><td class="px-4 py-2 font-semibold">XXL</td><td class="px-4 py-2 text-right">116-124</td><td class="px-4 py-2 text-right">76</td><td class="px-4 py-2 text-right">25</td></tr>
        </tbody>
    </table>
</div>

<h2 class="text-3xl font-display mb-3 mt-10">Tableau des tailles (Enfant)</h2>
<div class="overflow-x-auto not-prose">
    <table class="w-full text-sm card">
        <thead class="bg-ink text-cream">
            <tr>
                <th class="px-4 py-3 text-left">Âge</th>
                <th class="px-4 py-3 text-right">Taille (cm)</th>
                <th class="px-4 py-3 text-right">Poitrine (cm)</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-t border-ink/10"><td class="px-4 py-2 font-semibold">3-4 ans</td><td class="px-4 py-2 text-right">98-104</td><td class="px-4 py-2 text-right">56</td></tr>
            <tr class="border-t border-ink/10"><td class="px-4 py-2 font-semibold">5-6 ans</td><td class="px-4 py-2 text-right">110-116</td><td class="px-4 py-2 text-right">60</td></tr>
            <tr class="border-t border-ink/10"><td class="px-4 py-2 font-semibold">7-8 ans</td><td class="px-4 py-2 text-right">122-128</td><td class="px-4 py-2 text-right">66</td></tr>
            <tr class="border-t border-ink/10"><td class="px-4 py-2 font-semibold">9-10 ans</td><td class="px-4 py-2 text-right">134-140</td><td class="px-4 py-2 text-right">72</td></tr>
        </tbody>
    </table>
</div>

<p class="mt-8"><strong>Astuce</strong> : nos coupes oversize taillent normalement, mais si tu veux un effet plus ample, prends une taille au-dessus.</p>
@endsection