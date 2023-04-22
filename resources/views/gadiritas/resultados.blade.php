@extends('gadiritas.base')
@section('title')
    Gadiritas - Búsqueda
@endsection
@section('content')
<div class="grid grid-cols-4 gap-4">
    @foreach ($actividades as $actividad)
    <figure class="max-w-lg">
        <div class="image-wrapper">
            <img class="rounded-lg" src="{{ Vite::asset("resources/images/{$actividad['id']}.jpg") }}"
            alt="{{ $actividad['titulo'] }}">
            <div class="overlay">
                <h3>{{ $actividad['titulo'] }}</h3>
                <a href="#">Ver detalles</a>
            </div>
        </div>
        <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">{{ $actividad['titulo'] }}</figcaption>
    </figure>
    @endforeach
</div>
@endsection
