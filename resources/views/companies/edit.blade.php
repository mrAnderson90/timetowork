@extends('layouts.app')

@section('content')

    <form action="{{ route('employer.companies.update',$company) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label class="form-label">Название</label>
            <input class="form-control" name="name" value="{{ old('name', $company->name) }}">
            @error('name')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Описание</label>
            <textarea class="form-control" name="description">{{ old('description', $company->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Сайт</label>
            <input class="form-control" name="website" value="{{ old('website', $company->website) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Город</label>
            <input class="form-control" name="city" value="{{ old('city', $company->city) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Телефон</label>
            <input class="form-control" name="contact_phone" value="{{ old('contact_phone', $company->contact_phone) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control" name="contact_email" value="{{ old('contact_email', $company->contact_email) }}">
        </div>

        <button class="btn btn-primary">
            Создать
        </button>

    </form>

@endsection
