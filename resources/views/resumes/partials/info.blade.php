<section class="mb-5">

    <h5 class="mb-4">Основная информация</h5>

    <div class="row gy-3">

        <div class="col-md-6">
            <div class="fw-semibold">Желаемая зарплата</div>
            <div>
                {{ $resume->desired_salary
                    ? number_format($resume->desired_salary, 0, '', ' ') . ' ₽'
                    : 'Не указана' }}
            </div>
        </div>

        <div class="col-md-6">
            <div class="fw-semibold">Тип занятости</div>
            <div>{{ $resume->employmentType?->name ?? 'Не указан' }}</div>
        </div>

        <div class="col-md-6">
            <div class="fw-semibold">Город</div>
            <div>{{ $resume->city ?: 'Не указан' }}</div>
        </div>

        <div class="col-md-6">
            <div class="fw-semibold">Видимость</div>
            <div>{{ $resume->resumeVisibility->name }}</div>
        </div>

    </div>

</section>

<section class="mb-5">

    <h5 class="mb-3">О себе</h5>

    <div>
        {{ $resume->about ?: 'Информация отсутствует.' }}
    </div>

</section>
