@extends('layouts.app')

@section('title', 'Reporte de Cursos por Materia')

@section('content')
<div class="container">
    <a href="{{ route('reports.index') }}" class="btn btn-danger btn-lg">Volver</a>
    <h1 class="text-center mb-4">Reporte de Cursos por Materia</h1>

    @foreach($courses->groupBy('subject.name') as $subject => $coursesInSubject)
        <h3>{{ $subject }}</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Curso</th>
                    <th>Materia</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coursesInSubject as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->subject->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
    <div style="text-align: right; margin-top: 20px;">
        <a href="{{ route('reports.courses.pdf') }}" class="btn btn-primary">
            Generar PDF
        </a>
    </div>
</div>
@endsection
