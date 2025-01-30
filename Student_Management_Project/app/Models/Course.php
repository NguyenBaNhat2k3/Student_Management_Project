<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected  $primaryKey = 'course_id';
    protected $fillable = ['course_name','description','credits','teacher_id'];

    public function teacher() {
        return $this->belongsTo(Teacher::class,'teacher_id','teacher_id');
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class,'course_id','course_id');
    }
}
