@extends('layout')

@section('content')

<div class="container">
    <div class="text-center">
        <h1>Show Teacher Information</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <a href="{{route('teachers.index')}}" class="btn btn-success float-end">All Teachers</a>
        </div>
        <div class="card-body">
            <div class="row">
                <label for="" class="">Full Name : </label>
                <div class="form-control">{{$teacher->full_name}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Subject : </label>
                <div class="form-control">{{$teacher->subject}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Email : </label>
                <div class="form-control">{{$teacher->email}}</div>
            </div>
            <div class="row">
                <label for="" class="mt-3">Phone : </label>
                <div class="form-control">{{$teacher->phone}}</div>
            </div>
        </div>
    </div>
</div>

@endsection