<!DOCTYPE html>
<html lang="uk">
@include('partials.header')
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="{{ route('login.form') }}">Google Maps</a>
            <ul class="navbar-nav d-flex flex-row justify-content-center">
                <li class="nav-item mx-2">
                    <a class="btn btn-primary btn-smal" href="{{ route('login.form') }}">Login</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="btn btn-secondary btn-smal" href="{{ route('register.form') }}">Register</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
@include('partials.footer')
</body>
</html>