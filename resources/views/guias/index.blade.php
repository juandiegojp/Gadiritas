@extends('guias.base')
@section('title')
    Guias - Dashboard
@endsection
@section('content')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var reservasHoy = document.getElementById('reservasHoy');
            var h1Element = reservasHoy.querySelector('span');
            var links = reservasHoy.getElementsByTagName('a');
            var count = links.length;

            h1Element.innerHTML = count;
        });
    </script>
    <div class="flex justify-between mx-2 max-[900px]:flex-col max-[900px]:justify-center max-[900px]:items-center">
        <div class="w-1/2 mt-4 max-[900px]:w-4/5" id="reservasHoy">
            <h1 class="flex items-center justify-center mb-4 text-2xl font-extrabold">Nº de reservas hoy<span
                    class="bg-blue-100 text-blue-800 text-xl font-semibold mr-2 px-2.5 py-0.5 rounded ml-2"></span>
            </h1>
            @if (count($reservasHoy) > 0)
                @foreach ($reservasHoy as $reserva)
                    @if (!\Carbon\Carbon::parse($reserva->hora)->isPast())
                        <a href="#"
                            class="flex flex-col items-center my-2 border rounded-lg shadow pointer-events-none bg-sky-100 border-cyan-200 md:flex-row md:max-w-xl hover:bg-sky-200">
                            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                                src="{{ Vite::asset("resources/images/{$reserva->actividad->id}.jpg") }}" alt="img">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                    {{ $reserva->actividad->titulo }}</h5>
                                <p class="mb-2 font-normal text-gray-700">Nº de personas: {{ $reserva->personas }}</p>
                                <p class="mb-2 font-normal text-gray-700">Fecha:
                                    {{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</p>
                                <p class="mb-2 font-normal text-gray-700">Inicio:
                                    {{ \Carbon\Carbon::parse($reserva->hora)->format('H:i') }}</p>
                                <p class="mb-2 font-normal text-gray-700"> Punto de encuentro:
                                    {{ $reserva->actividad->direccion }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach
            @else
                <p>No hay reservas para hoy.</p>
            @endif
        </div>
        <div class="w-1/2 mt-4 max-[900px]:w-full">
            <h1 class="flex items-center justify-center mb-4 text-xl font-extrabold">Próximas reservas</h1>
            <div class="grid grid-cols-2 max-[900px]:grid-cols-4" id="reservas">
                @if (count($reservas) > 0)
                    @for ($i = 0; $i < count($reservas); $i++)
                        <a href="#" data-modal-target="modal{{ $i }}"
                            data-modal-toggle="modal{{ $i }}"
                            class="flex flex-col items-center w-3/4 my-2 border rounded-lg shadow bg-sky-100 border-cyan-200 md:flex-row md:max-w-xl hover:bg-sky-200">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900">
                                    {{ $reservas[$i]->actividad->titulo }}</h5>
                                <p class="mb-2 text-xs text-gray-700 ">Fecha de la reserva:
                                    {{ \Carbon\Carbon::parse($reservas[$i]->fecha)->format('d/m/Y') }}</p>
                                @if ($reservas[$i]->personas == $reservas[$i]->actividad->max_personas)
                                    <p class="text-center text-gray-700 bg-yellow-100 text-md">¡COMPLETOS!</p>
                                @else
                                    <p class="text-xs text-gray-700 ">Nº de personas: {{ $reservas[$i]->personas }}
                                @endif
                            </div>
                        </a>
                        <!-- Main modal -->
                        <div id="modal{{ $i }}" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            {{ $reservas[$i]->actividad->titulo }}
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                            data-modal-hide="modal{{ $i }}">
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
                                        <p class="mb-2 font-normal text-gray-700">Nº de personas:
                                            {{ $reservas[$i]->personas }}
                                            @if ($reservas[$i]->personas == $reservas[$i]->actividad->max_personas)
                                                (¡COMPLETOS!)
                                            @else
                                                ({{ $reservas[$i]->actividad->max_personas - $reservas[$i]->personas }}
                                                plazas
                                                disponibles)
                                            @endif
                                        </p>
                                        <p class="mb-2 font-normal text-gray-700">Fecha:
                                            {{ \Carbon\Carbon::parse($reservas[$i]->fecha)->format('d/m/Y') }}</p>
                                        <p class="mb-2 font-normal text-gray-700">Hora:
                                            {{ \Carbon\Carbon::parse($reservas[$i]->hora)->format('H:i') }}</p>
                                        <p class="mb-2 font-normal text-gray-700">Dirección:
                                            {{ $reservas[$i]->actividad->direccion }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                @else
                    <p>No hay actividades próximamente.</p>
                @endif
            </div>
            {{ $reservas->links() }}
        </div>
    </div>
@endsection
