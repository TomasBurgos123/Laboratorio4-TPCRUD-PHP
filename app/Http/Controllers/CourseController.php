<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Mostrar todos los cursos
    public function index(Request $request)
    {
        // Obtener todas las materias para pasarlas al filtro
        $subjects = Subject::all();

        // Filtrar los cursos por materia si se ha seleccionado alguna
        $courses = Course::query();

        if ($request->has('subject') && $request->subject != '') {
            $courses = $courses->where('subject_id', $request->subject);
        }

        // Obtener los cursos paginados
        $courses = $courses->paginate(10);

        return view('courses.index', compact('courses', 'subjects'));
    }

    // Mostrar el formulario para crear un curso
    public function create()
    {
        $subjects = Subject::all();
        return view('courses.create', compact('subjects'));
    }

    // Guardar un nuevo curso
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Curso creado con éxito.');
    }

    // Mostrar el formulario para editar un curso
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $subjects = Subject::all();
        return view('courses.edit', compact('course', 'subjects'));
    }

    // Actualizar un curso existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $course = Course::findOrFail($id);
        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Curso actualizado con éxito.');
    }

    // Eliminar un curso
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Curso eliminado con éxito.');
    }
}
