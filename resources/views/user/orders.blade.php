@extends('layouts.user')

@section('title', 'Orders - Scentora')
@section('page_title', 'Orders')

@push('styles')
<style>
    .orders-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .orders-header {
        margin-bottom: 32px;
    }

    .orders-title {
        font-size: 32px;
        font-weight: 700;
        color: #1a0f08;
        font-family: 'Playfair Display', serif;
        margin: 0;
    }

    .orders-list {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .order-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.06);
        border: 1px solid rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .order-card:hover {
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #f0ebe0;
    }

    .order-info {
        flex: 1;
    }

    .order-number {
        font-size: 18px;
        font-weight: 700;
        color: #1a0f08;
        font-family: 'Playfair Display', serif;
        margin: 0 0 8px 0;
    }

    .order-date {
        font-size: 14px;
        color: #6b5d4f;
        margin: 0;
    }

    .order-status {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-pending {
        background: #fef3c7;
        color: #92400e;
    }

    .status-processing {
        background: #dbeafe;
        color: #1e40af;
    }

    .status-shipped {
        background: #e0e7ff;
        color: #3730a3;
    }

    .status-delivered {
        background: #d1fae5;
        color: #065f46;
    }

    .status-cancelled {
        background: #fee2e2;
        color: #991b1b;
    }

    .order-items {
        margin-bottom: 20px;
    }

    .order-item {
        display: flex;
        gap: 16px;
        padding: 16px 0;
        border-bottom: 1px solid #faf8f5;
    }

    .order-item:last-child {
        border-bottom: none;
    }

    .order-item-image {
        width: 80px;
        height: 80px;
        background: #faf8f5;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        flex-shrink: 0;
    }

    .order-item-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 8px;
    }

    .order-item-info {
        flex: 1;
    }

    .order-item-name {
        font-size: 16px;
        font-weight: 600;
        color: #1a0f08;
        margin: 0 0 4px 0;
    }

    .order-item-details {
        font-size: 14px;
        color: #6b5d4f;
        margin: 0;
    }

    .order-item-price {
        font-size: 16px;
        font-weight: 600;
        color: #1a0f08;
        text-align: right;
        min-width: 100px;
    }

    .order-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 20px;
        border-top: 1px solid #f0ebe0;
    }

    .order-total {
        font-size: 20px;
        font-weight: 700;
        color: #1a0f08;
        font-family: 'Playfair Display', serif;
    }

    .order-actions {
        display: flex;
        gap: 12px;
    }

    .btn-view-order {
        padding: 10px 20px;
        font-size: 14px;
        font-weight: 600;
        background: #2c1810;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-view-order:hover {
        background: #3d2817;
        transform: translateY(-1px);
    }

    @media (max-width: 768px) {
        .order-header {
            flex-direction: column;
            gap: 12px;
        }

        .order-footer {
            flex-direction: column;
            gap: 16px;
            align-items: stretch;
        }

        .order-actions {
            width: 100%;
        }

        .btn-view-order {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endpush

@section('content')
<div class="orders-container">
    <div class="orders-header">
        <h1 class="orders-title">My Orders</h1>
    </div>

    @if($orders->count() > 0)
        <div class="orders-list">
            @foreach($orders as $order)
                <div class="order-card" onclick="window.location.href='{{ route('order.show', $order->id) }}'">
                    <div class="order-header">
                        <div class="order-info">
                            <h3 class="order-number">{{ $order->order_number }}</h3>
                            <p class="order-date">Placed on {{ $order->created_at->format('F d, Y') }} at {{ $order->created_at->format('g:i A') }}</p>
                        </div>
                        <span class="order-status status-{{ strtolower($order->status) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <div class="order-items">
                        @foreach($order->items->take(3) as $item)
                            <div class="order-item">
                                <div class="order-item-image">
                                    @if($item->product->image)
                                        <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}">
                                    @else
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#d4c4b0" stroke-width="1.5">
                                            <rect x="3" y="3" width="18" height="18" rx="2"/>
                                            <circle cx="8.5" cy="8.5" r="1.5"/>
                                            <path d="M21 15l-5-5L5 21"/>
                                        </svg>
                                    @endif
                                </div>
                                <div class="order-item-info">
                                    <h4 class="order-item-name">{{ $item->product->name }}</h4>
                                    <p class="order-item-details">Quantity: {{ $item->quantity }} × ${{ number_format($item->price, 2) }}</p>
                                </div>
                                <div class="order-item-price">
                                    ${{ number_format($item->price * $item->quantity, 2) }}
                                </div>
                            </div>
                        @endforeach
                        @if($order->items->count() > 3)
                            <p style="text-align: center; color: #8b5a3c; font-size: 14px; margin-top: 12px; padding-top: 12px; border-top: 1px solid #faf8f5;">
                                +{{ $order->items->count() - 3 }} more item(s)
                            </p>
                        @endif
                    </div>

                    <div class="order-footer">
                        <div class="order-total">
                            Total: ${{ number_format($order->total, 2) }}
                        </div>
                        <div class="order-actions" onclick="event.stopPropagation();">
                            <a href="{{ route('order.show', $order->id) }}" class="btn-view-order">
                                View Details
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <div class="empty-state-content">
                <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z"/>
                    <path d="M2 17L12 22L22 17"/>
                    <path d="M2 12L12 17L22 12"/>
                </svg>
                <h3 class="empty-title">No Orders Yet</h3>
                <p class="empty-text">Your order history will appear here once you place an order.</p>
                <a href="{{ route('products') }}" class="btn primary">Browse Products</a>
            </div>
        </div>
    @endif
</div>
@endsection
