<section class="mb-5">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h5 class="mb-0">Фотографии</h5>

        @if($canUpdate)
            <a href="{{ route('resume-photos.create', $resume) }}" class="btn btn-sm btn-outline-primary">Добавить</a>
        @endif

    </div>

    @forelse($resume->photos as $photo)

        <div class="d-inline-block me-3 mb-3 text-center">

            <img
                src="{{ asset('storage/' . $photo->path) }}"
                class="rounded border mb-2"
                style="width:160px;height:160px;object-fit:cover;"
                alt="Фото"
            >

            @if($canUpdate)

                <div class="d-grid gap-2">

                    @unless($photo->is_main)

                        <form action="{{ route('resume-photos.main', $photo) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button class="btn btn-sm btn-outline-primary w-100">
                                Сделать главной
                            </button>

                        </form>

                    @else

                        <span class="badge text-bg-success">
                            Главное фото
                        </span>

                    @endunless

                    <form action="{{ route('resume-photos.destroy', $photo) }}" method="POST" onsubmit="return confirm('Удалить фотографию?')">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-outline-danger w-100">
                            Удалить
                        </button>

                    </form>

                </div>

            @endif

        </div>

    @empty

        <div class="text-muted">
            Фотографии отсутствуют.
        </div>

    @endforelse

</section>
