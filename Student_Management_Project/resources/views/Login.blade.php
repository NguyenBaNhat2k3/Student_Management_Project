<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Student Management Project</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="form-control p-4" style="width: 100%; max-width: 400px;">
            <form  method="POST" action="{{ route('admin_login') }}">
                <h1 class="text-center mb-4">Login</h1>
                
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" class="form-control rounded-pill" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control rounded-pill" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary w-100 rounded-pill mt-3">SIGN IN</button>

                <hr class="my-4">

                <!-- Nút Đăng nhập Google -->
                
                <a href="{{route('login_google')}}" class="btn btn-outline-danger w-100 rounded-pill mt-2">
                    <i class="bi bi-google"></i> Sign in with Google
                </a>

                <!-- Nút Đăng nhập Facebook -->
                
                <a href="" class="btn btn-outline-primary w-100 rounded-pill mt-2">
                    <i class="bi bi-facebook"></i> Sign in with Facebook
                </a>
            </form>
        </div>
    </div>

    <!-- Thêm Font Awesome cho icon -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
