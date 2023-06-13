@extends('gadiritas.base')
@section('title')
    Gadiritas - Reservas
@endsection
@section('content')
    <script>
        function cambiar(el, id) {
            el.preventDefault();
            const oculto = document.getElementById('oculto');
            oculto.setAttribute('value', id);
        }
    </script>
    <div class="h-screen">
        <div class="flex items-center justify-center mt-2 mb-4">
            <table class="w-3/4 text-sm text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-teal-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Actividad
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Precio total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 bg-teal-50">
                    @foreach ($reservas as $reserva)
                        <tr>
                            <td class="w-1/3 text-center">
                                {{ $reserva->actividad->titulo }}
                            </td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/y') }} -
                                {{ \Carbon\Carbon::parse($reserva->hora)->format('H:i') }}
                            </td>
                            <td class="text-center">
                                {{ $reserva->precio_total }}€
                            </td>
                            <td class="py-2 text-center">
                                <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-gray-500 rounded-lg focus:outline-none focus:ring-4"
                                    data-modal-toggle="mostrarDetalles-{{$reserva->id}}">Ver detalles</button>
                                <form action=" {{ route('usuarios.borrarReserva') }} " method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $reserva->id }}">
                                    @if (
                                        \Carbon\Carbon::parse($reserva->fecha . ' ' . $reserva->hora)->diffInHours(
                                            \Carbon\Carbon::now()->setTimezone('Europe/Madrid')) < 24 || \Carbon\Carbon::parse($reserva->fecha . ' ' . $reserva->hora)->isPast())
                                        <div id="tooltip-default" role="tooltip"
                                            class="absolute z-10 invisible w-1/4 px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                                            La reserva no puede ser cancelada con menos de 24 horas de antelación ni tampoco
                                            cuando la fecha de la actividad ha pasado.
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                        <button data-modal-toggle="popup-modal" data-tooltip-target="tooltip-default"
                                            type="button" onclick="cambiar(event, {{ $reserva->id }})"
                                            class="px-4 py-2 text-sm font-medium text-white bg-red-700 rounded-lg cursor-not-allowed focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300">Cancelar</button>
                                    @else
                                        <button type="submit" onclick="cambiar(event, {{ $reserva->id }})"
                                            class="px-4 py-2 text-sm font-medium text-white bg-red-700 rounded-lg focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300"
                                            data-modal-toggle="popup-modal">Cancelar</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div id="mostrarDetalles-{{$reserva->id}}" tabindex="-1"
                            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md">
                                <div class="relative rounded-lg shadow bg-teal-50">
                                    <div class="p-6">
                                        <h2 class="mb-2 text-lg font-semibold text-gray-900">Actividad:</h2>
                                        <ul
                                            class="max-w-md mb-4 space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                {{ $reserva->actividad->titulo }} ({{ $reserva->actividad->destino->nombre }})
                                            </li>
                                        </ul>
                                        <h2 class="mb-2 text-lg font-semibold text-gray-900">Se reservó el:</h2>
                                        <ul
                                            class="max-w-md mb-4 space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                {{ \Carbon\Carbon::parse($reserva->created_at)->format('d/m/y') }} -
                                                {{ \Carbon\Carbon::parse($reserva->created_at)->format('H:i') }}
                                            </li>
                                        </ul>
                                        <h2 class="mb-2 text-lg font-semibold text-gray-900">Fecha y hora de la
                                            actividad:</h2>
                                        <ul
                                            class="max-w-md mb-4 space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                {{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/y') }} -
                                                {{ \Carbon\Carbon::parse($reserva->hora)->format('H:i') }}
                                            </li>
                                        </ul>
                                        <h2 class="mb-2 text-lg font-semibold text-gray-900">Dirección:</h2>
                                        <ul
                                            class="max-w-md mb-4 space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                {{ $reserva->actividad->direccion }}
                                            </li>
                                        </ul>
                                        <h2 class="mb-2 text-lg font-semibold text-gray-900">Nº de personas:
                                        </h2>
                                        <ul
                                            class="max-w-md mb-4 space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                {{ $reserva->personas }}
                                            </li>
                                        </ul>
                                        <h2 class="mb-2 text-lg font-semibold text-gray-900">Precio total:</h2>
                                        <ul
                                            class="max-w-md mb-4 space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                {{ $reserva->precio_total }}€
                                            </li>
                                        </ul>
                                    </div>
                                    <button type="button"
                                        class="w-full px-4 py-2 text-center text-black bg-sky-200"
                                        data-modal-hide="mostrarDetalles-{{$reserva->id}}">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $reservas->links() }}
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
                        esta reserva?</h3>
                    <form action="{{ route('usuarios.borrarReserva') }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input id="oculto" type="hidden" name="id">
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
