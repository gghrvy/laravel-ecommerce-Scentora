@extends('layouts.admin')

@section('title', 'Edit User - Scentora')
@section('page_title', 'Edit User')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
@endpush

@section('content')
<div class="admin-dashboard-page">
    <div class="admin-dashboard-header">
        <a href="{{ route('admin.users') }}" class="btn btn-secondary">Back to Users</a>
    </div>

        <div class="admin-form-container">
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="admin-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required class="form-control">
                    @error('name')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required class="form-control">
                    @error('email')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="password">New Password (leave blank to keep current)</label>
                    <input type="password" id="password" name="password" class="form-control">
                    @error('password')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
                        Admin User
                    </label>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update User</button>
                    <a href="{{ route('admin.users') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
</div>
@endsection

