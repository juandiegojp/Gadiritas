<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>itinerario</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-image: url({{ resource_path('images/logo.png') }});
            background-repeat: no-repeat;
            background-position: center;
        }

        h1 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            line-height: 2rem;
            font-weight: 800;
            line-height: 1;
            letter-spacing: -0.025em;
            color: black;
            text-decoration: underline;
            text-align: center;
        }

        p {
            margin-bottom: 0.5rem;
            font-size: 1.25rem;
            line-height: 1.75rem;
            font-weight: 700;
            line-height: 1;
            letter-spacing: -0.025em;
            color: black;
            text-decoration: underline;
        }

        #mapaEncuentro {
            margin: 1rem 0.5rem;
        }

        #mapaEncuentro p:last-child {
            font-weight: bold;
        }

        figure {
            text-align: center;
        }

        .figure figcaption {
            font-size: large;
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            bottom: 1.5rem;
            width: 100%;
        }

        .figure img {
            object-fit: contain;
            height: 12em;
            width: 16em;
            border-radius: 0.5rem;
        }
    </style>
</head>

<body>
    <h1 class="md:text-3xl lg:text-4xl">{{ $actividad->titulo }}</h1>
    <table>
        <tr>
            <td class="figure">
                <figure>
                    <img src="{{ resource_path('images/' . $actividad->id . '-4.jpg') }}" alt="image description">
                    <figcaption>
                        <p>{{ $actividad->titulo }}</p>
                    </figcaption>
                </figure>
            </td>
            <td class="figure">
                <figure>
                    <img src="{{ resource_path('images/' . $actividad->id . '-3.jpg') }}" alt="image description">
                    <figcaption class="absolute px-4 text-lg text-white bottom-6">
                        <p>{{ $actividad->titulo }}</p>
                    </figcaption>
                </figure>
            </td>
        </tr>
        <tr>
            <td class="figure">
                <figure>
                    <img src="{{ resource_path('images/' . $actividad->id . '-2.jpg') }}" alt="image description">
                    <figcaption class="absolute px-4 text-lg text-white bottom-6">
                        <p>{{ $actividad->titulo }}</p>
                    </figcaption>
                </figure>
            </td>
            <td class="figure">
                <figure>
                    <img src="{{ resource_path('images/' . $actividad->id . '.jpg') }}" alt="image description">
                    <figcaption class="absolute px-4 text-lg text-white bottom-6">
                        <p>{{ $actividad->titulo }}</p>
                    </figcaption>
                </figure>
            </td>
        </tr>
    </table>

    <div>
        <p class="md:text-2xl lg:text-3xl">Descripción</p>
        {!! nl2br(e($actividad->descripcion)) !!}
        <div id="mapaEncuentro">
            <p class="md:text-2xl lg:text-2xl">Punto de encuentro: </p>{{ $actividad->direccion }}
        </div>
    </div>
</body>

</html>
