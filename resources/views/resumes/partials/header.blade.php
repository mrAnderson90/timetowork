<a
    href="{{ url()->previous() }}"
    class="btn btn-outline-secondary mb-4"
>
    ← Назад
</a>

<div class="d-flex justify-content-between align-items-start mb-4">

    <div>

        <h2 class="mb-2">
            {{ $resume->title }}
        </h2>

        <div class="text-muted">

            {{ $resume->user->last_name }}
            {{ $resume->user->first_name }}

        </div>

    </div>

    @if($resume->mainPhoto)

        <img
            src="{{ asset('storage/' . $resume->mainPhoto->path) }}"
            alt="Фото"
            class="rounded"
            style="width: 140px;height: 140px;object-fit: cover;"
        >

    @endif

</div>

<hr>
