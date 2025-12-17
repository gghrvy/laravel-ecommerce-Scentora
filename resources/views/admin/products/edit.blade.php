@extends('layouts.admin')

@section('title', 'Edit Product - Scentora')
@section('page_title', 'Edit Product')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
@endpush

@section('content')
<div class="admin-dashboard-page">
    <div class="admin-dashboard-header">
        <a href="{{ route('admin.products') }}" class="btn btn-secondary">Back to Products</a>
    </div>

        <div class="admin-form-container">
            <form method="POST" action="{{ route('admin.products.update', $product->id) }}" class="admin-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Product Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required class="form-control">
                    @error('name')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" class="form-control">{{ old('description', $product->description) }}</textarea>
                    @error('description')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="image">Product Image</label>
                    @if($product->image)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" style="max-width: 200px; max-height: 200px; border-radius: 8px; border: 1px solid #ddd;">
                            <p style="font-size: 12px; color: #666; margin-top: 5px;">Current image</p>
                        </div>
                    @endif
                    <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" class="form-control">
                    <small style="color: #8b5a3c; font-size: 12px;">Accepted formats: JPEG, PNG, JPG, GIF, WEBP (Max: 2MB). Leave empty to keep current image.</small>
                    @error('image')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="price">Price *</label>
                        <input type="number" id="price" name="price" step="0.01" min="0" value="{{ old('price', $product->price) }}" required class="form-control">
                        @error('price')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="size">Size</label>
                        <input type="text" id="size" name="size" value="{{ old('size', $product->size) }}" placeholder="e.g., 50ml" class="form-control">
                        @error('size')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" id="type" name="type" value="{{ old('type', $product->type) }}" placeholder="e.g., Eau de Parfum" class="form-control">
                        @error('type')<span class="error">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="best_for">Season</label>
                    <select id="best_for" name="best_for" class="form-control">
                        <option value="">Select Season</option>
                        <option value="Spring" {{ old('best_for', $product->best_for) == 'Spring' ? 'selected' : '' }}>Spring</option>
                        <option value="Summer" {{ old('best_for', $product->best_for) == 'Summer' ? 'selected' : '' }}>Summer</option>
                        <option value="Fall" {{ old('best_for', $product->best_for) == 'Fall' ? 'selected' : '' }}>Fall</option>
                        <option value="Winter" {{ old('best_for', $product->best_for) == 'Winter' ? 'selected' : '' }}>Winter</option>
                        <option value="All Season" {{ old('best_for', $product->best_for) == 'All Season' ? 'selected' : '' }}>All Season</option>
                    </select>
                    @error('best_for')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="category">Olfactory Group</label>
                    <select id="category" name="category" class="form-control">
                        <option value="">Select Olfactory Group</option>
                        <option value="Woody" data-seasons="Fall,All Season" {{ old('category', $product->category) == 'Woody' ? 'selected' : '' }}>Woody</option>
                        <option value="Floral" data-seasons="Spring,All Season" {{ old('category', $product->category) == 'Floral' ? 'selected' : '' }}>Floral</option>
                        <option value="Fresh" data-seasons="Spring,Summer,All Season" {{ old('category', $product->category) == 'Fresh' ? 'selected' : '' }}>Fresh</option>
                        <option value="Oriental" data-seasons="Fall,All Season" {{ old('category', $product->category) == 'Oriental' ? 'selected' : '' }}>Oriental</option>
                        <option value="Citrus" data-seasons="Winter,Summer,All Season" {{ old('category', $product->category) == 'Citrus' ? 'selected' : '' }}>Citrus</option>
                        <option value="Spicy" data-seasons="Winter,All Season" {{ old('category', $product->category) == 'Spicy' ? 'selected' : '' }}>Spicy</option>
                    </select>
                    @error('category')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="top_notes">Aromas / Notes</label>
                    <input type="text" id="top_notes" name="top_notes" value="{{ old('top_notes', $product->top_notes) }}" placeholder="e.g., Caramel, Vanilla, Sandalwood" class="form-control">
                    <small style="color: #8b5a3c; font-size: 12px;">Separate multiple aromas with commas</small>
                    @error('top_notes')<span class="error">{{ $message }}</span>@enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                    <a href="{{ route('admin.products') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const seasonSelect = document.getElementById('best_for');
    const categorySelect = document.getElementById('category');
    const allCategoryOptions = Array.from(categorySelect.querySelectorAll('option[data-seasons]'));
    
   
    const initialCategory = categorySelect.value;
    
    function filterCategoriesBySeason() {
        const selectedSeason = seasonSelect.value;
        
        
        const currentSelected = categorySelect.value;
        const currentOption = categorySelect.querySelector(`option[value="${currentSelected}"]`);
        const isCurrentValid = !currentSelected || selectedSeason === '' || selectedSeason === 'All Season' || 
                              (currentOption && currentOption.dataset.seasons && 
                               currentOption.dataset.seasons.split(',').includes(selectedSeason));
        
        
        allCategoryOptions.forEach(option => {
            if (selectedSeason === '' || selectedSeason === 'All Season') {
                
                option.style.display = '';
            } else {
                
                const allowedSeasons = option.dataset.seasons ? option.dataset.seasons.split(',').map(s => s.trim()) : [];
                if (allowedSeasons.includes(selectedSeason)) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            }
        });
        
      
        if (!isCurrentValid && selectedSeason !== '') {
            categorySelect.value = '';
        }
        
       
        if (selectedSeason === 'All Season' && initialCategory && categorySelect.querySelector(`option[value="${initialCategory}"]`)) {
            categorySelect.value = initialCategory;
        }
    }
    
   
    if (seasonSelect.value) {
        filterCategoriesBySeason();
    }
    
 
    seasonSelect.addEventListener('change', filterCategoriesBySeason);
});
</script>
@endpush
@endsection

