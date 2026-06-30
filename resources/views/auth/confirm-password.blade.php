@extends('layouts.app')

@section('title', 'Подтверждение пароля')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">

            <p class="mb-4">
                Для продолжения подтвердите пароль.
            </p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="mb-4">
                    <label class="form-label">Пароль</label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required
                    >
                </div>

                <button class="btn btn-primary">
                    Подтвердить
                </button>

            </form>

        </div>
    </div>

@endsection
