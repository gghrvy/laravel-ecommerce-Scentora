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
            <header class="user-topbar">
                <div class="topbar-title">@yield('page_title', 'Dashboard')</div>
            </header>
            <section class="user-content">
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

