@extends('layouts.app')

@section('content')
    <form action="{{ route('vacancies.update', $vacancy) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input
                value="{{ old('title', $vacancy->title) }}"
                type="text" class="form-control" id="title" name="title" placeholder="Title"
            >
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category">Укажите категорию:</label>
            <select name="vacancy_category_id" id="category" class="form-select">
                @foreach($categories as $category)
                    <option
                        {{ $vacancy->category->id == $category->id ? 'selected' : '' }}
                        value="{{ $category->id }}">{{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание вакансии</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Напишите что-нибудь">{{ old('description', $vacancy->description) }}</textarea>
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="salary_from" class="form-label">Минимальная зарплата</label>
            <input
                value="{{ old('salary_from', $vacancy->salary_from) }}"
                type="number" class="form-control" id="salary_from" name="salary_from" placeholder="30000"
            >
            @error('salary_from')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="salary_to" class="form-label">Максимальная зарплата</label>
            <input
                value="{{ old('salary_to', $vacancy->salary_to) }}"
                type="number" class="form-control" id="salary_to" name="salary_to" placeholder="150000"
            >
            @error('salary_to')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="city" class="form-city">Укажите город</label>
            <input
                value="{{ old('city', $vacancy->city) }}"
                type="text" class="form-control" id="city" name="city" placeholder="Москва"
            >
            @error('city')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="employment_type">Укажите тип занятости:</label>
            <select name="employment_type_id" id="employment_type" class="form-select">
                @foreach($employmentTypes as $type)
                    <option
                        {{ $vacancy->employment_type_id == $type->id ? 'selected' : '' }}
                        value="{{ $type->id }}">{{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="experience_level">Укажите уровень опыта:</label>
            <select name="experience_level_id" id="experience_level" class="form-select">
                @foreach($experienceLevels as $level)
                    <option
                        {{ $vacancy->experience_level_id == $level->id ? 'selected' : '' }}
                        value="{{ $level->id }}">{{ $level->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Выберите теги:</label>
            <select class="form-select" name="tags[]" id="tags" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"
                        {{ in_array(
                            $tag->id,
                            old('tags', $vacancy->tags->pluck('id')->toArray())
                        ) ? 'selected' : '' }}
                    >{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="skills" class="form-label">Укажите необходимые навыки:</label>
            <select class="form-select" name="skills[]" id="skills" multiple>
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}"
                        {{ in_array(
                            $skill->id,
                            old('skills', $vacancy->skills->pluck('id')->toArray())
                        ) ? 'selected' : '' }}
                    >{{ $skill->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="vacancy_status">Укажите статус вакансии:</label>
            <select name="vacancy_status_id" id="vacancy_status" class="form-select">
                @foreach($vacancyStatuses as $status)
                    <option
                        {{ $vacancy->vacancy_status_id == $status->id ? 'selected' : '' }}
                        value="{{ $status->id }}">{{ $status->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Принять изменения</button>
    </form>
@endsection
