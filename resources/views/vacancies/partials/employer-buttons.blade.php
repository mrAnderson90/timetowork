@can('update', $vacancy)

    <div class="d-flex gap-2">

        <a
            href="{{ route('employer.vacancies.edit', $vacancy) }}"
            class="btn btn-primary"
        >
            Редактировать
        </a>

        <form
            action="{{ route('employer.vacancies.destroy', $vacancy) }}"
            method="POST"
            onsubmit="return confirm('Удалить вакансию?')"
        >
            @csrf
            @method('DELETE')

            <button class="btn btn-danger">
                Удалить
            </button>

        </form>

    </div>

@endcan
