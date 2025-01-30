<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $table = 'enrollments';
    protected  $primaryKey = 'enrollment_id';
    protected $fillable = ['student_id','course_id','enrollment_date','status'];

    public function Student() {
        return $this->belongsTo(Student::class,'student_id','student_id');
    }
    public function Course() {
        return $this->belongsTo(Course::class,'course_id','course_id');
    }
    use HasFactory;
    
}
