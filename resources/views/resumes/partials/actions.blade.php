<section class="border-top pt-4">

    <div class="d-flex gap-2">

        <a
            href="{{ route('resumes.edit', $resume) }}"
            class="btn btn-primary"
        >
            Редактировать резюме
        </a>

        <form
            action="{{ route('resumes.destroy', $resume) }}"
            method="POST"
            onsubmit="return confirm('Удалить резюме?')"
        >
            @csrf
            @method('DELETE')

            <button class="btn btn-outline-danger">
                Удалить
            </button>

        </form>

    </div>

</section>
