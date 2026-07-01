@extends('layouts.app')

@section('content')

    <h3 class="mb-4">
        Вакансии
    </h3>

    @forelse($vacancies as $vacancy)

        @include('vacancies.partials.vacancy-card')

    @empty

        <div class="text-muted">
            Вакансий пока нет.
        </div>

    @endforelse

    <div class="mt-4">
        {{ $vacancies->withQueryString()->links() }}
    </div>

@endsection
