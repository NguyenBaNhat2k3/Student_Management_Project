@extends('layout')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{$message}}
    </div>
@endif

    <div class="container">
        <?php $items = is_countable($enrollments) ? count($enrollments) : 0; ?>
        @for ($i = 0; $i < ceil($items / 4); $i++)
            <div class="row g-3">
                @for ($j = 0; $j < 4; $j++) 
                    <?php $index = 4 * $i + $j; ?>
                    @if (isset($enrollments[$index]))
                        <div class="col-lg-3 col-md-4 col-sm-6" style="width: 12rem; height:25%">
                            <div class="card mb-3" style="height:auto">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQdOZbP8Ou9MuPPnkTiblw0MzLwyEcJ06Mo5g&s" class="card-img-top" style="width: 100%; height: 100px;">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $enrollments[$index]->Course->course_name ?></h4>
                                    <p class="card-text">Student Name: <?= $enrollments[$index]->Student->full_name ?></p>
                                    <p class="card-text">Enrollment Date: <?= $enrollments[$index]->enrollment_date ?></p>
                                    <p class="card-text">Status: <?= $enrollments[$index]->status ?></p>
                                    <a href="{{route("home.show",$enrollments[$index])}}" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
        @endfor
    </div>
    
@endsection