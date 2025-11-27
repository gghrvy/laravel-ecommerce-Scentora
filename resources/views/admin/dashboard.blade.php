@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Admin Dashboard</h1>
    <p>Welcome back, {{ $user['name'] ?? 'Admin' }}.</p>

    <div class="card mt-4">
        <div class="card-body">
            <h2 class="h5">Quick Links</h2>
            <ul class="mb-0">
                <li><a href="{{ route('admin.settings') }}">Settings</a></li>
                <li><a href="{{ route('dashboard') }}">User Dashboard</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection

