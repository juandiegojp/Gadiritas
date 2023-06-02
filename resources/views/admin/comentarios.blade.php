@extends('admin.base')
@section('title')
    Admin | Comentarios
@endsection
@section('content')
    <div class="w-full flex justify-center items-center mt-4">
        <input type="text" id="searchInput" onkeyup="search()" placeholder="Buscar"
            class="w-3/4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-50 focus:border-blue-50 p-2.5">
    </div>
    <div class="flex items-center justify-center mb-4">
        <table class="w-11/12 text-sm text-left text-gray-500">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white">
                Comentarios
                <p class="mt-1 text-sm font-normal text-gray-500">
                    Aquí se muestran algunos de los datos de los comentarios hechos por los usuarios. Puedes ver más
                    información haciendo click en "Ver detalles".
                </p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-700/25">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Actividad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Usuario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Comentario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody id="searchableContent">
                @forelse($comentarios as $comentario)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $comentario->actividad->titulo }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $comentario->user->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $comentario->contenido }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-gray-600 md:hover:text-blue-700 md:p-0">Ver
                                detalles</a>
                        </td>
                    </tr>
                @empty
                    <h1
                        class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                        Nada que mostrar aquí.
                    </h1>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        function search() {
            var searchValue = document.getElementById("searchInput").value.toLowerCase();
            var contentElements = document.querySelectorAll("#searchableContent tr");

            for (var i = 0; i < contentElements.length; i++) {
                var contentText = contentElements[i].textContent.toLowerCase();

                if (contentText.includes(searchValue)) {
                    contentElements[i].style.display = "table-row";
                } else {
                    contentElements[i].style.display = "none";
                }
            }
        }
    </script>
@endsection
