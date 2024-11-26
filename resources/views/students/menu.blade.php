@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="my-4">Gestión de Estudiantes</h1>
    <div class="d-flex flex-column align-items-center gap-3">
        <a href="{{ route('students.create') }}" class="btn btn-primary btn-lg">Crear Estudiante</a>
        <a href="{{ route('students.index') }}" class="btn btn-secondary btn-lg">Listar y Filtrar Estudiantes</a>
        <a href="{{ route('students.index') }}" class="btn btn-warning btn-lg">Modificar Estudiante</a>
        <a href="{{ route('students.index') }}" class="btn btn-danger btn-lg">Eliminar Estudiante</a>
    </div>
</div>
@endsection
