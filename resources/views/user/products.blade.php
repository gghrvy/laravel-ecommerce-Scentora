@extends('layouts.user')

@section('title', 'Products - Scentora')
@section('page_title', 'Products')

@push('styles')
<style>
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 32px;
        margin-top: 48px;
        padding-bottom: 60px;
    }

    .product-card {
        background: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 100%;
        position: relative;
        border: 1px solid rgba(0, 0, 0, 0.06);
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
    }

    .product-image-wrapper {
        width: 100%;
        height: 340px;
        background: #faf8f5;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
        padding: 32px;
        box-sizing: border-box;
    }

    .product-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.4s ease;
    }

    .product-card:hover .product-image-wrapper img {
        transform: scale(1.05);
    }

    .product-image-placeholder {
        width: 120px;
        height: 120px;
        color: #d4c4b0;
        opacity: 0.4;
        position: relative;
        z-index: 1;
    }

    .product-info {
        padding: 24px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        background: white;
    }

    .product-name {
        font-size: 20px;
        font-weight: 600;
        color: #1a0f08;
        margin: 0 0 8px 0;
        font-family: 'Playfair Display', serif;
        line-height: 1.3;
    }

    .product-category-badge {
        display: inline-block;
        font-size: 10px;
        color: #8b5a3c;
        margin: 0 0 12px 0;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        font-weight: 600;
        padding: 4px 10px;
        background: rgba(139, 90, 60, 0.1);
        border-radius: 8px;
        width: fit-content;
    }

    .product-description {
        font-size: 14px;
        color: #6b5d4f;
        margin: 0 0 20px 0;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex-grow: 1;
    }

    .product-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
        padding-top: 16px;
        border-top: 1px solid #f0ebe0;
    }

    .product-price {
        font-size: 24px;
        font-weight: 700;
        color: #1a0f08;
        font-family: 'Playfair Display', serif;
    }

    .product-actions {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .btn-view {
        padding: 10px 20px;
        font-size: 13px;
        font-weight: 600;
        background: #2c1810;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-view:hover {
        background: #3d2817;
        transform: translateY(-1px);
    }

    .btn-cart {
        padding: 0;
        width: 40px;
        height: 40px;
        background: #faf8f5;
        color: #2c1810;
        border: 1px solid #e8e0d3;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .btn-cart:hover {
        background: #2c1810;
        color: white;
        border-color: #2c1810;
    }

    .btn-cart svg {
        width: 20px;
        height: 20px;
    }

    .filters {
        display: flex;
        gap: 12px;
        align-items: center;
        flex-wrap: wrap;
    }

    .filters form {
        display: flex;
        gap: 12px;
        align-items: center;
        flex-wrap: wrap;
        width: 100%;
    }

    /* Hide description if it's too short or meaningless */
    .product-description:empty,
    .product-description:has-text("humot ni"),
    .product-description:has-text("ni") {
        display: none;
    }

    @media (max-width: 768px) {
        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 24px;
        }

        .product-image-wrapper {
            height: 300px;
            padding: 20px;
        }

        .product-info {
            padding: 24px 20px 20px;
        }

        .filters form {
            flex-direction: column;
        }

        .filters form > * {
            width: 100%;
        }
    }
</style>
@endpush

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Discover Our Collection</h1>
        <p class="page-subtitle">Curated luxury fragrances crafted for every occasion.</p>
    </div>
    <div class="filters">
        <form method="GET" action="{{ route('products') }}">
            <select name="category" class="select" onchange="this.form.submit()">
                <option value="">All Categories</option>
                <option value="Fresh" {{ request('category') == 'Fresh' ? 'selected' : '' }}>Fresh</option>
                <option value="Woody" {{ request('category') == 'Woody' ? 'selected' : '' }}>Woody</option>
                <option value="Floral" {{ request('category') == 'Floral' ? 'selected' : '' }}>Floral</option>
                <option value="Oriental" {{ request('category') == 'Oriental' ? 'selected' : '' }}>Oriental</option>
                <option value="Citrus" {{ request('category') == 'Citrus' ? 'selected' : '' }}>Citrus</option>
                <option value="Spicy" {{ request('category') == 'Spicy' ? 'selected' : '' }}>Spicy</option>
            </select>
            <select name="sort" id="sortSelect" class="select" onchange="handleSortChange()">
                <option value="created_at" {{ request('sort') == 'created_at' || !request('sort') ? 'selected' : '' }}>Newest</option>
                <option value="price_asc" {{ request('sort') == 'price' && request('order') == 'asc' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="price_desc" {{ (request('sort') == 'price' && request('order') == 'desc') || request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
            </select>
            <input type="text" name="search" class="input" placeholder="Search fragrances..." value="{{ request('search') }}" onkeypress="if(event.key === 'Enter') this.form.submit()">
            <input type="hidden" name="order" id="sortOrder" value="{{ request('order', 'desc') }}">
            <input type="hidden" name="sort" id="sortField" value="{{ request('sort', 'created_at') }}">
        </form>
    </div>
</div>

@if($products->count() > 0)
    <div class="products-grid">
        @foreach($products as $product)
            <div class="product-card" onclick="window.location.href='{{ route('product.show', $product->id) }}'">
                <div class="product-image-wrapper">
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
                <div class="product-info">
                    <h3 class="product-name">{{ $product->name }}</h3>
                    @if($product->category)
                        <span class="product-category-badge">{{ $product->category }}</span>
                    @endif
                    @if($product->description && strlen(trim($product->description)) > 10 && !in_array(strtolower(trim($product->description)), ['humot ni', 'ni', 'test', 'lorem']))
                        <p class="product-description">{{ $product->description }}</p>
                    @endif
                    <div class="product-footer">
                        <span class="product-price">${{ number_format($product->price, 2) }}</span>
                        <div class="product-actions" onclick="event.stopPropagation();">
                            <form action="{{ route('cart.store') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn-cart" title="Add to Cart">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="9" cy="21" r="1"></circle>
                                        <circle cx="20" cy="21" r="1"></circle>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                    </svg>
                                </button>
                            </form>
                            <a href="{{ route('product.show', $product->id) }}" class="btn-view">View</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div style="margin-top: 40px; display: flex; justify-content: center;">
        {{ $products->appends(request()->query())->links() }}
    </div>
@else
    <div class="empty-state">
        <div class="empty-state-content">
            <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 16V8A2 2 0 0 0 19 6H5A2 2 0 0 0 3 8V16A2 2 0 0 0 5 18H19A2 2 0 0 0 21 16Z"/>
                <path d="M3 10h18"/>
            </svg>
            <h3 class="empty-title">No Products Available</h3>
            <p class="empty-text">Products will appear here once they are added to the catalog.</p>
        </div>
    </div>
@endif

<script>
    function handleSortChange() {
        const select = document.getElementById('sortSelect');
        const sortField = document.getElementById('sortField');
        const sortOrder = document.getElementById('sortOrder');
        const form = select.form;
        
        const value = select.value;
        if (value === 'price_asc') {
            sortField.value = 'price';
            sortOrder.value = 'asc';
        } else if (value === 'price_desc') {
            sortField.value = 'price';
            sortOrder.value = 'desc';
        } else {
            sortField.value = 'created_at';
            sortOrder.value = 'desc';
        }
        form.submit();
    }
</script>
@endsection
