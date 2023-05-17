<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserva cancelada</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <style>
        body {
            color: black;
        }
    </style>
</head>

<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>

    <p>El reembolso será efectuado en un plazo de 3 a 14 días desde la fecha de la cancelación.</p>

    <p>Ante cualquier problema o duda, no dude en ponerse en contacto con nosotros.</p>

    <p>Un saludo,</p>
    <p>el equipo Gadiritas.</p>

    <div>
        <a href="http://127.0.0.1:8000/">
            <img src="{{ Vite::asset('public/storage/logo.png') }}" alt="Logotipo Gadiritas">
        </a>
    </div>
</body>

</html>
