@extends('layouts.app')

@section('content')
    <h3>Подробно о резюме</h3>

    <a href="{{ route('resumes.index') }}" class="btn btn-primary mb-3">
        Вернуться к списку резюме
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

                <p class="fw-bold mb-1">Город:</p>
                <p>{{ $resume->city }}</p>

                <p class="fw-bold mb-1">Желаемый уровень дохода:</p>
                <p>{{ $resume->desired_salary }}</p>

                <p class="fw-bold mb-1">Описание:</p>
                <p>{{ $resume->about }}</p>

                <div class="d-flex justify-content-between gap-2 mt-2">
                    <p class="fw-bold mb-1">Опыт работы:</p>

                    <a
                        href="{{ route('resume-experiences.create', $resume) }}"
                        class=""
                    >Добавить опыт работы</a>
                </div>
                <ul class="list-group">
                    @forelse($resume->experiences as $experience)
                        <li class="list-group-item">
                            <p class="fw-bold mb-1">{{ $experience->company_name }}</p>

                            <p>Должность: {{ $experience->position }}</p>

                            <p class="text-muted">
                                {{ $experience->date_from }}

                                —

                                {{ $experience->is_current
                                    ? 'по настоящее время'
                                    : $experience->date_to }}
                            </p>

                            @if($experience->description)
                                <p>
                                    {{ $experience->description }}
                                </p>
                            @endif

                            <div class="d-flex gap-2 mt-2">

                                <a
                                    href="{{ route('resume-experiences.edit', $experience) }}"
                                    class="btn btn-sm btn-primary"
                                >Изменить</a>

                                <form
                                    action="{{ route('resume-experiences.destroy', $experience) }}"
                                    method="POST"
                                    onsubmit="return confirm('Удалить опыт работы?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger" type="submit">
                                        Удалить
                                    </button>

                                </form>

                            </div>
                        </li>
                    @empty
                        <li>
                            <p>Прежних мест работы пока не указано</p>
                        </li>
                    @endforelse
                </ul>

                <p class="fw-bold mb-1">Статус резюме (видимость):</p>
                <p>{{ $resume->visibility->name }}</p>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('resumes.edit', $resume) }}"
                   class="btn btn-primary"
                >
                    Редактировать резюме
                </a>

                <form action="{{ route('resumes.destroy', $resume) }}" method="POST" onsubmit="return confirm('Удалить резюме?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Удалить
                    </button>
                </form>
            </div>

        </div>
        <div class="card-footer text-body-secondary">
            @forelse($resume->skills as $skill)
                <span class="badge text-bg-secondary">{{ $skill->name }}</span>
            @empty
                <span>Навыки не указаны</span>
            @endforelse
        </div>
    </div>
@endsection
