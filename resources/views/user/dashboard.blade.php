@extends('layouts.user')

@section('title', 'Dashboard - Scentora')
@section('page_title', 'Dashboard')

@section('content')
<div class="hero-card">
    <div>
        <p class="eyebrow">Welcome back</p>
        <h1 class="hero-title">Welcome back, {{ $user['name'] ?? 'Guest' }}!</h1>
        <div class="loyalty-pill">
            <span class="pill-label">Loyalty Tier</span>
            <span class="pill-value gold">Gold</span>
        </div>
        <div class="progress-block">
            <div class="progress-header">
                <span>Points</span>
                <span>1,850 / 2,500</span>
            </div>
            <div class="progress-track">
                <div class="progress-fill" style="width: 74%;"></div>
            </div>
            <div class="progress-footer">650 points to Platinum</div>
        </div>
    </div>
    <div class="hero-cta">
        <div class="cta-copy">
            <p class="cta-eyebrow">Exclusive Blend</p>
            <h3>Velvet Amber</h3>
            <p class="cta-sub">A signature accord of amber, iris, and smoked vanilla.</p>
        </div>
        <a href="{{ route('products') }}" class="btn primary">Shop Now</a>
    </div>
</div>

<section class="section-block">
    <div class="section-header">
        <div>
            <p class="eyebrow">Tailored to you</p>
            <h2 class="section-title">Recommended For You</h2>
        </div>
        <a href="{{ route('products') }}" class="text-link">View all</a>
    </div>
    <div class="product-grid recos">
        @for ($i = 1; $i <= 4; $i++)
            <div class="product-card">
                <div class="product-image"></div>
                <button class="icon-btn" aria-label="add to wishlist">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 21s-8-5.5-8-11a5 5 0 0 1 9-3 5 5 0 0 1 9 3c0 5.5-8 11-8 11z"/>
                    </svg>
                </button>
                <div class="product-info">
                    <h3 class="product-name">Signature Scent {{ $i }}</h3>
                    <p class="product-notes">Amber • Vanilla • Cedarwood</p>
                    <div class="product-meta">
                        <span class="price">$129</span>
                        <span class="badge">50ml</span>
                    </div>
                </div>
                <div class="product-actions">
                    <a href="{{ route('product.show', ['id' => $i]) }}" class="btn ghost">View</a>
                    <button class="btn primary">Add to Cart</button>
                </div>
            </div>
        @endfor
    </div>
</section>

<section class="section-block flash-sale">
    <div class="section-header">
        <div>
            <p class="eyebrow">Limited Time</p>
            <h2 class="section-title">Flash Sale</h2>
        </div>
        <div class="countdown">
            <span class="count-segment"><strong>05</strong><small>hrs</small></span>
            <span class="count-segment"><strong>44</strong><small>min</small></span>
            <span class="count-segment"><strong>12</strong><small>sec</small></span>
        </div>
    </div>
    <div class="flash-grid">
        <div class="flash-highlight">
            <div>
                <p class="eyebrow">Today only</p>
                <h3>Velvet Amber • 25% off</h3>
                <p class="flash-sub">Warm amber and iris wrapped in smoked vanilla.</p>
            </div>
            <a href="{{ route('products') }}" class="btn primary">Shop Deal</a>
        </div>
        @for ($i = 1; $i <= 2; $i++)
            <div class="product-card compact">
                <div class="product-image"></div>
                <div class="product-info">
                    <h3 class="product-name">Noire Nuit</h3>
                    <p class="product-notes">Oud • Saffron • Patchouli</p>
                    <div class="product-meta">
                        <span class="price">$149</span>
                        <span class="badge">-20%</span>
                    </div>
                </div>
                <div class="product-actions">
                    <button class="btn primary w-100">Add to Cart</button>
                </div>
            </div>
        @endfor
    </div>
</section>

<section class="section-block two-col">
    <div class="dashboard-card fill">
        <div class="section-header">
            <div>
                <p class="eyebrow">Your trail</p>
                <h2 class="section-title">Recent Activity</h2>
            </div>
        </div>
        <div class="list-rows">
            @foreach (['Velvet Rose','Citrus Bloom','Midnight Oud'] as $item)
                <div class="row">
                    <div>
                        <div class="row-title">{{ $item }}</div>
                        <div class="row-sub">Viewed 2h ago</div>
                    </div>
                    <button class="btn ghost">Reorder</button>
                </div>
            @endforeach
        </div>
    </div>

    <div class="dashboard-card fill">
        <div class="section-header">
            <div>
                <p class="eyebrow">Track my orders</p>
                <h2 class="section-title">Latest Order</h2>
            </div>
            <span class="badge">Preparing</span>
        </div>
        <div class="order-timeline">
            <div class="timeline-step complete">
                <span class="dot"></span>
                <div>
                    <div class="row-title">Order Placed</div>
                    <div class="row-sub">Nov 28, 10:12 AM</div>
                </div>
            </div>
            <div class="timeline-step active">
                <span class="dot"></span>
                <div>
                    <div class="row-title">Preparing</div>
                    <div class="row-sub">Packing your items</div>
                </div>
            </div>
            <div class="timeline-step">
                <span class="dot"></span>
                <div>
                    <div class="row-title">Out for Delivery</div>
                    <div class="row-sub">Awaiting pickup</div>
                </div>
            </div>
            <div class="timeline-step">
                <span class="dot"></span>
                <div>
                    <div class="row-title">Delivered</div>
                    <div class="row-sub">Expected Nov 30</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-block">
    <div class="section-header">
        <div>
            <p class="eyebrow">Trending now</p>
            <h2 class="section-title">Trending & New Arrivals</h2>
        </div>
        <a href="{{ route('products') }}" class="btn ghost">Shop Collection</a>
    </div>
    <div class="product-grid recos">
        @for ($i = 1; $i <= 4; $i++)
            <div class="product-card">
                <div class="product-image"></div>
                <div class="product-info">
                    <h3 class="product-name">Maison Lumière {{ $i }}</h3>
                    <p class="product-notes">Neroli • Bergamot • White Musk</p>
                    <div class="product-meta">
                        <span class="price">$139</span>
                        <span class="badge">New</span>
                    </div>
                </div>
                <div class="product-actions">
                    <a href="{{ route('product.show', ['id' => $i]) }}" class="btn ghost">View</a>
                    <button class="btn primary">Add to Cart</button>
                </div>
            </div>
        @endfor
    </div>
</section>
@endsection

