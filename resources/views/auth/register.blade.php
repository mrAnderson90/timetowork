@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="mb-4">Регистрация</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Имя</label>

                    <input
                        type="text"
                        name="first_name"
                        class="form-control"
                        value="{{ old('first_name') }}"
                        required
                        autofocus
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Фамилия</label>

                    <input
                        type="text"
                        name="last_name"
                        class="form-control"
                        value="{{ old('last_name') }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Пароль</label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label">Подтверждение пароля</label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        required
                    >
                </div>

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('login') }}">
                        Уже зарегистрированы?
                    </a>

                    <button class="btn btn-primary">
                        Зарегистрироваться
                    </button>

                </div>

            </form>

        </div>
    </div>

@endsection
