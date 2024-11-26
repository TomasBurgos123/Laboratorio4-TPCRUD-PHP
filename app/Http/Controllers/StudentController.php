<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        // Obtenemos todos los cursos para pasarlos a la vista
        $courses = Course::all();

        // Aplicamos los filtros
        $students = Student::query();

        if ($request->has('name') && $request->name != '') {
            $students = $students->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('course') && $request->course != '') {
            $students = $students->whereHas('courses', function($query) use ($request) {
                $query->where('courses.id', $request->course);
            });
        }

        // Paginar los resultados
        $students = $students->paginate(10);

        return view('students.index', compact('students', 'courses'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
    ]);

    Student::create($request->only(['name', 'email']));

    return redirect()->route('students.index')->with('success', 'Estudiante creado correctamente.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
{
    return view('students.edit', ['student' => $student]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
        ]);
    
        $student->update($request->only(['name', 'email']));
    
        return redirect()->route('students.index')->with('success', 'Estudiante actualizado correctamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
{
    $student->delete();

    return redirect()->route('students.index')->with('success', 'Estudiante eliminado correctamente.');
}

}
