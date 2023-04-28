<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <style>
        img {
            width: 2em;
            height: 2em;
        }
    </style>
</head>

<body>
    <div class="flex items-center justify-center w-full h-96">
        <p class="text-gray-500 dark:text-gray-400">Busca entre todas nuestras actividades tu favorita
            <a href=" {{ route('usuarios.index') }} " class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
                ahora
                <svg aria-hidden="true" class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
                </svg>
            </a>
        </p>
    </div>
    <footer class="absolute inset-x-0 bottom-0 bg-white dark:bg-gray-900">
        <div class="w-full max-w-screen-xl p-4 py-6 mx-auto lg:py-8">
            <div class="flex justify-around mx-4 md:flex md:justify-between">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources</h2>
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
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                    <ul class="font-medium text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="https://github.com/juandiegojp/Gadiritas" class="hover:underline flex justify-center items-end space-x-1">
                                <img src="{{Vite::asset("resources/images/github.png")}}" alt="Repositorio del proyecto.">
                                <p>Github</p>
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/juandiegojp/Gadiritas" class="hover:underline flex justify-center items-end space-x-1">
                                <img src="{{Vite::asset("resources/images/github.png")}}" alt="Repositorio del proyecto.">
                                <p>Github</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                    <ul class="font-medium text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>
