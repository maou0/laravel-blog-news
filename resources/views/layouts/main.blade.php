<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Блог главная</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>
<body>
<div class="edica-loader"></div>
<header class="edica-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ route('main.index') }}"><i class="fa fa-solid fa-blog"></i></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav"
                    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-5" id="edicaMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link text-primary" href="{{ route('main.index') }}">Главная <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
            <div class="row">
                @guest()
                    <div class="nav-item active">
                        <a class="nav-link text-info" href="{{ route('personal.main.index') }}">Войти <span
                                class="sr-only">(current)</span></a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link text-info" href="{{ route('register') }}">Регистрация</a>
                    </div>
                @endguest
                @auth()
                    <div class="nav-item active pr-4">
                        <a class="nav-link text-info" href="{{ route('personal.main.index') }}">Личный кабинет <span
                                class="sr-only">(current)</span></a>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input class="btn-outline-primary" type="submit" value="Выйти">
                    </form>
                @endauth
            </div>
        </nav>
        <div class="row">
            @if (auth()->check())
                @if (auth()->user()->role === 0)
                    <div class="nav-item active pr-4">
                        <a class="nav-link text-info" href="{{ route('admin.main.index') }}">Панель администратора<span
                                class="sr-only">(current)</span></a>
                    </div>
                @endif
            @endif
        </div>
    </div>
</header>

@yield('content')
@if(isset($post->id))
<footer class="edica-footer" data-aos="fade-up">
    <div class="container">
        <div class="footer-bottom-content">
            <p class="mb-0">© Blog-news. 2022 . All rights
                reserved.</p>
        </div>
    </div>
</footer>
@else
    <footer>
        <div class="container">
            <div class="footer-bottom-content">
                <p class="mb-0">© Blog-news. 2022 . All rights
                    reserved.</p>
            </div>
        </div>
    </footer>
@endif
<script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    AOS.init({
        duration: 1000
    });
</script>
</body>

</html>
