@extends('layouts.admin')

@section('title', 'Create Product - Scentora')
@section('page_title', 'Create Product')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
@endpush

@section('content')
<div class="admin-dashboard-page">
    <div class="admin-dashboard-header">
        <a href="{{ route('admin.products') }}" class="btn btn-secondary">Back to Products</a>
    </div>

        <div class="admin-form-container">
            <form method="POST" action="{{ route('admin.products.store') }}" class="admin-form">
                @csrf

                <div class="form-group">
                    <label for="name">Product Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required class="form-control">
                    @error('name')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
                    @error('description')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="price">Price *</label>
                        <input type="number" id="price" name="price" step="0.01" min="0" value="{{ old('price') }}" required class="form-control">
                        @error('price')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="size">Size</label>
                        <input type="text" id="size" name="size" value="{{ old('size') }}" placeholder="e.g., 50ml" class="form-control">
                        @error('size')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" id="type" name="type" value="{{ old('type') }}" placeholder="e.g., Eau de Parfum" class="form-control">
                        @error('type')<span class="error">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="category">Olfactory Group</label>
                    <select id="category" name="category" class="form-control">
                        <option value="">Select Olfactory Group</option>
                        <option value="Woody" {{ old('category') == 'Woody' ? 'selected' : '' }}>Woody</option>
                        <option value="Floral" {{ old('category') == 'Floral' ? 'selected' : '' }}>Floral</option>
                        <option value="Fresh" {{ old('category') == 'Fresh' ? 'selected' : '' }}>Fresh</option>
                        <option value="Oriental" {{ old('category') == 'Oriental' ? 'selected' : '' }}>Oriental</option>
                        <option value="Citrus" {{ old('category') == 'Citrus' ? 'selected' : '' }}>Citrus</option>
                        <option value="Spicy" {{ old('category') == 'Spicy' ? 'selected' : '' }}>Spicy</option>
                    </select>
                    @error('category')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="top_notes">Aromas / Notes</label>
                    <input type="text" id="top_notes" name="top_notes" value="{{ old('top_notes') }}" placeholder="e.g., Caramel, Vanilla, Sandalwood" class="form-control">
                    <small style="color: #8b5a3c; font-size: 12px;">Separate multiple aromas with commas</small>
                    @error('top_notes')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="best_for">Season</label>
                    <select id="best_for" name="best_for" class="form-control">
                        <option value="">Select Season</option>
                        <option value="Spring" {{ old('best_for') == 'Spring' ? 'selected' : '' }}>Spring</option>
                        <option value="Summer" {{ old('best_for') == 'Summer' ? 'selected' : '' }}>Summer</option>
                        <option value="Fall" {{ old('best_for') == 'Fall' ? 'selected' : '' }}>Fall</option>
                        <option value="Winter" {{ old('best_for') == 'Winter' ? 'selected' : '' }}>Winter</option>
                        <option value="All Season" {{ old('best_for') == 'All Season' ? 'selected' : '' }}>All Season</option>
                    </select>
                    @error('best_for')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                            Featured Product
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                            Active
                        </label>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Create Product</button>
                    <a href="{{ route('admin.products') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
</div>
@endsection

