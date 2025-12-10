@extends('layouts.admin')

@section('title', 'Products - Scentora')
@section('page_title', 'Products')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
@endpush

@section('content')
<div class="admin-dashboard-page">
    <div class="admin-dashboard-header">
        <a href="{{ route('admin.products.create') }}" class="btn btn-secondary">Add New Product</a>
    </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="admin-table-container">
            <div class="admin-table-header">
                <form method="GET" action="{{ route('admin.products') }}" class="admin-search-form">
                    <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}" class="admin-search-input">
                    <button type="submit" class="btn btn-secondary">Search</button>
                </form>
            </div>

            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->category ?? '-' }}</td>
                            <td>
                                <span class="badge {{ $product->is_active ? 'badge-success' : 'badge-danger' }}">
                                    {{ $product->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <div class="admin-action-buttons-inline">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 40px;">No products found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="admin-pagination">
                {{ $products->links() }}
            </div>
        </div>
</div>
@endsection

