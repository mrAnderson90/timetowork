@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="h3 mb-0">Список вакансий</h3>

        @can('create', App\Models\Vacancy::class)
            <a class="btn btn-primary" href="{{ route('vacancies.create') }}">
                Создать новую вакансию
            </a>
        @endcan
    </div>

    <ul class="list-group list-group-flush">
        @forelse($vacancies as $vacancy)
            <li class="list-group-item">
                <a href="{{ route('vacancies.show', $vacancy) }}">
                    {{ $vacancy->title }}
                </a>
            </li>
        @empty
            <li class="list-group-item">
                No vacancies yet
            </li>
        @endforelse
    </ul>

    <div class="mt-3">
        {{ $vacancies->withQueryString()->links() }}
    </div>
@endsection
