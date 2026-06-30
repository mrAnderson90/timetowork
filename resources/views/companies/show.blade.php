@extends('layouts.app')

@section('content')

    <a href="{{ route('employer.companies.index') }}" class="btn btn-secondary mb-3">
        Назад
    </a>

    <div class="card">

        <div class="card-header">
            {{ $company->name }}
        </div>

        <div class="card-body">

            <p><strong>Описание:</strong></p>
            <p>{{ $company->description ?: 'Не указано' }}</p>

            <p><strong>Сайт:</strong></p>
            <p>{{ $company->website ?: 'Не указан' }}</p>

            <p><strong>Город:</strong></p>
            <p>{{ $company->city ?: 'Не указан' }}</p>

            <p><strong>Телефон:</strong></p>
            <p>{{ $company->contact_phone ?: 'Не указан' }}</p>

            <p><strong>Email:</strong></p>
            <p>{{ $company->contact_email ?: 'Не указан' }}</p>

            <hr>

            <h5>Вакансии</h5>

            <ul>

                @forelse($company->vacancies as $vacancy)

                    <li>
                        <a href="{{ route('vacancies.show', $vacancy) }}">
                            {{ $vacancy->title }}
                        </a>
                    </li>

                @empty

                    <li>Вакансий пока нет.</li>

                @endforelse

            </ul>

        </div>

        <div class="card-footer">

            @can('update', $company)

                <a
                    href="{{ route('employer.companies.edit', $company) }}"
                    class="btn btn-primary"
                >
                    Редактировать
                </a>

                <form
                    action="{{ route('employer.companies.destroy', $company) }}"
                    method="POST"
                    class="d-inline"
                >
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">
                        Удалить
                    </button>

                </form>

            @endcan

        </div>

    </div>

@endsection
