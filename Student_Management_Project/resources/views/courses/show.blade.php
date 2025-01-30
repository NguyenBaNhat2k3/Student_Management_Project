@extends('layout')

@section('content')

<div class="container">
    <div class="text-center">
        <h1>Show Student Information</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <a href="{{route('courses.index')}}" class="btn btn-success float-end">All Courses</a>
        </div>
        <div class="card-body">
            <div class="row">
                <label for="" class="">Course Name : </label>
                <div class="form-control">{{$course->course_name}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Description : </label>
                <div class="form-control">{{$course->description}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Credit : </label>
                <div class="form-control">{{$course->credits}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Teacher : </label>
                <div class="form-control">{{$course->teacher->full_name}}</div>
            </div>
        </div>
    </div>
</div>

@endsection