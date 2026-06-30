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

                @if(auth()->user()->isEmployer())
                    @include('vacancies.partials.employer-buttons')
                @endif

            @endauth

        </div>

    </div>

    <div class="card">

        <div class="card-header">
            Отклики
        </div>

        <div class="card-body">

            @forelse($vacancy->applications as $application)

                <div class="border rounded p-3 mb-3">

                    <h5 class="mb-3">
                        {{ $application->resume->title }}
                    </h5>

                    <p class="mb-1">
                        <strong>Статус:</strong>
                        {{ $application->status->name }}
                    </p>

                    <p class="mb-1">
                        <strong>Дата отклика:</strong>
                        {{ $application->created_at->format('d.m.Y H:i') }}
                    </p>

                    <p class="mb-1">
                        <strong>Сопроводительное письмо:</strong>
                    </p>

                    <p class="mb-3">
                        {{ $application->cover_letter ?: 'Не указано' }}
                    </p>

                    <div class="d-flex gap-2">

                        <a
                            href="{{ route('applications.edit', $application) }}"
                            class="btn btn-sm btn-primary"
                        >
                            Изменить статус
                        </a>

                        <form
                            action="{{ route('applications.destroy', $application) }}"
                            method="POST"
                            onsubmit="return confirm('Удалить отклик?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm btn-danger">
                                Удалить
                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <p class="text-muted mb-0">
                    Пока никто не откликнулся.
                </p>

            @endforelse

        </div>

    </div>

@endsection
