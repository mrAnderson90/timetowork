@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Мои компании</h3>

        @can('create', App\Models\Company::class)
            <a href="{{ route('companies.create') }}" class="btn btn-primary">
                Создать компанию
            </a>
        @endcan
    </div>

    <ul class="list-group">

        @forelse($companies as $company)

            <li class="list-group-item">

                <a href="{{ route('companies.show', $company) }}">
                    {{ $company->name }}
                </a>

            </li>

        @empty

            <li class="list-group-item">
                Компаний пока нет.
            </li>

        @endforelse

    </ul>

    <div class="mt-3">
        {{ $companies->links() }}
    </div>

@endsection
