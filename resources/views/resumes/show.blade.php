@extends('layouts.app')

@section('content')

    @php
        $canUpdate = auth()->user()?->can('update', $resume);
    @endphp

    @include('resumes.partials.header')

    @include('resumes.partials.info')

    @include('resumes.partials.experiences')

    @include('resumes.partials.educations')

    @include('resumes.partials.photos')

    @include('resumes.partials.skills')

    @if($canUpdate)
        @include('resumes.partials.actions')
    @endif

@endsection
