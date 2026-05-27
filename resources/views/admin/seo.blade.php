@extends('layouts.admin')
@section('title', 'SEO & Partage')

@section('content')
<h1 class="text-4xl font-display mb-2">SEO & Partage social</h1>
<p class="text-ink/60 mb-8">Optimise le référencement et partage ton site sur les réseaux sociaux.</p>

<div class="grid lg:grid-cols-2 gap-6">
    {{-- Partage social (US16) --}}
    <div class="card p-6">
        <h2 class="text-2xl font-display mb-4">Partager le site</h2>
        <p class="text-sm text-ink/70 mb-4">Diffuse l'URL de ta boutique pour booster ta visibilité.</p>

        <div class="bg-ink/5 p-3 mb-4 font-mono text-sm break-all">{{ $shareUrl }}</div>

        <div class="flex flex-wrap gap-2">
            <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}" target="_blank" rel="noopener" class="btn-outline text-sm">📘 Facebook</a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode($shareUrl) }}&text={{ urlencode('Découvrez TEE/SHOP - T-shirts uniques') }}" target="_blank" rel="noopener" class="btn-outline text-sm">𝕏 Twitter</a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($shareUrl) }}" target="_blank" rel="noopener" class="btn-outline text-sm">💼 LinkedIn</a>
            <a href="https://wa.me/?text={{ urlencode('Découvre TEE/SHOP : ' . $shareUrl) }}" target="_blank" rel="noopener" class="btn-outline text-sm">💬 WhatsApp</a>
            <a href="https://www.reddit.com/submit?url={{ urlencode($shareUrl) }}&title={{ urlencode('TEE/SHOP') }}" target="_blank" rel="noopener" class="btn-outline text-sm">🤖 Reddit</a>
            <a href="mailto:?subject=TEE/SHOP&body={{ urlencode('Découvrez : ' . $shareUrl) }}" class="btn-outline text-sm">✉ Email</a>
        </div>
    </div>

    {{-- Checklist SEO (US15) --}}
    <div class="card p-6">
        <h2 class="text-2xl font-display mb-4">Checklist SEO</h2>
        <ul class="space-y-3 text-sm">
            <li class="flex gap-3">
                <span class="text-green-600">✓</span>
                <div>
                    <strong>Meta titles & descriptions</strong>
                    <p class="text-ink/60">Chaque page produit a des balises optimisées.</p>
                </div>
            </li>
            <li class="flex gap-3">
                <span class="text-green-600">✓</span>
                <div>
                    <strong>Open Graph</strong>
                    <p class="text-ink/60">Aperçus riches sur les réseaux sociaux activés.</p>
                </div>
            </li>
            <li class="flex gap-3">
                <span class="text-green-600">✓</span>
                <div>
                    <strong>URLs propres (slugs)</strong>
                    <p class="text-ink/60">Ex: /products/tee-essentiel-noir</p>
                </div>
            </li>
            <li class="flex gap-3">
                <span class="text-green-600">✓</span>
                <div>
                    <strong>robots.txt</strong>
                    <p class="text-ink/60">Crawl autorisé pour le contenu public, bloqué pour /admin et /cart.</p>
                </div>
            </li>
            <li class="flex gap-3">
                <span class="text-yellow-600">○</span>
                <div>
                    <strong>Sitemap.xml</strong>
                    <p class="text-ink/60">À générer pour soumission à Google Search Console.</p>
                </div>
            </li>
            <li class="flex gap-3">
                <span class="text-yellow-600">○</span>
                <div>
                    <strong>Schema.org JSON-LD</strong>
                    <p class="text-ink/60">À ajouter pour rich snippets produits.</p>
                </div>
            </li>
        </ul>
    </div>

    {{-- Stats produits --}}
    <div class="lg:col-span-2 card p-6">
        <h2 class="text-2xl font-display mb-4">Aperçus des URL produits</h2>
        <p class="text-sm text-ink/70 mb-4">Vérifie que tes slugs sont SEO-friendly.</p>
        <div class="grid md:grid-cols-2 gap-2 text-sm">
            @foreach($products->take(20) as $product)
                <div class="flex items-center gap-2 p-2 bg-ink/5">
                    <code class="text-xs">/products/{{ $product->slug }}</code>
                    <a href="{{ route('products.show', $product) }}" target="_blank" class="text-accent text-xs underline ml-auto">↗</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
