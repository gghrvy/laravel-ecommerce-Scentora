@extends('layouts.user')

@section('title', 'Order ' . $order->order_number . ' - Scentora')
@section('page_title', 'Order Details')

@push('styles')
<style>
    .order-detail-container {
        max-width: 1000px;
        margin: 0 auto;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #8b5a3c;
        text-decoration: none;
        font-weight: 500;
        margin-bottom: 32px;
        transition: color 0.2s ease;
    }

    .back-link:hover {
        color: #2c1810;
    }

    .order-detail-card {
        background: white;
        border-radius: 16px;
        padding: 32px;
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.06);
        margin-bottom: 24px;
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 32px;
        padding-bottom: 24px;
        border-bottom: 2px solid #f0ebe0;
    }

    .order-info h1 {
        font-size: 28px;
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
        padding: 8px 18px;
        border-radius: 20px;
        font-size: 13px;
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

    .section-title {
        font-size: 20px;
        font-weight: 700;
        color: #1a0f08;
        font-family: 'Playfair Display', serif;
        margin: 0 0 20px 0;
    }

    .order-items-list {
        margin-bottom: 32px;
    }

    .order-item {
        display: flex;
        gap: 20px;
        padding: 20px 0;
        border-bottom: 1px solid #faf8f5;
    }

    .order-item:last-child {
        border-bottom: none;
    }

    .order-item-image {
        width: 100px;
        height: 100px;
        background: #faf8f5;
        border-radius: 12px;
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
        padding: 12px;
    }

    .order-item-info {
        flex: 1;
    }

    .order-item-name {
        font-size: 18px;
        font-weight: 600;
        color: #1a0f08;
        margin: 0 0 8px 0;
    }

    .order-item-details {
        font-size: 14px;
        color: #6b5d4f;
        margin: 0 0 8px 0;
    }

    .order-item-price {
        font-size: 18px;
        font-weight: 700;
        color: #1a0f08;
        font-family: 'Playfair Display', serif;
        text-align: right;
        min-width: 120px;
    }

    .order-summary {
        background: #faf8f5;
        border-radius: 12px;
        padding: 24px;
        margin-top: 32px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #e8e0d3;
    }

    .summary-row:last-child {
        border-bottom: none;
        border-top: 2px solid #2c1810;
        margin-top: 8px;
        padding-top: 16px;
    }

    .summary-label {
        font-size: 16px;
        color: #6b5d4f;
    }

    .summary-value {
        font-size: 18px;
        font-weight: 600;
        color: #1a0f08;
    }

    .summary-row:last-child .summary-value {
        font-size: 24px;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
    }

    .shipping-info {
        background: #faf8f5;
        border-radius: 12px;
        padding: 20px;
        margin-top: 24px;
    }

    .shipping-info p {
        margin: 8px 0;
        color: #4a3d2f;
        font-size: 14px;
    }

    @media (max-width: 768px) {
        .order-header {
            flex-direction: column;
            gap: 16px;
        }

        .order-item {
            flex-direction: column;
        }

        .order-item-price {
            text-align: left;
        }
    }
</style>
@endpush

@section('content')
<div class="order-detail-container">
    <a href="{{ route('orders') }}" class="back-link">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M19 12H5M12 19l-7-7 7-7"/>
        </svg>
        Back to Orders
    </a>

    <div class="order-detail-card">
        <div class="order-header">
            <div class="order-info">
                <h1>{{ $order->order_number }}</h1>
                <p class="order-date">Placed on {{ $order->created_at->format('F d, Y') }} at {{ $order->created_at->format('g:i A') }}</p>
            </div>
            <span class="order-status status-{{ strtolower($order->status) }}">
                {{ ucfirst($order->status) }}
            </span>
        </div>

        <h2 class="section-title">Order Items</h2>
        <div class="order-items-list">
            @foreach($order->items as $item)
                <div class="order-item">
                    <div class="order-item-image">
                        @if($item->product->image)
                            <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}">
                        @else
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#d4c4b0" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="2"/>
                                <circle cx="8.5" cy="8.5" r="1.5"/>
                                <path d="M21 15l-5-5L5 21"/>
                            </svg>
                        @endif
                    </div>
                    <div class="order-item-info">
                        <h3 class="order-item-name">{{ $item->product->name }}</h3>
                        <p class="order-item-details">Quantity: {{ $item->quantity }} × ${{ number_format($item->price, 2) }}</p>
                        @if($item->product->category)
                            <p class="order-item-details" style="text-transform: uppercase; font-size: 12px; color: #8b5a3c;">{{ $item->product->category }}</p>
                        @endif
                    </div>
                    <div class="order-item-price">
                        ${{ number_format($item->price * $item->quantity, 2) }}
                    </div>
                </div>
            @endforeach
        </div>

        @if($order->shipping_address)
            <div class="shipping-info">
                <h3 class="section-title" style="font-size: 18px; margin-bottom: 12px;">Shipping Address</h3>
                <p>{{ $order->shipping_address }}</p>
            </div>
        @endif

        <div class="order-summary">
            <div class="summary-row">
                <span class="summary-label">Subtotal</span>
                <span class="summary-value">${{ number_format($order->subtotal, 2) }}</span>
            </div>
            <div class="summary-row">
                <span class="summary-label">Shipping</span>
                <span class="summary-value">{{ $order->shipping > 0 ? '$' . number_format($order->shipping, 2) : 'Free' }}</span>
            </div>
            <div class="summary-row">
                <span class="summary-label">Total</span>
                <span class="summary-value">${{ number_format($order->total, 2) }}</span>
            </div>
        </div>
    </div>
</div>
@endsection

