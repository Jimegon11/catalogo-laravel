<style>
    /* ── PRODUCT CARD ── */
    .product-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: var(--transition);
        position: relative;
        cursor: pointer;
    }

    .product-card:hover {
        border-color: rgba(99,102,241,.4);
        transform: translateY(-6px);
        box-shadow: var(--shadow-lg);
        background: var(--bg-card-hover);
    }

    /* Badge area */
    .product-card__badges {
        position: absolute;
        top: 1rem;
        left: 1rem;
        display: flex;
        flex-direction: column;
        gap: .4rem;
        z-index: 2;
    }

    .badge {
        display: inline-block;
        padding: .25rem .65rem;
        border-radius: 999px;
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .badge--featured {
        background: linear-gradient(135deg, #f59e0b, #ef4444);
        color: #fff;
    }

    .badge--discount {
        background: rgba(16,185,129,.2);
        border: 1px solid rgba(16,185,129,.4);
        color: #34d399;
    }

    .badge--out-of-stock {
        background: rgba(239,68,68,.15);
        border: 1px solid rgba(239,68,68,.3);
        color: #f87171;
    }

    /* Image area */
    .product-card__image {
        aspect-ratio: 4/3;
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        position: relative;
        overflow: hidden;
    }

    .product-card__image img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform .4s ease;
    }

    .product-card:hover .product-card__image img {
        transform: scale(1.06);
    }

    .product-card__image::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, transparent 50%, rgba(15,15,19,.6) 100%);
    }

    /* Body */
    .product-card__body {
        padding: 1.25rem;
        display: flex;
        flex-direction: column;
        gap: .6rem;
        flex: 1;
    }

    .product-card__category {
        font-size: .73rem;
        font-weight: 600;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: var(--primary-light);
    }

    .product-card__name {
        font-size: 1rem;
        font-weight: 700;
        line-height: 1.35;
        color: var(--text-primary);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-card__description {
        font-size: .83rem;
        color: var(--text-secondary);
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Rating */
    .product-card__rating {
        display: flex;
        align-items: center;
        gap: .4rem;
        font-size: .8rem;
    }

    .stars { color: var(--accent); letter-spacing: .5px; }
    .rating-value { color: var(--text-secondary); }

    /* Footer */
    .product-card__footer {
        padding: 1rem 1.25rem 1.25rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-top: 1px solid var(--border);
        gap: .75rem;
    }

    .product-card__pricing {
        display: flex;
        flex-direction: column;
        gap: .1rem;
    }

    .product-card__price {
        font-size: 1.35rem;
        font-weight: 800;
        color: var(--text-primary);
        letter-spacing: -0.5px;
        line-height: 1;
    }

    .product-card__original-price {
        font-size: .8rem;
        color: var(--text-muted);
        text-decoration: line-through;
    }

    .btn-add-cart {
        background: var(--primary);
        color: #fff;
        border: none;
        padding: .55rem 1.1rem;
        border-radius: var(--radius-sm);
        font-size: .85rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        font-family: inherit;
        white-space: nowrap;
        flex-shrink: 0;
    }

    .btn-add-cart:hover {
        background: var(--primary-dark);
        transform: scale(1.04);
        box-shadow: 0 4px 12px rgba(99,102,241,.45);
    }

    .btn-add-cart:disabled {
        background: var(--bg-dark);
        border: 1px solid var(--border);
        color: var(--text-muted);
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    .product-card__stock {
        font-size: .75rem;
        color: var(--text-muted);
        margin-top: .15rem;
    }

    .product-card__stock--low { color: var(--accent); }
</style>

<article
    class="product-card"
    id="product-{{ $product->id }}"
    data-category="{{ $product->category }}"
    aria-label="{{ $product->name }}"
>
    {{-- BADGES --}}
    <div class="product-card__badges">
        @if ($product->is_featured)
            <span class="badge badge--featured">⭐ Destacado</span>
        @endif

        @if ($product->discount_percentage)
            <span class="badge badge--discount">-{{ $product->discount_percentage }}%</span>
        @endif

        @if (! $product->is_in_stock)
            <span class="badge badge--out-of-stock">Agotado</span>
        @endif
    </div>

    {{-- PRODUCT IMAGE / EMOJI PLACEHOLDER --}}
    <div class="product-card__image">
        @if ($product->image_url)
            <img
                src="{{ $product->image_url }}"
                alt="{{ $product->name }}"
                loading="lazy"
            >
        @else
            @php
                $emoji = match(true) {
                    str_contains($product->category, 'Electronics') => '📱',
                    str_contains($product->category, 'Clothing')    => '👕',
                    str_contains($product->category, 'Home')        => '🏠',
                    str_contains($product->category, 'Sports')      => '⚽',
                    str_contains($product->category, 'Books')       => '📚',
                    str_contains($product->category, 'Toys')        => '🧸',
                    default                                          => '📦',
                };
            @endphp
            {{ $emoji }}
        @endif
    </div>

    {{-- BODY --}}
    <div class="product-card__body">
        <p class="product-card__category">{{ $product->category }}</p>

        <h3 class="product-card__name">{{ $product->name }}</h3>

        <p class="product-card__description">{{ $product->description }}</p>

        {{-- RATING --}}
        <div class="product-card__rating" aria-label="Valoración: {{ $product->rating }} de 5">
            <span class="stars" aria-hidden="true">
                @for ($i = 1; $i <= 5; $i++)
                    {{ $i <= round($product->rating) ? '★' : '☆' }}
                @endfor
            </span>
            <span class="rating-value">{{ number_format($product->rating, 1) }}</span>
        </div>
    </div>

    {{-- FOOTER: price + CTA --}}
    <div class="product-card__footer">
        <div class="product-card__pricing">
            <span class="product-card__price">{{ number_format($product->price, 2) }} €</span>

            @if ($product->original_price)
                <span class="product-card__original-price">{{ number_format($product->original_price, 2) }} €</span>
            @endif

            @if ($product->is_in_stock && $product->stock <= 10)
                <span class="product-card__stock product-card__stock--low">
                    ⚠ Solo {{ $product->stock }} en stock
                </span>
            @elseif ($product->is_in_stock)
                <span class="product-card__stock">En stock</span>
            @endif
        </div>

        <button
            class="btn-add-cart"
            id="add-to-cart-{{ $product->id }}"
            type="button"
            @if(! $product->is_in_stock) disabled @endif
            aria-label="Añadir {{ $product->name }} al carrito"
        >
            @if ($product->is_in_stock)
                + Añadir
            @else
                Agotado
            @endif
        </button>
    </div>
</article>
