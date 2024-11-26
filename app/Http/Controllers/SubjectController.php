<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // Mostrar todas las materias
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    // Mostrar el formulario para crear una materia
    public function create()
    {
        return view('subjects.create');
    }

    // Guardar una nueva materia
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Subject::create($request->all());
        return redirect()->route('subjects.index')->with('success', 'Materia creada con éxito.');
    }

    // Mostrar el formulario para editar una materia
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject'));
    }

    // Actualizar una materia existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($request->all());
        return redirect()->route('subjects.index')->with('success', 'Materia actualizada con éxito.');
    }

    // Eliminar una materia
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Materia eliminada con éxito.');
    }
}
