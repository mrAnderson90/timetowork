<section class="mb-5">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h5 class="mb-0">Образование</h5>

        @if($canUpdate)
            <a href="{{ route('resume-educations.create', $resume) }}" class="btn btn-sm btn-outline-primary">Добавить</a>
        @endif

    </div>

    @forelse($resume->educations as $education)

        <div class="border rounded p-3 mb-3">

            <div class="d-flex justify-content-between align-items-start mb-2">

                <div>
                    <div class="fw-semibold">{{ $education->institution }}</div>
                    <div>{{ $education->specialization }}</div>
                </div>

                <small class="text-muted">
                    {{ $education->start_date->format('Y') }}
                    —
                    {{ $education->end_date?->format('Y') ?? 'н.в.' }}
                </small>

            </div>

            @if($education->description)
                <div class="mb-3">{{ $education->description }}</div>
            @endif

            @if($canUpdate)

                <div class="d-flex gap-2">

                    <a href="{{ route('resume-educations.edit', $education) }}" class="btn btn-sm btn-outline-primary">
                        Изменить
                    </a>

                    <form action="{{ route('resume-educations.destroy', $education) }}" method="POST" onsubmit="return confirm('Удалить запись?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Удалить</button>
                    </form>

                </div>

            @endif

        </div>

    @empty

        <div class="text-muted">Образование отсутствует.</div>

    @endforelse

</section>
