<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @php
            $seo = $page['props']['seo'] ?? [];
            $title = $seo['title'] ?? config('app.name', 'SMA IT Soeman HS');
            $description = $seo['description'] ?? 'Website resmi SMA IT Soeman HS Pekanbaru.';
            $image = $seo['image'] ?? asset('images/og-default.jpg');
            $url = request()->url();
        @endphp

        <title inertia>{{ $title }}</title>
        <meta name="description" content="{{ $description }}" inertia>

        <!-- Open Graph -->
        <meta property="og:title" content="{{ $title }}" inertia>
        <meta property="og:description" content="{{ $description }}" inertia>
        <meta property="og:image" content="{{ $image }}" inertia>
        <meta property="og:url" content="{{ $url }}" inertia>
        <meta property="og:type" content="website" inertia>

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="{{ asset('logo.svg') }}">

        <!-- Scripts -->
        @routes
        @viteReactRefresh
        @vite(['resources/js/app.tsx', "resources/js/Pages/{$page['component']}.tsx"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased bg-cream-50 text-ink-900">
        @inertia
    </body>
</html>
