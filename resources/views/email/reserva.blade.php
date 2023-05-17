<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserva Completada</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <style>
        body {
            color: black;
        }

        img {
            margin-top: 0.5em;
            width: 8em;
            height: 8em;
            border-radius: 160px;
            border: 5px solid #666;
        }

        div:first {
            position: relative;
            overflow-x: auto;
        }

        table {
            width: 100%;
            font-size: 0.875rem;
            line-height: 1.25rem;
            text-align: center;
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity));
        }

        thead {
            font-size: 0.75rem
                /* 12px */
            ;
            line-height: 1rem
                /* 16px */
            ;
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity));
            text-transform: uppercase;
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity));
        }

        th,
        td {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            text-align: center;
        }

        #trBody {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity));
            border-bottom-width: 1px;
        }

        #thBody {
            padding-left: 1.5rem/;
            padding-right: 1.5rem/;
            font-weight: 500;
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity));
            white-space: nowrap;
        }

        div:last-child {
            width: 100%;
            display: flex;
            justify-content: center;
            align-content: center;
        }
    </style>
</head>

<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>
    <div>
        <table>
            <thead>
                <tr>
                    <th scope="col">
                        Actividad
                    </th>
                    <th scope="col">
                        Fecha
                    </th>
                    <th scope="col">
                        Hora
                    </th>
                    <th scope="col">
                        Nº de personas
                    </th>
                    <th scope="col">
                        Precio total
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr id="trBody">
                    <th scope="row" id="thBody">
                        {{ $mailData['titulo'] }}
                    </th>
                    <td>
                        {{ $mailData['fecha'] }}
                    </td>
                    <td>
                        {{ $mailData['hora'] }}
                    </td>
                    <td>
                        {{ $mailData['nPersonas'] }} personas
                    </td>
                    <td>
                        {{ $mailData['precio'] }}€
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <p>¡Atención! Recuerda estar al menos 10 minutos antes del inicio de la actividad en el punto de encuentro con el
        guia.
        Para esta actividad, el punto de encuentro será en <strong>{{ $mailData['ubicación'] }}</strong></p>

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
