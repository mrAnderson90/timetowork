<div class="border-top pt-4">

    <div class="d-flex gap-2 flex-wrap">

        <a
            href="{{ route('vacancies.index') }}"
            class="btn btn-primary"
        >
            Просмотреть вакансии
        </a>

        @if($isGuest)

            <a
                href="{{ route('login') }}"
                class="btn btn-outline-secondary"
            >
                Войти
            </a>

            <a
                href="{{ route('register') }}"
                class="btn btn-outline-secondary"
            >
                Регистрация
            </a>

        @endif

        @if($isApplicant || $isEmployer)

            <a
                href="{{ route('profile.edit') }}"
                class="btn btn-outline-secondary"
            >
                Мой профиль
            </a>

        @endif

    </div>

</div>
