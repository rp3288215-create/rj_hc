<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Rajasthan High Court')</title>

    {{-- Apply saved theme before page renders to avoid flash --}}
    <script>
        (function () {
            const saved = localStorage.getItem('hc-theme') || 'light';
            document.documentElement.setAttribute('data-theme', saved);
        })();
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* ============================================
           CSS VARIABLES — LIGHT THEME (DEFAULT)
        ============================================ */
        :root {
            --hc-blue:        #003366;
            --hc-light-blue:  #e6f0fa;
            --hc-nav-text:    #333333;

            --bg-primary:     #ffffff;
            --bg-secondary:   #f4f7f6;
            --bg-tertiary:    #f1f5f9;

            --text-primary:   #111111;
            --text-secondary: #555555;
            --text-muted:     #64748b;

            --border-color:   #dcdcdc;
            --card-bg:        #ffffff;
            --card-shadow:    rgba(0, 0, 0, 0.05);
            --input-bg:       #f8f9fa;
            --navbar-bg:      #ffffff;
            --footer-bg:      #ffffff;
            --strip-bg:       #f8fafc;
            --ticker-bg:      #ffffff;

            --theme-btn-bg:     #f1f3f5;
            --theme-btn-border: #ced4da;
            --theme-btn-color:  #495057;
        }

        /* ============================================
           CSS VARIABLES — DARK THEME OVERRIDES
        ============================================ */
        [data-theme="dark"] {
            --hc-blue:        #ffffff;
            --hc-light-blue:  #1e2535;
            --hc-nav-text:    #e2e8f0;

            --bg-primary:     #0f1117;
            --bg-secondary:   #1a1d27;
            --bg-tertiary:    #141720;

            --text-primary:   #f1f5f9;
            --text-secondary: #a0aec0;
            --text-muted:     #718096;

            --border-color:   #2d3748;
            --card-bg:        #1e2130;
            --card-shadow:    rgba(0, 0, 0, 0.3);
            --input-bg:       #252836;
            --navbar-bg:      #1e2130;
            --footer-bg:      #1a1d27;
            --strip-bg:       #141720;
            --ticker-bg:      #1e2130;

            --theme-btn-bg:     #252836;
            --theme-btn-border: #3d4a5c;
            --theme-btn-color:  #a0aec0;
        }

        /* ============================================
           BASE STYLES
        ============================================ */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-secondary);
            color: var(--text-primary);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        main { flex: 1; }

        /* ============================================
           THEME TOGGLE BUTTONS (Sun / Moon)
        ============================================ */
        .hc-theme-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 1px solid var(--theme-btn-border);
            background: var(--theme-btn-bg);
            color: var(--theme-btn-color);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 13px;
            transition: all 0.2s ease;
        }

        .hc-theme-btn:hover,
        .hc-theme-btn.active {
            background: #003366;
            color: #ffffff;
            border-color: #003366;
        }

        [data-theme="dark"] .hc-theme-btn:hover,
        [data-theme="dark"] .hc-theme-btn.active {
            background: #ffffff;
            color: #0f1117;
            border-color: #ffffff;
        }

        /* ============================================
           DARK THEME — ELEMENT-SPECIFIC OVERRIDES
        ============================================ */

        /* Header */
        [data-theme="dark"] .hc-emblem          { filter: brightness(0) invert(1); }
        [data-theme="dark"] .hc-title-text h1,
        [data-theme="dark"] .hc-title-text p    { color: #ffffff; }

        /* Navbar */
        [data-theme="dark"] .hc-nav-item.home-link .hc-nav-link { border-color: rgba(255,255,255,0.3); color: #ffffff !important; }
        [data-theme="dark"] .hc-dropdown-menu                   { border-top-color: #ffffff; }
        [data-theme="dark"] .hc-dropdown-menu .dropdown-item:hover { color: #ffffff; }
        [data-theme="dark"] .navbar-toggler        { background: var(--theme-btn-bg); border: 1px solid var(--theme-btn-border); border-radius: 10px; }
        [data-theme="dark"] .navbar-toggler-icon   { filter: brightness(0) invert(1); }
        [data-theme="dark"] .navbar-toggler:focus  { box-shadow: none; outline: none; }

        /* Ticker */
        [data-theme="dark"] .hc-ticker-label { background: #ffffff; color: #0f1117; }

        /* Footer */
        [data-theme="dark"] .hc-footer-card h5             { color: #ffffff; }
        [data-theme="dark"] .hc-icon-box.bg-green-light    { background: #1a3a2a; color: #ffffff; }
        [data-theme="dark"] .hc-icon-box.bg-blue-light     { background: #1a2a3a; color: #ffffff; }
        [data-theme="dark"] .hc-icon-box.bg-red-light      { background: #3a1a1a; color: #ffffff; }
        [data-theme="dark"] .hc-btn-more                   { color: #ffffff; border-color: rgba(255,255,255,0.2); }
        [data-theme="dark"] .hc-btn-more:hover             { background: #ffffff; color: #0f1117 !important; border-color: #ffffff; }
        [data-theme="dark"] .hc-bottom-strip a             { color: #ffffff; }
        [data-theme="dark"] .hc-digit                      { color: #ffffff; border-color: rgba(255,255,255,0.15); }
        [data-theme="dark"] #scrollTopBtn,
        [data-theme="dark"] #scrollBottomBtn               { background: #ffffff; color: #0f1117; }

        /* Home page */
        [data-theme="dark"] .hc-section-title              { color: #ffffff; }
        [data-theme="dark"] .hc-section-title::before      { background-color: #ffffff; }
        [data-theme="dark"] .hc-qa-icon-wrapper            { color: #ffffff; }
        [data-theme="dark"] .hc-qa-card:hover              { border-color: rgba(255,255,255,0.4); }
        [data-theme="dark"] .hc-qa-dropdown                { border-top-color: #ffffff; }
        [data-theme="dark"] .hc-hero-content h2 span       { color: #ffffff; }
        [data-theme="dark"] .hc-hero-search-box button     { background: #ffffff; color: #0f1117; }
        [data-theme="dark"] .hc-hero-search-box button:hover { background: #e2e8f0; }
        [data-theme="dark"] .hc-banner-arrow               { color: #ffffff; }
        [data-theme="dark"] .hc-panel-card .fas.fa-gavel,
        [data-theme="dark"] .hc-panel-card .fas.fa-video   { color: #ffffff !important; }
        [data-theme="dark"] .hc-judgment-item::before      { background-color: #ffffff; opacity: 0.5; }
        [data-theme="dark"] .hc-tab-pills .nav-link.active { background-color: #ffffff !important; color: #0f1117 !important; }

        /* Sidebar */
        [data-theme="dark"] .hc-sidebar-card h5                    { color: #ffffff; border-bottom-color: #2d3748; }
        [data-theme="dark"] .hc-sidebar-link                       { color: var(--text-primary); }
        [data-theme="dark"] .hc-sidebar-link:hover,
        [data-theme="dark"] .hc-sidebar-nav-item:hover .hc-sidebar-link { background-color: #252836; color: #ffffff; }
        [data-theme="dark"] .hc-sidebar-link div i                 { color: var(--text-muted); }
        [data-theme="dark"] .hc-sidebar-nav-item:hover .hc-sidebar-link div i { color: #ffffff; }
        [data-theme="dark"] .hc-sidebar-dropdown a                 { color: var(--text-muted); }
        [data-theme="dark"] .hc-sidebar-dropdown a:hover           { background-color: #252836; color: #ffffff; }
        [data-theme="dark"] .hc-widget-bell                        { background: #2a1f0f; border-color: #4a3010; }
        [data-theme="dark"] .hc-widget-bell-text h6                { color: #fbbf24; }
        [data-theme="dark"] .hc-widget-bell-text p                 { color: #d97706; }
    </style>

    @yield('styles')
</head>
<body>

    @include('layouts.partials.header-v1')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer-v1')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Global Theme Toggle --}}
    <script>
        (function () {
            function setTheme(theme) {
                document.documentElement.setAttribute('data-theme', theme);
                localStorage.setItem('hc-theme', theme);
                document.querySelectorAll('#hc-light-theme-btn').forEach(btn => btn.classList.toggle('active', theme === 'light'));
                document.querySelectorAll('#hc-dark-theme-btn').forEach(btn => btn.classList.toggle('active', theme === 'dark'));
            }

            document.addEventListener('click', function (e) {
                if (e.target.closest('#hc-light-theme-btn')) setTheme('light');
                if (e.target.closest('#hc-dark-theme-btn'))  setTheme('dark');
            });

            setTheme(localStorage.getItem('hc-theme') || 'light');
        })();
    </script>

    @yield('scripts')
</body>
</html>