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

            <div class="card-text mb-3">
                @if($resume->mainPhoto)
                    <div class="mb-3">
                        <img
                            src="{{ asset('storage/' . $resume->mainPhoto->path) }}"
                            class="img-thumbnail"
                            width="250"
                            alt=""
                        >
                    </div>
                @endif

                <p class="fw-bold mb-1">Тип занятости:</p>
                <p>{{ $resume->employmentType->name }}</p>

                <p class="fw-bold mb-1">Город:</p>
                <p>{{ $resume->city }}</p>

                <p class="fw-bold mb-1">Желаемый уровень дохода:</p>
                <p>{{ $resume->desired_salary }}</p>

                <p class="fw-bold mb-1">Описание:</p>
                <p>{{ $resume->about }}</p>

                <div>
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
                            <li class="list-group-item">Прежних мест работы пока не указано</li>
                        @endforelse
                    </ul>
                </div>

                <div>
                    <div class="d-flex justify-content-between gap-2 mt-2">
                        <p class="fw-bold mb-1">Образование:</p>

                        <a
                            href="{{ route('resume-educations.create', $resume) }}"
                            class=""
                        >Добавить место учёбы</a>
                    </div>

                    <ul class="list-group">
                        @forelse($resume->educations as $education)

                            <li class="list-group-item">

                                <p class="fw-bold">
                                    {{ $education->institution }}
                                </p>

                                <p>
                                    {{ $education->degree->name }}
                                </p>

                                @if($education->faculty)
                                    <p>
                                        Факультет:
                                        {{ $education->faculty }}
                                    </p>
                                @endif

                                <p class="text-muted">
                                    {{ \Carbon\Carbon::parse($education->date_from)->format('d.m.Y') }}
                                    —
                                    {{ \Carbon\Carbon::parse($education->date_to)->format('d.m.Y') }}
                                </p>

                                @if($education->specialization)
                                    <p>
                                        Специальность:
                                        {{ $education->specialization }}
                                    </p>
                                @endif

                                <div class="d-flex gap-2 mt-2">

                                    <a
                                        href="{{ route('resume-educations.edit', $education) }}"
                                        class="btn btn-sm btn-primary"
                                    >Изменить</a>

                                    <form
                                        action="{{ route('resume-educations.destroy', $education) }}"
                                        method="POST"
                                        onsubmit="return confirm('Удалить место учёбы?')"
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

                            <li class="list-group-item">
                                Образование не указано
                            </li>

                        @endforelse
                    </ul>
                </div>

                <h5>Фотографии</h5>

                <div>
                    <a
                        href="{{ route('resume-photos.create', $resume) }}"
                        class="btn btn-primary"
                    >
                        Добавить фотографию
                    </a>
                </div>

                <div class="row">
                    @foreach($resume->photos as $photo)
                        <div class="col-md-3 mb-3">

                            <div class="position-relative border rounded p-2">

                                <img
                                    src="{{ asset('storage/' . $photo->path) }}"
                                    class="img-fluid rounded"
                                    alt="Фото резюме"
                                >

                                <div class="position-absolute top-0 end-0 m-2">

                                    @if($photo->is_main)
                                        <span class="badge text-bg-success">Главное</span>
                                    @else

                                        <form
                                            action="{{ route('resume-photos.update', $photo) }}"
                                            method="POST"
                                        >
                                            @csrf
                                            @method('PATCH')

                                            <input
                                                type="hidden"
                                                name="is_main"
                                                value="1"
                                            >

                                            <button type="submit" class="btn btn-sm btn-warning">
                                                Сделать главной
                                            </button>
                                        </form>

                                    @endif

                                </div>

                            </div>

                            <form
                                action="{{ route('resume-photos.destroy', $photo) }}"
                                method="POST"
                                class="mt-2"
                                onsubmit="return confirm('Удалить фотографию?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm w-100"
                                >
                                    Удалить
                                </button>

                            </form>

                        </div>
                    @endforeach
                </div>

                <p class="fw-bold mb-1">Статус резюме (видимость):</p>
                <p>{{ $resume->visibility->name }}</p>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('resumes.edit', $resume) }}"
                   class="btn btn-primary"
                >
                    Редактировать резюме
                </a>

                <form action="{{ route('resumes.destroy', $resume) }}" method="POST"
                      onsubmit="return confirm('Удалить резюме?')">
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
