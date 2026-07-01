<div class="border rounded p-3 mb-3">

    <div class="d-flex justify-content-between align-items-start">

        <div>

            <h5 class="mb-1">
                <a
                    href="{{ route('vacancies.show', $vacancy) }}"
                    class="text-decoration-none"
                >
                    {{ $vacancy->title }}
                </a>
            </h5>

            <div class="text-muted small">
                {{ $vacancy->company->name }}
            </div>

        </div>

        <span class="badge text-bg-light">
            {{ $vacancy->category->name }}
        </span>

    </div>

    <div class="mt-3 small text-muted">

        <span>{{ $vacancy->city ?: 'Город не указан' }}</span>

        •

        <span>{{ $vacancy->employmentType->name }}</span>

        •

        <span>{{ $vacancy->experienceLevel->name }}</span>

    </div>

    @if($vacancy->salary_from || $vacancy->salary_to)

    <div class="mt-2 fw-semibold">

        @if($vacancy->salary_from)
        от {{ number_format($vacancy->salary_from, 0, '', ' ') }}
        @endif

        @if($vacancy->salary_to)
        до {{ number_format($vacancy->salary_to, 0, '', ' ') }}
        @endif

        ₽

    </div>

    @endif

</div>
