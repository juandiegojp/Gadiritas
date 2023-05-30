<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/x-icon" href="{{Vite::asset("resources/images/logoico.ico")}}" />

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/gadiritas.css', 'resources/css/responsive.css'])
    </head>
    <body class="font-sans antialiased text-gray-900">
        <div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0" id="img-mapa">
            <div id="logoRegistro">
                <a href="/">
                    <img src="{{Vite::asset("resources/images/logo.png")}}" alt="logo Gadiritas">
                </a>
            </div>

            <div class="w-full px-6 py-4 mt-6 mb-6 overflow-hidden shadow-md" id="register">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
