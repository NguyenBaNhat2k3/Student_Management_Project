<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('teachers.index',['teachers' => Teacher::orderBy('teacher_id','desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'email' => 'required',
            'phone' => 'required'
        ]);
        $fullname = $request->input('full_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $subject = $request->input('subject');
        
        DB::table('teachers')->insert([
            'full_name' => $fullname,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
        ]);

        return redirect()->route('teachers.index')->with('success','You was create new teacher');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('teachers.show', ['teacher' => Teacher::where('teacher_id',$id)->firstOrFail()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $teacher = Teacher::find($id);
        return view('teachers.edit',compact('teacher'))->with('success', 'successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'email' => 'required',
            'phone' => 'required'
        ]);
        $fullname = $request->input('full_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $subject = $request->input('subject');

        DB::table('teachers')->where('teacher_id',$id)->update([
            'full_name' => $fullname,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
        ]);

        return redirect()->route('teachers.index', $id)->with('success','You was update teacher');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // Tìm giáo viên dựa trên teacher_id
    $teacher = Teacher::where('teacher_id', $id)->first();

    if ($teacher) 
    {
        // Duyệt qua tất cả các khóa học của giáo viên
        foreach ($teacher->courses as $course) {
            // Xóa tất cả các enrollments liên quan đến khóa học
            $course->enrollments()->delete(); // Đảm bảo enrollments được xóa trước
        }

        // Sau khi xóa enrollments, xóa tất cả các khóa học
        $teacher->courses()->delete(); // Xóa tất cả khóa học của giáo viên
        
        // Cuối cùng, xóa giáo viên
        $teacher->delete();

        // Trả về thông báo thành công
        return redirect()->route('teachers.index')->with('success', 'Teacher and related courses/enrollments deleted successfully.');
    }

    // Trả về thông báo lỗi nếu không tìm thấy giáo viên
    return redirect()->route('teachers.index')->with('error', 'Teacher not found.');
}

}
