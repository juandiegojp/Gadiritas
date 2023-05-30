@extends('admin.base')
@section('title')
    Admin | Home
@endsection
@section('content')
<div class="flex items-start justify-between">
    <div class="w-1/2 p-5 mb-4 border border-gray-100 rounded-lg bg-gray-50">
        <h2 class="mb-4 text-2xl font-semibold text-center underline">Nuevos usuarios</h2>
        @forelse($usuarios as $usuario)
            <time
                class="text-lg font-semibold text-gray-900">{{ Carbon\Carbon::parse($usuario->created_at)->isSameAs('d', Carbon\Carbon::now()) ? 'Hoy' : Carbon\Carbon::parse($usuario->created_at)->diffForHumans(['parts' => 1]) }}</time>
            <ol class="mt-3 divide-y divider-gray-200">
                <li>
                    <a href="{{route('admin.datellesUsuario', $usuario->id)}}" class="items-center block p-3 text-gray-600 sm:flex hover:bg-gray-100">
                        <div class="text-base font-normal"> Se ha unido <span class="text-black underline">{{ ucfirst($usuario->name) }} {{ ucfirst($usuario->apellidos) }}</span> a nuestra aplicación.
                        </div>
                    </a>
                </li>
            </ol>
        @empty
            <h1
                class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                No se ha creado ningún usuario.</h1>
        @endforelse
        {{$usuarios->links()}}
    </div>
    <div class="w-1/2 p-5 mb-4 border border-gray-100 rounded-lg bg-gray-50">
        <h2 class="mb-4 text-2xl font-semibold text-center underline">Nuevas reservas</h2>
        @forelse($reservas as $reserva)
            <time
                class="text-lg font-semibold text-gray-900">{{ Carbon\Carbon::parse($reserva->created_at)->isSameAs('d', Carbon\Carbon::now()) ? 'Hoy' : Carbon\Carbon::parse($reserva->created_at)->diffForHumans(['parts' => 1]) }}</time>
            <ol class="mt-3 divide-y divider-gray-200">
                <li>
                    <button type="button" class="block p-3 text-gray-600 pointer-events-none sm:flex hover:bg-gray-100">
                        <div class="text-base font-normal">{{$reserva->user->name}} {{$reserva->user->apellidos}} ha reservado la actividad <span class="text-black underline">{{ ucfirst($reserva->actividad->titulo) }}</span>.
                        </div>
                    </button>
                </li>
            </ol>
        @empty
            <h1
                class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                No se ha creado ninguna reserva.</h1>
        @endforelse
        {{$reservas->links()}}
    </div>
</div>
@endsection
