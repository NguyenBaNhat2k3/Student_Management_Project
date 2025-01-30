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
    <div class="card-header text-center">Edit Enrollment Information </div>
    <div class="card-body">
        <form action="{{route('enrollments.update',$enrollment->enrollment_id)}}" method="post">
            @csrf
            @method('PUT')
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
            <div class="form-control">
                <label for="" class="mt-3">Course Name : </label>
                <select name="course_id" id="" class="form-control">
                    @foreach ($courses as $course)
                        <option value="{{$course->course_id}}" class="form-control">
                            {{$course->course_name}}
                        </option>
                    @endforeach
                </select>                        
            </div>
            <div class=" form-control">
                <label class="col-sm-2 col-label-form">Enrollment Date</label>
                <div class="col-sm-10" class="form-control">
                    <input type="date" name = "enrollment_date" class="form-control" value="{{$enrollment->enrollment_date}}">
                </div>
            </div>
            <div class=" form-control">
                <label for="" class="mt-3">Status : </label>                    
                <select name="status" class="form-control">
                    <option value="active" @if($enrollment->status == 'active') selected @endif>Active</option>
                    <option value="completed" @if($enrollment->status == 'completed') selected @endif>Completed</option>                   
                    <option value="dropped" @if($enrollment->status == 'dropped') selected @endif>Dropped</option>                   
                </select>
            </div>

            <div class="text-center">
                <a href="{{route('enrollments.index')}}" class="btn btn-secondary">Back</a>
                <input type="submit" name="" id="" class="btn btn-primary" value="Edit">
            </div>
        </form>
    </div>
</div>

@endsection