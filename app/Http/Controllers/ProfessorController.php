<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Commission;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    // Mostrar todos los profesores
    public function index()
    {
        $professors = Professor::all();
        return view('professors.index', compact('professors'));
    }

    // Mostrar el formulario para crear un nuevo profesor
    public function create()
{
    // Obtener todas las comisiones disponibles
    $commissions = Commission::all();

    // Pasar las comisiones a la vista
    return view('professors.create', compact('commissions'));
}


    // Guardar un nuevo profesor
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'commissions' => 'required|array',  // Asegúrate de que se seleccionen comisiones
        'commissions.*' => 'exists:commissions,id',  // Validamos que las comisiones existan
    ]);

    $professor = Professor::create([
        'name' => $request->name,
    ]);

    // Asignar las comisiones seleccionadas al profesor
    $professor->commissions()->attach($request->commissions);

    return redirect()->route('professors.index')->with('success', 'Profesor creado con éxito.');
}

    // Mostrar el formulario para editar un profesor
    public function edit($id)
    {
        $professor = Professor::findOrFail($id);
        $commissions = Commission::all();
        return view('professors.edit', compact('professor', 'commissions'));
    }

    // Actualizar un profesor existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'commissions' => 'required|array',  // Asegúrate de que se seleccionen comisiones
            'commissions.*' => 'exists:commissions,id',  // Validamos que las comisiones existan
        ]);
    
        $professor = Professor::findOrFail($id);
        $professor->update([
            'name' => $request->name,
        ]);
    
        // Asignar las comisiones seleccionadas al profesor
        $professor->commissions()->sync($request->commissions);
    
        return redirect()->route('professors.index')->with('success', 'Profesor actualizado con éxito.');
    }
    

    // Eliminar un profesor
    public function destroy($id)
    {
        $professor = Professor::findOrFail($id);
        $professor->delete();
        return redirect()->route('professors.index')->with('success', 'Profesor eliminado con éxito.');
    }
}
