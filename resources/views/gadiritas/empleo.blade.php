<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gadiritas - Empleo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <form action="" method="POST" class="flex flex-col items-center justify-center mt-4">
        <div class="w-1/2 mb-6">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre completo</label>
            <input type="text" id="nombre"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Juan José Valladares del Olmo" required>
        </div>
        <div class="w-1/2 mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
            <input type="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="tu@email.com" required>
        </div>
        <div class="w-1/2 mb-6">
            <label for="tlf" class="block mb-2 text-sm font-medium text-gray-900">Teléfono</label>
            <input type="tel" id="tlf"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="" required>
        </div>
        <div class="w-1/2 mb-6">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Carta de presentación</label>
            <textarea id="message" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 resize-none"
                placeholder="Breve descripción sobre ti..." required></textarea>
        </div>
        <div class="w-1/2 mb-6">
            <label for="cv" class="block mb-2 text-sm font-medium text-gray-900">CV</label>
            <input type="file" name="cv" id="cv" accept=".pdf" required>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Enviar</button>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>
