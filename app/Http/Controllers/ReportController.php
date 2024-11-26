<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Student;
use App\Models\Course;
use App\Models\Commission;
use App\Models\Professor;

class ReportController extends Controller
{
    // Vista principal con los botones de reportes
    public function index()
    {
        return view('reports.index');
    }

    // Reporte de estudiantes inscritos con los cursos y comisiones
    public function students()
    {
        $students = Student::with(['courses', 'commissions'])->get(); // Obtener los estudiantes con sus cursos y comisiones
        return view('reports.students_report', compact('students'));
    }

    // Reporte de cursos por materia
    public function coursesBySubject()
    {
        $courses = Course::with('subject')->get(); // Obtener los cursos con sus respectivas materias
        return view('reports.courses_by_subject_report', compact('courses'));
    }

    // Reporte de comisiones y horarios
    public function commissionsAndSchedules()
{
    // Cargar las comisiones con sus cursos y profesores relacionados
    $commissions = Commission::with(['professors', 'course'])->get();
    return view('reports.commissions_and_schedules_report', compact('commissions'));
}

    // Reporte de asistencia de profesores con las comisiones asignadas
    public function professorsAttendance()
    {
        $professors = Professor::with('commissions')->get(); // Obtener los profesores con sus comisiones
        return view('reports.professors_attendance_report', compact('professors'));
    }

    // Método para generar PDF
 
    public function studentsReportPdf()
{
    $students = Student::with(['courses', 'commissions'])->get();
    $pdf = Pdf::loadView('pdf.students_report', compact('students'));
    return $pdf->download('reporte_estudiantes.pdf');
}

public function coursesBySubjectReportPdf()
{
    $courses = Course::with('subject')->get();
    $pdf = Pdf::loadView('pdf.courses_by_subject_report', compact('courses'));
    return $pdf->download('reporte_cursos.pdf');
}

public function commissionsAndSchedulesReportPdf()
{
    $commissions = Commission::with(['professors', 'course'])->get();
    $pdf = Pdf::loadView('pdf.commissions_and_schedules_report', compact('commissions'));
    return $pdf->download('reporte_comisiones.pdf');
}

public function professorsAttendanceReportPdf()
{
    $professors = Professor::with('commissions')->get();
    $pdf = Pdf::loadView('pdf.professors_attendance_report', compact('professors'));
    return $pdf->download('reporte_profesores.pdf');
}
}
