@extends('layout')

@section('content')

<div class="container">
    <div class="text-center">
        <h1>Show Student Information</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <a href="{{route('students.index')}}" class="btn btn-success float-end">All Students</a>
        </div>
        <div class="card-body">
            <div class="row">
                <label for="" class="">Full Name : </label>
                <div class="form-control">{{$student->full_name}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Date of birth : </label>
                <div class="form-control">{{$student->date_of_birth}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Email : </label>
                <div class="form-control">{{$student->email}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Phone : </label>
                <div class="form-control">{{$student->phone_number}}</div>
            </div>
        </div>
    </div>
</div>

@endsection