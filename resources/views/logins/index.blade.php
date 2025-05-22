<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg p-4">
                <div class="text-center py-3 ">
                    <h4>Login Form</h4>
                </div>
                <div class="card-body">

                    <form action="{{route('login.save')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="" placeholder="Enter email"
                                 required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password"
                                id="password" required>
                            @error('password')
                                <div class="text-danger small"></div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>

                        @if (Session::has('error'))
                            <p class="btn-sm text-danger">
                                {{session('error')}}
                            </p>
                        @endif

                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="">Forgot Your Password?</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
