@extends('layouts.app')

@section('title', 'Home - Rajasthan High Court, Jaipur Bench')

@section('styles')
<style>
    /* ============================================
       HERO SLIDER
    ============================================ */
    .hc-hero-wrapper {
        padding: 0;
        margin: 0;
        width: 100%;
        overflow: hidden;
    }

    .hc-hero-section {
        position: relative;
        width: 100%;
        height: 520px;
        overflow: hidden;
    }

    /* Background slide layers */
    .hc-hero-bg {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center right;
        z-index: 1;
        opacity: 0;
        transition: opacity 0.8s ease-in-out;
    }

    .hc-hero-bg.active { opacity: 1; }

    /* Light theme slides */
    .hc-bg-1 { background-image: linear-gradient(90deg, rgba(255,255,255,0.92) 0%, rgba(255,255,255,0) 40%), url("{{ asset('assets/hero/image1.jpg') }}"); }
    .hc-bg-2 { background-image: linear-gradient(90deg, rgba(255,255,255,0.92) 0%, rgba(255,255,255,0) 40%), url("{{ asset('assets/hero/image3.jpg') }}"); }

    /* Dark theme slides */
    [data-theme="dark"] .hc-bg-1 { background-image: linear-gradient(90deg, rgba(15,17,23,0.95) 0%, rgba(15,17,23,0) 40%), url("{{ asset('assets/hero/image1.jpg') }}"); }
    [data-theme="dark"] .hc-bg-2 { background-image: linear-gradient(90deg, rgba(15,17,23,0.95) 0%, rgba(15,17,23,0) 40%), url("{{ asset('assets/hero/image3.jpg') }}"); }

    /* Hero content row */
    .hc-hero-top-row {
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        width: 100%;
        padding: 40px 60px 0 60px;
        box-sizing: border-box;
        z-index: 5;
    }

    .hc-hero-content        { max-width: 500px; }
    .hc-hero-content h2 {
        font-family: 'Georgia', serif;
        font-size: 38px;
        font-weight: bold;
        color: var(--text-primary);
        line-height: 1.25;
        margin: 0;
    }

    .hc-hero-content h2 span { color: var(--hc-blue); }

    /* Search box */
    .hc-hero-search-box {
        max-width: 320px;
        width: 100%;
        background: var(--card-bg);
        padding: 4px 6px;
        border-radius: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--border-color);
    }

    .hc-hero-search-box form {
        display: flex;
        align-items: center;
        width: 100%;
    }

    .hc-hero-search-box input {
        width: 100%;
        border: none;
        outline: none;
        padding: 8px 14px;
        font-size: 14px;
        color: var(--text-primary);
        background: transparent;
    }

    .hc-hero-search-box button {
        background: var(--hc-blue);
        border: none;
        color: #ffffff;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: opacity 0.2s;
        flex-shrink: 0;
    }

    [data-theme="dark"] .hc-hero-search-box button { color: #0f1117; }
    .hc-hero-search-box button:hover { opacity: 0.85; }

    /* Slider arrows */
    .hc-banner-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 44px;
        height: 44px;
        background: var(--card-bg);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        color: var(--hc-blue);
        text-decoration: none;
        z-index: 10;
        transition: all 0.2s ease;
    }

    .hc-banner-arrow:hover                        { background: var(--hc-blue); color: #ffffff; }
    [data-theme="dark"] .hc-banner-arrow:hover    { color: #0f1117; }
    .hc-banner-arrow.left  { left: 20px; }
    .hc-banner-arrow.right { right: 20px; }

    /* Slider dots */
    .hc-slider-dots {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 8px;
        z-index: 10;
    }

    .hc-dot {
        width: 8px;
        height: 8px;
        background-color: rgba(0, 51, 102, 0.2);
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .hc-dot.active {
        background-color: var(--hc-blue);
        width: 24px;
        border-radius: 10px;
    }

    /* ============================================
       QUICK ACCESS SECTION
    ============================================ */
    .hc-quick-access-section {
        padding: 0;
        width: 100%;
        position: relative;
        z-index: 15;
    }

    .hc-qa-container {
        background-color: var(--card-bg);
        margin-top: -50px !important;
        padding: 24px !important;
        border-radius: 20px;
        border: 1px solid var(--border-color);
        box-shadow: 0 10px 30px var(--card-shadow);
        position: relative;
        overflow: visible !important;
    }

    .hc-section-title {
        font-size: 14px;
        font-weight: 700;
        color: var(--hc-blue);
        position: relative;
        padding-left: 12px;
        margin-bottom: 20px;
    }

    .hc-section-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 2px;
        bottom: 2px;
        width: 3.5px;
        background-color: var(--hc-blue);
        border-radius: 2px;
    }

    /* Quick access grid */
    .hc-qa-grid {
        display: grid;
        grid-template-columns: repeat(9, 1fr);
        gap: 12px;
        position: relative;
        overflow: visible !important;
    }

    .hc-qa-item-wrapper { position: relative; width: 100%; }

    .hc-qa-card {
        background: var(--card-bg);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 16px 8px;
        text-align: center;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        min-height: 110px;
        transition: all 0.2s ease-in-out;
    }

    .hc-qa-card:hover {
        border-color: var(--hc-blue);
        background-color: var(--bg-tertiary);
        box-shadow: 0 4px 12px var(--card-shadow);
    }

    .hc-qa-icon-wrapper {
        color: var(--hc-blue);
        margin-bottom: 10px;
        font-size: 20px;
        transition: transform 0.2s ease;
    }

    .hc-qa-card:hover .hc-qa-icon-wrapper { transform: scale(1.05); }

    .hc-qa-card h6 {
        font-size: 12px;
        font-weight: 600;
        color: var(--text-secondary);
        margin: 0;
        line-height: 1.3;
    }

    /* Quick access dropdown */
    .hc-qa-dropdown {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%) translateY(10px);
        background: var(--card-bg);
        border: 1px solid var(--border-color);
        border-top: 3px solid var(--hc-blue);
        border-radius: 8px;
        box-shadow: 0 10px 30px var(--card-shadow);
        list-style: none;
        padding: 6px 0;
        margin: 5px 0 0 0;
        min-width: 190px;
        z-index: 99999;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s;
        pointer-events: none;
    }

    .hc-qa-item-wrapper:hover .hc-qa-dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(0);
        pointer-events: auto;
    }

    .hc-qa-dropdown li a {
        display: block;
        padding: 9px 16px;
        color: var(--text-primary);
        font-size: 12px;
        font-weight: 500;
        text-decoration: none;
    }

    .hc-qa-dropdown li a:hover {
        background: var(--bg-tertiary);
        color: var(--hc-blue);
    }

    /* ============================================
       TICKER — LATEST ANNOUNCEMENTS
       (Defined here for home page; footer also has its own copy)
    ============================================ */
    .hc-ticker-section    { padding: 25px 0 15px 0; }

    .hc-ticker-container {
        background: var(--ticker-bg);
        border: 1px solid var(--border-color);
        border-radius: 10px;
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 6px;
        overflow: hidden;
        position: relative;
    }

    .hc-ticker-label {
        background: #002b66;
        color: #ffffff;
        padding: 8px 18px;
        font-weight: 700;
        font-size: 12px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
        z-index: 5;
    }

    .hc-ticker-content-wrapper { flex-grow: 1; overflow: hidden; display: flex; }

    .hc-ticker-track {
        display: inline-block;
        white-space: nowrap;
        will-change: transform;
        animation: ticker-marquee 25s linear infinite;
    }

    .hc-ticker-track:hover { animation-play-state: paused; }

    @keyframes ticker-marquee {
        0%   { transform: translate3d(100%, 0, 0); }
        100% { transform: translate3d(-100%, 0, 0); }
    }

    .hc-updates-list {
        display: inline-flex;
        align-items: center;
        gap: 30px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .hc-update-item {
        font-size: 12px;
        font-weight: 500;
        color: var(--text-primary);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .hc-update-item:hover { color: var(--hc-blue); }
    .hc-separator         { color: #cbd5e1; list-style: none; }

    /* ============================================
       JUDGMENTS & LATEST UPDATES SECTION
    ============================================ */
    .hc-media-judgments-section { padding: 25px 0 35px 0; }

    .hc-updates-scroll-container {
        max-height: 290px;
        overflow-y: auto;
        padding-right: 4px;
    }

    .hc-updates-scroll-container::-webkit-scrollbar       { width: 4px; }
    .hc-updates-scroll-container::-webkit-scrollbar-thumb { background: var(--border-color); border-radius: 10px; }

    .hc-panel-card {
        background: var(--card-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 24px !important;
        box-shadow: 0 10px 30px var(--card-shadow);
    }

    .hc-panel-title {
        font-family: 'Georgia', serif;
        font-size: 20px;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0;
    }

    /* Tab pills */
    .hc-tab-pills {
        background-color: var(--bg-tertiary);
        border: 1px solid var(--border-color);
        border-radius: 30px !important;
        padding: 3px;
    }

    .hc-tab-pills .nav-link {
        color: var(--text-muted);
        font-size: 12px;
        font-weight: 600;
        border-radius: 20px !important;
        padding: 6px 16px !important;
        transition: all 0.2s ease;
    }

    .hc-tab-pills .nav-link.active {
        background-color: var(--hc-blue) !important;
        color: #ffffff !important;
    }

    [data-theme="dark"] .hc-tab-pills .nav-link.active { color: #0f1117 !important; }

    /* Judgment item row */
    .hc-judgment-item {
        background: var(--card-bg);
        border: 1px solid var(--border-color);
        border-radius: 14px;
        position: relative;
        overflow: hidden;
        transition: all 0.2s ease-in-out;
    }

    .hc-judgment-item::before {
        content: '';
        position: absolute;
        left: 0; top: 0; bottom: 0;
        width: 4px;
        background-color: var(--hc-blue);
        opacity: 0.7;
    }

    .hc-judgment-item:hover { border-color: var(--hc-blue); }

    .hc-compact-update-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 8px 12px !important;
    }

    .hc-update-main-content {
        display: flex;
        align-items: center;
        gap: 10px;
        flex: 1;
        min-width: 0;
    }

    .hc-judgment-text-wrapper {
        display: flex;
        flex-direction: column;
        min-width: 0;
        flex: 1;
    }

    .text-case-title,
    .text-truncate-custom {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: 13px !important;
        font-weight: 600;
        color: var(--text-primary);
    }

    .text-summary-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: 11.5px !important;
        color: var(--text-muted);
        margin-top: 1px;
    }

    .hc-badge-custom {
        font-size: 9px;
        font-weight: 600;
        padding: 2px 6px !important;
        border-radius: 4px;
        display: inline-block;
        white-space: nowrap;
    }

    .hc-update-meta-details {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 11px;
        color: var(--text-muted);
        white-space: nowrap;
        flex-shrink: 0;
    }

    .hc-compact-update-item:hover .text-case-title,
    .hc-compact-update-item:hover .text-truncate-custom { color: var(--hc-blue); }

    .hc-btn-outline-more {
        border: 1px solid var(--border-color);
        color: var(--text-secondary);
        font-size: 13px;
        font-weight: 600;
        padding: 10px 24px;
        border-radius: 30px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s;
    }

    .hc-btn-outline-more:hover {
        border-color: var(--hc-blue);
        color: var(--hc-blue);
        background-color: var(--bg-tertiary);
    }

    /* ============================================
       RESPONSIVE
    ============================================ */
    @media (max-width: 1400px) { .hc-qa-grid { grid-template-columns: repeat(5, 1fr); } }
    @media (max-width: 1200px) { .hc-hero-top-row { padding: 40px 40px 0 40px; } }
    @media (max-width: 1024px) { .hc-hero-section { height: 460px; } }

    @media (max-width: 992px) {
        .hc-qa-grid      { grid-template-columns: repeat(4, 1fr); }
        .hc-hero-section { height: 420px; }
        .hc-hero-bg      { background-size: contain; background-position: center center; background-color: #fff; }
        [data-theme="dark"] .hc-hero-bg { background-color: #0f1117; }
    }

    @media (max-width: 768px) {
        .hc-qa-grid              { grid-template-columns: repeat(3, 1fr); }
        .hc-hero-section         { height: auto; min-height: 360px; padding-bottom: 60px; }
        .hc-hero-top-row         { flex-direction: column; gap: 25px; padding: 30px 20px 0 20px; }
        .hc-hero-content h2      { font-size: 28px; }
        .hc-hero-bg              { background-size: contain; background-position: center bottom; }
        .hc-banner-arrow         { display: none !important; }
        .hc-banner-arrow.left,
        .hc-banner-arrow.right   { width: 38px; height: 44px; }
        .hc-ticker-container     { flex-direction: column; gap: 10px; padding: 8px; }
        .hc-ticker-label         { width: 100%; justify-content: center; }
        .hc-qa-container         { margin-top: -40px !important; padding: 20px 15px !important; }
        .hc-update-meta-details  { display: none !important; }
    }

    @media (max-width: 480px) {
        .hc-qa-grid         { grid-template-columns: repeat(2, 1fr); }
        .hc-hero-content h2 { font-size: 24px; }
        .hc-slider-dots     { bottom: 15px; }
        .hc-hero-section    { height: 280px; }
    }
</style>
@endsection

@section('content')
<div class="container-fluid px-2 px-md-5">

    {{-- ===== HERO SLIDER ===== --}}
    <div class="hc-hero-wrapper">
        <div class="hc-hero-section" id="hcHeroSection">

            <div class="hc-hero-bg hc-bg-1 active"></div>
            <div class="hc-hero-bg hc-bg-2"></div>

            <a href="#" class="hc-banner-arrow left"  id="prevSlideBtn"><i class="fa-solid fa-chevron-left"></i></a>
            <a href="#" class="hc-banner-arrow right" id="nextSlideBtn"><i class="fa-solid fa-chevron-right"></i></a>

            <div class="hc-hero-top-row">
                <div class="hc-hero-content">
                    {{-- <h2>Rajasthan High Court, <br><span>Jaipur Bench</span></h2> --}}
                </div>
                <div class="hc-hero-search-box">
                    <form action="#" method="GET">
                        <input type="text" placeholder="May I help you find something...?" name="search">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
            </div>

            <div class="hc-slider-dots">
                <span class="hc-dot active" data-slide="0"></span>
                <span class="hc-dot"        data-slide="1"></span>
            </div>
        </div>
    </div>

    {{-- ===== QUICK ACCESS ===== --}}
    <div class="hc-quick-access-section">
        <div class="row mx-0">
            <div class="col-12 px-0">
                <div class="hc-qa-container">
                    <h5 class="hc-section-title">Quick Access</h5>
                    <div class="hc-qa-grid">

                        <div class="hc-qa-item-wrapper">
                            <a href="#" class="hc-qa-card">
                                <div class="hc-qa-icon-wrapper"><i class="fa-solid fa-gavel"></i></div>
                                <h6>Judgments</h6>
                            </a>
                            <ul class="hc-qa-dropdown">
                                <li><a href="#">Reportable Judgments</a></li>
                                <li><a href="#">Non-Reportable Judgments</a></li>
                                <li><a href="#">Latest Orders</a></li>
                            </ul>
                        </div>

                        <div class="hc-qa-item-wrapper">
                            <a href="#" class="hc-qa-card">
                                <div class="hc-qa-icon-wrapper"><i class="fa-solid fa-file-invoice"></i></div>
                                <h6>eNCR / Judgment Search</h6>
                            </a>
                            <ul class="hc-qa-dropdown">
                                <li><a href="#">Search by Case Number</a></li>
                                <li><a href="#">Search by Party Name</a></li>
                                <li><a href="#">Search by Advocate</a></li>
                            </ul>
                        </div>

                        <div class="hc-qa-item-wrapper">
                            <a href="#" class="hc-qa-card">
                                <div class="hc-qa-icon-wrapper"><i class="fa-solid fa-calendar-days"></i></div>
                                <h6>Roster</h6>
                            </a>
                            <ul class="hc-qa-dropdown">
                                <li><a href="#">Daily Roster</a></li>
                                <li><a href="#">Sitting List</a></li>
                                <li><a href="#">Urgent Roster</a></li>
                            </ul>
                        </div>

                        <div class="hc-qa-item-wrapper">
                            <a href="#" class="hc-qa-card">
                                <div class="hc-qa-icon-wrapper"><i class="fa-solid fa-user-plus"></i></div>
                                <h6>Recruitment</h6>
                            </a>
                            <ul class="hc-qa-dropdown">
                                <li><a href="#">Current Openings</a></li>
                                <li><a href="#">Results / Answer Keys</a></li>
                                <li><a href="#">Notifications</a></li>
                            </ul>
                        </div>

                        <div class="hc-qa-item-wrapper">
                            <a href="#" class="hc-qa-card">
                                <div class="hc-qa-icon-wrapper"><i class="fa-solid fa-wheelchair"></i></div>
                                <h6>Accessibility Committee</h6>
                            </a>
                        </div>

                        <div class="hc-qa-item-wrapper">
                            <a href="#" class="hc-qa-card">
                                <div class="hc-qa-icon-wrapper"><i class="fa-solid fa-circle-info"></i></div>
                                <h6>Right to Information</h6>
                            </a>
                        </div>

                        <div class="hc-qa-item-wrapper">
                            <a href="#" class="hc-qa-card">
                                <div class="hc-qa-icon-wrapper"><i class="fa-solid fa-cart-shopping"></i></div>
                                <h6>Procurement</h6>
                            </a>
                        </div>

                        <div class="hc-qa-item-wrapper">
                            <a href="#" class="hc-qa-card">
                                <div class="hc-qa-icon-wrapper"><i class="fa-solid fa-chalkboard-user"></i></div>
                                <h6>Display Board</h6>
                            </a>
                        </div>

                        <div class="hc-qa-item-wrapper">
                            <a href="#" class="hc-qa-card">
                                <div class="hc-qa-icon-wrapper"><i class="fa-solid fa-scale-balanced"></i></div>
                                <h6>M-Phila Cases</h6>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== LATEST UPDATES + JUDGMENTS ===== --}}
    <section class="hc-media-judgments-section">
        <div class="row g-4 mx-0">

            {{-- Left: Latest Updates --}}
            <div class="col-lg-6 px-0 pe-lg-3">
                <div class="hc-panel-card h-100">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3 pb-2 border-bottom">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-bell" style="color: var(--hc-blue);"></i>
                            <h4 class="hc-panel-title">Latest Updates</h4>
                        </div>
                        <ul class="nav nav-pills hc-tab-pills" id="latestUpdatesTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-news" type="button" role="tab">News</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-reports" type="button" role="tab">Reports</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-exams" type="button" role="tab">Exams</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="latestUpdatesTabContent">

                        <div class="tab-pane fade show active" id="tab-news" role="tabpanel">
                            <div class="d-flex flex-column gap-2 hc-updates-scroll-container">
                                <div class="hc-judgment-item hc-compact-update-item">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-danger-subtle text-danger border border-danger-subtle">Notification</span>
                                        <h6 class="mb-0 text-truncate-custom">Roster Sitting Arrangement Amendment for Summer Sessions.</h6>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 27.05.2026</span>
                                        <span><i class="far fa-file-pdf text-danger me-1"></i> 1.4 MB</span>
                                    </div>
                                </div>
                                <div class="hc-judgment-item hc-compact-update-item">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-success-subtle text-success border border-success-subtle">Press Release</span>
                                        <h6 class="mb-0 text-truncate-custom">Implementation of upgraded e-Filing 3.0 Platform across District Setups.</h6>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 25.05.2026</span>
                                        <span><i class="far fa-file-pdf text-danger me-1"></i> 850 KB</span>
                                    </div>
                                </div>
                                <div class="hc-judgment-item hc-compact-update-item">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-primary-subtle text-primary border border-primary-subtle">Circular</span>
                                        <h6 class="mb-0 text-truncate-custom">Compliance Protocol regarding Gown Etiquette for Legal Practitioners.</h6>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 18.05.2026</span>
                                        <span><i class="far fa-file-pdf text-danger me-1"></i> 1.1 MB</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-reports" role="tabpanel">
                            <div class="d-flex flex-column gap-2 hc-updates-scroll-container">
                                <div class="hc-judgment-item hc-compact-update-item">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-info-subtle text-info-emphasis border border-info-subtle">Annual Report</span>
                                        <h6 class="mb-0 text-truncate-custom">Performance Appraisal Report (APAR) Data Matrix 2025-26.</h6>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 26.05.2026</span>
                                        <span><i class="far fa-file-pdf text-danger me-1"></i> 4.8 MB</span>
                                    </div>
                                </div>
                                <div class="hc-judgment-item hc-compact-update-item">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-warning-subtle text-warning-emphasis border border-warning-subtle">Audit</span>
                                        <h6 class="mb-0 text-truncate-custom">Quarterly Statement of Commercial Case Disposals Chart.</h6>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 15.05.2026</span>
                                        <span><i class="far fa-file-pdf text-danger me-1"></i> 2.3 MB</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-exams" role="tabpanel">
                            <div class="d-flex flex-column gap-2 hc-updates-scroll-container">
                                <div class="hc-judgment-item hc-compact-update-item">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-success-subtle text-success border border-success-subtle">Results</span>
                                        <h6 class="mb-0 text-truncate-custom">Final Merit Selection List for Civil Judge Junior Division Exam 2025.</h6>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 27.05.2026</span>
                                        <span><i class="far fa-file-pdf text-danger me-1"></i> 3.1 MB</span>
                                    </div>
                                </div>
                                <div class="hc-judgment-item hc-compact-update-item">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-danger-subtle text-danger border border-danger-subtle">Admit Card</span>
                                        <h6 class="mb-0 text-truncate-custom">Main Written Examination Hall Tickets Gateway for JJA Recruitment.</h6>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 24.05.2026</span>
                                        <span><i class="far fa-external-link text-primary me-1"></i> Portal</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="text-start mt-3">
                        <a href="#" class="hc-btn-outline-more" style="padding: 8px 20px;">
                            View All Notifications <i class="fas fa-arrow-right" style="font-size: 11px;"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Right: Reportable Judgments --}}
            <div class="col-lg-6 px-0 ps-lg-3">
                <div class="hc-panel-card h-100">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3 pb-2 border-bottom">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-gavel" style="color: var(--hc-blue);"></i>
                            <h4 class="hc-panel-title">Recent Reportable Judgments</h4>
                        </div>
                        <ul class="nav nav-pills hc-tab-pills" id="judgmentBenchTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#jodhpur-judgments" type="button" role="tab">Jodhpur Main Seat</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#jaipur-judgments" type="button" role="tab">Jaipur Bench</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="judgmentTabContent">

                        <div class="tab-pane fade show active" id="jodhpur-judgments" role="tabpanel">
                            <div class="d-flex flex-column gap-2 hc-updates-scroll-container">

                                <div class="hc-judgment-item hc-compact-update-item" onclick="DownloadOrdJud(this,'V');" data-filename="205400074532025_3.pdf" data-fileyear="2025" data-loc="cishcraj-jdp" style="cursor: pointer;">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-danger-subtle text-danger border border-danger-subtle">Criminal</span>
                                        <div class="hc-judgment-text-wrapper">
                                            <h6 class="mb-0 text-case-title">CRLMP / 7453 / 2025 (MAHAVEER VS STATE OF RAJASTHAN)</h6>
                                            <p class="mb-0 text-summary-truncate">HELD- though Court may direct further investigation u/Sec.173(8) CrPC, it cannot control manner...</p>
                                        </div>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 07/02/2026</span>
                                        <span><i class="far fa-file-pdf text-danger me-1"></i> PDF</span>
                                    </div>
                                </div>

                                <div class="hc-judgment-item hc-compact-update-item" onclick="DownloadOrdJud(this,'V');" data-filename="205400076622025_6.pdf" data-fileyear="2025" data-loc="cishcraj-jdp" style="cursor: pointer;">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-danger-subtle text-danger border border-danger-subtle">Criminal</span>
                                        <div class="hc-judgment-text-wrapper">
                                            <h6 class="mb-0 text-case-title">CRLMP / 7662 / 2025 (DEEPAK ARORA VS STATE OF RAJASTHAN)</h6>
                                            <p class="mb-0 text-summary-truncate">HELD- even if FIR is taken at face value, incident within office corners is not in public views...</p>
                                        </div>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 07/02/2026</span>
                                        <span><i class="far fa-file-pdf text-danger me-1"></i> PDF</span>
                                    </div>
                                </div>

                                <div class="hc-judgment-item hc-compact-update-item" onclick="DownloadOrdJud(this,'V');" data-filename="205600001032026_1.pdf" data-fileyear="2026" data-loc="cishcraj-jdp" style="cursor: pointer;">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-warning-subtle text-warning-emphasis border border-warning-subtle">Revision</span>
                                        <div class="hc-judgment-text-wrapper">
                                            <h6 class="mb-0 text-case-title">CRLR / 103 / 2026 (SUMITRA VS ASHISH)</h6>
                                            <p class="mb-0 text-summary-truncate">HELD- appeal u/ proviso of Sec 372 CrPC not maintainable as it lies only against acquittal...</p>
                                        </div>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 04/02/2026</span>
                                        <span><i class="far fa-file-pdf text-danger me-1"></i> PDF</span>
                                    </div>
                                </div>

                                <div class="hc-judgment-item hc-compact-update-item" onclick="DownloadOrdJud(this,'V');" data-filename="206800006852005_1.pdf" data-fileyear="2005" data-loc="cishcraj-jdp" style="cursor: pointer;">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-success-subtle text-success border border-success-subtle">Civil Writ</span>
                                        <div class="hc-judgment-text-wrapper">
                                            <h6 class="mb-0 text-case-title">CW / 685 / 2005 (SUNIL KUMAR VS UNION OF INDIA AND ORS.)</h6>
                                            <p class="mb-0 text-summary-truncate">HELD- Rule 28(b) of the CRPF Rules, 1955 bars appeal against punishment of censure...</p>
                                        </div>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 02/02/2026</span>
                                        <span><i class="far fa-file-pdf text-danger me-1"></i> PDF</span>
                                    </div>
                                </div>

                                <div class="hc-judgment-item hc-compact-update-item" onclick="DownloadOrdJud(this,'V');" data-filename="206200023582025_2.pdf" data-fileyear="2025" data-loc="cishcraj-jdp" style="cursor: pointer;">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-primary-subtle text-primary border border-primary-subtle">Writ-C</span>
                                        <div class="hc-judgment-text-wrapper">
                                            <h6 class="mb-0 text-case-title">CRLW / 2358 / 2025 (PRADEEP KUMAR SARWOGI VS UNION OF INDIA)</h6>
                                            <p class="mb-0 text-summary-truncate">HELD- Sec.6 (2) (f) of the Passports Act does not impose an absolute embargo on renewal...</p>
                                        </div>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 29/01/2026</span>
                                        <span><i class="far fa-file-pdf text-danger me-1"></i> PDF</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="jaipur-judgments" role="tabpanel">
                            <div class="d-flex flex-column gap-2 hc-updates-scroll-container">

                                <div class="hc-judgment-item hc-compact-update-item" onclick="DownloadOrdJud(this,'V');" data-filename="203800160642025_3.pdf" data-fileyear="2025" data-loc="cishcraj-jp" style="cursor: pointer;">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-danger-subtle text-danger border border-danger-subtle">Bail</span>
                                        <div class="hc-judgment-text-wrapper">
                                            <h6 class="mb-0 text-case-title">CRLMB / 16064 / 2025 (VIVEK YADAV VS STATE OF RAJASTHAN)</h6>
                                            <p class="mb-0 text-summary-truncate">HELD- at the stage of bail, detailed analysis of evidence is wholly impermissible...</p>
                                        </div>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 31/01/2026</span>
                                        <span><i class="far fa-file-pdf text-danger me-1"></i> PDF</span>
                                    </div>
                                </div>

                                <div class="hc-judgment-item hc-compact-update-item" onclick="DownloadOrdJud(this,'V');" data-filename="205200174622025_5.pdf" data-fileyear="2025" data-loc="cishcraj-jp" style="cursor: pointer;">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-success-subtle text-success border border-success-subtle">Commercial</span>
                                        <div class="hc-judgment-text-wrapper">
                                            <h6 class="mb-0 text-case-title">CW / 17462 / 2025 (SMT. SHABBO VS M/S. SAJNI MEHNDI PRODUCT)</h6>
                                            <p class="mb-0 text-summary-truncate">HELD- while deciding application u/O.7 R.11 CPC, only the averments made in plaint are considered...</p>
                                        </div>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 27/01/2026</span>
                                        <span><i class="far fa-file-pdf text-danger me-1"></i> PDF</span>
                                    </div>
                                </div>

                                <div class="hc-judgment-item hc-compact-update-item" onclick="DownloadOrdJud(this,'V');" data-filename="207800022042024_5.pdf" data-fileyear="2024" data-loc="cishcraj-jp" style="cursor: pointer;">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-info-subtle text-info border border-info-subtle">Suspension</span>
                                        <div class="hc-judgment-text-wrapper">
                                            <h6 class="mb-0 text-case-title">SOSA / 2204 / 2024 (RAJESH KUSHWAH VS STATE OF RAJASTHAN)</h6>
                                            <p class="mb-0 text-summary-truncate">HELD- imposing a condition impossible for a convict to comply with defeats the right...</p>
                                        </div>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 24/01/2026</span>
                                        <span><i class="far fa-file-pdf text-danger me-1"></i> PDF</span>
                                    </div>
                                </div>

                                <div class="hc-judgment-item hc-compact-update-item" onclick="DownloadOrdJud(this,'V');" data-filename="202500000122023_21.pdf" data-fileyear="2023" data-loc="cishcraj-jp" style="cursor: pointer;">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-success-subtle text-success border border-success-subtle">Civil Obj</span>
                                        <div class="hc-judgment-text-wrapper">
                                            <h6 class="mb-0 text-case-title">CR / 12 / 2023 (M/S ANONDITA HEALTHCARE VS FAIZ MOHAMMAD)</h6>
                                            <p class="mb-0 text-summary-truncate">HELD- executing court cannot travel beyond the decree or adjudicate matters not forming part...</p>
                                        </div>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 24/01/2026</span>
                                        <span><i class="far fa-file-pdf text-danger me-1"></i> PDF</span>
                                    </div>
                                </div>

                                <div class="hc-judgment-item hc-compact-update-item" onclick="DownloadOrdJud(this,'V');" data-filename="201100048432025_4.pdf" data-fileyear="2025" data-loc="cishcraj-jp" style="cursor: pointer;">
                                    <div class="hc-update-main-content">
                                        <span class="hc-badge-custom bg-warning-subtle text-warning-emphasis border border-warning-subtle">Arbitration</span>
                                        <div class="hc-judgment-text-wrapper">
                                            <h6 class="mb-0 text-case-title">CMA / 4843 / 2025 (M/S ANAMIKA CONDUCTORS VS SE (MM) AJMER)</h6>
                                            <p class="mb-0 text-summary-truncate">HELD- objections must be filed within 3 months, extendable by only 30 days maximum...</p>
                                        </div>
                                    </div>
                                    <div class="hc-update-meta-details">
                                        <span><i class="far fa-calendar-alt me-1"></i> 20/01/2026</span>
                                        <span><i class="far fa-file-pdf text-danger me-1"></i> PDF</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="text-start mt-3">
                        <a href="#" onclick="viewAllRepJudgments('P')" class="hc-btn-outline-more" style="padding: 8px 20px;">
                            View All Judgments <i class="fas fa-arrow-right" style="font-size: 11px;"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slides  = document.querySelectorAll('.hc-hero-bg');
        const dots    = document.querySelectorAll('.hc-dot');
        const prevBtn = document.getElementById('prevSlideBtn');
        const nextBtn = document.getElementById('nextSlideBtn');

        let current = 0;
        const total = slides.length;
        let interval;

        function goTo(index) {
            slides[current].classList.remove('active');
            dots[current].classList.remove('active');
            current = index;
            slides[current].classList.add('active');
            dots[current].classList.add('active');
        }

        function next() { goTo((current + 1) % total); }
        function prev() { goTo((current - 1 + total) % total); }

        function startAuto() { interval = setInterval(next, 5000); }
        function resetAuto() { clearInterval(interval); startAuto(); }

        nextBtn.addEventListener('click', e => { e.preventDefault(); next(); resetAuto(); });
        prevBtn.addEventListener('click', e => { e.preventDefault(); prev(); resetAuto(); });

        dots.forEach(dot => {
            dot.addEventListener('click', function () {
                goTo(parseInt(this.getAttribute('data-slide')));
                resetAuto();
            });
        });

        startAuto();
    });
</script>
@endsection