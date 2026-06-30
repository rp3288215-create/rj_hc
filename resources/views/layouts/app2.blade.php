<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Rajasthan High Court')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* =============================================
           GLOBAL THEME VARIABLES
           ============================================= */
        :root {
            --hc-blue: #003366;
            --hc-light-blue: #e6f0fa;
            --hc-border: #dcdcdc;
            --hc-nav-text: #333333;

            /* Semantic tokens */
            --bg-primary:      #ffffff;
            --bg-secondary:    #f4f7f6;
            --bg-tertiary:     #f1f5f9;
            --text-primary:    #111111;
            --text-secondary:  #555555;
            --text-muted:      #64748b;
            --border-color:    #dcdcdc;
            --card-bg:         #ffffff;
            --card-shadow:     rgba(0, 0, 0, 0.05);
            --input-bg:        #f8f9fa;
            --navbar-bg:       #ffffff;
            --footer-bg:       #ffffff;
            --strip-bg:        #f8fafc;
            --ticker-bg:       #ffffff;
            --hero-overlay-start: rgba(255,255,255,0.92);
            --hero-overlay-mid:   rgba(255,255,255,0.75);
            --theme-btn-bg:       #f1f3f5;
            --theme-btn-border:   #ced4da;
            --theme-btn-color:    #495057;
        }

        [data-theme="dark"] {
    --hc-blue:         #ffffff;      /* sabhi blue accents → white */
    --hc-light-blue:   #1e2535;      /* home link background (thoda alag rahe) */
    --hc-border:       #2d3748;
    --hc-nav-text:     #e2e8f0;
    --hc-nav-txt:      #ffffff;

    --bg-primary:      #0f1117;
    --bg-secondary:    #1a1d27;
    --bg-tertiary:     #141720;
    --text-primary:    #f1f5f9;
    --text-secondary:  #a0aec0;
    --text-muted:      #718096;
    --border-color:    #2d3748;
    --card-bg:         #1e2130;
    --card-shadow:     rgba(0, 0, 0, 0.3);
    --input-bg:        #252836;
    --navbar-bg:       #1e2130;
    --footer-bg:       #1a1d27;
    --strip-bg:        #141720;
    --ticker-bg:       #1e2130;
    --hero-overlay-start: rgba(15,17,23,0.95);
    --hero-overlay-mid:   rgba(15,17,23,0.80);
    --theme-btn-bg:       #252836;
    --theme-btn-border:   #3d4a5c;
    --theme-btn-color:    #a0aec0;
}

/* Logo title text white in dark mode */
[data-theme="dark"] .hc-title-text h1,
[data-theme="dark"] .hc-title-text p {
    color: #ffffff;
}

/* Emblem / logo slight brightness boost */
[data-theme="dark"] .hc-emblem {
    filter: brightness(0) invert(1);
}

/* Theme toggle active button — white bg pe dark icon */
[data-theme="dark"] .hc-theme-btn.active,
[data-theme="dark"] .hc-theme-btn:hover {
    background: #ffffff;
    color: #0f1117;
    border-color: #ffffff;
}

/* Navbar home link — white border, white text */
[data-theme="dark"] .hc-nav-item.home-link .hc-nav-link {
    border-color: rgba(255,255,255,0.3);
    color: #ffffff !important;
}

/* Dropdown top border */
[data-theme="dark"] .hc-dropdown-menu {
    border-top-color: #ffffff;
}
[data-theme="dark"] .hc-dropdown-menu .dropdown-item:hover {
    color: #ffffff;
}

/* Ticker label background */
[data-theme="dark"] .hc-ticker-label {
    background: #ffffff;
    color: #0f1117;
}

/* Footer card title */
[data-theme="dark"] .hc-footer-card h5 {
    color: #ffffff;
}

/* Footer icon boxes */
[data-theme="dark"] .hc-icon-box.bg-green-light { background: #1a3a2a; color: #ffffff; }
[data-theme="dark"] .hc-icon-box.bg-blue-light  { background: #1a2a3a; color: #ffffff; }
[data-theme="dark"] .hc-icon-box.bg-red-light   { background: #3a1a1a; color: #ffffff; }

/* "View All" buttons */
[data-theme="dark"] .hc-btn-more {
    color: #ffffff;
    border-color: rgba(255,255,255,0.2);
}
[data-theme="dark"] .hc-btn-more:hover {
    background: #ffffff;
    color: #0f1117 !important;
    border-color: #ffffff;
}

/* Bottom strip links */
[data-theme="dark"] .hc-bottom-strip a {
    color: #ffffff;
}

/* Counter digits */
[data-theme="dark"] .hc-digit {
    color: #ffffff;
    border-color: rgba(255,255,255,0.15);
}

/* Judgment item left border stripe */
[data-theme="dark"] .hc-judgment-item::before {
    background-color: #ffffff;
    opacity: 0.5;
}

/* Tab pills active */
[data-theme="dark"] .hc-tab-pills .nav-link.active {
    background-color: #ffffff !important;
    color: #0f1117 !important;
}

/* Section title left bar */
[data-theme="dark"] .hc-section-title {
    color: #ffffff;
}
[data-theme="dark"] .hc-section-title::before {
    background-color: #ffffff;
}

/* Quick access icons */
[data-theme="dark"] .hc-qa-icon-wrapper {
    color: #ffffff;
}
[data-theme="dark"] .hc-qa-card:hover {
    border-color: rgba(255,255,255,0.4);
}
[data-theme="dark"] .hc-qa-dropdown {
    border-top-color: #ffffff;
}

/* Hero heading span */
[data-theme="dark"] .hc-hero-content h2 span {
    color: #ffffff;
}

/* Hero search button */
[data-theme="dark"] .hc-hero-search-box button {
    background: #ffffff;
    color: #0f1117;
}
[data-theme="dark"] .hc-hero-search-box button:hover {
    background: #e2e8f0;
}

/* Nav panel title icons */
[data-theme="dark"] .hc-panel-card .fas.fa-gavel,
[data-theme="dark"] .hc-panel-card .fas.fa-video {
    color: #ffffff !important;
}

/* Banner arrows */
[data-theme="dark"] .hc-banner-arrow {
    color: #ffffff;
}

/* Scroll to bottom button */
[data-theme="dark"] #scrollBottomBtn {
    background: #ffffff;
    color: #0f1117;
}

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

        /* =============================================
           THEME TOGGLE BUTTON STYLES (used in header)
           ============================================= */
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
            background: var(--hc-blue);
            color: #ffffff;
            border-color: var(--hc-blue);
        }
        [data-theme="dark"] .hc-theme-btn:hover,
        [data-theme="dark"] .hc-theme-btn.active {
            background: #4d9fff;
            color: #0f1117;
            border-color: #4d9fff;
        }
    </style>
    
    @yield('styles') 
</head>
<body>

    {{-- Header --}}
    @include('layouts.partials.header-v1')

    {{-- Main Working Template Segment --}}
    <main>
        <div class="container-fluid px-2 px-md-5 hc-main-layout-wrapper">
            <div class="row g-4">
                
                <div class="col-12 col-lg-3 col-xl-3">
                    @include('layouts.partials.sidebar-v1')
                </div>

                <div class="col-12 col-lg-9 col-xl-9">
                    @yield('content')
                </div>

            </div>
        </div>
    </main>

    {{-- Footer --}}
    @include('layouts.partials.footer-v1')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
      <!-- Global theme toggle logic -->
    <script>
        (function () {
            function setTheme(theme) {
                document.documentElement.setAttribute('data-theme', theme);
                localStorage.setItem('hc-theme', theme);
                document.querySelectorAll('#hc-light-theme-btn').forEach(btn => {
                    btn.classList.toggle('active', theme === 'light');
                });
                document.querySelectorAll('#hc-dark-theme-btn').forEach(btn => {
                    btn.classList.toggle('active', theme === 'dark');
                });
            }

            document.addEventListener('click', function (e) {
                if (e.target.closest('#hc-light-theme-btn')) setTheme('light');
                if (e.target.closest('#hc-dark-theme-btn'))  setTheme('dark');
            });

            // Sync button states on load
            const saved = localStorage.getItem('hc-theme') || 'light';
            setTheme(saved);
        })();
    </script>
    @yield('scripts')
</body>
</html>