@extends('gadiritas.base')
@section('title')
    Gadiritas - Búsqueda
@endsection
@section('content')
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Precio</th>
                <th>Duración</th>
                <th>Máx. Personas</th>
                <th>Guía ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actividades as $actividad)
                <tr>
                    <td>{{ $actividad['titulo'] }}</td>
                    <td>{{ $actividad['precio'] }}</td>
                    <td>{{ $actividad['duracion'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
