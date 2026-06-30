@extends('layouts.app')

@section('content')

    <form action="{{ route('vacancies.update', $vacancy) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="title" class="form-label">Название вакансии</label>
            <input type="text" class="form-control" id="title" name="title"
                   value="{{ old('title', $vacancy->title) }}">
            @error('title')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <div class="mb-3">
            <label for="company_id" class="form-label">Компания</label>
            <select name="company_id" id="company_id" class="form-select">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}"
                        {{ old('company_id', $vacancy->company_id) == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
            @error('company_id')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <div class="mb-3">
            <label for="vacancy_category_id" class="form-label">Категория</label>
            <select name="vacancy_category_id" id="vacancy_category_id" class="form-select">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('vacancy_category_id', $vacancy->vacancy_category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $vacancy->description) }}</textarea>
            @error('description')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <div class="mb-3">
            <label for="salary_from" class="form-label">Зарплата от</label>
            <input type="number" class="form-control" id="salary_from" name="salary_from"
                   value="{{ old('salary_from', $vacancy->salary_from) }}">
            @error('salary_from')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <div class="mb-3">
            <label for="salary_to" class="form-label">Зарплата до</label>
            <input type="number" class="form-control" id="salary_to" name="salary_to"
                   value="{{ old('salary_to', $vacancy->salary_to) }}">
            @error('salary_to')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Город</label>
            <input type="text" class="form-control" id="city" name="city"
                   value="{{ old('city', $vacancy->city) }}">
            @error('city')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <div class="mb-3">
            <label for="employment_type_id" class="form-label">Тип занятости</label>
            <select name="employment_type_id" id="employment_type_id" class="form-select">
                @foreach($employmentTypes as $type)
                    <option value="{{ $type->id }}"
                        {{ old('employment_type_id', $vacancy->employment_type_id) == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="experience_level_id" class="form-label">Опыт работы</label>
            <select name="experience_level_id" id="experience_level_id" class="form-select">
                @foreach($experienceLevels as $level)
                    <option value="{{ $level->id }}"
                        {{ old('experience_level_id', $vacancy->experience_level_id) == $level->id ? 'selected' : '' }}>
                        {{ $level->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Теги</label>
            <select name="tags[]" id="tags" class="form-select" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"
                        {{ in_array($tag->id, old('tags', $vacancy->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="skills" class="form-label">Навыки</label>
            <select name="skills[]" id="skills" class="form-select" multiple>
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}"
                        {{ in_array($skill->id, old('skills', $vacancy->skills->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $skill->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="vacancy_status_id" class="form-label">Статус</label>
            <select name="vacancy_status_id" id="vacancy_status_id" class="form-select">
                @foreach($vacancyStatuses as $status)
                    <option value="{{ $status->id }}"
                        {{ old('vacancy_status_id', $vacancy->vacancy_status_id) == $status->id ? 'selected' : '' }}>
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Сохранить изменения</button>
    </form>

@endsection
