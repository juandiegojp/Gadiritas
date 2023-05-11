@extends('guias.base')
@section('title')
    Guias - Historial
@endsection
@section('content')
    <p>HISTORIAL</p>
    <div class="flex justify-center">
        <div class="grid grid-cols-4 mx-4">
            @foreach ($reservas as $reserva)
                <a href="#"
                    class="flex flex-col items-center w-3/4 my-2 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900">
                            {{ $reserva->actividad->titulo }}</h5>
                        <p class="mb-3 text-xs text-gray-700 ">Fecha de la reserva:
                            {{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</p>
                        </p>
                        <p class="mb-3 text-xs text-gray-700 ">Hora:
                            {{ \Carbon\Carbon::parse($reserva->hora)->format('h:i') }}</p>
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
        {{ $reservas->links() }}
    </div>

    <div class="timeline"
        style="margin: 0; padding: 0; font-family: var(--font); display: flex; justify-content: center;">
        <div class="outer">
            @foreach ($reservas as $reserva)
            <div class="card">
                <div class="info">
                    <h3 class="title">{{ $reserva->actividad->titulo }}</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat. </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
