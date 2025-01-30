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
    <div class="card-header text-center">Edit Teacher Information </div>
    <div class="card-body">
        <form action="{{route('teachers.update',$teacher->teacher_id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Full Name</label>
                <div class="col-sm-10">
                    <input type="text" name = "full_name" class="form-control" value="{{$teacher->full_name}}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Subject</label>
                <div class="col-sm-10">
                    <input type="text" name = "subject" class="form-control" value="{{$teacher->subject}}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Email</label>
                <div class="col-sm-10">
                    <input type="email" name = "email" class="form-control" value="{{$teacher->email}}">
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Phone</label>
                <input type="tel" name="phone" id="" class="form-control" value="{{$teacher->phone}}">
            </div>

            <div class="text-center">
                <a href="{{route('teachers.index')}}" class="btn btn-secondary">Back</a>
                <input type="submit" name="" id="" class="btn btn-primary" value="Edit">
            </div>
        </form>
    </div>
</div>

@endsection