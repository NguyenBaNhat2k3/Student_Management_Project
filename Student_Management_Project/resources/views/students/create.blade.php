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
            <form action="{{route('students.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="form-control">
                        <label for="" class="mt-3">Full Name : </label>
                        <input type="text" name="full_name" id="" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-control">
                        <label for="" class="mt-3">Date of birth : </label>
                        <input type="date" name="date_of_birth" id="" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-control">
                        <label for="" class="mt-3">Email : </label>
                        <input type="email" name="email" id="" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-control">
                        <label for="" class="mt-3">Phone : </label>
                        <input type="tel" name="phone_number" id="" class="form-control">

                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href="{{route('students.index')}}" class="btn btn-secondary">Back</a>
                    <input type="submit" name="" id="" value="Add" class="btn btn-primary">
                </div>
            </form>
            
        </div>
    </div>
</div>

@endsection