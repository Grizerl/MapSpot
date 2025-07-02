<!DOCTYPE html>
<html lang="uk">
<head>
    @include('partials.header')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold">Google Maps</a>
        <ul class="navbar-nav d-flex flex-row gap-3 mb-0">
            <li class="nav-item">
                <a class="nav-link" href="#">Точки</a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="nav-link">Вихід</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
<div class="container my-4">
    @yield('content')
</div>
    @include('partials.footer')
</body>
</html>
