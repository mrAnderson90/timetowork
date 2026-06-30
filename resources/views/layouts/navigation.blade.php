<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('vacancies.index') }}">
            TimeToWork
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar">

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

                    @if(Auth::user()->isApplicant())

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('resumes.index') }}">
                                Мои резюме
                            </a>
                        </li>

                    @endif

                    @if(Auth::user()->isEmployer())

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vacancies.index') }}">
                                Мои вакансии
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Мои компании
                            </a>
                        </li>

                    @endif

                    @if(Auth::user()->isAdmin())

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Пользователи
                            </a>
                        </li>

                    @endif

                @endauth

            </ul>

            @guest

                <div class="d-flex">

                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">
                        Войти
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-primary">
                        Регистрация
                    </a>

                </div>

            @endguest

            @auth

                <div class="dropdown">

                    <button
                        class="btn btn-outline-light dropdown-toggle"
                        data-bs-toggle="dropdown">

                        {{ Auth::user()->first_name }}
                        {{ Auth::user()->last_name }}

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                Профиль
                            </a>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button class="dropdown-item">
                                    Выход
                                </button>

                            </form>

                        </li>

                    </ul>

                </div>

            @endauth

        </div>

    </div>
</nav>
