<section class="mb-5">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h5 class="mb-0">Опыт работы</h5>

        @if($canUpdate)
            <a href="{{ route('resume-experiences.create', $resume) }}" class="btn btn-sm btn-outline-primary">Добавить</a>
        @endif

    </div>

    @forelse($resume->experiences as $experience)

        <div class="border rounded p-3 mb-3">

            <div class="d-flex justify-content-between align-items-start mb-2">

                <div>
                    <div class="fw-semibold">{{ $experience->position }}</div>
                    <div>{{ $experience->company }}</div>
                </div>

                <small class="text-muted">
                    {{ $experience->date_from->format('m.Y') }}
                    —
                    {{ $experience->date_to?->format('m.Y') ?? 'н.в.' }}
                </small>

            </div>

            @if($experience->description)
                <div class="mb-3">{{ $experience->description }}</div>
            @endif

            @if($canUpdate)

                <div class="d-flex gap-2">

                    <a href="{{ route('resume-experiences.edit', $experience) }}" class="btn btn-sm btn-outline-primary">
                        Изменить
                    </a>

                    <form action="{{ route('resume-experiences.destroy', $experience) }}" method="POST" onsubmit="return confirm('Удалить запись?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Удалить</button>
                    </form>

                </div>

            @endif

        </div>

    @empty

        <div class="text-muted">Опыт работы отсутствует.</div>

    @endforelse

</section>
