@extends('layouts.backend')

@section('content')
<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Skills') }}</li>
        </ol>
    </nav>
    <div class="btn-group float-right">
        <a href="{{ route('skills.create') }}" class="btn btn-outline-dark">
            <i class="fas fa-plus"></i>
            {{ __('New Skill') }}
        </a>
    </div>
    <h2 class="mb-4">{{ __('Skill Management') }}</h2>
    <table class="table table-borderless table-hover ui-sortable" data-url="{{ route('skills.reorder') }}">
        <thead class="thead-dark">
            <tr>
                <th>{{ __('Skill') }}</th>
                <th>{{ __('Experience') }}</th>
                <th class="text-right">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
            <tr class="sortable" data-id="{{ $skill->id }}">
                <td>{{ $skill->name }}</td>
                <td>{{ $skill->years }} Year(s)</td>
                <td>
                    <form class="form-inline float-right" action="{{ route('skills.destroy', $skill->id) }}"
                        method="POST"
                        onsubmit="return confirm('{{ __('Are you sure you want to delete this skill?') }}')">
                        @csrf @method('DELETE')
                        <div class="btn-group">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('skills.edit', $skill->id) }}">
                                <i class="fas fa-edit"></i> {{ __('Edit') }}
                            </a>
                            <button class="btn btn-outline-dark btn-sm">
                                <i class="fas fa-times"></i>
                                {{ __('Delete') }}
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
