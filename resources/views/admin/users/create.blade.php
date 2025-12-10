@extends('layouts.admin')

@section('title', 'Create User - Scentora')
@section('page_title', 'Create User')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
@endpush

@section('content')
<div class="admin-dashboard-page">
    <div class="admin-dashboard-header">
        <a href="{{ route('admin.users') }}" class="btn btn-secondary">Back to Users</a>
    </div>

        <div class="admin-form-container">
            <form method="POST" action="{{ route('admin.users.store') }}" class="admin-form">
                @csrf

                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required class="form-control">
                    @error('name')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required class="form-control">
                    @error('email')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" id="password" name="password" required class="form-control">
                    @error('password')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password *</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control">
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}>
                        Admin User
                    </label>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Create User</button>
                    <a href="{{ route('admin.users') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
</div>
@endsection

