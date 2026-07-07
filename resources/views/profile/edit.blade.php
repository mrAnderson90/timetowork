@extends('layouts.app')

@section('content')

    <h3 class="mb-4">
        Мой профиль
    </h3>

    @include('profile.partials.personal-data')

    @include('profile.partials.password')

    @include('profile.partials.delete-account')

@endsection
