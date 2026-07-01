<div class="card">

    <div class="card-header">
        Отклики
    </div>

    <div class="card-body">

        @forelse($vacancy->applications as $application)

            <div class="border rounded p-3 mb-3">

                <h5 class="mb-3">
                    {{ $application->resume->title }}
                </h5>

                <p class="mb-1">
                    <strong>Статус:</strong>
                    {{ $application->status->name }}
                </p>

                <p class="mb-1">
                    <strong>Дата отклика:</strong>
                    {{ $application->created_at->format('d.m.Y H:i') }}
                </p>

                <p class="mb-1">
                    <strong>Сопроводительное письмо:</strong>
                </p>

                <p class="mb-3">
                    {{ $application->cover_letter ?: 'Не указано' }}
                </p>

                <div class="d-flex gap-2">

                    <a
                        href="{{ route('applications.edit', $application) }}"
                        class="btn btn-sm btn-primary"
                    >
                        Изменить статус
                    </a>

                    <form
                        action="{{ route('applications.destroy', $application) }}"
                        method="POST"
                        onsubmit="return confirm('Удалить отклик?')"
                    >
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger">
                            Удалить
                        </button>

                    </form>

                </div>

            </div>

        @empty

            <p class="text-muted mb-0">
                Пока никто не откликнулся.
            </p>

        @endforelse

    </div>

</div>
