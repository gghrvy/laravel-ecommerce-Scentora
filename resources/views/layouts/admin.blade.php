<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Scentora')</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="user-app-body">
    <div class="user-app-shell" id="adminAppShell">
        <aside class="user-sidebar" id="adminSidebar">
            <div class="sidebar-brand">
                <button type="button" class="brand-link" id="sidebarToggle" aria-label="Toggle navigation">
                    <div class="logo-icon"></div>
                    <span class="brand-name">Scentora</span>
                </button>
            </div>
            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="link-icon">@include('partials.icons.dashboard')</span><span class="link-label">Dashboard</span>
                </a>
                <a href="{{ route('admin.products') }}" class="sidebar-link {{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                    <span class="link-icon">@include('partials.icons.products')</span><span class="link-label">Products</span>
                </a>
                <a href="{{ route('admin.orders') }}" class="sidebar-link {{ request()->routeIs('admin.orders*') ? 'active' : '' }}">
                    <span class="link-icon">@include('partials.icons.orders')</span><span class="link-label">Orders</span>
                </a>
                <a href="{{ route('admin.users') }}" class="sidebar-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <span class="link-icon">@include('partials.icons.user')</span><span class="link-label">Users</span>
                </a>
                <a href="{{ route('admin.settings') }}" class="sidebar-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <span class="link-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M12 1v6m0 6v6M5.64 5.64l4.24 4.24m4.24 4.24l4.24 4.24M1 12h6m6 0h6M5.64 18.36l4.24-4.24m4.24-4.24l4.24-4.24"/>
                        </svg>
                    </span><span class="link-label">Settings</span>
                </a>
            </nav>
            <div class="sidebar-footer">
                <a href="{{ route('dashboard') }}" class="sidebar-user-link">
                    <div class="sidebar-user">
                        <span class="sidebar-user-icon">@include('partials.icons.user')</span>
                        <div>
                            <div class="sidebar-user-name">{{ session('user.name') ?? (session('user')['name'] ?? 'Admin') }}</div>
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
                @yield('content')
            </section>
        </main>
    </div>

    <script>
        (function() {
            const shell = document.getElementById('adminAppShell');
            const toggle = document.getElementById('sidebarToggle');
            const storageKey = 'scentora_admin_sidebar_collapsed';

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
    @stack('scripts')
</body>
</html>

