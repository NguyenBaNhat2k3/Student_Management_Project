<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index()
    {
        //
        $enrollments = Enrollment::orderBy('enrollment_id','desc')->paginate(10);
        $students = Student::all();
        $courses = Course::all();
        return view('enrollments.index', compact('enrollments','students','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $students = Student::all();
        $courses = Course::all();
        return view('enrollments.create', compact('students','courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        Enrollment::create($input);
        return redirect('enrollments')->with('success','Create enrollment successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $enrollment = Enrollment::where('enrollment_id', $id)->firstOrFail();
        //$student = Student::all();
        $courses = Course::all();
        return view('enrollments.show', compact('enrollment','courses'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $enrollment = Enrollment::where('enrollment_id', $id)->firstOrFail();
        $students = Student::all();
        $courses = Course::all();
        return view('enrollments.edit', compact('enrollment','students','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $enrollments = Enrollment::where('enrollment_id', $id)->firstOrFail();

        $request->validate([
            'student_id' => 'required|exists:students,student_id', // phải có student_id hợp lệ
            'course_id' => 'required|exists:courses,course_id', // phải có course_id hợp lệ
            'enrollment_date' => 'required|date', // ngày phải hợp lệ
            'status' => 'required|in:active,completed,dropped', // trạng thái phải nằm trong các lựa chọn hợp lệ
        ]);

        //$input = $request->all();
        $input = $request->only(['student_id', 'course_id', 'enrollment_date', 'status']);
        $enrollments->update($input);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $issue = Enrollment::where('enrollment_id', $id)->delete();
        return redirect('enrollments')->with('success','Delete enrollment successfully');
    }
}
