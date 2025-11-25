@extends('layouts.app')

@section('title', 'Dashboard - Scentora')

@section('content')
<div class="dashboard-page">
    <div class="container">
        <div class="dashboard-header">
            <div class="dashboard-greeting">
                <h1 class="dashboard-title">Welcome Back, {{ $user['name'] }}</h1>
                <p class="dashboard-subtitle">Your fragrance journey continues here</p>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="btn btn-secondary">Logout</button>
            </form>
        </div>

        <div class="dashboard-content">
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <svg class="dashboard-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM12 14a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7z"/>
                    </svg>
                    <h2 class="dashboard-card-title">Account Information</h2>
                </div>
                <div class="dashboard-card-body">
                    <div class="info-item">
                        <span class="info-label">Name</span>
                        <span class="info-value">{{ $user['name'] }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value">{{ $user['email'] }}</span>
                    </div>
                </div>
            </div>

            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <svg class="dashboard-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z"/>
                    </svg>
                    <h2 class="dashboard-card-title">Quick Actions</h2>
                </div>
                <div class="dashboard-card-body">
                    <div class="action-grid">
                        <a href="#" class="action-item">
                            <svg class="action-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 16V8A2 2 0 0 0 19 6H5A2 2 0 0 0 3 8V16A2 2 0 0 0 5 18H19A2 2 0 0 0 21 16Z"/>
                            </svg>
                            <span>Browse Collection</span>
                        </a>
                        <a href="#" class="action-item">
                            <svg class="action-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2L2 7L12 12L22 7L12 2Z"/>
                            </svg>
                            <span>My Orders</span>
                        </a>
                        <a href="#" class="action-item">
                            <svg class="action-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM12 14a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7z"/>
                            </svg>
                            <span>Profile Settings</span>
                        </a>
                        <a href="#" class="action-item">
                            <svg class="action-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            <span>Wishlist</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.dashboard-page {
    min-height: calc(100vh - 140px);
    padding: 40px 0;
}

.dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
    flex-wrap: wrap;
    gap: 20px;
}

.dashboard-greeting {
    flex: 1;
}

.dashboard-title {
    font-family: 'Playfair Display', serif;
    font-size: 44px;
    color: #5c3a21;
    margin-bottom: 8px;
    line-height: 1.1;
}

.dashboard-subtitle {
    color: #8b5a3c;
    font-size: 15px;
}

.logout-form {
    flex-shrink: 0;
}

.btn-secondary {
    background: rgba(201, 151, 90, 0.1);
    color: #5c3a21;
    border: 2px solid rgba(92, 58, 33, 0.3);
    padding: 12px 24px;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-size: 12px;
}

.btn-secondary:hover {
    background: rgba(201, 151, 90, 0.2);
    border-color: #c9975a;
    color: #c9975a;
}

.dashboard-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 24px;
}

.dashboard-card {
    background: linear-gradient(135deg, #ffffff 0%, #f5f1e8 100%);
    border: 2px solid rgba(92, 58, 33, 0.2);
    border-radius: 12px;
    padding: 24px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(92, 58, 33, 0.08);
}

.dashboard-card:hover {
    border-color: rgba(201, 151, 90, 0.4);
    box-shadow: 0 8px 24px rgba(201, 151, 90, 0.15);
}

.dashboard-card-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    padding-bottom: 16px;
    border-bottom: 1px solid rgba(92, 58, 33, 0.2);
}

.dashboard-icon {
    width: 24px;
    height: 24px;
    color: #c9975a;
    flex-shrink: 0;
}

.dashboard-card-title {
    font-family: 'Playfair Display', serif;
    font-size: 20px;
    color: #5c3a21;
    margin: 0;
}

.dashboard-card-body {
    color: #3d2817;
}

.info-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid rgba(92, 58, 33, 0.1);
}

.info-item:last-child {
    border-bottom: none;
}

.info-label {
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #5c3a21;
}

.info-value {
    font-size: 15px;
    color: #8b5a3c;
    font-weight: 500;
}

.action-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
}

.action-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    padding: 20px;
    background: rgba(201, 151, 90, 0.08);
    border: 2px solid rgba(92, 58, 33, 0.15);
    border-radius: 10px;
    text-decoration: none;
    color: #5c3a21;
    transition: all 0.3s ease;
}

.action-item:hover {
    background: rgba(201, 151, 90, 0.15);
    border-color: rgba(201, 151, 90, 0.4);
    color: #c9975a;
    transform: translateY(-2px);
}

.action-icon {
    width: 28px;
    height: 28px;
    color: #c9975a;
}

.action-item span {
    font-size: 13px;
    font-weight: 500;
    text-align: center;
}

@media (max-width: 768px) {
    .dashboard-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .dashboard-title {
        font-size: 32px;
    }

    .dashboard-content {
        grid-template-columns: 1fr;
    }

    .action-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection

