@extends('layouts.app')

@section('content')

    <a
        href="{{ route('vacancies.index') }}"
        class="btn btn-outline-secondary mb-4"
    >
        ← Назад
    </a>

    <div class="d-flex justify-content-between align-items-start mb-4">

        <div>

            <h2 class="mb-2">
                {{ $vacancy->title }}
            </h2>

            <div class="text-muted">
                {{ $vacancy->company->name }}
            </div>

        </div>

        <div class="text-end">

            @if($vacancy->salary_from || $vacancy->salary_to)

                <h4 class="mb-0">

                    @if($vacancy->salary_from)
                        от {{ number_format($vacancy->salary_from,0,' ',' ') }}
                    @endif

                    @if($vacancy->salary_to)
                        до {{ number_format($vacancy->salary_to,0,' ',' ') }}
                    @endif

                    ₽

                </h4>

            @endif

        </div>

    </div>

    <hr>

    <div class="row gy-3 mb-5">

        <div class="col-md-6">

            <strong>Категория</strong>

            <div>
                {{ $vacancy->category->name }}
            </div>

        </div>

        <div class="col-md-6">

            <strong>Тип занятости</strong>

            <div>
                {{ $vacancy->employmentType->name }}
            </div>

        </div>

        <div class="col-md-6">

            <strong>Опыт работы</strong>

            <div>
                {{ $vacancy->experienceLevel->name }}
            </div>

        </div>

        <div class="col-md-6">

            <strong>Город</strong>

            <div>
                {{ $vacancy->city ?: 'Не указан' }}
            </div>

        </div>

        <div class="col-md-6">

            <strong>Статус</strong>

            <div>
                {{ $vacancy->status->name }}
            </div>

        </div>

    </div>

    <section class="mb-5">

        <h5 class="mb-3">
            Описание
        </h5>

        <div>

            {{ $vacancy->description ?: 'Описание отсутствует.' }}

        </div>

    </section>

    <section class="mb-4">

        <h5 class="mb-3">
            Навыки
        </h5>

        @forelse($vacancy->skills as $skill)

            <span class="badge text-bg-light me-1 mb-1">
                {{ $skill->name }}
            </span>

        @empty

            <span class="text-muted">
                Не указаны
            </span>

        @endforelse

    </section>

    <section class="mb-5">

        <h5 class="mb-3">
            Теги
        </h5>

        @forelse($vacancy->tags as $tag)

            <span class="badge text-bg-secondary me-1 mb-1">
                {{ $tag->name }}
            </span>

        @empty

            <span class="text-muted">
                Не указаны
            </span>

        @endforelse

    </section>

    <div class="border-top pt-4 mb-5">

        @auth

            @if(auth()->user()->isApplicant())
                @include('vacancies.partials.applicant-buttons')
            @endif

            @can('update', $vacancy)
                @include('vacancies.partials.employer-buttons')
            @endcan

        @endauth

    </div>

    @can('viewApplications', $vacancy)

        @include('vacancies.partials.applications')

    @endcan

@endsection
