@extends('layouts.app')

@section('head')
    <title>{{ __('Dynamic Form Creation') }}</title>
    <!-- Bootstrap Icons (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('Form Builder') }}</h5>
                <a href="{{ URL('form-builder-create') }}" class="btn btn-outline-info  d-flex align-items-center gap-2">
                    <i class="bi bi-plus-circle"></i> {{ __('Create') }}
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">{{ __('Country Name') }}</th>
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($forms as $form)
                                <tr>
                                    <td>{{ $form->country->name }}</td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-2">
                                            <a href="{{ URL('edit-form-builder', $form->id) }}" class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-pencil-square"></i> {{ __('Edit') }}
                                            </a>
                                            <a href="{{ URL('read-form-builder', $form->id) }}" class="btn btn-outline-info btn-sm">
                                                <i class="bi bi-eye"></i> {{ __('Show') }}
                                            </a>
                                            <form method="POST" action="{{ URL('form-delete', $form->id) }}" onsubmit="return confirm('Are you sure you want to delete this Form?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="bi bi-trash"></i> {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
