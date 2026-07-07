<section>

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h4 class="mb-0">
            Отклики
        </h4>

        <span class="text-muted">
            {{ $vacancy->applications->count() }}
            {{ trans_choice('отклик|отклика|откликов', $vacancy->applications->count()) }}
        </span>

    </div>

    @forelse($vacancy->applications as $application)

        <div class="border rounded p-3 mb-3">

            <div class="d-flex justify-content-between align-items-start mb-2">

                <div>

                    <a
                        href="{{ route('resumes.show', $application->resume) }}"
                        class="fw-semibold text-decoration-none"
                    >
                        {{ $application->resume->title }}
                    </a>

                    <div class="small text-muted">
                        {{ $application->created_at->format('d.m.Y H:i') }}
                    </div>

                </div>

                <span class="badge text-bg-light">
                    {{ $application->status->name }}
                </span>

            </div>

            @if($application->cover_letter)

                <div class="mb-3">

                    {{ Str::limit($application->cover_letter, 250) }}

                </div>

            @endif

            <div class="d-flex gap-2">

                <a
                    href="{{ route('resumes.show', $application->resume) }}"
                    class="btn btn-outline-secondary btn-sm"
                >
                    Открыть резюме
                </a>

                <a
                    href="{{ route('employer.vacancies.applications.edit', [$vacancy, $application]) }}"
                    class="btn btn-primary btn-sm"
                >
                    Изменить статус
                </a>

            </div>

        </div>

    @empty

        <div class="text-muted">
            Пока никто не откликнулся.
        </div>

    @endforelse

</section>
