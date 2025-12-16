<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Scentora')</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="user-app-body">
    <div class="user-app-shell" id="userAppShell">
        <aside class="user-sidebar" id="userSidebar">
            <div class="sidebar-brand">
                <button type="button" class="brand-link" id="sidebarToggle" aria-label="Toggle navigation">
                    <div class="logo-icon"></div>
                    <span class="brand-name">Scentora</span>
                </button>
            </div>
            <nav class="sidebar-nav">
                <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="link-icon">@include('partials.icons.dashboard')</span><span class="link-label">Dashboard</span>
                </a>
                <a href="{{ route('products') }}" class="sidebar-link {{ request()->routeIs('products') ? 'active' : '' }}">
                    <span class="link-icon">@include('partials.icons.products')</span><span class="link-label">Products</span>
                </a>
                <a href="{{ route('cart') }}" class="sidebar-link {{ request()->routeIs('cart') ? 'active' : '' }}">
                    <span class="link-icon">@include('partials.icons.cart')</span><span class="link-label">Cart</span>
                </a>
                <a href="{{ route('orders') }}" class="sidebar-link {{ request()->routeIs('orders') ? 'active' : '' }}">
                    <span class="link-icon">@include('partials.icons.orders')</span><span class="link-label">Orders</span>
                </a>
                <a href="{{ route('wishlist') }}" class="sidebar-link {{ request()->routeIs('wishlist') ? 'active' : '' }}">
                    <span class="link-icon">@include('partials.icons.heart')</span><span class="link-label">Wishlist</span>
                </a>
            </nav>
            <div class="sidebar-footer">
                <a href="{{ route('profile') }}" class="sidebar-user-link">
                    <div class="sidebar-user">
                        <span class="sidebar-user-icon">@include('partials.icons.user')</span>
                        <div>
                            <div class="sidebar-user-name">{{ session('user.name') ?? (session('user')['name'] ?? 'Guest') }}</div>
                            <div class="sidebar-user-email">{{ session('user.email') ?? (session('user')['email'] ?? '') }}</div>
                        </div>
                    </div>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="sidebar-logout">
                    @csrf
                    <button type="submit" class="logout-btn">
                        @include('partials.icons.logout')
                        <span class="logout-label">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="user-main">
            <section class="user-content">
                @if(session('success'))
                    <div style="background: #10b981; color: white; padding: 16px 20px; border-radius: 12px; margin-bottom: 24px; display: flex; align-items: center; gap: 12px; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div style="background: #ef4444; color: white; padding: 16px 20px; border-radius: 12px; margin-bottom: 24px; display: flex; align-items: center; gap: 12px; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        {{ session('error') }}
                    </div>
                @endif
                @yield('content')
            </section>
        </main>
    </div>

    <script>
        (function() {
            const shell = document.getElementById('userAppShell');
            const toggle = document.getElementById('sidebarToggle');
            const storageKey = 'scentora_sidebar_collapsed';

            const applyState = (collapsed) => {
                if (collapsed) {
                    shell.classList.add('is-collapsed');
                } else {
                    shell.classList.remove('is-collapsed');
                }
            };

            const saved = localStorage.getItem(storageKey);
            if (saved === '1') applyState(true);

            toggle?.addEventListener('click', () => {
                const next = !shell.classList.contains('is-collapsed');
                applyState(next);
                localStorage.setItem(storageKey, next ? '1' : '0');
            });
        })();
    </script>
</body>
</html>

