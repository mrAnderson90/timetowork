@if($hasApplied)

    <div class="alert alert-success mb-0">
        Вы уже откликнулись на эту вакансию.
    </div>

@else

    <a
        href="{{ route('applications.create', $vacancy) }}"
        class="btn btn-success"
    >
        Откликнуться
    </a>

@endif
