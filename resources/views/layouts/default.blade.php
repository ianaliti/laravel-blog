<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ route('home') }}">My Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('userhome') }}">Dashboard</a></li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post" class="d-inline">
                                @csrf
                                <button class="btn btn-danger btn-sm">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('maincontent')
    </div>
    <footer class="bg-dark text-center text-white py-3 mt-4">
        <p>&copy; {{ date('Y') }} My Blog. All Rights Reserved.</p>
    </footer>
</body>

</html>