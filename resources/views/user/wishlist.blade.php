@extends('layouts.user')

@section('title', 'Wishlist - Scentora')
@section('page_title', 'Wishlist')

@section('content')
<div class="wishlist-grid">
    @for ($i = 1; $i <= 6; $i++)
        <div class="wishlist-card">
            <div class="wishlist-thumb"></div>
            <div class="wishlist-info">
                <h3 class="wishlist-name">Eau de Luxe {{ $i }}</h3>
                <p class="wishlist-notes">Amber • Vanilla • Cedarwood</p>
                <div class="wishlist-meta">
                    <span class="price">$129.00</span>
                    <span class="badge">50ml</span>
                </div>
            </div>
            <div class="wishlist-actions">
                <button class="btn ghost">Remove</button>
                <button class="btn primary">Add to Cart</button>
            </div>
        </div>
    @endfor
</div>
@endsection

