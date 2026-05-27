@extends('layouts.app')


@section('content')
<section class="container mx-auto px-4 py-12 max-w-3xl">
    <p class="text-xs uppercase tracking-[0.3em] text-accent mb-2">@yield('eyebrow', 'Information')</p>
    <h1 class="text-5xl md:text-6xl font-display mb-3">@yield('heading')</h1>
    @hasSection('subtitle')
        <p class="text-lg text-ink/60 mb-10">@yield('subtitle')</p>
    @else
        <div class="mb-10"></div>
    @endif

    <article class="prose max-w-none">
        @yield('page')
    </article>

    <div class="mt-16 pt-8 border-t border-ink/10 text-sm text-ink/50">
        <p>Dernière mise à jour : {{ now()->format('d/m/Y') }}</p>
        <a href="{{ route('home') }}" class="underline mt-2 inline-block">← Retour à l'accueil</a>
    </div>
</section>
@endsection