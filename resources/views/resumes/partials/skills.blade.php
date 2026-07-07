<section class="mb-5">

    <h5 class="mb-3">Навыки</h5>

    @forelse($resume->skills as $skill)

        <span class="badge text-bg-light me-1 mb-1">
            {{ $skill->name }}
        </span>

    @empty

        <span class="text-muted">
            Навыки не указаны
        </span>

    @endforelse

</section>
