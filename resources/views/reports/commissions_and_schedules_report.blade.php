@extends('layouts.app')

@section('title', 'Reporte de Comisiones y Horarios')

@section('content')
<div class="container">
    <a href="{{ route('reports.index') }}" class="btn btn-danger btn-lg">Volver</a>
    <h1 class="text-center mb-4">Reporte de Comisiones y Horarios</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aula</th>
                <th>Horario</th>
                <th>Profesores</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commissions as $commission)
                <tr>
                    <td>{{ $commission->id }}</td>
                    <td>{{ $commission->aula }}</td>
                    <td>{{ $commission->horario }}</td>
                    <td>
                        @foreach ($commission->professors as $professor)
                            <span>{{ $professor->name }}</span><br>
                        @endforeach
                    </td>
                    <td>{{ $commission->course->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: right; margin-top: 20px;">
        <a href="{{ route('reports.commissions.pdf') }}" class="btn btn-primary">
            Generar PDF
        </a>
    </div>
</div>
@endsection
