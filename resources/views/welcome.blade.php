<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/logoico.ico') }}" />
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/gadiritas.css'])
</head>

<body>
    <div class="w-full h-screen flex items-center" id="welcomeDiv">
        <div>
            <p class="text-2xl font-extrabold">Busca, encuentra y ¡DISFRUTA!</p>
            <p class="text-sm font-extrabold w-2/3 pb-2">Las mejores actividades de la provicia de Cádiz te esperan</p>
            <a href=" {{ route('usuarios.index') }} " class="py-2.5 px-5 text-sm font-medium focus:outline-none rounded-lg border focus:z-10 focus:ring-4 ring-gray-200 focus:ring-gray-700 bg-gray-800 text-white border-gray-600 hover:text-white hover:bg-gray-700">
                Entrar
            </a>
        </div>
    </div>
    <footer class="bg-white dark:bg-gray-900">
        <div class="w-full max-w-screen-xl p-4 py-6 mx-auto lg:py-8">
            <div class="flex justify-around mx-4 md:flex md:justify-between">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Recursos</h2>
                    <ul class="font-medium text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="https://flowbite.com/" class="hover:underline">Flowbite</a>
                        </li>
                        <li>
                            <a href="https://tailwindcss.com/" class="hover:underline">Tailwind CSS</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Síguenos</h2>
                    <ul class="font-medium text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="https://github.com/juandiegojp/Gadiritas">
                                <img src="{{ Vite::asset('resources/images/github.png') }}"
                                    alt="Repositorio del proyecto.">
                            </a>
                        </li>
                        <li>
                            <a href="https://linkedin.com/">
                                <img src="{{ Vite::asset('resources/images/linkedin.png') }}"
                                    alt="Repositorio del proyecto.">
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Contacto</h2>
                    <ul class="font-medium text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">
                                <p>Contacto</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>
