@extends('layout')

@section('content')

<div class="container">
    <div class="text-center">
        <h1>Show Payment Information</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <a href="{{route('payments.index')}}" class="btn btn-success float-end">All Payments</a>
        </div>
        <div class="card-body">
            <div class="row">
                <label for="" class="">Student Name : </label>
                <div class="form-control">{{$payments->student->full_name}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Date of birth : </label>
                <div class="form-control">{{$payments->student->date_of_birth}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Email : </label>
                <div class="form-control">{{$payments->student->email}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Phone : </label>
                <div class="form-control">{{$payments->student->phone_number}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Payment Date : </label>
                <div class="form-control">{{$payments->payment_date}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Payment Method : </label>
                <div class="form-control">{{$payments->payment_method}}</div>
            </div>
        </div>
    </div>
</div>

@endsection