@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
<div class="container text-center">
    <h1 class="mt-5">Bienvenido al Sistema de Gestión Escolar</h1>
    <p class="mb-5">Este es el sistema de gestión escolar donde puedes administrar estudiantes, materias, cursos, comisiones, profesores e inscripciones.</p>

    <h3>Opciones de Navegación</h3>

    <div class="d-grid gap-3 mt-4">
        <!-- Botón para Estudiantes -->
        <a href="{{ route('students.index') }}" class="btn btn-primary btn-lg shadow-lg">
            <i class="bi bi-person-circle"></i> Estudiantes
        </a>
        
        <!-- Botón para Materias -->
        <a href="{{ route('subjects.index') }}" class="btn btn-success btn-lg shadow-lg">
            <i class="bi bi-book-half"></i> Materias
        </a>
        
        <!-- Botón para Cursos -->
        <a href="{{ route('courses.index') }}" class="btn btn-info btn-lg shadow-lg">
            <i class="bi bi-journal-bookmark"></i> Cursos
        </a>
        
        <!-- Botón para Comisiones -->
        <a href="{{ route('commissions.index') }}" class="btn btn-warning btn-lg shadow-lg">
            <i class="bi bi-file-earmark-earphones"></i> Comisiones
        </a>
        
        <!-- Botón para Profesores -->
        <a href="{{ route('professors.index') }}" class="btn btn-danger btn-lg shadow-lg">
            <i class="bi bi-person-workspace"></i> Profesores
        </a>
        
        <!-- Botón para Inscripciones -->
        <a href="{{ route('course_students.index') }}" class="btn btn-dark btn-lg shadow-lg">
            <i class="bi bi-person-check"></i> Inscripciones
        </a>
        <a href="{{ route('reports.index') }}" class="btn btn-secondary btn-lg">
            <i class="fas fa-file-alt"></i> Reportes
        </a>
    </div>
</div>
@endsection
