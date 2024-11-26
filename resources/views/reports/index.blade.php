@extends('layouts.app')

@section('title', 'Reportes')

@section('content')
<div class="container">
    <a href="{{ route('welcome') }}" class="btn btn-danger btn-lg">Volver</a>
    <h1 class="text-center mb-4">Gestión de Reportes</h1>

    <div class="row">
        <!-- Reporte de Estudiantes Inscritos -->
        <div class="col-md-6 mb-4">
            <h2>Reporte de Estudiantes Inscritos</h2>
            <a href="{{ route('reports.students') }}" class="btn btn-primary btn-lg btn-block">Ver Reporte</a>
        </div>

        <!-- Reporte de Cursos por Materia -->
        <div class="col-md-6 mb-4">
            <h2>Reporte de Cursos por Materia</h2>
            <a href="{{ route('reports.courses_by_subject') }}" class="btn btn-primary btn-lg btn-block">Ver Reporte</a>
        </div>
    </div>

    <div class="row">
        <!-- Reporte de Comisiones y Horarios -->
        <div class="col-md-6 mb-4">
            <h2>Reporte de Comisiones y Horarios</h2>
            <a href="{{ route('reports.commissions_and_schedules') }}" class="btn btn-primary btn-lg btn-block">Ver Reporte</a>
        </div>

        <!-- Reporte de Asistencia de Profesores -->
        <div class="col-md-6 mb-4">
            <h2>Reporte de Asistencia de Profesores</h2>
            <a href="{{ route('reports.professors_attendance') }}" class="btn btn-primary btn-lg btn-block">Ver Reporte</a>
        </div>
    </div>
</div>
@endsection
