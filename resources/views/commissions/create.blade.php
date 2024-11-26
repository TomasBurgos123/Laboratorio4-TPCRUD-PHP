@extends('layouts.app')

@section('title', 'Crear Comisión')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Crear Nueva Comisión</h1>
    <form action="{{ route('commissions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="aula" class="form-label">Aula</label>
            <input type="text" class="form-control" id="aula" name="aula" required>
        </div>
        <div class="mb-3">
            <label for="horario" class="form-label">Horario</label>
            <input type="text" class="form-control" id="horario" name="horario" required>
        </div>
        <div class="mb-3">
            <label for="course_id" class="form-label">Curso</label>
            <select class="form-select" id="course_id" name="course_id" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('commissions.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
