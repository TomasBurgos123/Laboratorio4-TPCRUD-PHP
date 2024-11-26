@extends('layouts.app')

@section('title', 'Profesores')

@section('content')
<div class="container">
    <a href="{{ route('welcome') }}" class="btn btn-danger btn-lg">Volver</a>
    <h1 class="text-center mb-4">Gestión de Profesores</h1>
    <a href="{{ route('professors.create') }}" class="btn btn-primary mb-3">Crear Nuevo Profesor</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Comisiones</th> <!-- Nueva columna para comisiones -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($professors as $professor)
            <tr>
                <td>{{ $professor->id }}</td>
                <td>{{ $professor->name }}</td>
                <td>
                    @foreach($professor->commissions as $commission)
                        <span>{{ $commission->aula }} - {{ $commission->horario }}</span><br>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('professors.destroy', $professor->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
