<!DOCTYPE html>
<html lang="fr">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('description', 'Boutique de t-shirts en ligne — designs uniques, qualité premium, livraison en Belgique.')">

    {{-- Open Graph (US16) --}}
    <meta property="og:title" content="@yield('og_title', config('app.name'))">
    <meta property="og:description" content="@yield('og_description', 'Découvrez notre collection de t-shirts')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
