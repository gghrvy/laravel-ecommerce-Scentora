@extends('layouts.admin')

@section('title', 'Orders - Scentora')
@section('page_title', 'Orders')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
@endpush

@section('content')
<div class="admin-dashboard-page">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="admin-table-container">
            <div class="admin-table-header">
                <form method="GET" action="{{ route('admin.orders') }}" class="admin-search-form">
                    <select name="status" class="admin-search-input">
                        <option value="">All Statuses</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    <button type="submit" class="btn btn-secondary">Filter</button>
                </form>
            </div>

            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Customer</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->user->name }}<br><small>{{ $order->user->email }}</small></td>
                            <td>{{ $order->items->count() }} item(s)</td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td>
                                <span class="badge badge-{{ $order->status }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 40px;">No orders found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="admin-pagination">
                {{ $orders->links() }}
            </div>
        </div>
</div>
@endsection

