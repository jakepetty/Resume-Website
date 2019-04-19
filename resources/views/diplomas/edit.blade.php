@extends('layouts.backend')
@section('content')
<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('diplomas.index') }}">{{ __('Diplomas') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Updating Diploma') }}</li>
        </ol>
    </nav>
    <h2>{{ __('Updating') }} {{ $diploma->name }}</h2>
    <hr>
    <form action="{{ route('diplomas.update', $diploma->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="diploma-name">{{ __('Institute') }}</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="diploma-name" name="name" value="{{ old('name', $diploma->name) }}" placeholder="{{ __('The university or college you attended') }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="diploma-major">{{ __('Major') }}</label>
            <input type="text" class="form-control {{ $errors->has('major') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="diploma-major" name="major" value="{{ old('major', $diploma->major) }}" placeholder="{{ __('Your major you studied') }}">
            @if($errors->has('major'))
            <div class="invalid-feedback">{{ $errors->first('major') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="diploma-year">{{ __('Date Aquired') }} ({{ __("Leave blank if didn't graduate") }})</label>
            <input type="text" class="form-control {{ $errors->has('year') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="diploma-year" name="year" value="{{ old('year',$diploma->year) }}" placeholder="{{ __('The date you obtained your degree (eg. 02/2006)') }}">
            @if($errors->has('year'))
            <div class="invalid-feedback">{{ $errors->first('year') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="diploma-location">{{ __('Location') }}</label>
            <input type="text" class="form-control {{ $errors->has('location') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="diploma-location" name="location" value="{{ old('location', $diploma->location) }}" placeholder="{{ __('The geographical location of the university or college you attended') }}">
            @if($errors->has('location'))
            <div class="invalid-feedback">{{ $errors->first('location') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> {{ __('Save') }}</button>
    </form>
</section>
@endsection
