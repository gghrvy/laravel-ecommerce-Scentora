@extends('layouts.user')

@section('title', 'Orders - Scentora')
@section('page_title', 'Orders')

@section('content')
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
@endsection

