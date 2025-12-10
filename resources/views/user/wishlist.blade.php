@extends('layouts.user')

@section('title', 'Wishlist - Scentora')
@section('page_title', 'Wishlist')

@section('content')
<div class="empty-state">
    <div class="empty-state-content">
        <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 21s-8-5.5-8-11a5 5 0 0 1 9-3 5 5 0 0 1 9 3c0 5.5-8 11-8 11z"/>
        </svg>
        <h3 class="empty-title">Your Wishlist is Empty</h3>
        <p class="empty-text">Save your favorite products here for later.</p>
        <a href="{{ route('products') }}" class="btn primary">Browse Products</a>
    </div>
</div>
@endsection

