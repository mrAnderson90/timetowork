@extends('layouts.app')

@section('content')

    <form action="{{ route('employer.companies.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Название</label>
            <input class="form-control" name="name" value="{{ old('name') }}">
            @error('name')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Описание</label>
            <textarea class="form-control" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Сайт</label>
            <input class="form-control" name="website" value="{{ old('website') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Город</label>
            <input class="form-control" name="city" value="{{ old('city') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Телефон</label>
            <input class="form-control" name="contact_phone" value="{{ old('contact_phone') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control" name="contact_email" value="{{ old('contact_email') }}">
        </div>

        <button class="btn btn-primary">
            Создать
        </button>

    </form>

@endsection
