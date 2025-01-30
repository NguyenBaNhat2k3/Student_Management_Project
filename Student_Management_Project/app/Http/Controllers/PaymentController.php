<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::all();
        $payments = Payment::orderBy('payment_id','desc')->paginate(10);
        return view('payments.index')->with('students', $students)->with('payments', $payments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $students = Student::all();
        return view('payments.create')->with('students', $students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        Payment::create($input);
        return redirect('payments')->with('success', 'create new payments successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $payments = Payment::where('payment_id', $id)->first();
        return view('payments.show')->with('payments',$payments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $students = Student::all();
        $payment = Payment::where('payment_id',$id)->firstOrFail();
        return view('payments.edit',compact('students','payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $payments = Payment::where('payment_id',$id);
        $input = $request->only('student_id','amount','payment_date','payment_method');
        $payments->update($input);
        return redirect('payments')->with('success', 'update payments successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $issue = Payment::where('payment_id', $id)->delete();
        return redirect('payments')->with('success','Delete a payment successfully');
    }

    
}
