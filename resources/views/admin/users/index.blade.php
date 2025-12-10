@extends('layouts.admin')

@section('title', 'Users - Scentora')
@section('page_title', 'Users')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
@endpush

@section('content')
<div class="admin-dashboard-page">
    <div class="admin-dashboard-header">
        <a href="{{ route('admin.users.create') }}" class="btn btn-secondary">Add New User</a>
    </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="admin-table-container">
            <div class="admin-table-header">
                <form method="GET" action="{{ route('admin.users') }}" class="admin-search-form">
                    <input type="text" name="search" placeholder="Search users..." value="{{ request('search') }}" class="admin-search-input">
                    <button type="submit" class="btn btn-secondary">Search</button>
                </form>
            </div>

            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->is_admin ? 'badge-warning' : 'badge-info' }}">
                                    {{ $user->is_admin ? 'Admin' : 'User' }}
                                </span>
                            </td>
                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="admin-action-buttons-inline">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm">Edit</a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 40px;">No users found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="admin-pagination">
                {{ $users->links() }}
            </div>
        </div>
</div>
@endsection

