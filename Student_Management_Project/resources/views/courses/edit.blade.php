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
    <div class="card-header text-center">Edit Course Information </div>
    <div class="card-body">
        <form action="{{route('courses.update',$course->course_id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Course Name</label>
                <div class="col-sm-10">
                    <input type="text" name = "course_name" class="form-control" value="{{$course->course_name}}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Description</label>
                <div class="col-sm-10">
                    <input type="text" name = "description" class="form-control" value="{{$course->description}}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Credit</label>
                <div class="col-sm-10">
                    <input type="number" name = "credits" class="form-control" value="{{$course->credits}}">
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Teacher</label>
                <select class="form-control" name="teacher_id">
                    @foreach ($teachers as $teacher)
                        <option value="{{$teacher->teacher_id}}" class="form-control">
                            {{$teacher->full_name}}
                        </option>
                    @endforeach
                </select>
                
            </div>

            <div class="text-center">
                <a href="{{route('courses.index')}}" class="btn btn-secondary">Back</a>
                <input type="submit" name="" id="" class="btn btn-primary" value="Edit">
            </div>
        </form>
    </div>
</div>

@endsection