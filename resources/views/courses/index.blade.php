@extends('layouts.app')

@section('title', 'Cursos')

@section('content')
<div class="container">
    <a href="{{ route('welcome') }}" class="btn btn-danger btn-lg">Volver</a>
    <h1 class="text-center mb-4">Gestión de Cursos</h1>

    <!-- Formulario de filtrado -->
    <form method="GET" action="{{ route('courses.index') }}" class="mb-3">
        <select name="subject" class="form-control">
            <option value="">Filtrar por materia</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>
                    {{ $subject->name }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary mt-2">Filtrar</button>
    </form>

    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Crear Nuevo Curso</a>

    <!-- Tabla de cursos -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Materia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->subject->name }}</td>
                <td>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    {{ $courses->links() }}
</div>
@endsection
