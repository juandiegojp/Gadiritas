<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alta guia</title>
    <style>
        body {
            color: black;
        }
    </style>
</head>
<body>
    <body>
        <h1>{{ $mailData['title'] }}</h1>
        <p>{{ $mailData['body'] }}</p>

        <p>{{ $mailData['nombre'] }}, nos pondremos en contacto contigo en los próximos días para darte más información.</p>

        <p>Un saludo,</p>
        <p>el equipo Gadiritas.</p>

        <div>
            <a href="http://127.0.0.1:8000/">
                <img src="{{ Vite::asset('public/storage/logo.png') }}" alt="Logotipo Gadiritas">
            </a>
        </div>
    </body>
</body>
</html>
