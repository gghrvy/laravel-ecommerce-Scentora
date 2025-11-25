<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Scentora - Luxury Fragrance Boutique')</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f1e8;
            min-height: 100vh;
            color: #3d2817;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header {
            background: rgba(245, 241, 232, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(92, 58, 33, 0.2);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 3px;
            text-decoration: none;
            color: #5c3a21;
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            border: 2px solid #5c3a21;
            border-radius: 8px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-icon::after {
            content: 'S';
            font-size: 1.5rem;
            font-weight: bold;
            color: #5c3a21;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: #5c3a21;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: #c9975a;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #c9975a;
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .main-content {
            min-height: calc(100vh - 140px);
        }

        .footer {
            background: #e8ddd4;
            border-top: 1px solid rgba(92, 58, 33, 0.2);
            padding: 2rem 0;
            text-align: center;
            color: #8b5a3c;
        }

        /* auth styles are provided by public/css/auth.css only */

        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                gap: 1rem;
            }
            
            .nav-links {
                gap: 1rem;
            }
            
            /* no overrides here */
        }
    </style>
</head>
<body>
    <header class="header">
        <nav class="nav container">
            <a href="/" class="logo">
                <div class="logo-icon"></div>
                centora
            </a>
            <ul class="nav-links">
                <li><a href="/">Login</a></li>
                <li><a href="/register">Register</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main class="main-content">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
        </div>
    </footer>
</body>
</html>
