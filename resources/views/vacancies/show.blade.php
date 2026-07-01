@extends('layouts.app')

@section('content')

    <h3>Просмотр вакансии</h3>

    <a
        href="{{ route('vacancies.index') }}"
        class="btn btn-secondary mb-3"
    >
        Назад
    </a>

    <div class="card mb-3">

        <div class="card-header">
            ID вакансии: {{ $vacancy->id }}
        </div>

        <div class="card-body">

            <h4>{{ $vacancy->title }}</h4>

            <hr>

            <p class="fw-bold mb-1">Компания</p>
            <p>{{ $vacancy->company->name }}</p>

            <p class="fw-bold mb-1">Категория</p>
            <p>{{ $vacancy->category->name }}</p>

            <p class="fw-bold mb-1">Описание</p>
            <p>{{ $vacancy->description ?: 'Не указано' }}</p>

            <p class="fw-bold mb-1">Тип занятости</p>
            <p>{{ $vacancy->employmentType->name }}</p>

            <p class="fw-bold mb-1">Опыт работы</p>
            <p>{{ $vacancy->experienceLevel->name }}</p>

            <p class="fw-bold mb-1">Город</p>
            <p>{{ $vacancy->city ?: 'Не указан' }}</p>

            <p class="fw-bold mb-1">Заработная плата</p>
            <p>
                {{ $vacancy->salary_from ?? '—' }}
                —
                {{ $vacancy->salary_to ?? '—' }}
            </p>

            <p class="fw-bold mb-1">Статус</p>
            <p>{{ $vacancy->status->name }}</p>

            <p class="fw-bold mb-1">Навыки</p>

            <div class="mb-3">
                @forelse($vacancy->skills as $skill)
                    <span class="badge text-bg-light">
                        {{ $skill->name }}
                    </span>
                @empty
                    <span>Навыки отсутствуют</span>
                @endforelse
            </div>

            <p class="fw-bold mb-1">Теги</p>

            <div>
                @forelse($vacancy->tags as $tag)
                    <span class="badge text-bg-secondary">
                        {{ $tag->name }}
                    </span>
                @empty
                    <span>Теги отсутствуют</span>
                @endforelse
            </div>

        </div>

        <div class="card-footer">

            @auth

                @if(auth()->user()->isApplicant())
                    @include('vacancies.partials.applicant-buttons')
                @endif

                @can('update', $vacancy)
                    @include('vacancies.partials.employer-buttons')
                @endcan

            @endauth

        </div>

    </div>

    @can('viewApplications', $vacancy)

        @include('vacancies.partials.applications')

    @endcan

@endsection
