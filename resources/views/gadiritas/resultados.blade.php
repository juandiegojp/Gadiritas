@extends('gadiritas.base')
@section('title')
    Gadiritas - Búsqueda
@endsection
@section('content')
    @foreach ($actividades as $actividad)
        <figure class="max-w-lg">
            <img class="h-auto max-w-full rounded-lg" src="/public/images/{{$actividad['id']}}.jpg" alt="image description">
            <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">{{$actividad['id']}}</figcaption>
        </figure>
    @endforeach
@endsection
