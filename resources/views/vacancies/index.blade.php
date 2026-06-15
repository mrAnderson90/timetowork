@extends('layouts.app')

@section('content')
    <h3>Vacancies Index Page</h3>

    <ul class="list-group list-group-flush">
        @forelse($vacancies as $vacancy)
            <li class="list-group-item">
                <a href="{{ route('vacancy.show', $vacancy) }}">
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
