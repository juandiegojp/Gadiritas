<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{Vite::asset("resources/images/logoico.ico")}}" />
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
    <script>
        function setCookie(cname, cvalue, exdays) {
            const d = new Date();
            d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
            let expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(";");
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == " ") {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return null; // return null instead of an empty string if the cookie doesn't exist
        }

        $(document).ready(function() {
            function checkCookie() {
                let user = getCookie("Gadiritas");
                let d = document.getElementById("sticky-banner");
                if (user != "" & user != null) {
                    d.classList.add('hidden');
                } else {
                    // check if the cookie exists and its value is "true" before showing the div
                    if (getCookie("cookieAccepted") === "true") {
                        d.classList.add('hidden');
                    } else {
                        d.classList.remove('hidden');
                    }
                }
            }

            checkCookie(); // call the function when the page loads
        });

        function acceptCookies() {
            let user = document.getElementById("user").value;
            let d = document.getElementById("sticky-banner");
            console.log(d);
            setCookie("Gadiritas", user, 30);
            setCookie("cookieAccepted", true, 30);
            d.classList.add('hidden');
        }
    </script>

    <div id="sticky-banner" tabindex="-1" class="fixed top-0 left-0 z-50 flex justify-between w-full p-4 border-b border-gray-200 bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
        <div class="flex items-center mx-auto space-x-1">
            <div class="flex items-center justify-center w-full text-sm font-normal text-gray-500 dark:text-gray-400">
                <span class="inline-flex p-1 mr-3 bg-gray-200 rounded-full dark:bg-gray-600">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"></path>
                    </svg>
                    <span class="sr-only">Light bulb</span>
                </span>
                <p>¿Por qué utilizamos cookies y otras tecnologías de seguimiento?</p>
                <p>
                    Nuestro sitio habilita scripts (por ejemplo, cookies) capaces de leer, almacenar y escribir información en su navegador y
                    en su dispositivo. La información procesada por este script incluye datos relacionados con usted que pueden incluir
                    identificadores personales (por ejemplo, dirección IP y detalles de la sesión) y la actividad de navegación.
                </p>

            </div>
        </div>
        <div class="flex items-center w-1/2 text-sm text-gray-500">
            <input type="hidden" name="user" id="user" value="{{Auth::user()->id}}">
            <button onclick="acceptCookies()">Aceptar cookies</button>
        </div>
    </div>
    @include('gadiritas.navbar')

    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>
