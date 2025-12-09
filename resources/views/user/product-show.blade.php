@extends('layouts.user')

@section('title', 'Product Details - Scentora')
@section('page_title', 'Product Details')

@section('content')
<div class="product-detail">
    <div class="product-detail-media">
        <div class="product-hero"></div>
        <div class="product-thumbs">
            <div class="thumb"></div>
            <div class="thumb"></div>
            <div class="thumb"></div>
        </div>
    </div>
    <div class="product-detail-info">
        <div class="breadcrumbs">Home / Collection / Eau de Luxe</div>
        <h1 class="detail-title">Eau de Luxe</h1>
        <p class="detail-subtitle">Signature unisex fragrance blending citrus brightness with warm amber.</p>
        <div class="detail-meta">
            <span class="price">$129.00</span>
            <span class="badge">50ml</span>
            <span class="badge">Eau de Parfum</span>
        </div>
        <div class="notes">
            <div class="notes-group">
                <h4>Top Notes</h4>
                <p>Bergamot, Grapefruit, Pink Pepper</p>
            </div>
            <div class="notes-group">
                <h4>Heart</h4>
                <p>Jasmine, Cedarwood, Iris</p>
            </div>
            <div class="notes-group">
                <h4>Base</h4>
                <p>Amber, Vanilla, Musk</p>
            </div>
        </div>
        <div class="cta-row">
            <button class="btn primary">Add to Cart</button>
            <button class="btn ghost">Add to Wishlist</button>
        </div>
        <div class="detail-extra">
            <p><strong>Longevity:</strong> 8-10 hours</p>
            <p><strong>Sillage:</strong> Moderate</p>
            <p><strong>Best for:</strong> Evening, Special Occasions</p>
        </div>
    </div>
</div>
@endsection

