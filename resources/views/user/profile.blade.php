    @extends('layouts.user')

@section('title', 'Profile - Scentora')
@section('page_title', 'Profile')

@section('content')
<div class="dashboard-grid">
    <div class="dashboard-card">
        <div class="dashboard-card-header">
            <svg class="dashboard-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="8" r="4"/>
                <path d="M4 20a8 8 0 0 1 16 0"/>
            </svg>
            <h2 class="dashboard-card-title">Account</h2>
        </div>
        <div class="dashboard-card-body">
            <div class="info-item">
                <span class="info-label">Name</span>
                <span class="info-value">{{ session('user.name') ?? (session('user')['name'] ?? '-') }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Email</span>
                <span class="info-value">{{ session('user.email') ?? (session('user')['email'] ?? '-') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection

