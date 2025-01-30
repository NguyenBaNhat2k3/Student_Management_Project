<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Management Project</title>
    <style>
        /* Căn chỉnh nội dung chính cho phù hợp với sidebar */
        .content {
            margin-left: 200px;
            padding-top: 60px; /* Để không bị navbar che */
        }
        /* Định kiểu sidebar */
        .sidebar {
            width: 200px;
            height: 100vh;
            position: fixed;
            top: 56px; /* Để không che thanh navbar */
            background-color: #f1f1f1;
            padding-top: 20px;
        }
        .sidebar a {
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
        }
        .sidebar a.active {
            background-color: #04AA6D;
            color: white;
        }
        .sidebar a:hover:not(.active) {
            background-color: #555;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Thanh điều hướng trên cùng -->
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <h1 class="navbar-brand">Student Management Project</h1>
            <div class="d-flex">
                @if (Auth::check())
                    <div href="" class="btn btn-outline-success me-2" >User : {{Auth::user()->name}}</div>
                    <a href="{{ route('logout') }}" class="btn btn-outline-success me-2">SIGN OUT</a>
                    
                @else
                    <a href="{{ route('login_form') }}" class="btn btn-outline-success me-2">SIGN IN</a>
                    
                @endif
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar cố định bên trái -->
            <div class="col-md-3">
                <div class="sidebar">
                    <a class="active" href="{{url('/home')}}">Home</a>
                    <a href="{{url('/students')}}">Student</a>
                    <a href="{{route('teachers.index')}}">Teacher</a>
                    <a href="{{route('courses.index')}}">Course</a>
                    <a href="{{route('enrollments.index')}}">Enrollment</a>
                    <a href="{{route('payments.index')}}">Payment</a>
                </div>
            </div>

            <!-- Nội dung chính -->
            <div class=" content">
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
