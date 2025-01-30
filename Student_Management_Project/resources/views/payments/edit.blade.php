@extends('layout')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors as $er)
                <li>{{$er}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-header text-center">Edit Payment Information </div>
    <div class="card-body">
        <form action="{{route('payments.update',$payment->payment_id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="" class="mt-3">Student Name : </label>
                <select name="student_id" id="" class="form-control">
                    @foreach ($students as $student)
                        <option value="{{$student->student_id}}" class="form-control">
                            {{$student->full_name}}
                        </option>
                    @endforeach
                </select>                        
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Amount</label>
                <div class="col-sm-10">
                    <input type="number" step="0.01" min="0" name = "amount" class="form-control" value="{{$payment->amount}}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Payment Date</label>
                <div class="col-sm-10">
                    <input type="date" name = "payment_date" class="form-control" value="{{$payment->payment_date}}">
                </div>
            </div>
            <div class=" row mb-3">
                <label for="" class="mt-3">Payment Method : </label>                    
                <select name="payment_method" class="form-control">
                    <option value="credit_card" @if($payment->payment_method == 'credit_card') selected @endif>Credit card</option>
                    <option value="cash" @if($payment->payment_method == 'cash') selected @endif>Cash</option>                   
                    <option value="bank_tranfer" @if($payment->payment_method == 'bank_tranfer') selected @endif>Bank tranfer</option>                   
                </select>
            </div>

            <div class="text-center">
                <a href="{{route('payments.index')}}" class="btn btn-secondary">Back</a>
                <input type="submit" name="" id="" class="btn btn-primary" value="Edit">
            </div>
        </form>
    </div>
</div>

@endsection