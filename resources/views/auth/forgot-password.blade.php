@extends('layouts.app')

@section('title', 'Восстановление пароля')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">

            <p class="mb-4">
                Введите email, и мы отправим ссылку для восстановления пароля.
            </p>

            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-4">
                    <label class="form-label">Email</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    >
                </div>

                <button class="btn btn-primary">
                    Отправить ссылку
                </button>

            </form>

        </div>
    </div>

@endsection
