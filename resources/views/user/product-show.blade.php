@extends('layouts.user')

@section('title', $product->name . ' - Scentora')
@section('page_title', 'Product Details')

@push('styles')
<style>
    .product-detail-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 0;
    }

    .product-detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        margin-bottom: 60px;
    }

    .product-image-section {
        position: sticky;
        top: 100px;
        height: fit-content;
    }

    .product-image-main {
        width: 100%;
        height: 600px;
        background: linear-gradient(180deg, #faf8f5 0%, #f5f1e8 100%);
        border-radius: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
        box-sizing: border-box;
        margin-bottom: 20px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
    }

    .product-image-main img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .product-image-placeholder {
        width: 200px;
        height: 200px;
        color: #d4c4b0;
        opacity: 0.4;
    }

    .product-info-section {
        padding-top: 20px;
    }

    .product-title {
        font-size: 42px;
        font-weight: 700;
        color: #1a0f08;
        margin: 0 0 16px 0;
        font-family: 'Playfair Display', serif;
        line-height: 1.2;
    }

    .product-category-badge {
        display: inline-block;
        font-size: 11px;
        color: #8b5a3c;
        margin: 0 0 24px 0;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-weight: 600;
        padding: 6px 14px;
        background: rgba(139, 90, 60, 0.1);
        border-radius: 20px;
        width: fit-content;
    }

    .product-price {
        font-size: 36px;
        font-weight: 700;
        color: #1a0f08;
        font-family: 'Playfair Display', serif;
        margin: 0 0 32px 0;
        letter-spacing: -0.5px;
    }

    .product-description {
        font-size: 16px;
        color: #4a3d2f;
        line-height: 1.8;
        margin: 0 0 32px 0;
    }

    .product-details {
        margin: 32px 0;
        padding: 24px;
        background: #faf8f5;
        border-radius: 16px;
    }

    .product-details h3 {
        font-size: 18px;
        font-weight: 600;
        color: #1a0f08;
        margin: 0 0 16px 0;
        font-family: 'Playfair Display', serif;
    }

    .detail-row {
        display: flex;
        padding: 12px 0;
        border-bottom: 1px solid #e8e0d3;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        font-weight: 600;
        color: #6b5d4f;
        width: 140px;
        flex-shrink: 0;
    }

    .detail-value {
        color: #1a0f08;
        flex: 1;
    }

    .product-actions {
        display: flex;
        gap: 16px;
        margin-top: 40px;
    }

    .btn-primary-action {
        flex: 1;
        padding: 16px 32px;
        font-size: 16px;
        font-weight: 600;
        background: linear-gradient(135deg, #2c1810 0%, #3d2817 100%);
        color: white;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 16px rgba(44, 24, 16, 0.2);
    }

    .btn-primary-action:hover {
        background: linear-gradient(135deg, #3d2817 0%, #2c1810 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 24px rgba(44, 24, 16, 0.3);
    }

    .btn-secondary-action {
        padding: 16px;
        width: 56px;
        height: 56px;
        background: #faf8f5;
        color: #2c1810;
        border: 2px solid #e8e0d3;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-secondary-action:hover {
        background: #2c1810;
        color: white;
        border-color: #2c1810;
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

    @media (max-width: 968px) {
        .product-detail-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .product-image-section {
            position: static;
        }

        .product-image-main {
            height: 400px;
        }

        .product-title {
            font-size: 32px;
        }
    }
</style>
@endpush

@section('content')
<div class="product-detail-container">
    <a href="{{ route('products') }}" class="back-link">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M19 12H5M12 19l-7-7 7-7"/>
        </svg>
        Back to Products
    </a>

    <div class="product-detail-grid">
        <div class="product-image-section">
            <div class="product-image-main">
                @if($product->image)
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                @else
                    <svg class="product-image-placeholder" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <path d="M21 15l-5-5L5 21"/>
                    </svg>
                @endif
            </div>
        </div>

        <div class="product-info-section">
            <h1 class="product-title">{{ $product->name }}</h1>
            
            @if($product->category)
                <span class="product-category-badge">{{ $product->category }}</span>
            @endif

            <div class="product-price">${{ number_format($product->price, 2) }}</div>

            @if($product->description && strlen(trim($product->description)) > 10)
                <div class="product-description">{{ $product->description }}</div>
            @endif

            <div class="product-details">
                @if($product->size)
                    <div class="detail-row">
                        <span class="detail-label">Size</span>
                        <span class="detail-value">{{ $product->size }}</span>
                    </div>
                @endif
                @if($product->type)
                    <div class="detail-row">
                        <span class="detail-label">Type</span>
                        <span class="detail-value">{{ $product->type }}</span>
                    </div>
                @endif
                @if($product->top_notes)
                    <div class="detail-row">
                        <span class="detail-label">Top Notes</span>
                        <span class="detail-value">{{ $product->top_notes }}</span>
                    </div>
                @endif
                @if($product->heart_notes)
                    <div class="detail-row">
                        <span class="detail-label">Heart Notes</span>
                        <span class="detail-value">{{ $product->heart_notes }}</span>
                    </div>
                @endif
                @if($product->base_notes)
                    <div class="detail-row">
                        <span class="detail-label">Base Notes</span>
                        <span class="detail-value">{{ $product->base_notes }}</span>
                    </div>
                @endif
                @if($product->best_for)
                    <div class="detail-row">
                        <span class="detail-label">Best For</span>
                        <span class="detail-value">{{ $product->best_for }}</span>
                    </div>
                @endif
            </div>

            <div class="product-actions">
                <form action="{{ route('cart.store') }}" method="POST" style="flex: 1;">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="btn-primary-action">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        Add to Cart
                    </button>
                </form>
                <form action="{{ route('wishlist.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn-secondary-action" title="Add to Wishlist">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
