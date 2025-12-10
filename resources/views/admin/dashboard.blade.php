@extends('layouts.admin')

@section('title', 'Admin Dashboard - Scentora')
@section('page_title', 'Dashboard')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
@endpush

@section('content')
<div class="admin-dashboard-page">
    <div class="admin-dashboard-header">
        <div class="admin-dashboard-greeting">
            <h1 class="admin-dashboard-title">Welcome back, {{ $user['name'] ?? 'Admin' }}</h1>
        </div>
    </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="admin-stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM12 14a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7z"/>
                    </svg>
                </div>
                <div class="stat-content">
                    <h3 class="stat-value">{{ number_format($stats['total_users'] ?? 0) }}</h3>
                    <p class="stat-label">Total Users</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z"/>
                        <path d="M2 17L12 22L22 17"/>
                        <path d="M2 12L12 17L22 12"/>
                    </svg>
                </div>
                <div class="stat-content">
                    <h3 class="stat-value">{{ number_format($stats['total_orders'] ?? 0) }}</h3>
                    <p class="stat-label">Total Orders</p>
                    @if(isset($stats['pending_orders']) && $stats['pending_orders'] > 0)
                        <span style="font-size: 12px; color: #c9975a;">{{ $stats['pending_orders'] }} pending</span>
                    @endif
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 16V8A2 2 0 0 0 19 6H5A2 2 0 0 0 3 8V16A2 2 0 0 0 5 18H19A2 2 0 0 0 21 16Z"/>
                        <path d="M3 10h18"/>
                    </svg>
                </div>
                <div class="stat-content">
                    <h3 class="stat-value">{{ number_format($stats['total_products'] ?? 0) }}</h3>
                    <p class="stat-label">Products</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z"/>
                    </svg>
                </div>
                <div class="stat-content">
                    <h3 class="stat-value">${{ number_format($stats['total_revenue'] ?? 0, 2) }}</h3>
                    <p class="stat-label">Revenue</p>
                </div>
            </div>
        </div>

        <div class="admin-content-grid">
            <div class="admin-card">
                <div class="admin-card-header">
                    <svg class="admin-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 16V8A2 2 0 0 0 19 6H5A2 2 0 0 0 3 8V16A2 2 0 0 0 5 18H19A2 2 0 0 0 21 16Z"/>
                        <path d="M3 10h18"/>
                    </svg>
                    <h2 class="admin-card-title">Recent Products</h2>
                    <a href="{{ route('admin.products') }}" class="admin-card-link">View All</a>
                </div>
                <div class="admin-card-body">
                    @if($recentProducts->count() > 0)
                        <div class="activity-list">
                            @foreach($recentProducts as $product)
                                <div class="activity-item">
                                    <div class="activity-content">
                                        <div class="activity-title">{{ $product->name }}</div>
                                        <div class="activity-subtitle">${{ number_format($product->price, 2) }} • {{ $product->category ?? 'Uncategorized' }}</div>
                                    </div>
                                    <div class="activity-meta">{{ $product->created_at->diffForHumans() }}</div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="empty-text">No products yet</p>
                    @endif
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-header">
                    <svg class="admin-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z"/>
                    </svg>
                    <h2 class="admin-card-title">Most Bought</h2>
                </div>
                <div class="admin-card-body">
                    @if($mostBought->count() > 0)
                        <div class="activity-list">
                            @foreach($mostBought as $item)
                                <div class="activity-item">
                                    <div class="activity-content">
                                        <div class="activity-title">{{ $item->product->name ?? 'Deleted Product' }}</div>
                                        <div class="activity-subtitle">{{ $item->total_quantity }} sold</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="empty-text">No sales yet</p>
                    @endif
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-header">
                    <svg class="admin-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z"/>
                        <path d="M2 17L12 22L22 17"/>
                        <path d="M2 12L12 17L22 12"/>
                    </svg>
                    <h2 class="admin-card-title">Recent Orders</h2>
                    <a href="{{ route('admin.orders') }}" class="admin-card-link">View All</a>
                </div>
                <div class="admin-card-body">
                    @if($recentOrders->count() > 0)
                        <div class="activity-list">
                            @foreach($recentOrders as $order)
                                <div class="activity-item">
                                    <div class="activity-content">
                                        <div class="activity-title">{{ $order->order_number }}</div>
                                        <div class="activity-subtitle">{{ $order->user->name }} • ${{ number_format($order->total, 2) }}</div>
                                    </div>
                                    <div class="activity-meta">
                                        <span class="badge badge-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="empty-text">No orders yet</p>
                    @endif
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-header">
                    <svg class="admin-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 6v6l4 2"/>
                    </svg>
                    <h2 class="admin-card-title">Pending Orders</h2>
                    <a href="{{ route('admin.orders', ['status' => 'pending']) }}" class="admin-card-link">View All</a>
                </div>
                <div class="admin-card-body">
                    @if($pendingOrders->count() > 0)
                        <div class="activity-list">
                            @foreach($pendingOrders as $order)
                                <div class="activity-item">
                                    <div class="activity-content">
                                        <div class="activity-title">{{ $order->order_number }}</div>
                                        <div class="activity-subtitle">{{ $order->user->name }} • ${{ number_format($order->total, 2) }}</div>
                                    </div>
                                    <div class="activity-meta">{{ $order->created_at->diffForHumans() }}</div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="empty-text">No pending orders</p>
                    @endif
                </div>
            </div>
        </div>
</div>
@endsection
