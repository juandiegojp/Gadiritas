@extends('admin.base')
@section('title')
    Admin | Home
@endsection
@section('content')
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
                            <div class="text-base font-normal">{{ $reserva->user->name }} {{ $reserva->user->apellidos }} ha
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
            {{ $usuarios->links() }}
        </div>
        <div class="p-5 mb-4 border border-gray-100 rounded-lg bg-gray-50">
            <h2 class="mb-4 text-2xl font-semibold text-center underline">Reservas canceladas</h2>
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
    </div>
@endsection
