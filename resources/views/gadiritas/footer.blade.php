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
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Contacto</h2>
                <ul class="font-medium text-gray-600 dark:text-gray-400">
                    <li class="mb-4">
                        <a href="#" class="hover:underline">
                            <p>Atención al cliente</p>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('usuarios.empleo') }}" class="hover:underline">
                            <p>Trabaja con nosotros</p>
                        </a>
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
        </div>
    </div>
</footer>
