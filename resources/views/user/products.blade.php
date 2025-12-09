@extends('layouts.user')

@section('title', 'Products - Scentora')
@section('page_title', 'Products')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Discover Our Collection</h1>
        <p class="page-subtitle">Curated luxury fragrances crafted for every occasion.</p>
    </div>
    <div class="filters">
        <select class="select">
            <option>All Categories</option>
            <option>Fresh</option>
            <option>Woody</option>
            <option>Floral</option>
            <option>Oriental</option>
        </select>
        <select class="select">
            <option>Sort by Featured</option>
            <option>Price: Low to High</option>
            <option>Price: High to Low</option>
            <option>Newest</option>
        </select>
        <input class="input" type="text" placeholder="Search fragrances...">
    </div>
</div>

<div class="product-grid">
    @for ($i = 1; $i <= 8; $i++)
        <div class="product-card">
            <div class="product-image"></div>
            <div class="product-info">
                <h3 class="product-name">Eau de Luxe {{ $i }}</h3>
                <p class="product-notes">Notes: Bergamot, Cedarwood, Amber</p>
                <div class="product-meta">
                    <span class="price">$129.00</span>
                    <span class="badge">50ml</span>
                </div>
            </div>
            <div class="product-actions">
                <a href="{{ route('product.show', ['id' => $i]) }}" class="btn ghost">View</a>
                <button class="btn primary">Add to Cart</button>
            </div>
        </div>
    @endfor
</div>
@endsection

