@extends('layouts.user')

@section('title', 'Product Details - Scentora')
@section('page_title', 'Product Details')

@section('content')
<div class="empty-state">
    <div class="empty-state-content">
        <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10"/>
            <path d="M12 8v4M12 16h.01"/>
        </svg>
        <h3 class="empty-title">Product Not Found</h3>
        <p class="empty-text">The product you're looking for doesn't exist or has been removed.</p>
        <a href="{{ route('products') }}" class="btn primary">Back to Products</a>
    </div>
</div>
@endsection

