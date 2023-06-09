@extends('admin.base')
@section('title')
    Admin | Empleo
@endsection
@section('content')
    <div class="w-full flex justify-center items-center mt-4">
        <input type="text" id="searchInput" onkeyup="search()" placeholder="Buscar"
            class="w-3/4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-50 focus:border-blue-50 p-2.5">
    </div>
    <div class="flex items-center justify-center my-4">
        <table class="w-11/12 text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Correo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Teléfono
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mensaje
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody id="searchableContent">
                @foreach ($cvs as $cv)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $cv->nombre }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $cv->correo }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $cv->telefono }}
                        </td>
                        <td class="w-1/3 px-6 py-4">


                            @if (strlen($cv->mensaje) > 50)
                                {{ \Illuminate\Support\Str::limit($cv->mensaje, 50) }}
                                <a href="#" data-modal-target="defaultModal{{ $cv->id }}"
                                    data-modal-toggle="defaultModal{{ $cv->id }}">Ver más</a>
                            @else
                                {{ $cv->mensaje }}
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.cvs.download', $cv->id) }}"
                                class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Descargar
                                CV</a>
                        </td>
                    </tr>
                    <div id="defaultModal{{ $cv->id }}" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Carta de presentación de: {{ $cv->nombre }}
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="defaultModal{{ $cv->id }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 space-y-6">
                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                        {{ $cv->mensaje }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
