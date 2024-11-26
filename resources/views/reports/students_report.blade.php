@extends('layouts.app')

@section('title', 'Reporte de Estudiantes Inscritos')

@section('content')
<div class="container">
    <a href="{{ route('reports.index') }}" class="btn btn-danger btn-lg">Volver</a>
    <h1 class="text-center mb-4">Reporte de Estudiantes Inscritos</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Cursos</th>
                <th>Comisiones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        @foreach($student->courses as $course)
                            {{ $course->name }}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($student->commissions as $commission)
                            {{ $commission->aula }} ({{ $commission->horario }})<br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: right; margin-top: 20px;">
        <a href="{{ route('reports.students.pdf') }}" class="btn btn-primary">
            Generar PDF
        </a>
    </div>
</div>
@endsection
