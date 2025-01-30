<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected  $primaryKey = 'payment_id';
    protected $fillable = ['student_id','amount','payment_date','payment_method'];

    public function student() {
        return $this->belongsTo(Student::class,'student_id','student_id');
    }

}
