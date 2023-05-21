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
    @vite(['resources/css/gadiritas.css', 'resources/css/footer.css', 'resources/css/responsive.css'])
</head>

<body>
    <div id="welcomeDiv">
        <div>
            <p>Busca, encuentra y ¡DISFRUTA!</p>
            <p>Las mejores actividades de la provincia de Cádiz te esperan</p>
            <a href=" {{ auth()->check() ? route('usuarios.index') : route('login') }} ">
                Entrar
            </a>
        </div>
    </div>
    @include('gadiritas.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>
