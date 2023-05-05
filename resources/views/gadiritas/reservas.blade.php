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
    <div class="relative mx-4 overflow-x-auto h-screen">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr>
                        <td>
                            {{ $reserva->actividad->titulo }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/y') }} - {{ \Carbon\Carbon::parse($reserva->hora)->format('H:i') }}
                        </td>
                        <td>
                            {{ $reserva->personas * $reserva->actividad->precio }}€
                        </td>
                        <td>
                            <form action=" {{ route('usuarios.borrarReserva') }} " method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ $reserva->id }}">
                                @if(\Carbon\Carbon::parse($reserva->fecha . ' ' . $reserva->hora)->diffInHours(\Carbon\Carbon::now()->setTimezone('Europe/Madrid')) < 24)
                                <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                                    La reserva no puede ser cancelada con menos de 24 horas de antelación.
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <button data-modal-toggle="popup-modal" data-tooltip-target="tooltip-default" type="button" onclick="cambiar(event, {{ $reserva->id }})"
                                class="px-4 py-2 text-sm font-medium text-white bg-red-700 rounded-lg cursor-not-allowed focus:outline-none hover:bg-red-800 focus:ring-4
                                focus:ring-red-300">Cancelar</button>
                                @else
                                <button type="submit" onclick="cambiar(event, {{ $reserva->id }})"
                                    class="px-4 py-2 text-sm font-medium text-white bg-red-700 rounded-lg focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300"
                                    data-modal-toggle="popup-modal">Cancelar</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
