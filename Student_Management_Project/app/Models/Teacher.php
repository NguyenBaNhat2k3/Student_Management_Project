<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected  $primaryKey = 'teacher_id';
    protected $fillable = ['full_name','email','phone','subject'];

    public function courses()
    {
        return $this->hasMany(Course::class,'course_id');
    }

    
}
