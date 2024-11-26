@extends('layouts.app')

@section('title', 'Comisiones')

@section('content')
<div class="container">
    <a href="{{ route('welcome') }}" class="btn btn-danger btn-lg">Volver</a>
    <h1 class="text-center mb-4">Gestión de Comisiones</h1>
    <a href="{{ route('commissions.create') }}" class="btn btn-primary mb-3">Crear Nueva Comisión</a>
    
    <!-- Filtros -->
    <form method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <select name="course_id" class="form-select">
                    <option value="">Seleccionar Curso</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" name="horario" class="form-control" placeholder="Filtrar por horario" value="{{ request('horario') }}">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-secondary">Filtrar</button>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aula</th>
                <th>Horario</th>
                <th>Curso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commissions as $commission)
            <tr>
                <td>{{ $commission->id }}</td>
                <td>{{ $commission->aula }}</td>
                <td>{{ $commission->horario }}</td>
                <td>{{ $commission->course->name }}</td>
                <td>
                    <a href="{{ route('commissions.edit', $commission->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('commissions.destroy', $commission->id) }}" method="POST" style="display: inline-block;">
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
