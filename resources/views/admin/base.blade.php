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
    <style>
        img {
            width: 6em;
            height: 6em;
            margin-right: 0.5em;
        }

        #navbarAdmin {
            background: linear-gradient(270deg, #0a3e4295, rgba(255, 0, 0, 0) 70.71%);
        }
    </style>
</head>

<body>
    <nav class="top-0 left-0 z-20 w-full bg-white border-b border-gray-200" id="navbarAdmin">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a href=" {{ route('admin.index') }} " class="flex items-center">
                <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo Gadiritas">
                <span class="self-center text-2xl font-semibold whitespace-nowrap">Admin</span>
            </a>
            <div class="flex md:order-2">
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
                    class="flex items-center justify-center p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 md:flex-row md:space-x-8 md:mt-0 md:border-0 max-[600px]:grid max-[600px]:grid-cols-3">
                    <li>
                        <a href="{{ route('admin.usuarios') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:underline md:hover:bg-transparent md:p-0">Usuarios</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.guias') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:underline md:hover:bg-transparent md:p-0">Guias</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.destinos') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:underline md:hover:bg-transparent md:p-0">Destinos</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.actividades') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:underline md:hover:bg-transparent md:p-0">Actividades</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.reservas') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:underline md:hover:bg-transparent md:p-0">Reservas</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.comentarios') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:underline md:hover:bg-transparent md:p-0">Comentarios</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.cvs') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:underline md:hover:bg-transparent md:p-0">Empleo</a>
                    </li>
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
                <a href="/profile" class="block px-4 py-2 hover:bg-gray-300">Perfil</a>
            </li>
            <li>
                <a href="/index" class="block px-4 py-2 hover:bg-gray-300">Vista usuario</a>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="block px-4 py-2 text-red-500 hover:bg-red-200">
                    Cerrar sesión</a>
            </li>
        </ul>
    </div>
    @yield('content')


    <div data-dial-init class="fixed right-6 bottom-6 group">
        <div id="speed-dial-menu-default" class="flex-col items-center hidden mb-4 space-y-2">
            <a href="{{ route('admin.usuariosCreate') }}" data-tooltip-target="tooltip-users"
                data-tooltip-placement="left"
                class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-user-plus">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="8.5" cy="7" r="4"></circle>
                    <line x1="20" y1="8" x2="20" y2="14"></line>
                    <line x1="23" y1="11" x2="17" y2="11"></line>
                </svg>
                <span class="sr-only">Usuarios</span>
            </a>
            <div id="tooltip-users" role="tooltip"
                class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                Usuarios
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a href="{{ route('admin.destinosCreate') }}" data-tooltip-target="tooltip-download"
                data-tooltip-placement="left"
                class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 shadow-sm hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-signpost-split" viewBox="0 0 16 16">
                    <path
                        d="M7 7V1.414a1 1 0 0 1 2 0V2h5a1 1 0 0 1 .8.4l.975 1.3a.5.5 0 0 1 0 .6L14.8 5.6a1 1 0 0 1-.8.4H9v10H7v-5H2a1 1 0 0 1-.8-.4L.225 9.3a.5.5 0 0 1 0-.6L1.2 7.4A1 1 0 0 1 2 7h5zm1 3V8H2l-.75 1L2 10h6zm0-5h6l.75-1L14 3H8v2z" />
                </svg>
                </svg>
                <span class="sr-only">Destinos</span>
            </a>
            <div id="tooltip-download" role="tooltip"
                class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                Destinos
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a href="{{ route('admin.actividadesCreate') }}" data-tooltip-target="tooltip-acts"
                data-tooltip-placement="left"
                class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 shadow-sm hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                    class="bi bi-calendar-check" viewBox="0 0 16 16">
                    <path
                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                </svg>
                <span class="sr-only">Actividades</span>
            </a>
            <div id="tooltip-acts" role="tooltip"
                class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                Actividades
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
        <button type="button" data-dial-toggle="speed-dial-menu-default" aria-controls="speed-dial-menu-default"
            aria-expanded="false"
            class="flex items-center justify-center text-white bg-blue-700 rounded-full w-14 h-14 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none">
            <svg aria-hidden="true" class="w-8 h-8 transition-transform group-hover:rotate-45" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span class="sr-only">Open actions menu</span>
        </button>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js"></script>
</body>

</html>
