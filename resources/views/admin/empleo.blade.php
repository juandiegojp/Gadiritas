@extends('admin.base')
@section('title')
    Admin | Empleo
@endsection
@section('content')
    <h1>List of CVs</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cvs as $cv)
                <tr>
                    <td>{{ $cv->nombre }}</td>
                    <td>{{ $cv->correo }}</td>
                    <td>
                        <a href="{{ route('admin.cvs.download', $cv->id) }}">Descargar CV</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
