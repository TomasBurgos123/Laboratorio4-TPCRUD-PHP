@extends('layouts.app')

@section('title', 'Reporte de Asistencia de Profesores')

@section('content')
<div class="container">
    <a href="{{ route('reports.index') }}" class="btn btn-danger btn-lg">Volver</a>
    <h1 class="text-center mb-4">Reporte de Asistencia de Profesores</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Profesor</th>
                <th>Comisiones Asignadas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($professors as $professor)
                <tr>
                    <td>{{ $professor->id }}</td>
                    <td>{{ $professor->name }}</td>
                    <td>
                        @foreach($professor->commissions as $commission)
                            {{ $commission->course->name }} ({{ $commission->aula }})<br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center mt-4">
        <a href="{{ route('reports.professors.pdf') }}" class="btn btn-primary">
            Generar PDF
        </a>
    </div>
</div>
@endsection
