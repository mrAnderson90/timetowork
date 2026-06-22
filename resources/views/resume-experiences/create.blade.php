@extends('layouts.app')

@section('content')
    <h3>Добавить опыт работы</h3>

    <form action="{{ route('resume-experiences.store', $resume) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Компания</label>
            <input
                type="text"
                name="company_name"
                class="form-control"
                value="{{ old('company_name') }}"
            >

            @error('company_name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Должность</label>
            <input
                type="text"
                name="position"
                class="form-control"
                value="{{ old('position') }}"
            >

            @error('position')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Описание</label>

            <textarea
                name="description"
                class="form-control"
            >{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Дата начала</label>

            <input
                type="date"
                name="date_from"
                class="form-control"
                value="{{ old('date_from') }}"
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Дата окончания</label>

            <input
                type="date"
                name="date_to"
                class="form-control"
                value="{{ old('date_to') }}"
            >
        </div>

        <div class="form-check mb-3">
            <input
                type="checkbox"
                name="is_current"
                value="1"
                class="form-check-input"
                id="is_current"
            >

            <label class="form-check-label" for="is_current">
                Работаю сейчас
            </label>
        </div>

        <button class="btn btn-primary">
            Сохранить
        </button>

    </form>
@endsection
