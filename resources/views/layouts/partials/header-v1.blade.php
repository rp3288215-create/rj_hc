{{-- Font Awesome is already loaded via app.blade.php — no need to load it here --}}

<style>
    /* ============================================
       HEADER — TOP BAR
    ============================================ */
    .hc-top-header {
        background-color: var(--bg-primary);
        padding: 15px 40px 35px 40px; /* Extra bottom padding for navbar overlap */
        border-bottom: 1px solid var(--border-color);
        position: relative;
        z-index: 1;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .hc-logo-area {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .hc-emblem { height: 60px; width: auto; }

    .hc-title-text h1 {
        font-family: 'Georgia', serif;
        font-size: 24px;
        font-weight: bold;
        color: var(--text-primary);
        margin: 0;
    }

    .hc-title-text p {
        font-size: 14px;
        color: var(--text-secondary);
        font-weight: 500;
        margin: 0;
    }

    /* ============================================
       HEADER — TOP RIGHT CONTROLS
    ============================================ */
    .hc-controls {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 15px;
    }

    .hc-font-btn {
        background: var(--theme-btn-bg);
        border: 1px solid var(--theme-btn-border);
        padding: 2px 8px;
        font-size: 12px;
        font-weight: 600;
        color: var(--theme-btn-color);
        text-decoration: none;
        border-radius: 3px;
        transition: background 0.2s;
    }
    .hc-font-btn:hover { background: var(--border-color); }

    /* ============================================
       NAVBAR — FLOATING PILL STYLE
    ============================================ */
    .hc-navbar {
        background-color: transparent !important;
        padding: 0 !important;
        margin-top: -25px !important; /* Overlaps bottom of header */
        position: relative;
        z-index: 10 !important;
    }

    .hc-navbar-container {
        background-color: var(--navbar-bg) !important;
        margin: 0 40px !important;
        padding: 6px 20px !important;
        border-radius: 14px;
        border: 1px solid var(--border-color) !important;
        box-shadow: 0 8px 24px var(--card-shadow) !important;
        transition: background-color 0.3s;
    }

    .hc-nav-link {
        color: var(--hc-nav-text) !important;
        font-size: 13px;
        font-weight: 500;
        padding: 8px 10px !important;
        border-radius: 6px;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 4px;
        text-decoration: none;
    }

    /* Home link highlighted */
    .hc-nav-item.home-link .hc-nav-link {
        color: var(--hc-blue) !important;
        border: 1px solid #b3d1ff;
    }

    .hc-nav-link:hover {
        background-color: var(--bg-tertiary) !important;
        color: var(--hc-blue) !important;
    }

    /* Custom dropdown arrow using FA */
    .hc-navbar .dropdown-toggle::after {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f107";
        border: none;
        vertical-align: middle;
        font-size: 10px;
        margin-left: 4px;
    }

    /* Dropdown menu */
    .hc-dropdown-menu {
        background-color: var(--card-bg);
        border: 1px solid var(--border-color);
        border-top: 3px solid var(--hc-blue);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        font-size: 13px;
        border-radius: 0 0 8px 8px;
        margin-top: 5px;
    }

    .hc-dropdown-menu .dropdown-item { color: var(--text-primary); }
    .hc-dropdown-menu .dropdown-item:hover {
        background-color: var(--bg-tertiary);
        color: var(--hc-blue);
    }

    /* ============================================
       RESPONSIVE
    ============================================ */
    @media (max-width: 991px) {
        .hc-navbar           { margin-top: -15px !important; }
        .hc-navbar-container { margin: 0 15px !important; }
        .hc-top-header       { padding: 15px 20px 25px 20px; }
        .hc-controls         { justify-content: flex-start; }
    }

    /* Desktop hover-open dropdowns */
    @media (min-width: 1200px) {
        .hc-navbar .nav-item.dropdown .hc-dropdown-menu {
            display: block;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.2s ease;
        }
        .hc-navbar .nav-item.dropdown:hover .hc-dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
    }
</style>

{{-- ===== HEADER ===== --}}
<div class="hc-top-header">
    <div class="row align-items-center">

        {{-- Logo + Title --}}
        <div class="col-md-7 col-12 hc-logo-area">
            <img src="{{ asset('assets/logo.png') }}" alt="Emblem" class="hc-emblem">
            <div class="hc-title-text">
                <h1>Rajasthan High Court</h1>
                <p>(राजस्थान उच्च न्यायालय)</p>
            </div>
        </div>

        {{-- Font Size Controls + Theme Toggle --}}
        <div class="col-md-5 col-12 hc-controls mt-3 mt-md-0">
            <div class="d-flex align-items-center gap-1">
                <a href="#" class="hc-font-btn">A-</a>
                <a href="#" class="hc-font-btn">A</a>
                <a href="#" class="hc-font-btn">A+</a>
                <button id="hc-light-theme-btn" class="hc-theme-btn active" title="Light Theme">
                    <i class="fa-solid fa-sun"></i>
                </button>
                <button id="hc-dark-theme-btn" class="hc-theme-btn" title="Dark Theme">
                    <i class="fa-solid fa-moon"></i>
                </button>
            </div>
        </div>

    </div>
</div>

{{-- ===== NAVBAR ===== --}}
<nav class="navbar navbar-expand-xl hc-navbar w-100">
    <div class="container-fluid hc-navbar-container">

        <button class="navbar-toggler ms-2" type="button"
                data-bs-toggle="collapse" data-bs-target="#hcMenuContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="hcMenuContent">
            <ul class="navbar-nav w-100 justify-content-between">

                <li class="nav-item hc-nav-item home-link">
                    <a class="hc-nav-link" href="{{ route('home') }}">
                        <i class="fa-solid fa-house"></i> Home
                    </a>
                </li>

                <li class="nav-item hc-nav-item dropdown">
                    <a class="hc-nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-bars"></i> Menu
                    </a>
                    <ul class="dropdown-menu hc-dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('history') }}">History</a></li>
                        <li><a class="dropdown-item" href="{{ route('registrar') }}">Registrar General</a></li>
                    </ul>
                </li>

                <li class="nav-item hc-nav-item dropdown">
                    <a class="hc-nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Cause List</a>
                    <ul class="dropdown-menu hc-dropdown-menu">
                        <li><a class="dropdown-item" href="#">Daily Cause List</a></li>
                    </ul>
                </li>

                <li class="nav-item hc-nav-item dropdown">
                    <a class="hc-nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Case Status</a>
                    <ul class="dropdown-menu hc-dropdown-menu">
                        <li><a class="dropdown-item" href="#">Search by Number</a></li>
                    </ul>
                </li>

                <li class="nav-item hc-nav-item dropdown">
                    <a class="hc-nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Live List / Advocate Wise</a>
                    <ul class="dropdown-menu hc-dropdown-menu">
                        <li><a class="dropdown-item" href="#">Live Display Board</a></li>
                    </ul>
                </li>

                <li class="nav-item hc-nav-item dropdown">
                    <a class="hc-nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Judgments</a>
                    <ul class="dropdown-menu hc-dropdown-menu">
                        <li><a class="dropdown-item" href="#">Reportable Judgments</a></li>
                    </ul>
                </li>

                <li class="nav-item hc-nav-item dropdown">
                    <a class="hc-nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">e-True Copy</a>
                    <ul class="dropdown-menu hc-dropdown-menu">
                        <li><a class="dropdown-item" href="#">Apply Online</a></li>
                    </ul>
                </li>

                <li class="nav-item hc-nav-item">
                    <a class="hc-nav-link" href="#">Latest Updates</a>
                </li>

                <li class="nav-item hc-nav-item dropdown">
                    <a class="hc-nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Archive</a>
                    <ul class="dropdown-menu hc-dropdown-menu">
                        <li><a class="dropdown-item" href="#">Old Notifications</a></li>
                    </ul>
                </li>

                <li class="nav-item hc-nav-item dropdown">
                    <a class="hc-nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">e-Services</a>
                    <ul class="dropdown-menu hc-dropdown-menu">
                        <li><a class="dropdown-item" href="#">e-Filing</a></li>
                    </ul>
                </li>

                <li class="nav-item hc-nav-item">
                    <a class="hc-nav-link" href="#">Virtual Justice Clock</a>
                </li>

                <li class="nav-item hc-nav-item">
                    <a class="hc-nav-link" href="#">Commercial Courts</a>
                </li>

                <li class="nav-item hc-nav-item">
                    <a class="hc-nav-link" href="#">eLR-Raj Portal</a>
                </li>

                <li class="nav-item hc-nav-item">
                    <a class="hc-nav-link" href="#">JJC</a>
                </li>

            </ul>
        </div>
    </div>
</nav>