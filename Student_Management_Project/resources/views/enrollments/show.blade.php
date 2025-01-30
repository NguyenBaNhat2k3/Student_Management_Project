@extends('layout')

@section('content')

<div class="container">
    <div class="text-center">
        <h1>Show Enrollment Information</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <a href="{{route('enrollments.index')}}" class="btn btn-success float-end">All Enrollment</a>
        </div>
        <div class="card-body">
            <div class="row">
                <label for="" class="">Student Name : </label>
                <div class="form-control">{{$enrollment->Student->full_name}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Date of birth : </label>
                <div class="form-control">{{$enrollment->Student->date_of_birth}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Email : </label>
                <div class="form-control">{{$enrollment->Student->email}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Phone : </label>
                <div class="form-control">{{$enrollment->Student->phone_number}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Course Name : </label>
                <div class="form-control">{{$enrollment->Course->course_name}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Description : </label>
                <div class="form-control">{{$enrollment->Course->description}}</div>
            </div>

        </div>
    </div>
</div>

@endsection