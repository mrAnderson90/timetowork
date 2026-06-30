<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'TimeToWork')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('vacancies.index') }}">
            TimeToWork
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('vacancies.index') }}">
                        Вакансии
                    </a>
                </li>

                @auth
                    @if(auth()->user()->isApplicant())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('resumes.index') }}">
                                Мои резюме
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->isEmployer())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vacancies.create') }}">
                                Создать вакансию
                            </a>
                        </li>
                    @endif
                @endauth

            </ul>

            <ul class="navbar-nav ms-auto">

                @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            Войти
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            Регистрация
                        </a>
                    </li>

                @else

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    Профиль
                                </a>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Выход
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </li>

                @endguest

            </ul>

        </div>

    </div>
</nav>

<main class="container py-4">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</main>

</body>
</html>
