<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.css')}}">
    @yield('css')
</head>
<body>


    <div class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{route('posts.index')}}" class="nav-link active" aria-current="page">All Posts</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        @yield('content')
    </div>

    <script src="{{asset('bootstrap/popper.js')}}"></script>
    <script src="{{asset('bootstrap/jquery.js')}}"></script>
    <script src="{{asset('bootstrap/bootstrap.js')}}"></script>
</body>
</html>