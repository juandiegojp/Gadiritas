<nav class="bg-gradient-to-r from-white from-25% to-teal-200 border-b border-gray-200">
    <div class="flex flex-wrap items-center justify-between">
        @if (Auth::user()->is_admin)
            <a href="{{ route('admin.index') }}">
            @elseif (Auth::user()->is_guia)
                <a href="{{ route('guias.index') }}">
                @else
                    <a href="{{ route('usuarios.index') }}">
        @endif
        <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo Gadiritas" id="navbarLogo" class="mr-4">
        </a>
        @if (auth()->check())
            <div class="flex min-[800px]:order-2">
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg min-[800px]:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
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
            <div class="items-center justify-between hidden w-full min-[800px]:flex min-[800px]:flex-col min-[800px]:w-auto min-[800px]:order-1"
                id="navbar-sticky">
                <div
                    class="flex flex-col p-4 mx-auto mt-4 font-medium border border-gray-900 rounded-lg min-[800px]:p-0 min-[800px]:flex-row min-[800px]:space-x-8 min-[800px]:mt-0 min-[800px]:border-0 max-[800px]:grid max-[800px]:grid-cols-3 max-[500px]:grid max-[500px]:grid-cols-2">
                    @foreach ($comarcas as $comarca)
                        <div class="comarca-container max-[800px]:mb-8">
                            <a href="{{ route('usuarios.actividades', $comarca) }}"
                                class="pr-1 ml-1 min-[800px]:ml-2">{{ $comarca }}</a>
                        </div>
                    @endforeach
                    <button type="button" id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="inline-flex items-center pl-6 text-sm font-medium text-center rounded-lg focus:underline hover:underline max-[800px]:mt-8">
                        {{ auth()->user()->name }}
                        <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        @endif
    </div>
</nav>



<!-- Dropdown menu -->
<div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
        <li>
            <a href="{{ route('profile.edit') }}"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Perfil</a>
        </li>
        <li>
            <a href="{{ route('usuarios.reservaUsers') }}"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reservas</a>
        </li>
        <li>
            <a href="{{ route('logout') }}"
                class="block px-4 py-2 text-red-500 hover:bg-red-100 dark:hover:bg-red-600 dark:hover:text-white">
                Cerrar sesión</a>
        </li>
    </ul>
</div>
