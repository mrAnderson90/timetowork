@extends('layouts.app')

@section('content')
    <h3>Vacancies Show Page</h3>

    <a href="{{ route('vacancies.index') }}" class="btn btn-primary mb-3">
        Back
    </a>

    <div class="card">
        <div class="card-header">
            Vacancy ID: {{ $vacancy->id }}
        </div>

        <div class="card-body">

            <h5 class="card-title">
                {{ $vacancy->title }}
            </h5>

            <div class="card-text mb-4">
                <p class="fw-bold mb-1">Компания:</p>
                <p>{{ $vacancy->company->name }}</p>

                <p class="fw-bold mb-1">Категория:</p>
                <p>{{ $vacancy->category->name }}</p>

                <p class="fw-bold mb-1">Тип занятости:</p>
                <p>{{ $vacancy->employmentType->name }}</p>

                <p class="fw-bold mb-1">Уровень заработной платы:</p>
                <p>{{ $vacancy->salary_from }} - {{ $vacancy->salary_to }}</p>

                <p class="fw-bold mb-1">Город:</p>
                <p>{{ $vacancy->city }}</p>

                <p class="fw-bold mb-1">Требования к опыту работы:</p>
                <p>{{ $vacancy->experienceLevel->name }}</p>

                <p class="fw-bold mb-1">Статус вакансии:</p>
                <p>{{ $vacancy->status->name }}</p>

                <p class="fw-bold mb-1">Требуемые навыки:</p>
                <div class="">
                    @forelse($vacancy->skills as $skill)
                        <span class="badge text-bg-light">{{ $skill->name }}</span>
                    @empty
                        <span>Навыки не указаны</span>
                    @endforelse
                </div>

            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('vacancies.edit', $vacancy) }}" class="btn btn-primary">
                    Edit
                </a>

                <form action="{{ route('vacancies.destroy', $vacancy) }}" method="POST" onsubmit="return confirm('Удалить вакансию?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>
                </form>
            </div>

        </div>
        <div class="card-footer text-body-secondary">
            @forelse($vacancy->tags as $tag)
                <span class="badge text-bg-secondary">{{ $tag->name }}</span>
            @empty
                <span>No tags yet</span>
            @endforelse
        </div>
    </div>
@endsection
