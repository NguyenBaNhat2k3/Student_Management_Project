<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teacher = Teacher::all();
        $courses = Course::orderBy('course_id','desc')->paginate(10);
        return view('courses.index',compact('teacher','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $teacher = Teacher::all();
        return view('courses.create', compact('teacher'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        Course::create($input);
        return redirect()->route('courses.index')->with('success','new create a course successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $course = Course::find($id);
        $teachers = Teacher::all();
        return view('courses.show', compact('course','teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $course = Course::find($id);
        $teachers = Teacher::all();
        return view('courses.edit', compact('course','teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $courses = Course::find($id);
        $input = $request->all();
        $courses->update($input);
        return redirect('courses')->with('success','Edit course successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $course = Course::find($id);
        $course->enrollments()->delete();
        Course::destroy($id);
        return redirect('courses')->with('success','Delete course successfully');
    }
}
