@extends('layouts.app')

@section('title', 'Сброс пароля')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input
                    type="hidden"
                    name="token"
                    value="{{ $request->route('token') }}"
                >

                <div class="mb-3">
                    <label class="form-label">Email</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', $request->email) }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Новый пароль</label>

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

                <button class="btn btn-primary">
                    Сохранить пароль
                </button>

            </form>

        </div>
    </div>

@endsection
