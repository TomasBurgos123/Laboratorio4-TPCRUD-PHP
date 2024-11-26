<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');  // Asignamos un nombre a la ruta 'welcome'

Route::resource('students', StudentController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('courses', CourseController::class);
Route::resource('commissions', CommissionController::class);
Route::resource('professors', ProfessorController::class);
Route::resource('course_students', CourseStudentController::class);


Route::get('/reports/students', [ReportController::class, 'students'])->name('reports.students');
Route::get('/reports/courses-by-subject', [ReportController::class, 'coursesBySubject'])->name('reports.courses_by_subject');
Route::get('/reports/commissions-and-schedules', [ReportController::class, 'commissionsAndSchedules'])->name('reports.commissions_and_schedules');
Route::get('/reports/professors-attendance', [ReportController::class, 'professorsAttendance'])->name('reports.professors_attendance');
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
// Ruta para exportar reportes
    
Route::get('/reports/students/pdf', [ReportController::class, 'studentsReportPdf'])->name('reports.students.pdf');
Route::get('/reports/courses/pdf', [ReportController::class, 'coursesBySubjectReportPdf'])->name('reports.courses.pdf');
Route::get('/reports/commissions/pdf', [ReportController::class, 'commissionsAndSchedulesReportPdf'])->name('reports.commissions.pdf');
Route::get('/reports/professors/pdf', [ReportController::class, 'professorsAttendanceReportPdf'])->name('reports.professors.pdf');


