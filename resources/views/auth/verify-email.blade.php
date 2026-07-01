@extends('layouts.app')

@section('title', 'Подтверждение Email')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">

            <p class="mb-4">
                На ваш email отправлено письмо с ссылкой для подтверждения регистрации.
            </p>

            @if(session('status') === 'verification-link-sent')
                <div class="alert alert-success">
                    Письмо отправлено повторно.
                </div>
            @endif

            <div class="d-flex justify-content-between">

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button class="btn btn-primary">
                        Отправить повторно
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="btn btn-outline-secondary">
                        Выйти
                    </button>
                </form>

            </div>

        </div>
    </div>

@endsection
