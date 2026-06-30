<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('main.index') }}">
            TimeToWork
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main.index') }}">
                        Главная
                    </a>
                </li>

                @guest
                    @include('navigation.partials.applicant-nav')
                @endguest

                @auth
                    @if(auth()->user()->isApplicant())
                        @include('navigation.partials.applicant-nav')
                    @endif

                    @if(auth()->user()->isEmployer())
                        @include('navigation.partials.employer-nav')
                    @endif
                @endauth

            </ul>

            @guest

                <div class="d-flex">
                    <a class="btn btn-outline-light me-2" href="{{ route('login') }}">
                        Войти
                    </a>

                    <a class="btn btn-primary" href="{{ route('register') }}">
                        Регистрация
                    </a>
                </div>

            @endguest

            @auth

                <div class="dropdown">

                    <button class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown">
                        {{ auth()->user()->first_name }}
                        {{ auth()->user()->last_name }}
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
