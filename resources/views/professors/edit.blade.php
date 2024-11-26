@extends('layouts.app')

@section('title', 'Editar Profesor')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Editar Profesor</h1>
    <form action="{{ route('professors.update', $professor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Profesor</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $professor->name }}" required>
        </div>

        <div class="mb-3">
            <label for="commissions" class="form-label">Seleccionar Comisiones</label>
            <select name="commissions[]" id="commissions" class="form-select" multiple>
                @foreach($commissions as $commission)
                    <option value="{{ $commission->id }}" 
                            {{ $professor->commissions->contains($commission->id) ? 'selected' : '' }}>
                        {{ $commission->aula }} - {{ $commission->horario }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="{{ route('professors.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
