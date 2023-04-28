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
    <style>
        img {
            width: 2em;
            height: 2em;
        }

        #welcomeDiv {
            background-image:
                linear-gradient(to bottom, rgba(245, 246, 252, 0.50), rgba(164, 95, 147, 0.75)),
                url(https://static.eldiario.es/clip/f46f881a-a1ec-4d00-baea-ab5ae0eea674_16-9-aspect-ratio_default_0.jpg);
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="flex flex-col items-center justify-center w-full h-screen" id="welcomeDiv">
        <p class="text-black dark:text-gray-400 text-2xl font-extrabold">Busca entre todas nuestras actividades tu
            favorita ahora</p>
        <a href=" {{ route('usuarios.index') }} "
            class="mx-auto font-medium text-white dark:text-white hover:underline">
            <svg aria-hidden="true" class="w-16 h-16 ml-1" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </a>
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
