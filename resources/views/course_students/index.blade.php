@extends('layouts.app')

@section('title', 'Inscripciones de Estudiantes')

@section('content')
<div class="container">
    <a href="{{ route('welcome') }}" class="btn btn-danger btn-lg">Volver</a>
    <h1 class="text-center mb-4">Inscripciones de Estudiantes</h1>
    <a href="{{ route('course_students.create') }}" class="btn btn-primary mb-3">Crear Nueva Inscripción</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Estudiante</th>
                <th>Curso</th>
                <th>Comisión</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inscriptions as $inscription)
            <tr>
                <td>{{ $inscription->id }}</td>
                <td>{{ $inscription->student->name }}</td>
                <td>{{ $inscription->course->name }}</td>
                <td>{{ $inscription->commission->aula }} - {{ $inscription->commission->horario }}</td>
                <td>
                    <a href="{{ route('course_students.edit', $inscription->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('course_students.destroy', $inscription->id) }}" method="POST" style="display: inline-block;">
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
