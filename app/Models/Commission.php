<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    protected $fillable = ['aula', 'horario', 'course_id'];

    // Relación muchos a uno con Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relación muchos a muchos con Student a través de course_student
    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_students')
                    ->withTimestamps();
    }

    // Relación uno a muchos con Professor
    public function professors()
    {
        return $this->belongsToMany(Professor::class, 'commission_professor')
                    ->withTimestamps();
    }
}
