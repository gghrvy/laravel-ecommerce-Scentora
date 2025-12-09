@extends('layouts.user')

@section('title', 'Orders - Scentora')
@section('page_title', 'Orders')

@section('content')
<div class="orders-list">
    @for ($i = 1; $i <= 4; $i++)
        <div class="order-card">
            <div class="order-top">
                <div>
                    <div class="order-id">Order #SC-2024-0{{ $i }}</div>
                    <div class="order-date">Placed on Nov {{ 10 + $i }}, 2024</div>
                </div>
                <div class="order-status {{ $i % 2 === 0 ? 'shipped' : 'processing' }}">
                    {{ $i % 2 === 0 ? 'Shipped' : 'Processing' }}
                </div>
            </div>
            <div class="order-items">
                <div class="order-item-line">
                    <span>Eau de Luxe</span>
                    <span>1 x 50ml</span>
                </div>
                <div class="order-item-line">
                    <span>Amber Noire</span>
                    <span>1 x 50ml</span>
                </div>
            </div>
            <div class="order-bottom">
                <div class="order-total">
                    <span>Total</span>
                    <strong>$258.00</strong>
                </div>
                <div class="order-actions">
                    <button class="btn ghost">View Details</button>
                    <button class="btn primary">Track</button>
                </div>
            </div>
        </div>
    @endfor
</div>
@endsection

