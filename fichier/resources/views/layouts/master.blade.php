<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    @auth
   @if (Auth::user()->role_id === 1)
   <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    @else
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    @endif
    @else
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        @endauth
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Fichier</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('document') }}">Add Fichier</a>
                    </li>
                    @auth
                        @if (Auth::user()->role_id === 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('manageUser')}}">Manager User</a>
                        </li>
                        @endif
                    @endauth
                </ul>
                <div>
                    @auth
                        <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
                    @else
                        <a class="btn btn-success" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="container w-75 mt-3">
            @if (session()->has('success'))
                <div class="alert alert-success mt-2" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-success mt-2" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger mt-2" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @yield('content')
        
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-hMZK5JN5YcIfpK/8VRyEnoLMpSmUixE73yPj8b1i/Y2j0QpCB0bC4mLcAHtGqTOV" crossorigin="anonymous">
    </script>
</body>
</body>

</html>
