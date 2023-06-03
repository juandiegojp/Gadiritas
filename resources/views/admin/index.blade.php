@extends('admin.base')
@section('title')
    Admin | Home
@endsection
@section('content')
    @foreach ($comentariosPorActividad as $comentarioActividad)
        @php
            $porcentajePositivos = ($comentarioActividad->positivos / $comentarioActividad->total) * 100;
        @endphp
        @if ($porcentajePositivos < 50)
            <div id="alert-{{$comentarioActividad->actividad->id}}"
                class="flex p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    <span class="underline">{{$comentarioActividad->actividad->titulo}}</span>: Esta actividad tiene una media negativa. Revisa su sección de comentarios.
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-{{$comentarioActividad->actividad->id}}" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif
    @endforeach

    <div class="grid grid-cols-2 gap-4 max-[785px]:grid-cols-1">
        <div class="p-5 mb-4 border border-gray-100 rounded-lg bg-gray-50">
            <h2 class="mb-4 text-2xl font-semibold text-center underline">Nuevos usuarios</h2>
            @forelse($usuarios as $usuario)
                <time
                    class="text-lg font-semibold text-gray-900">{{ Carbon\Carbon::parse($usuario->created_at)->isSameAs('d', Carbon\Carbon::now()) ? 'Hoy' : Carbon\Carbon::parse($usuario->created_at)->diffForHumans(['parts' => 1]) }}</time>
                <ol class="mt-3 divide-y divider-gray-200">
                    <li>
                        <a href="{{ route('admin.datellesUsuario', $usuario->id) }}"
                            class="items-center block p-3 text-gray-600 sm:flex hover:bg-gray-100">
                            <div class="text-base font-normal"> Se ha unido <span
                                    class="text-black underline">{{ ucfirst($usuario->name) }}
                                    {{ ucfirst($usuario->apellidos) }}</span> a nuestra aplicación.
                            </div>
                        </a>
                    </li>
                </ol>
            @empty
                <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900">
                    No se ha registrado hoy ningún usuario nuevo.</h1>
            @endforelse
            {{ $usuarios->links() }}
        </div>
        <div class="p-5 mb-4 border border-gray-100 rounded-lg bg-gray-50">
            <h2 class="mb-4 text-2xl font-semibold text-center underline">Nuevas reservas</h2>
            @forelse($reservas as $reserva)
                <time
                    class="text-lg font-semibold text-gray-900">{{ Carbon\Carbon::parse($reserva->created_at)->isSameAs('d', Carbon\Carbon::now()) ? 'Hoy' : Carbon\Carbon::parse($reserva->created_at)->diffForHumans(['parts' => 1]) }}</time>
                <ol class="mt-3 divide-y divider-gray-200">
                    <li>
                        <button type="button"
                            class="block p-3 text-gray-600 pointer-events-none sm:flex hover:bg-gray-100">
                            <div class="text-base font-normal">{{ $reserva->user->name }} {{ $reserva->user->apellidos }}
                                ha
                                reservado la actividad <span
                                    class="text-black underline">{{ ucfirst($reserva->actividad->titulo) }}</span>.
                            </div>
                        </button>
                    </li>
                </ol>
            @empty
                <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900">
                    No se ha creado hoy ninguna reserva nueva.</h1>
            @endforelse
            {{ $reservas->links() }}
        </div>
        <div class="p-5 mb-4 border border-gray-100 rounded-lg bg-gray-50">
            <h2 class="mb-4 text-2xl font-semibold text-center underline">Comentarios denunciados</h2>
            @forelse($usuarios as $usuario)
                <time
                    class="text-lg font-semibold text-gray-900">{{ Carbon\Carbon::parse($usuario->created_at)->isSameAs('d', Carbon\Carbon::now()) ? 'Hoy' : Carbon\Carbon::parse($usuario->created_at)->diffForHumans(['parts' => 1]) }}</time>
                <ol class="mt-3 divide-y divider-gray-200">
                    <li>
                        <a href="{{ route('admin.datellesUsuario', $usuario->id) }}"
                            class="items-center block p-3 text-gray-600 sm:flex hover:bg-gray-100">
                            <div class="text-base font-normal"> Se ha unido <span
                                    class="text-black underline">{{ ucfirst($usuario->name) }}
                                    {{ ucfirst($usuario->apellidos) }}</span> a nuestra aplicación.
                            </div>
                        </a>
                    </li>
                </ol>
            @empty
                <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900">
                    No se ha registrado hoy ningún usuario nuevo.</h1>
            @endforelse

        </div>
        <div class="p-5 mb-4 border border-gray-100 rounded-lg bg-gray-50">
            <h2 class="mb-4 text-2xl font-semibold text-center underline">Reservas canceladas</h2>
            @forelse($reservasCanceladas as $reserva)
                <time
                    class="text-lg font-semibold text-gray-900">{{ Carbon\Carbon::parse($reserva->created_at)->isSameAs('d', Carbon\Carbon::now()) ? 'Hoy' : Carbon\Carbon::parse($reserva->created_at)->diffForHumans(['parts' => 1]) }}</time>
                <ol class="mt-3 divide-y divider-gray-200">
                    <li>
                        <button type="button"
                            class="block p-3 text-gray-600 pointer-events-none sm:flex hover:bg-gray-100">
                            <div class="text-base font-normal">{{ $reserva->user->name }} {{ $reserva->user->apellidos }}
                                ha
                                reservado la actividad <span
                                    class="text-black underline">{{ ucfirst($reserva->actividad->titulo) }}</span>.
                            </div>
                        </button>
                    </li>
                </ol>
            @empty
                <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900">
                    No se ha cancelado ninguna reserva hoy.</h1>
            @endforelse
            {{ $reservasCanceladas->links() }}
        </div>
    </div>
@endsection
