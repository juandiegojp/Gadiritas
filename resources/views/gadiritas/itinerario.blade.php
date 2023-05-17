<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>itinerario</title>
    <style>
        h1 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            line-height: 2rem;
            font-weight: 800;
            line-height: 1;
            letter-spacing: -0.025em;
            color: black;

        }

        p {
            margin-bottom: 0.5rem;
            font-size: 1.25rem;
            line-height: 1.75rem;
            font-weight: 700;
            line-height: 1;
            letter-spacing: -0.025em;
            color: black;
        }
    </style>
</head>

<body>
    <h1 class="md:text-3xl lg:text-4xl">{{ $actividad->titulo }}</h1>
    <div>
        <p class="md:text-2xl lg:text-3xl">
            Descripción</p>
        {!! nl2br(e($actividad->descripcion)) !!}
        <div id="mapaEncuentro">
            <p class="md:text-2xl lg:text-2xl">Punto de encuentro</p>
            <p class="md:text-2xl lg:text-2xl">{{$actividad->direccion}}</p>
        </div>
    </div>
</body>

</html>
