<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Catálogo de productos online con los mejores artículos al mejor precio.')">
    <title>@yield('title', 'ShopCraft') | ShopCraft</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #a5b4fc;
            --accent: #f59e0b;
            --accent-dark: #d97706;
            --success: #10b981;
            --danger: #ef4444;
            --bg-dark: #0f0f13;
            --bg-card: #18181f;
            --bg-card-hover: #1e1e28;
            --border: #2a2a38;
            --text-primary: #f1f1f5;
            --text-secondary: #9999b3;
            --text-muted: #5f5f7a;
            --shadow-sm: 0 1px 3px rgba(0,0,0,.4);
            --shadow-md: 0 4px 24px rgba(0,0,0,.5);
            --shadow-lg: 0 8px 40px rgba(99,102,241,.15);
            --radius: 16px;
            --radius-sm: 8px;
            --transition: all .25s cubic-bezier(.4,0,.2,1);
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-primary);
            min-height: 100vh;
            line-height: 1.6;
        }

        /* ── NAVBAR ── */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(15,15,19,.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 0 2rem;
        }

        .navbar__inner {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
        }

        .navbar__logo {
            font-size: 1.4rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .navbar__nav {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .navbar__nav a {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: .9rem;
            font-weight: 500;
            transition: var(--transition);
        }

        .navbar__nav a:hover { color: var(--text-primary); }

        .navbar__actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .btn-cart {
            background: var(--primary);
            color: #fff;
            border: none;
            padding: .5rem 1.25rem;
            border-radius: var(--radius-sm);
            font-size: .875rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            font-family: inherit;
        }

        .btn-cart:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(99,102,241,.4);
        }

        /* ── MAIN CONTENT ── */
        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* ── FOOTER ── */
        .footer {
            border-top: 1px solid var(--border);
            padding: 2.5rem 2rem;
            text-align: center;
            color: var(--text-muted);
            font-size: .85rem;
        }

        .footer__brand {
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ── FLASH MESSAGES ── */
        .flash {
            max-width: 1400px;
            margin: 1rem auto 0;
            padding: 0 2rem;
        }

        .flash__msg {
            padding: 1rem 1.5rem;
            border-radius: var(--radius-sm);
            font-size: .9rem;
            font-weight: 500;
            margin-bottom: .5rem;
        }

        .flash__msg--success {
            background: rgba(16,185,129,.15);
            border: 1px solid rgba(16,185,129,.3);
            color: var(--success);
        }

        .flash__msg--error {
            background: rgba(239,68,68,.15);
            border: 1px solid rgba(239,68,68,.3);
            color: var(--danger);
        }
    </style>

    @stack('styles')
</head>
<body>

    {{-- NAVBAR --}}
    <header>
        <nav class="navbar" aria-label="Navegación principal">
            <div class="navbar__inner">
                <a href="{{ route('home') }}" class="navbar__logo">ShopCraft ✦</a>

                <ul class="navbar__nav">
                    <li><a href="{{ route('home') }}">Inicio</a></li>
                    <li><a href="#">Categorías</a></li>
                    <li><a href="#">Ofertas</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>

                <div class="navbar__actions">
                    <button class="btn-cart" id="btn-cart" type="button">🛒 Carrito (0)</button>
                </div>
            </div>
        </nav>
    </header>

    {{-- FLASH MESSAGES --}}
    @if (session('success') || session('error'))
        <div class="flash">
            @if (session('success'))
                <p class="flash__msg flash__msg--success">{{ session('success') }}</p>
            @endif
            @if (session('error'))
                <p class="flash__msg flash__msg--error">{{ session('error') }}</p>
            @endif
        </div>
    @endif

    {{-- PAGE CONTENT --}}
    <main class="main-content" id="main">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="footer">
        <p>© {{ date('Y') }} <span class="footer__brand">ShopCraft</span> — Todos los derechos reservados.</p>
    </footer>

    @stack('scripts')
</body>
</html>
