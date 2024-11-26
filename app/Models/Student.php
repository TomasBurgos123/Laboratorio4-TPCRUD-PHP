<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    // Relación muchos a muchos con Course a través de course_student
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_students')
                    ->withPivot('commission_id')
                    ->withTimestamps();
    }

    // Relación muchos a muchos con Commission a través de course_student
    public function commissions()
    {
        return $this->belongsToMany(Commission::class, 'course_students')
                    ->withTimestamps();
    }
}
