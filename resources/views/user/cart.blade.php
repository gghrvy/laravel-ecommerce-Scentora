@extends('layouts.user')

@section('title', 'Cart - Scentora')
@section('page_title', 'Shopping Cart')

@push('styles')
<style>
    .cart-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .cart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 32px;
    }

    .cart-title {
        font-size: 32px;
        font-weight: 700;
        color: #1a0f08;
        font-family: 'Playfair Display', serif;
        margin: 0;
    }

    .cart-items {
        background: white;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.06);
        margin-bottom: 24px;
    }

    .cart-item {
        display: grid;
        grid-template-columns: 120px 1fr auto auto auto;
        gap: 24px;
        align-items: center;
        padding: 24px 0;
        border-bottom: 1px solid #f0ebe0;
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    .cart-item-image {
        width: 120px;
        height: 120px;
        background: #faf8f5;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .cart-item-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 12px;
    }

    .cart-item-info {
        flex: 1;
    }

    .cart-item-name {
        font-size: 20px;
        font-weight: 600;
        color: #1a0f08;
        font-family: 'Playfair Display', serif;
        margin: 0 0 8px 0;
    }

    .cart-item-category {
        font-size: 12px;
        color: #8b5a3c;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin: 0 0 8px 0;
    }

    .cart-item-price {
        font-size: 18px;
        font-weight: 600;
        color: #1a0f08;
    }

    .cart-item-quantity {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        gap: 8px;
        border: 1px solid #e8e0d3;
        border-radius: 8px;
        padding: 4px;
    }

    .quantity-btn {
        width: 32px;
        height: 32px;
        background: #faf8f5;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        color: #2c1810;
        transition: all 0.2s ease;
    }

    .quantity-btn:hover {
        background: #2c1810;
        color: white;
    }

    .quantity-input {
        width: 50px;
        text-align: center;
        border: none;
        font-size: 16px;
        font-weight: 600;
        color: #1a0f08;
        background: transparent;
    }

    .cart-item-total {
        font-size: 20px;
        font-weight: 700;
        color: #1a0f08;
        font-family: 'Playfair Display', serif;
        min-width: 100px;
        text-align: right;
    }

    .cart-item-remove {
        width: 40px;
        height: 40px;
        background: #fee2e2;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #dc2626;
        transition: all 0.2s ease;
    }

    .cart-item-remove:hover {
        background: #dc2626;
        color: white;
    }

    .cart-summary {
        background: white;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.06);
        position: sticky;
        top: 100px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #f0ebe0;
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

    .checkout-btn {
        width: 100%;
        padding: 16px;
        font-size: 16px;
        font-weight: 600;
        background: linear-gradient(135deg, #2c1810 0%, #3d2817 100%);
        color: white;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 24px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 16px rgba(44, 24, 16, 0.2);
    }

    .checkout-btn:hover {
        background: linear-gradient(135deg, #3d2817 0%, #2c1810 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 24px rgba(44, 24, 16, 0.3);
    }

    .checkout-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
    }

    @media (max-width: 968px) {
        .cart-item {
            grid-template-columns: 100px 1fr;
            gap: 16px;
        }

        .cart-item-quantity,
        .cart-item-total,
        .cart-item-remove {
            grid-column: 2;
        }

        .cart-item-remove {
            justify-self: end;
        }
    }
</style>
@endpush

@section('content')
<div class="cart-container">
    <div class="cart-header">
        <h1 class="cart-title">Shopping Cart</h1>
        @if($cartItems->count() > 0)
            <span style="color: #6b5d4f;">{{ $cartItems->count() }} {{ $cartItems->count() === 1 ? 'item' : 'items' }}</span>
        @endif
    </div>

    @if($cartItems->count() > 0)
        <div style="display: grid; grid-template-columns: 1fr 400px; gap: 24px;">
            <div class="cart-items">
                @foreach($cartItems as $item)
                    <div class="cart-item">
                        <div class="cart-item-image">
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
                        <div class="cart-item-info">
                            <h3 class="cart-item-name">{{ $item->product->name }}</h3>
                            @if($item->product->category)
                                <p class="cart-item-category">{{ $item->product->category }}</p>
                            @endif
                            <p class="cart-item-price">${{ number_format($item->product->price, 2) }}</p>
                        </div>
                        <div class="cart-item-quantity">
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <div class="quantity-control">
                                    <button type="button" class="quantity-btn" onclick="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})" {{ $item->quantity <= 1 ? 'disabled' : '' }}>-</button>
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="10" class="quantity-input" id="quantity-{{ $item->id }}" onchange="this.form.submit()">
                                    <button type="button" class="quantity-btn" onclick="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})" {{ $item->quantity >= 10 ? 'disabled' : '' }}>+</button>
                                </div>
                            </form>
                        </div>
                        <div class="cart-item-total">
                            ${{ number_format($item->product->price * $item->quantity, 2) }}
                        </div>
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="cart-item-remove" onclick="return confirm('Remove this item from cart?')">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="cart-summary">
                <h2 style="font-size: 24px; font-weight: 700; color: #1a0f08; font-family: 'Playfair Display', serif; margin: 0 0 24px 0;">Order Summary</h2>
                <div class="summary-row">
                    <span class="summary-label">Subtotal</span>
                    <span class="summary-value">${{ number_format($subtotal, 2) }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Shipping</span>
                    <span class="summary-value">Free</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Total</span>
                    <span class="summary-value">${{ number_format($total, 2) }}</span>
                </div>
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <button type="submit" class="checkout-btn">Proceed to Checkout</button>
                </form>
                <a href="{{ route('products') }}" style="display: block; text-align: center; margin-top: 16px; color: #8b5a3c; text-decoration: none; font-weight: 500;">Continue Shopping</a>
            </div>
        </div>
    @else
        <div class="empty-state">
            <div class="empty-state-content">
                <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-4M9 2v4h6V2M9 2h6"/>
                </svg>
                <h3 class="empty-title">Your Cart is Empty</h3>
                <p class="empty-text">Add products to your cart to get started.</p>
                <a href="{{ route('products') }}" class="btn primary">Browse Products</a>
            </div>
        </div>
    @endif
</div>

<script>
    function updateQuantity(itemId, newQuantity) {
        if (newQuantity < 1 || newQuantity > 10) return;
        const input = document.getElementById('quantity-' + itemId);
        input.value = newQuantity;
        input.form.submit();
    }
</script>
@endsection
