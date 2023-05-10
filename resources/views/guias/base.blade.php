<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/logoico.ico') }}" />
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    @vite(['resources/css/gadiritas.css'])
</head>

<body>
    <nav class="top-0 left-0 z-20 w-full bg-white border-b border-gray-200">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a href=" {{ route('admin.index') }} " class="flex items-center">
                <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo Gadiritas" id="logoGuia">
                <span class="self-center text-2xl font-semibold whitespace-nowrap">Gadiritas</span>
            </a>
            {{-- Añadir order-2 --}}
            <div class="flex ">
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <button type="button" id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="inline-flex items-center text-sm font-medium text-center rounded-lg focus:underline hover:underline">
                            {{ auth()->user()->name }}
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
            <li>
                <a href="/profile"
                    class="block px-4 py-2 hover:bg-gray-100">Perfil</a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                    class="block px-4 py-2 text-red-500 hover:bg-red-100">
                    Cerrar sesión</a>
            </li>
        </ul>
    </div>
    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>
