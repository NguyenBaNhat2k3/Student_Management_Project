@extends('layout')

@section('content')

<div class="container">
    <div class="text-center">
        <h1>Create Student</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="col col-mb-6"></div>
        </div>
        <div class="card-body">
            <form action="{{route('courses.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="form-control">
                        <label for="" class="mt-3">Course Name : </label>
                        <input type="text" name="course_name" id="" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-control">
                        <label for="" class="mt-3">Description : </label>
                        <input type="text" name="description" id="" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-control">
                        <label for="" class="mt-3">Credit : </label>
                        <input type="number" name="credits" id="" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-control">
                        <label for="" class="mt-3">Teacher : </label>
                        <select name="teacher_id" id="" class="form-control">
                        @foreach ($teacher as $key)
                                <option value="{{$key->teacher_id}}" class="form-control">
                                    {{$key->full_name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href="{{route('courses.index')}}" class="btn btn-secondary">Back</a>
                    <input type="submit" name="" id="" value="Add" class="btn btn-primary">
                </div>
            </form>
            
        </div>
    </div>
</div>

@endsection