@extends('layouts.app')

@section('title', 'Editar Inscripción')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Editar Inscripción</h1>
    <form action="{{ route('course_students.update', $inscription->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="student_id" class="form-label">Estudiante</label>
            <select name="student_id" id="student_id" class="form-select" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $student->id == $inscription->student_id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="course_id" class="form-label">Curso</label>
            <select name="course_id" id="course_id" class="form-select" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $inscription->course_id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="commission_id" class="form-label">Comisión</label>
            <select name="commission_id" id="commission_id" class="form-select" required>
                @foreach($commissions as $commission)
                    <option value="{{ $commission->id }}" {{ $commission->id == $inscription->commission_id ? 'selected' : '' }}>
                        {{ $commission->aula }} - {{ $commission->horario }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('course_students.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
