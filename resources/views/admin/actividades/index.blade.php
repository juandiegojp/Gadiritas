@extends('admin.base')
@section('title')
    Admin | Actividades
@endsection
@section('content')
    <div class="w-full flex justify-center items-center mt-4">
        <input type="text" id="searchInput" onkeyup="search()" placeholder="Buscar"
            class="w-3/4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-50 focus:border-blue-50 p-2.5">
    </div>
    <div class="flex items-center justify-center mb-4">
        <table class="w-11/12 text-sm text-left text-gray-500">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white">
                Actividades
                <p class="mt-1 text-sm font-normal text-gray-500">
                    Aquí se muestran algunos de los datos de los actividades. Puedes ver más información de un usuario
                    haciendo click en
                    "Ver detalles".
                </p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-700/25">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Título
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Destino
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody id="searchableContent">
                @forelse($actividades as $u)
                    <tr class="@if ($u->activo) bg-white @else bg-red-300 @endif border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $u->titulo }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $u->destino->nombre }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($u->activo)
                                Activo
                            @else
                                Deshabilitado
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.datellesActividad', $u->id) }}"
                                class="font-medium text-gray-600 md:hover:text-blue-700 md:p-0">Ver detalles</a>
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
