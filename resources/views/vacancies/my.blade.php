@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3 class="mb-0">Мои вакансии</h3>

        <a class="btn btn-primary" href="{{ route('vacancies.create') }}">
            Создать вакансию
        </a>

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
                У вас пока нет вакансий.
            </li>

        @endforelse

    </ul>

    <div class="mt-3">
        {{ $vacancies->withQueryString()->links() }}
    </div>

@endsection
