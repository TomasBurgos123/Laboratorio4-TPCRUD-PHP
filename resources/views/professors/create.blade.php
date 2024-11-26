@extends('layouts.app')

@section('title', 'Crear Profesor')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Crear Nuevo Profesor</h1>
    <form action="{{ route('professors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Profesor</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="commissions" class="form-label">Seleccionar Comisiones</label>
            <select name="commissions[]" id="commissions" class="form-select" multiple>
                @foreach($commissions as $commission)
                    <option value="{{ $commission->id }}">{{ $commission->aula }} - {{ $commission->horario }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('professors.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
