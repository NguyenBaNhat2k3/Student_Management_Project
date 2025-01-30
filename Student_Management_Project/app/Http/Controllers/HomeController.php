<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() {
        $enrollments = Enrollment::all();
        return view('home.index', compact('enrollments'));
    }

    public function show(string $id)
    {
        //
        $enrollment = Enrollment::where('enrollment_id', $id)->firstOrFail();
        //$student = Student::all();
        $courses = Course::all();
        return view('home.showHome', compact('enrollment','courses'));
    }
}
