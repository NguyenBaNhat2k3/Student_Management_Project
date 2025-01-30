<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::orderBy('student_id','desc')->paginate(10);
        return view('students.index', compact('students'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //$students = Student::pluck('full_name','student_id');
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'email' => 'required|email|unique:students,email',
            'phone_number' => 'required|unique:students,phone_number',
        ]);
        $full_name = $request->input('full_name');
        $date_of_birth = $request->input('date_of_birth');
        $email = $request->input('email');
        $phone_number = $request->input('phone_number');


        DB::table('students')->insert([
            'full_name' => $full_name,
            'date_of_birth' => $date_of_birth,
            'email' => $email,
            'phone_number' => $phone_number,

        ]);

        return redirect()->route('students.index')->with('success','success add new student successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $student = Student::where('student_id', $id)->firstOrFail();
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $student = Student::where('student_id', $id)->firstOrFail();
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'email' => 'required',
            'phone_number' => 'required',
        ]);
        $full_name = $request->input('full_name');
        $date_of_birth = $request->input('date_of_birth');
        $email = $request->input('email');
        $phone_number = $request->input('phone_number');

        DB::table('students')->where('student_id', $id)->update([
            'full_name' => $full_name,
            'date_of_birth' => $date_of_birth,
            'email' => $email,
            'phone_number' => $phone_number,

        ]);
        
        return redirect()->route('students.index')->with('success','success add new student successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = Student::where('student_id', $id)->first();

        if ($student) 
        {
            // Xóa tất cả các payment liên quan
            $student->payments()->delete();
            
            $student->enrollments()->delete();
            // Sau đó xóa student
            $student->delete();

            return redirect()->route('students.index')->with('success', 'Successfully deleted student and related payments.');
        }

        return redirect()->route('students.index')->with('error', 'Student not found.');
    }
}
