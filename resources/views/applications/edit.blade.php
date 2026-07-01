@extends('layouts.app')

@section('content')
    <h3>Изменить статус отклика</h3>

    <a
        href="{{ route('vacancies.show', $application->vacancy) }}"
        class="btn btn-secondary mb-3"
    >
        Назад
    </a>

    <form
        action="{{ route('applications.update', $application) }}"
        method="POST"
    >
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label class="form-label">
                Статус
            </label>

            <select
                name="application_status_id"
                class="form-select"
            >
                @foreach($statuses as $status)
                    <option
                        value="{{ $status->id }}"
                        {{ old(
                            'application_status_id',
                            $application->application_status_id
                        ) == $status->id ? 'selected' : '' }}
                    >
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>

            @error('application_status_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="d-flex gap-2">

            <button class="btn btn-primary">
                Сохранить
            </button>

            <a
                href="{{ route('vacancies.show', $application->vacancy) }}"
                class="btn btn-secondary"
            >
                Отмена
            </a>

        </div>
    </form>
@endsection
