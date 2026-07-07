<section class="mb-5">

    <h5 class="mb-4">Основная информация</h5>

    <div class="row gy-3">

        <div class="col-md-6">
            <div class="fw-semibold">Тип занятости</div>
            <div>{{ $resume->employmentType->name }}</div>
        </div>

        <div class="col-md-6">
            <div class="fw-semibold">Видимость</div>
            <div>{{ $resume->visibility->name }}</div>
        </div>

    </div>

</section>

<section class="mb-5">

    <h5 class="mb-3">О себе</h5>

    <div>
        {{ $resume->description ?: 'Описание отсутствует.' }}
    </div>

</section>
