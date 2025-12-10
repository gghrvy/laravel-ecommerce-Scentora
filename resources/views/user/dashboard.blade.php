@extends('layouts.user')

@section('title', 'Dashboard - Scentora')
@section('page_title', 'Dashboard')

@section('content')
<div class="dashboard-welcome">
    <div class="welcome-content">
        <h1 class="welcome-title">Welcome back, {{ $user['name'] ?? 'Guest' }}!</h1>
        <p class="welcome-subtitle">Manage your account and explore our collection</p>
    </div>
</div>

<div class="dashboard-grid">
    <div class="dashboard-card">
        <div class="dashboard-card-header">
            <svg class="dashboard-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20 7h-4M4 7h4m0 0v13m0-13h8m-8 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v3"/>
            </svg>
            <h2 class="dashboard-card-title">Products</h2>
        </div>
        <div class="dashboard-card-body">
            <p class="dashboard-card-text">Browse our collection of luxury fragrances</p>
            <a href="{{ route('products') }}" class="btn primary">View Products</a>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="dashboard-card-header">
            <svg class="dashboard-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="8" r="4"/>
                <path d="M4 20a8 8 0 0 1 16 0"/>
            </svg>
            <h2 class="dashboard-card-title">Profile</h2>
        </div>
        <div class="dashboard-card-body">
            <p class="dashboard-card-text">Manage your account settings and preferences</p>
            <a href="{{ route('profile') }}" class="btn primary">View Profile</a>
        </div>
    </div>
</div>
@endsection

