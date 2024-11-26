<?php

// app/Models/CourseStudents.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudents extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'course_id', 'commission_id'];

    // Relación con el modelo Student (un CourseStudents pertenece a un estudiante)
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // Relación con el modelo Course (un CourseStudents pertenece a un curso)
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Relación con el modelo Commission (un CourseStudents pertenece a una comisión)
    public function commission()
    {
        return $this->belongsTo(Commission::class, 'commission_id');
    }
}


