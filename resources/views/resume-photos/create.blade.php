@extends('layouts.app')

@section('content')
    <h3>Добавить фотографию</h3>

    <form
        action="{{ route('resume-photos.store', $resume) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        <div class="mb-3">
            <label class="form-label">
                Фотография
            </label>

            <input
                type="file"
                name="image"
                class="form-control"
            >

            @error('image')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input
                type="checkbox"
                name="is_main"
                value="1"
                class="form-check-input"
                id="is_main"
            >

            <label
                for="is_main"
                class="form-check-label"
            >
                Сделать главной фотографией
            </label>
        </div>

        <button class="btn btn-primary">
            Загрузить
        </button>
    </form>
@endsection
