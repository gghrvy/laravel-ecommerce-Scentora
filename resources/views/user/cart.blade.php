@extends('layouts.user')

@section('title', 'Cart - Scentora')
@section('page_title', 'Shopping Cart')

@section('content')
<div class="cart-layout">
    <div class="cart-items">
        @for ($i = 1; $i <= 2; $i++)
            <div class="cart-item">
                <div class="cart-thumb"></div>
                <div class="cart-info">
                    <h3 class="cart-name">Eau de Luxe {{ $i }}</h3>
                    <p class="cart-notes">50ml • Eau de Parfum</p>
                    <div class="cart-controls">
                        <div class="qty">
                            <button class="qty-btn">-</button>
                            <input type="number" value="1">
                            <button class="qty-btn">+</button>
                        </div>
                        <button class="link">Move to Wishlist</button>
                    </div>
                </div>
                <div class="cart-price">
                    <span class="price">$129.00</span>
                    <button class="link">Remove</button>
                </div>
            </div>
        @endfor
    </div>
    <div class="cart-summary">
        <h3>Order Summary</h3>
        <div class="summary-row">
            <span>Subtotal</span>
            <span>$258.00</span>
        </div>
        <div class="summary-row">
            <span>Shipping</span>
            <span>Free</span>
        </div>
        <div class="summary-row total">
            <span>Total</span>
            <span>$258.00</span>
        </div>
        <button class="btn primary w-100">Checkout</button>
        <button class="btn ghost w-100">Continue Shopping</button>
    </div>
</div>
@endsection

