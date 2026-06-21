@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="h3 mb-0">Список резюме</h3>

        <a class="btn btn-primary" href="{{ route('resumes.create') }}">
            Создать новое резюме
        </a>
    </div>

    <ul class="list-group list-group-flush">
        @forelse($resumes as $resume)
            <li class="list-group-item">
                <a href="{{ route('resumes.show', $resume) }}">
                    {{ $resume->title }}
                </a>
            </li>
        @empty
            <li class="list-group-item">
                No resumes yet
            </li>
        @endforelse
    </ul>

    <div class="mt-3">
        {{ $resumes->withQueryString()->links() }}
    </div>
@endsection
