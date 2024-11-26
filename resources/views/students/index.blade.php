@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('welcome') }}" class="btn btn-danger btn-lg">Volver</a>
    <h1>Lista de Estudiantes</h1>

    <!-- Formulario de filtrado -->
    <form method="GET" action="{{ route('students.index') }}" class="mb-3">
        <input type="text" name="name" placeholder="Buscar por nombre" value="{{ request('name') }}">
        <select name="course">
            <option value="">Todos los cursos</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ request('course') == $course->id ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>

    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Crear Estudiante</a>

    <!-- Tabla de estudiantes -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('students.destroy', $student) }}" method="POST" style="display: inline-block;">
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
    {{ $students->links() }}
</div>
@endsection
