<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Ro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="{{ route('home.index') }}" class="navbar-brand me-5"><h3>Library RO</h3></a>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li>
                        <div>
                            <form action="{{ route('home.search') }}" method="get" class="d-flex">
                                @csrf
                                <input class="form-control me-3" name="search" style="width: 520px;" type="search" aria-label="Search" placeholder="Search for book title">
                                    <button class="btn btn-warning me-5" style="font-weight: 600;" value="search" type="submit">Search</button>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item mx-4">
                        <a href="{{ route('authors.index') }}" class="nav-link">Library Management</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('home.index') }}" class="nav-link"><h5>Home</h5></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
    <footer style="text-align:center; background:#f8b806e5; color:black; margin-top:30px; height:69px;">
        <p style="padding-top: 15px; font-size: 22px;">جميع الحقوق محفوظة &copy; 2024</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>