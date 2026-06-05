<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('description', 'Boutique de t-shirts en ligne — designs uniques, qualité premium, livraison en Belgique.')">

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VB66GPBJ07"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VB66GPBJ07');
</script>

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('og_title', config('app.name'))">
    <meta property="og:description" content="@yield('og_description', 'Découvrez notre collection de t-shirts')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- Assets --}}
    @php
        $manifest = json_decode(file_get_contents(public_path('build/.vite/manifest.json')), true);
    @endphp
    <link rel="stylesheet" href="{{ asset('build/' . $manifest['resources/css/app.css']['file']) }}">
    <script src="{{ asset('build/' . $manifest['resources/js/app.js']['file']) }}" defer></script>

    @stack('head')
</head>
<body class="min-h-screen flex flex-col">
    @include('partials.header')

    <main class="flex-1">
        @if (session('success'))
            <div class="container mx-auto px-4 pt-4">
                <div class="alert-success">{{ session('success') }}</div>
            </div>
        @endif
        @if (session('error'))
            <div class="container mx-auto px-4 pt-4">
                <div class="alert-error">{{ session('error') }}</div>
            </div>
        @endif

        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.cookie-banner')
    @stack('scripts')
</body>
</html>