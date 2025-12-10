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
@endsection

