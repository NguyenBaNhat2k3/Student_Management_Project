<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected  $primaryKey = 'student_id';
    protected $fillable = ['full_name','date_of_birth','email','phone_number'];

    public function payments()
    {
        return $this->hasMany(Payment::class,'student_id');
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class,'student_id');
    }
}
