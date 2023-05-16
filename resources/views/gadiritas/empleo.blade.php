<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gadiritas - Empleo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/logoico.ico') }}" />
    @vite(['resources/css/contacto.css'])
</head>

<body>
    <div id="left-div">
        <div id="semi-transparent-div">
            <a href="/">
                <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logotipo">
            </a>
            <p>¡Únete a nuestro equipo!</p>
            <h2>
                Si te gusta el turisimo y enseñar a nuestros clientes todos y cada uno de los rincones, historia y
                actividades que
                esconde nuestra provincia, no dudes y mándanos tu CV.
            </h2>
            <form action="" method="POST" enctype="multipart/form-data" id="trabajaNosotros">
                @csrf
                <div>
                    <label for="nombre">Nombre completo:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Juan José Valladares del Olmo"
                        required class="inputTrabajo">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="tu@email.com" required
                        class="inputTrabajo">
                </div>
                <div>
                    <label for="tlf">Teléfono:</label>
                    <input type="tel" id="tlf" name="tlf" placeholder="623451789" required
                        class="inputTrabajo">
                </div>
                <div>
                    <label for="message">Carta de presentación:</label>
                    <textarea id="message" rows="4" name="message"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 resize-none"
                        placeholder="Breve descripción sobre ti..." required></textarea>
                </div>
                <div class="w-1/2 mb-6">
                    <label for="cv">Añade tu CV:</label>
                    <input type="file" name="cv" id="cv" accept=".pdf" required
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                </div>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>
