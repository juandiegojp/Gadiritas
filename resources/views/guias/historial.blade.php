@extends('guias.base')
@section('title')
    Guias - Historial
@endsection
@section('content')
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

@endsection
