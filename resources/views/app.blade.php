<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta property="csp-nonce" content="'self' {{ Illuminate\Support\Facades\Vite::cspNonce() }}">
        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Anton+SC&display=swap" nonce="{{Illuminate\Support\Facades\Vite::cspNonce()}}">
        <link href="https://fonts.googleapis.com/css2?family=Arsenal+SC:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" nonce="{{Illuminate\Support\Facades\Vite::cspNonce()}}">
        <!-- Styles -->


        <!-- Scripts -->
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    </head>
    <body class="font-fontbase antialiased">
        @inertia

        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js" nonce="{{Illuminate\Support\Facades\Vite::cspNonce()}}"></script>
        @endenv
    </body>
</html>
