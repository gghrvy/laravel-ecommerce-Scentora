@extends('layouts.app')

@section('title', 'Login - Scentora')

@section('content')
<div class="auth-page">
    <div class="auth-container">
        <div class="auth-form-section">
            <div class="auth-form-container">
                <div class="auth-header">
                    <h1 class="auth-title">Welcome Back</h1>
                    <p class="auth-subtitle">Sign in to your Scentora account</p>
                </div>

                @if ($errors->any())
                    <div class="error-message">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="auth-form">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               class="form-input" 
                               placeholder="Enter your email"
                               value="{{ old('email') }}"
                               required 
                               autofocus>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="form-input" 
                               placeholder="Enter your password"
                               required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Sign In
                        </button>
                    </div>
                </form>

                <div class="auth-links">
                    <p>Don't have an account? <a href="{{ route('register') }}">Create one here</a></p>
                </div>
            </div>
        </div>

        
        <div class="auth-branding-section">
            <div class="branding-content">
                <div class="branding-logo">
                    <div class="branding-logo-circle">
                        <span class="branding-logo-s">S</span>
                    </div>
                </div>
                <h1 class="branding-title">Scentora</h1>
                <p class="branding-subtitle">Discover the perfect scent that speaks to your soul</p>
                <p class="branding-description">
                    Welcome to Scentora, your premier destination for luxury fragrances. We curate the finest collection of perfumes, colognes, and essential oils from around the world.
                </p>
                
                <div class="branding-features">
                    <div class="branding-feature">
                        <svg class="branding-feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z"/>
                        </svg>
                        <span>Premium Perfumes from World's Finest Houses</span>
                    </div>
                    <div class="branding-feature">
                        <svg class="branding-feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z"/>
                        </svg>
                        <span>Pure Essential Oils for Aromatherapy</span>
                    </div>
                    <div class="branding-feature">
                        <svg class="branding-feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 16V8A2 2 0 0 0 19 6H5A2 2 0 0 0 3 8V16A2 2 0 0 0 5 18H19A2 2 0 0 0 21 16Z"/>
                        </svg>
                        <span>Curated Collections for Every Occasion</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
