{{-- Font Awesome is already loaded via app.blade.php — no need to load it here --}}

<style>
    /* ============================================
       SIDEBAR — LAYOUT
    ============================================ */
    .hc-sidebar {
        display: flex;
        flex-direction: column;
        gap: 24px;
        padding-bottom: 20px;
    }

    .hc-sticky-sidebar {
        position: sticky;
        top: 24px;
        align-self: flex-start;
    }

    /* ============================================
       SIDEBAR — CARD
    ============================================ */
    .hc-sidebar-card {
        margin-top: 10px;
        background: var(--card-bg);
        border-radius: 20px;
        padding: 24px;
        border: 1px solid var(--border-color);
        box-shadow: 0 10px 30px var(--card-shadow);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hc-sidebar-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px var(--card-shadow);
    }

    .hc-sidebar-card h5 {
        font-size: 15px;
        font-weight: 700;
        color: var(--hc-blue);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 2px solid var(--hc-light-blue);
        padding-bottom: 10px;
    }

    .hc-sidebar-card h5 i { color: #0284c7; }

    /* ============================================
       SIDEBAR — NAV LINKS
    ============================================ */
    .hc-sidebar-nav {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .hc-sidebar-nav-item { position: relative; }

    .hc-sidebar-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 11px 16px;
        color: var(--text-primary);
        font-size: 13.5px;
        font-weight: 500;
        text-decoration: none;
        border-radius: 10px;
        transition: all 0.25s ease;
    }

    .hc-sidebar-link div {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .hc-sidebar-link div i {
        font-size: 14px;
        color: var(--text-muted);
        transition: color 0.25s;
    }

    .hc-sidebar-link:hover,
    .hc-sidebar-nav-item:hover .hc-sidebar-link {
        background-color: var(--hc-light-blue);
        color: var(--hc-blue);
        font-weight: 600;
    }

    .hc-sidebar-nav-item:hover .hc-sidebar-link div i { color: var(--hc-blue); }

    /* Chevron arrow */
    .hc-sidebar-arrow {
        font-size: 10px;
        color: #cbd5e1;
        transition: transform 0.25s, color 0.25s;
    }

    .hc-sidebar-nav-item:hover .hc-sidebar-arrow {
        transform: rotate(90deg);
        color: var(--hc-blue);
    }

    /* ============================================
       SIDEBAR — HOVER DROPDOWN
    ============================================ */
    .hc-sidebar-dropdown {
        display: none;
        list-style: none;
        padding: 6px 0 6px 36px;
        margin: 0;
        flex-direction: column;
        gap: 2px;
    }

    .hc-sidebar-nav-item:hover .hc-sidebar-dropdown { display: flex; }

    .hc-sidebar-dropdown a {
        display: block;
        padding: 8px 12px;
        color: var(--text-muted);
        font-size: 13px;
        text-decoration: none;
        border-radius: 6px;
        transition: all 0.2s;
    }

    .hc-sidebar-dropdown a:hover {
        color: var(--hc-blue);
        background-color: var(--bg-tertiary);
        padding-left: 16px;
    }

    /* ============================================
       SIDEBAR — NOTICE BELL WIDGET
    ============================================ */
    .hc-widget-bell {
        background: #fff8eb;
        border: 1px solid #ffeacc;
        border-radius: 14px;
        padding: 15px;
        display: flex;
        gap: 12px;
        align-items: flex-start;
        margin-top: 10px;
    }

    .hc-widget-bell i { color: #f97316; font-size: 16px; margin-top: 2px; }

    .hc-widget-bell-text h6 {
        font-size: 13px;
        font-weight: 700;
        margin: 0;
        color: #7c2d12;
    }

    .hc-widget-bell-text p {
        font-size: 12px;
        margin: 4px 0 0 0;
        color: #9a3412;
        line-height: 1.4;
    }
</style>

{{-- ===== SIDEBAR ===== --}}
<div class="hc-sidebar">

    {{-- Card 1: Quick Access Menu --}}
    <div class="hc-sidebar-card">
        <h5><i class="fa-solid fa-gavel"></i> Quick Access Menu</h5>
        <ul class="hc-sidebar-nav">

            <li class="hc-sidebar-nav-item">
                <a href="#" class="hc-sidebar-link">
                    <div><i class="fa-solid fa-user-tie"></i> Hon'ble Judges</div>
                    <i class="fa-solid fa-chevron-right hc-sidebar-arrow"></i>
                </a>
                <ul class="hc-sidebar-dropdown">
                    <li><a href="#">Chief Justice & Judges</a></li>
                    <li><a href="#">Former Chief Justice</a></li>
                    <li><a href="#">Former Judges</a></li>
                </ul>
            </li>

            <li class="hc-sidebar-nav-item">
                <a href="#" class="hc-sidebar-link">
                    <div><i class="fa-solid fa-briefcase"></i> Recruitment</div>
                    <i class="fa-solid fa-chevron-right hc-sidebar-arrow"></i>
                </a>
                <ul class="hc-sidebar-dropdown">
                    <li><a href="#">Current Openings</a></li>
                    <li><a href="#">Results & Answer Keys</a></li>
                    <li><a href="#">Archived Notifications</a></li>
                </ul>
            </li>

            <li class="hc-sidebar-nav-item">
                <a href="#" class="hc-sidebar-link">
                    <div><i class="fa-solid fa-gavel"></i> Lok Adalat</div>
                    <i class="fa-solid fa-chevron-right hc-sidebar-arrow"></i>
                </a>
                <ul class="hc-sidebar-dropdown">
                    <li><a href="#">Schedule</a></li>
                    <li><a href="#">Daily Panel List</a></li>
                    <li><a href="#">Awards / Orders</a></li>
                </ul>
            </li>

            <li class="hc-sidebar-nav-item">
                <a href="#" class="hc-sidebar-link">
                    <div><i class="fa-solid fa-scale-balanced"></i> Mediation Centre</div>
                    <i class="fa-solid fa-chevron-right hc-sidebar-arrow"></i>
                </a>
                <ul class="hc-sidebar-dropdown">
                    <li><a href="#">About Centre</a></li>
                    <li><a href="#">Mediation Rules</a></li>
                    <li><a href="#">Panel of Mediators</a></li>
                </ul>
            </li>

            <li class="hc-sidebar-nav-item">
                <a href="#" class="hc-sidebar-link">
                    <div><i class="fa-solid fa-file-invoice"></i> RTI Cell</div>
                    <i class="fa-solid fa-chevron-right hc-sidebar-arrow"></i>
                </a>
                <ul class="hc-sidebar-dropdown">
                    <li><a href="#">RTI Rules</a></li>
                    <li><a href="#">PIO / Appellate Authority</a></li>
                    <li><a href="#">Application Status</a></li>
                </ul>
            </li>

        </ul>
    </div>

    {{-- Card 2: Notice Board --}}
    <div class="hc-sidebar-card">
        <h5>
            <i class="fa-solid fa-bullhorn" style="color: #f97316;"></i> Notice Board
        </h5>

        <div class="hc-widget-bell">
            <i class="fa-solid fa-circle-exclamation fa-bounce"></i>
            <div class="hc-widget-bell-text">
                <h6>Notice regarding e-Filing</h6>
                <p>Mandatory e-filing for commercial disputes has been activated from May 2026.</p>
            </div>
        </div>

        <div class="hc-widget-bell" style="background: #f0fdf4; border-color: #bbf7d0; margin-top: 10px;">
            <i class="fa-solid fa-calendar-days" style="color: #16a34a;"></i>
            <div class="hc-widget-bell-text">
                <h6 style="color: #14532d;">High Court Calendar</h6>
                <p style="color: #166534;">Updated list of institutional holidays for the current year is now live.</p>
            </div>
        </div>
    </div>

</div>