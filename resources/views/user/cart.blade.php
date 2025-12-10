@extends('layouts.user')

@section('title', 'Cart - Scentora')
@section('page_title', 'Shopping Cart')

@section('content')
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
@endsection

