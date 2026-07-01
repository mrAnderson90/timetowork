@extends('layouts.app')

@section('content')
    <h3>Редактировать место обучения</h3>

    <form action="{{ route('resume-educations.update', $education) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label class="form-label">Учебное заведение</label>
            <input
                type="text"
                name="institution"
                class="form-control"
                value="{{ old('institution', $education->institution) }}"
            >

            @error('institution')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Факультет</label>
            <input type="text" name="faculty" class="form-control" value="{{ old('faculty', $education->faculty) }}">

            @error('faculty')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Специальность</label>
            <input type="text" name="specialization" class="form-control" value="{{ old('specialization', $education->specialization) }}">

            @error('specialization')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Ученая степень</label>

            <select name="degree_id" class="form-select">
                @foreach($degrees as $degree)
                    <option
                        {{ old('degree_id', $education->degree_id) == $degree->id ? 'selected' : ''}}
                        value="{{ $degree->id }}"
                    >
                        {{ $degree->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Дата начала</label>

            <input
                type="date"
                name="date_from"
                class="form-control"
                value="{{ old('date_from', $education->date_from) }}"
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Дата окончания</label>

            <input
                type="date"
                name="date_to"
                class="form-control"
                value="{{ old('date_to', $education->date_to) }}"
            >
        </div>

        <button class="btn btn-primary">
            Сохранить
        </button>

    </form>
@endsection
