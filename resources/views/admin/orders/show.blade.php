@extends('layouts.admin')

@section('title', 'Order Details - Scentora')
@section('page_title', 'Order #{{ $order->order_number }}')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
@endpush

@section('content')
<div class="admin-dashboard-page">
    <div class="admin-dashboard-header">
        <a href="{{ route('admin.orders') }}" class="btn btn-secondary">Back to Orders</a>
    </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="admin-content-grid">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2 class="admin-card-title">Order Information</h2>
                </div>
                <div class="admin-card-body">
                    <div class="info-item">
                        <span class="info-label">Order Number</span>
                        <span class="info-value">{{ $order->order_number }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Status</span>
                        <span class="info-value">
                            <span class="badge badge-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                        </span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Date</span>
                        <span class="info-value">{{ $order->created_at->format('F d, Y h:i A') }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Subtotal</span>
                        <span class="info-value">${{ number_format($order->subtotal, 2) }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Shipping</span>
                        <span class="info-value">${{ number_format($order->shipping, 2) }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Total</span>
                        <span class="info-value"><strong>${{ number_format($order->total, 2) }}</strong></span>
                    </div>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-header">
                    <h2 class="admin-card-title">Customer Information</h2>
                </div>
                <div class="admin-card-body">
                    <div class="info-item">
                        <span class="info-label">Name</span>
                        <span class="info-value">{{ $order->user->name }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value">{{ $order->user->email }}</span>
                    </div>
                    @if($order->shipping_address)
                    <div class="info-item">
                        <span class="info-label">Shipping Address</span>
                        <span class="info-value">{{ $order->shipping_address }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="admin-card" style="margin-top: 24px;">
            <div class="admin-card-header">
                <h2 class="admin-card-title">Order Items</h2>
            </div>
            <div class="admin-card-body">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="admin-card" style="margin-top: 24px;">
            <div class="admin-card-header">
                <h2 class="admin-card-title">Update Order Status</h2>
            </div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.orders.update-status', $order->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <select name="status" class="form-control" style="max-width: 300px; display: inline-block;">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <button type="submit" class="btn btn-primary" style="margin-left: 10px;">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection

