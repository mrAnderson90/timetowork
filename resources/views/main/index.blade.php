@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="h3 mb-0">Главная страница</h3>
    </div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="{{ route('vacancies.index') }}">
                Вакансии
            </a>
        </li>

        <li class="list-group-item">
            <a href="{{ route('resumes.index') }}">
                Резюме
            </a>
        </li>
    </ul>
@endsection
