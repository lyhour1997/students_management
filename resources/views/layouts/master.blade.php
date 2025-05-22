<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap 5 JS (Optional, for modals, dropdowns, etc.) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Font Awesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


        @yield('styles')

    </head>
    <style>
        body {
        margin: 0;
        font-family: "Lato", sans-serif;
        }
        
        .sidebar {
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #f1f1f1;
        position: fixed;
        height: 100%;
        overflow: auto;
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
        
        div.content {
        margin-left: 200px;
        padding: 1px 16px;
        height: 1000px;
        }
        
        @media screen and (max-width: 700px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }
        .sidebar a {float: left;}
        div.content {margin-left: 0;}
        }
        
        @media screen and (max-width: 400px) {
        .sidebar a {
            text-align: center;
            float: none;
        }
        }
    </style>
    <body >
        
        @yield('container')
        
        <div class="container p-0">
            {{-- navbars --}}
            <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-light py-3 px-4" style="background-color: #f1ebeb96">
                        <h3 class="">Student Management </h3>   

                        <div class="">
                            <span class="px-5 fs-5">
                                {{ @Auth::user()-> email }}
                            </span>
                            <a href="{{url('logout')}}" class="fw-bold btn btn-sm btn-outline-success px-3 py-2">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                        
                    </nav>
                </div>
            </div>
            
            {{-- left-sidebar --}}
            <div class="row">
                <div class="col-sm-3">
                    <div class="sidebar">
                        {{-- <a class="active" href="{{url('/')}}">Home</a> --}}
                        <a class="active" href="{{route('users.index')}}">Users</a>
                        <a href="{{route('student.index')}}">Students</a>
                        <a href="{{route('teachers.index')}}">Teacher</a>
                        <a href="{{route('courses.index')}}">Courses</a>
                        <a href="{{route('batches.index')}}">Batches</a>
                        <a href="{{route('enrolls.index')}}">Enrollment</a>
                        <a href="{{route('payments.index')}}">Payment</a>
                        
                      </div>
                </div>
                <div class="col-sm-9 ps-0">
                    {{-- use for setting content --}}
                    @yield('content')  
                </div>
            </div>
        </div>
        
    </body>
   
</html>
