@extends('admin.base')
@section('title')
    Admin | Detalles actividad
@endsection
@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-2">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Detalles de la actividad
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-700/25 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Título
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Duración
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nº Personas (Max)
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Destino
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Guia
                    </th>
                    <th scope="col" class="px-6 py-3 col-span-2 text-center">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $actividad->titulo }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $actividad->precio }}€
                    </td>
                    <td class="px-6 py-4">
                        {{ $actividad->duracion }}h
                    </td>
                    <td class="px-6 py-4">
                        {{ $actividad->max_personas }} personas
                    </td>
                    <td class="px-6 py-4">
                        {{ $actividad->destino->nombre }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $actividad->guia->nombre }}
                    </td>
                    <td class="px-6 py-4 flex justify-between items-center">
                        <a href=" {{ route('admin.editarActividad', $actividad->id) }} "
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                        <a data-modal-target="popup-modal" data-modal-toggle="popup-modal" href="#"
                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Borrar
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mt-4 flex flex-col space-y-4 w-5/6">
            <h2 class="text-4xl font-extrabold dark:text-white underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Descripción: </h2>
            <p class="text-lg font-medium text-gray-900 dark:text-white">{!! nl2br(e($actividad->descripcion)) !!}</p>
        </div>
    </div>


    <!-- Modal -->
    <div id="popup-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro de querrer borrar a
                        este usuario?</h3>
                    <form action="{{ route('admin.borrarActividad', $actividad->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button data-modal-hide="popup-modal" type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Borrar
                        </button>
                    </form>
                    <button data-modal-hide="popup-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
@endsection