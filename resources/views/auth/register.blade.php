@extends('layouts.app')

@section('title', 'Register - Scentora')

@section('content')
<div class="auth-page">
    <div class="auth-container">
        <div class="auth-branding-section">
            <div class="branding-content">
                <div class="branding-logo">
                    <div class="branding-logo-circle">
                        <span class="branding-logo-s">S</span>
                    </div>
                </div>
                <h1 class="branding-title">Scentora</h1>
                <p class="branding-subtitle">Begin Your Fragrance Journey</p>
                <p class="branding-description">
                    Join thousands of fragrance enthusiasts who trust Scentora for their olfactory adventures. Each scent tells a story, captures a moment, and becomes a part of your unique identity.
                </p>
                
                <div class="branding-features">
                    <div class="branding-feature">
                        <svg class="branding-feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z"/>
                        </svg>
                        <span>Exclusive Access to Limited Edition Fragrances</span>
                    </div>
                    <div class="branding-feature">
                        <svg class="branding-feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z"/>
                        </svg>
                        <span>Personalized Recommendations Based on Your Preferences</span>
                    </div>
                    <div class="branding-feature">
                        <svg class="branding-feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 16V8A2 2 0 0 0 19 6H5A2 2 0 0 0 3 8V16A2 2 0 0 0 5 18H19A2 2 0 0 0 21 16Z"/>
                        </svg>
                        <span>Free Shipping on Orders Over $100</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="auth-form-section">
            <div class="auth-form-container">
                <div class="auth-header">
                    <h1 class="auth-title">Join Scentora</h1>
                    <p class="auth-subtitle">Create your luxury fragrance account</p>
                </div>

                @if ($errors->any())
                    <div class="error-message">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="auth-form">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" id="name" name="name" class="form-input" placeholder="Enter your full name" value="{{ old('name') }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-input" placeholder="Create a password (min 8 characters)" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Confirm your password" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </form>

                <div class="auth-links">
                    <p>Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
