@extends('layouts.app')

@section('title', 'Catálogo de Productos')
@section('meta_description', 'Descubre nuestra selección de productos premium: electrónica, moda, hogar y mucho más con los mejores precios.')

@push('styles')
<style>
    /* ── HERO ── */
    .hero {
        text-align: center;
        padding: 5rem 2rem 4rem;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 80% 60% at 50% -10%, rgba(99,102,241,.3), transparent);
        pointer-events: none;
    }

    .hero__eyebrow {
        display: inline-block;
        font-size: .8rem;
        font-weight: 700;
        letter-spacing: .12em;
        text-transform: uppercase;
        color: var(--primary-light);
        background: rgba(99,102,241,.12);
        border: 1px solid rgba(99,102,241,.25);
        padding: .35rem 1rem;
        border-radius: 999px;
        margin-bottom: 1.5rem;
    }

    .hero__title {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        font-weight: 800;
        line-height: 1.08;
        letter-spacing: -2px;
        background: linear-gradient(135deg, #fff 30%, var(--primary-light) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1.25rem;
    }

    .hero__subtitle {
        font-size: 1.15rem;
        color: var(--text-secondary);
        max-width: 600px;
        margin: 0 auto 2.5rem;
    }

    .hero__stats {
        display: flex;
        justify-content: center;
        gap: 3rem;
        flex-wrap: wrap;
    }

    .hero__stat {
        text-align: center;
    }

    .hero__stat-value {
        font-size: 2rem;
        font-weight: 800;
        color: var(--text-primary);
        line-height: 1;
    }

    .hero__stat-label {
        font-size: .8rem;
        color: var(--text-muted);
        margin-top: .25rem;
        text-transform: uppercase;
        letter-spacing: .08em;
    }

    /* ── FILTERS BAR ── */
    .filters {
        display: flex;
        gap: .75rem;
        flex-wrap: wrap;
        margin-bottom: 2.5rem;
        align-items: center;
    }

    .filters__label {
        font-size: .85rem;
        color: var(--text-muted);
        font-weight: 500;
        margin-right: .5rem;
    }

    .filter-btn {
        background: var(--bg-card);
        border: 1px solid var(--border);
        color: var(--text-secondary);
        padding: .45rem 1.1rem;
        border-radius: 999px;
        font-size: .85rem;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
        font-family: inherit;
    }

    .filter-btn:hover,
    .filter-btn.active {
        background: var(--primary);
        border-color: var(--primary);
        color: #fff;
    }

    /* ── SECTION HEADER ── */
    .section-header {
        display: flex;
        align-items: baseline;
        justify-content: space-between;
        margin-bottom: 1.75rem;
    }

    .section-title {
        font-size: 1.4rem;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .section-count {
        font-size: .875rem;
        color: var(--text-muted);
    }

    /* ── PRODUCT GRID ── */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 4rem;
    }

    /* Empty state */
    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 5rem 2rem;
        color: var(--text-muted);
    }

    .empty-state__icon { font-size: 3rem; margin-bottom: 1rem; }
    .empty-state__title { font-size: 1.25rem; font-weight: 600; margin-bottom: .5rem; color: var(--text-secondary); }
</style>
@endpush

@section('content')

    {{-- HERO SECTION --}}
    <section class="hero" aria-labelledby="hero-title">
        <span class="hero__eyebrow">✦ Nueva Temporada 2026</span>
        <h1 class="hero__title" id="hero-title">
            Descubre los Mejores<br>Productos
        </h1>
        <p class="hero__subtitle">
            Electrónica, moda, hogar y mucho más. Calidad premium al mejor precio, directo a tu puerta.
        </p>

        <div class="hero__stats">
            <div class="hero__stat">
                <p class="hero__stat-value">{{ $products->count() }}</p>
                <p class="hero__stat-label">Productos</p>
            </div>
            <div class="hero__stat">
                <p class="hero__stat-value">{{ $products->where('is_featured', true)->count() }}</p>
                <p class="hero__stat-label">Destacados</p>
            </div>
            <div class="hero__stat">
                <p class="hero__stat-value">{{ $products->where('stock', '>', 0)->count() }}</p>
                <p class="hero__stat-label">En Stock</p>
            </div>
        </div>
    </section>

    {{-- FILTERS --}}
    <div class="filters" role="group" aria-label="Filtrar por categoría">
        <span class="filters__label">Filtrar:</span>
        <button class="filter-btn active" id="filter-all" data-filter="all" type="button">Todos</button>
        @foreach ($products->pluck('category')->unique()->sort() as $category)
            <button
                class="filter-btn"
                id="filter-{{ Str::slug($category) }}"
                data-filter="{{ $category }}"
                type="button"
            >{{ $category }}</button>
        @endforeach
    </div>

    {{-- PRODUCTS SECTION --}}
    <section aria-labelledby="products-title">
        <div class="section-header">
            <h2 class="section-title" id="products-title">Catálogo de Productos</h2>
            <span class="section-count">{{ $products->count() }} artículos</span>
        </div>

        <div class="product-grid" id="product-grid">
            @forelse ($products as $product)
                @include('partials.product-card', ['product' => $product])
            @empty
                <div class="empty-state">
                    <p class="empty-state__icon">📦</p>
                    <p class="empty-state__title">No hay productos disponibles</p>
                    <p>Vuelve más tarde para ver nuestro catálogo.</p>
                </div>
            @endforelse
        </div>
    </section>

@endsection

@push('scripts')
<script>
    // Client-side category filter
    const filterBtns = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.product-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.dataset.filter;

            // Update active state
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // Show/hide cards
            cards.forEach(card => {
                const category = card.dataset.category;
                const show = filter === 'all' || category === filter;
                card.style.display = show ? 'flex' : 'none';
            });
        });
    });
</script>
@endpush
