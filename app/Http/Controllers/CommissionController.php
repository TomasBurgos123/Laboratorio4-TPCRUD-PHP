<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Course;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    // Mostrar todas las comisiones
    public function index(Request $request)
    {
        // Obtener los cursos para el filtro
        $courses = Course::all();

        // Filtrar las comisiones según el curso y el horario
        $commissions = Commission::query();

        if ($request->has('course_id') && $request->course_id != '') {
            $commissions = $commissions->where('course_id', $request->course_id);
        }

        if ($request->has('horario') && $request->horario != '') {
            $commissions = $commissions->where('horario', 'like', '%' . $request->horario . '%');
        }

        // Obtener las comisiones con paginación
        $commissions = $commissions->paginate(10);

        return view('commissions.index', compact('commissions', 'courses'));
    }

    // Mostrar el formulario para crear una comisión
    public function create()
    {
        $courses = Course::all();
        return view('commissions.create', compact('courses'));
    }

    // Guardar una nueva comisión
    public function store(Request $request)
    {
        $request->validate([
            'aula' => 'required|string|max:255',
            'horario' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        Commission::create($request->all());
        return redirect()->route('commissions.index')->with('success', 'Comisión creada con éxito.');
    }

    // Mostrar el formulario para editar una comisión
    public function edit($id)
    {
        $commission = Commission::findOrFail($id);
        $courses = Course::all();
        return view('commissions.edit', compact('commission', 'courses'));
    }

    // Actualizar una comisión existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'aula' => 'required|string|max:255',
            'horario' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        $commission = Commission::findOrFail($id);
        $commission->update($request->all());
        return redirect()->route('commissions.index')->with('success', 'Comisión actualizada con éxito.');
    }

    // Eliminar una comisión
    public function destroy($id)
    {
        $commission = Commission::findOrFail($id);
        $commission->delete();
        return redirect()->route('commissions.index')->with('success', 'Comisión eliminada con éxito.');
    }
}
