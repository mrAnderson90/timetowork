@extends('layouts.app')

@section('content')
    <h3>Отклик на вакансию</h3>

    <a
        href="{{ route('vacancies.show', $vacancy) }}"
        class="btn btn-secondary mb-3"
    >
        Назад
    </a>

    <p class="text-muted mb-4">
        Вакансия:
        <strong>{{ $vacancy->title }}</strong>
    </p>

    <form
        action="{{ route('applications.store', $vacancy) }}"
        method="POST"
    >
        @csrf

        <div class="mb-3">
            <label class="form-label">
                Выберите резюме
            </label>

            <select
                name="resume_id"
                class="form-select"
            >
                @foreach($resumes as $resume)
                    <option
                        value="{{ $resume->id }}"
                        {{ old('resume_id') == $resume->id ? 'selected' : '' }}
                    >
                        {{ $resume->title }}
                    </option>
                @endforeach
            </select>

            @error('resume_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">
                Сопроводительное письмо
            </label>

            <textarea
                name="cover_letter"
                rows="6"
                class="form-control"
            >{{ old('cover_letter') }}</textarea>

            @error('cover_letter')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button class="btn btn-primary">
            Отправить отклик
        </button>
    </form>
@endsection
