@extends('layouts.app')

@section('content')
    <h3>Подробно о резюме</h3>

    <a href="{{ route('resumes.index') }}" class="btn btn-primary mb-3">
        Back
    </a>

    <div class="card">
        <div class="card-header">
            resume ID: {{ $resume->id }}
        </div>

        <div class="card-body">

            <h5 class="card-title">
                {{ $resume->title }}
            </h5>

            <div class="card-text mb-4">
                <p class="fw-bold mb-1">Тип занятости:</p>
                <p>{{ $resume->employmentType->name }}</p>

                <p class="fw-bold mb-1">Категория:</p>
                <p>{{ $resume->category->name }}</p>

                <p class="fw-bold mb-1">Тип занятости:</p>
                <p>{{ $resume->employmentType->name }}</p>

                <p class="fw-bold mb-1">Уровень заработной платы:</p>
                <p>{{ $resume->salary_from }} - {{ $resume->salary_to }}</p>

                <p class="fw-bold mb-1">Город:</p>
                <p>{{ $resume->city }}</p>

                <p class="fw-bold mb-1">Требования к опыту работы:</p>
                <p>{{ $resume->experienceLevel->name }}</p>

                <p class="fw-bold mb-1">Статус вакансии:</p>
                <p>{{ $resume->status->name }}</p>

                <p class="fw-bold mb-1">Требуемые навыки:</p>
                <div class="">
                    @forelse($resume->skills as $skill)
                        <span class="badge text-bg-light">{{ $skill->name }}</span>
                    @empty
                        <span>Навыки не указаны</span>
                    @endforelse
                </div>

            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('vacancies.edit', $resume) }}" class="btn btn-primary">
                    Edit
                </a>

                <form action="{{ route('vacancies.destroy', $resume) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>
                </form>
            </div>

        </div>
        <div class="card-footer text-body-secondary">
            @forelse($resume->tags as $tag)
                <span class="badge text-bg-secondary">{{ $tag->name }}</span>
            @empty
                <span>No tags yet</span>
            @endforelse
        </div>
    </div>
@endsection
