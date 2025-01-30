@extends('layout')

@section('content')

<div class="container">
    <div class="text-center">
        <h1>Create Payment</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="col col-mb-6"></div>
        </div>
        <div class="card-body">
            <form action="{{route('payments.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="form-control">
                        <label for="" class="mt-3">Student Name : </label>
                        <select name="student_id" id="" class="form-control">
                            @foreach ($students as $student)
                                <option value="{{$student->student_id}}" class="form-control">
                                    {{$student->full_name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-control">
                        <label for="" class="mt-3">Amount : </label>
                        <input type="number" step="0.01" name="amount" id="" class="form-control">                        
                    </div>
                </div>
                <div class="row">
                    <div class="form-control">
                        <label for="" class="mt-3">Payment Date : </label>
                        <input type="date" name="payment_date" id="" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <label for="" class="mt-3">Payment Method : </label>                    
                    <select name="payment_method" id="" class="form-control">
                        <option value="credit_card" class="form-control">Credit card</option>
                        <option value="cash" class="form-control">Cash</option>
                        <option value="bank_tranfer" class="form-control">Bank tranfer</option>
                    </select>
                </div>

                <div class="text-center mt-3">
                    <a href="{{route('payments.index')}}" class="btn btn-secondary">Back</a>
                    <input type="submit" name="" id="" value="Add" class="btn btn-primary">
                </div>
            </form>
            
        </div>
    </div>
</div>

@endsection