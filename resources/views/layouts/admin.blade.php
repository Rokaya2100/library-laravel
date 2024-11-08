<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Ro Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a href="{{ route('home.index') }}" class="navbar-brand me-5"><h3 class="me-5">Library RO</h3></a>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li></li>
                    <li class="nav-item mx-5">
                      <a href="{{ route('books.index') }}" class="nav-link">Books Management</a>
                    </li>
                    <li class="nav-item mx-5">
                      <a href="{{ route('categories.index') }}" class="nav-link">Categories Management</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a href="{{ route('authors.index') }}" class="nav-link">Authors Management</a>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
