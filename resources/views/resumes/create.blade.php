@extends('layouts.app')

@section('content')
    <form action="{{ route('resumes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input
                value="{{ old('title') }}"
                type="text" class="form-control" id="title" name="title" placeholder="Программист"
            >
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="desired_salary" class="form-label">Желаемый уровень дохода:</label>
            <input
                value="{{ old('desired_salary') }}"
                type="number" class="form-control" id="desired_salary" name="desired_salary" placeholder="30000"
            >
            @error('desired_salary')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Укажите город:</label>
            <input
                value="{{ old('city') }}"
                type="text" class="form-control" id="city" name="city" placeholder="Москва"
            >
            @error('city')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="employment_type">Укажите тип занятости:</label>
            <select name="employment_type_id" id="employment_type" class="form-select">
                @foreach($employmentTypes as $employmentType)
                    <option
                        {{ old('employment_type_id') == $employmentType->id ? 'selected' : '' }}
                        value="{{ $employmentType->id }}">{{ $employmentType->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="skills" class="form-label">Укажите свои навыки:</label>
            <select class="form-select" name="skills[]" id="skills" multiple>
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}"
                        {{ in_array($skill->id, old('skills', [])) ? 'selected' : '' }}
                    >{{ $skill->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="about" class="form-label">О себе:</label>
            <textarea type="text" class="form-control" id="about" name="about" placeholder="Напишите что-нибудь о себе">{{ old('about') }}</textarea>
            @error('about')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="visibility">Видимость резюме:</label>
            <select name="resume_visibility_id" id="visibility" class="form-select">
                @foreach($visibilities as $visibility)
                    <option
                        {{ old('resume_visibility_id') == $visibility->id ? 'selected' : '' }}
                        value="{{ $visibility->id }}">{{ $visibility->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Создать резюме</button>
    </form>
@endsection
