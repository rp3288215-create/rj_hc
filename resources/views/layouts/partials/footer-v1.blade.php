{{-- Font Awesome is already loaded via app.blade.php — no need to load it here --}}

<style>
    /* ============================================
       TICKER — LATEST ANNOUNCEMENTS
    ============================================ */
    .hc-ticker-section {
        padding: 20px 0 10px 0;
        width: 100%;
        overflow: hidden;
    }

    .hc-ticker-container {
        background: var(--ticker-bg);
        border: 1px solid var(--border-color);
        border-radius: 10px;
        display: flex;
        align-items: center;
        padding: 6px;
        overflow: hidden;
        position: relative;
        width: 100%;
    }

    .hc-ticker-label {
        background: #002b66;
        color: #ffffff;
        padding: 8px 14px;
        font-weight: 700;
        font-size: 12px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
        position: relative;
        z-index: 10;
    }

    @media (max-width: 576px) {
        .hc-ticker-label          { padding: 8px 10px; font-size: 11px; }
        .hc-ticker-label span     { display: none; }
    }

    .hc-ticker-content-wrapper {
        flex: 1;
        display: flex;
        align-items: center;
        overflow: hidden;
        position: relative;
    }

    .hc-ticker-track {
        display: flex;
        white-space: nowrap;
        animation: ticker-marquee 35s linear infinite;
        width: max-content;
        padding-left: 20px;
    }

    .hc-ticker-track:hover { animation-play-state: paused; }

    @keyframes ticker-marquee {
        0%   { transform: translate3d(0, 0, 0); }
        100% { transform: translate3d(-50%, 0, 0); }
    }

    .hc-updates-list {
        display: flex;
        align-items: center;
        gap: 24px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .hc-update-item {
        font-size: 12.5px;
        font-weight: 500;
        color: var(--text-primary);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
    }

    .hc-update-item:hover { color: var(--hc-blue); }

    .hc-separator {
        color: #cbd5e1;
        user-select: none;
        font-weight: bold;
    }

    /* ============================================
       FOOTER — MAIN
    ============================================ */
    .hc-main-footer {
        background-color: var(--footer-bg);
        padding: 60px 40px 30px 40px;
        border-top: 1px solid var(--border-color);
        transition: background-color 0.3s;
    }

    .hc-footer-card {
        background: var(--card-bg);
        border-radius: 20px;
        padding: 30px;
        height: 100%;
        border: 1px solid var(--border-color);
        box-shadow: 0 10px 30px var(--card-shadow);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hc-footer-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 35px var(--card-shadow);
    }

    .hc-footer-card h5 {
        font-size: 16px;
        font-weight: 700;
        color: var(--hc-blue);
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /* Card title icon colors */
    .card-title-links     i { color: #0284c7; }
    .card-title-committee i { color: #f97316; }
    .card-title-contact   i { color: #22c55e; }
    .card-title-calendar  i { color: #8b5cf6; }

    /* Footer links list */
    .hc-footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .hc-footer-links li {
        border-bottom: 1px solid var(--border-color);
        padding: 10px 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .hc-footer-links li:first-child { padding-top: 0; }
    .hc-footer-links li:last-child  { border-bottom: none; padding-bottom: 0; }

    .hc-footer-links a {
        color: var(--text-primary);
        text-decoration: none;
        font-size: 13.5px;
        font-weight: 500;
        transition: all 0.25s ease;
    }

    .hc-footer-links a:hover     { color: #0284c7; padding-left: 6px; }

    .hc-arrow-icon {
        font-size: 10px;
        color: #cbd5e1;
        transition: transform 0.25s, color 0.25s;
    }

    .hc-footer-links li:hover .hc-arrow-icon {
        color: #0284c7;
        transform: translateX(3px);
    }

    /* Contact rows */
    .hc-contact-row {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 12px 0;
        border-bottom: 1px solid var(--border-color);
    }

    .hc-contact-row:first-child { padding-top: 0; }
    .hc-contact-row:last-child  { border-bottom: none; padding-bottom: 0; }

    .hc-icon-box {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
        transition: transform 0.2s;
    }

    .hc-contact-row:hover .hc-icon-box { transform: scale(1.1); }

    .bg-green-light { background: #f0fdf4; color: #16a34a; }
    .bg-blue-light  { background: #f0f9ff; color: #0284c7; }
    .bg-red-light   { background: #fef2f2; color: #dc2626; }

    .hc-contact-text p {
        margin: 0;
        font-size: 13.5px;
        color: var(--text-primary);
        font-weight: 600;
    }

    .hc-contact-text span {
        font-size: 12px;
        color: var(--text-muted);
        display: block;
        margin-top: 2px;
    }

    .hc-btn-more {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--text-primary);
        text-decoration: none;
        border: 1px solid var(--border-color);
        padding: 6px 16px;
        border-radius: 20px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 20px;
        background: var(--bg-tertiary);
        transition: all 0.2s ease;
    }

    .hc-btn-more:hover {
        background: var(--hc-blue);
        color: #ffffff !important;
        border-color: var(--hc-blue);
    }

    /* ============================================
       FOOTER BOTTOM STRIP
    ============================================ */
    .hc-bottom-strip {
        background: var(--strip-bg);
        padding: 24px 40px;
        border-top: 1px solid var(--border-color);
        font-size: 13px;
        color: var(--text-muted);
    }

    .hc-bottom-strip a {
        color: var(--hc-blue);
        text-decoration: none;
        font-weight: 600;
    }

    .hc-bottom-strip a:hover { text-decoration: underline; }

    /* Visitor counter */
    .hc-counter-wrapper {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 6px;
    }

    .hc-digit {
        background: var(--card-bg);
        color: var(--hc-blue);
        padding: 4px 8px;
        border-radius: 6px;
        font-family: 'Courier New', Courier, monospace;
        font-weight: 700;
        font-size: 14px;
        border: 1px solid var(--border-color);
    }

    /* ============================================
       SCROLL BUTTONS
    ============================================ */
    #scrollTopBtn,
    #scrollBottomBtn {
        position: fixed;
        right: 15px;
        width: 44px;
        height: 44px;
        border: none;
        border-radius: 50%;
        background: #003366;
        color: #ffffff;
        font-size: 20px;
        cursor: pointer;
        z-index: 9999;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }

    #scrollTopBtn    { bottom: 90px; }
    #scrollBottomBtn { bottom: 30px; }

    #scrollTopBtn:hover,
    #scrollBottomBtn:hover {
        transform: translateY(-3px);
        background: #001f3f;
    }

    /* ============================================
       HOLIDAY CALENDAR WIDGET
    ============================================ */
    .hcc-nav-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 14px;
    }

    .hcc-nav-month {
        font-size: 13px;
        font-weight: 700;
        color: var(--text-primary);
        letter-spacing: 0.02em;
    }

    .hcc-nav-btns { display: flex; gap: 4px; }

    .hcc-nav-btn {
        width: 24px;
        height: 24px;
        border: 1px solid var(--border-color);
        background: var(--bg-tertiary);
        border-radius: 6px;
        cursor: pointer;
        font-size: 0.6rem;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.18s, color 0.18s, border-color 0.18s;
    }

    .hcc-nav-btn:hover {
        background: #8b5cf6;
        color: #ffffff;
        border-color: #8b5cf6;
    }

    .hcc-grid {
        width: 100%;
        border-collapse: collapse;
        font-size: 11.5px;
        table-layout: fixed;
    }

    .hcc-grid thead th {
        text-align: center;
        padding: 2px 0 6px;
        font-size: 10px;
        font-weight: 600;
        letter-spacing: 0.04em;
        color: var(--text-muted);
    }

    .hcc-grid thead th:first-child { color: #ef4444; }
    .hcc-grid thead th:last-child  { color: #f97316; }

    .hcc-grid td {
        text-align: center;
        padding: 3px 1px;
        line-height: 1;
    }

    .hcc-cell {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        font-size: 11.5px;
        font-weight: 500;
        color: var(--text-primary);
        cursor: default;
        position: relative;
        transition: background 0.15s, transform 0.12s;
    }

    .hcc-cell.is-sun   { color: #ef4444; }
    .hcc-cell.is-sat   { color: #f97316; }
    .hcc-cell.is-today { background: #8b5cf6; color: #ffffff !important; font-weight: 700; }

    /* Holiday cell types */
    .hcc-cell.h-gh { background: #fef2f2; color: #dc2626 !important; font-weight: 700; box-shadow: inset 0 0 0 1.5px #fca5a5; }
    .hcc-cell.h-rh { background: #fffbeb; color: #d97706 !important; font-weight: 600; box-shadow: inset 0 0 0 1.5px #fcd34d; }
    .hcc-cell.h-lh { background: #eff6ff; color: #2563eb !important; font-weight: 600; box-shadow: inset 0 0 0 1.5px #93c5fd; }
    .hcc-cell.h-lo { background: #f5f3ff; color: #7c3aed !important; box-shadow: inset 0 0 0 1.5px #c4b5fd; }

    .hcc-cell.has-h         { cursor: pointer; }
    .hcc-cell.has-h:hover   { transform: scale(1.18); z-index: 2; }

    .hcc-holiday-list {
        margin-top: 12px;
        border-top: 1px solid var(--border-color);
        padding-top: 10px;
        display: flex;
        flex-direction: column;
        gap: 6px;
        max-height: 148px;
        overflow-y: auto;
    }

    .hcc-holiday-list::-webkit-scrollbar       { width: 3px; }
    .hcc-holiday-list::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 3px; }

    .hcc-h-row {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 11.5px;
        color: var(--text-primary);
        padding: 4px 6px;
        border-radius: 8px;
        background: var(--bg-tertiary);
        border: 1px solid var(--border-color);
        animation: hcc-fadein 0.2s ease both;
    }

    @keyframes hcc-fadein {
        from { opacity: 0; transform: translateY(4px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .hcc-h-day {
        flex-shrink: 0;
        width: 28px;
        height: 28px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 12px;
    }

    .hcc-h-day.gh { background: #fef2f2; color: #dc2626; }
    .hcc-h-day.rh { background: #fffbeb; color: #d97706; }
    .hcc-h-day.lh { background: #eff6ff; color: #2563eb; }
    .hcc-h-day.lo { background: #f5f3ff; color: #7c3aed; }

    .hcc-h-name {
        flex: 1;
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: var(--text-primary);
    }

    .hcc-h-badge {
        flex-shrink: 0;
        font-size: 9px;
        font-weight: 700;
        padding: 2px 6px;
        border-radius: 20px;
        letter-spacing: 0.04em;
    }

    .hcc-h-badge.gh { background: #fee2e2; color: #dc2626; }
    .hcc-h-badge.rh { background: #fef3c7; color: #d97706; }
    .hcc-h-badge.lh { background: #dbeafe; color: #2563eb; }
    .hcc-h-badge.lo { background: #ede9fe; color: #7c3aed; }

    .hcc-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 18px 10px;
        color: var(--text-muted);
        text-align: center;
        font-size: 12px;
    }

    .hcc-state i        { font-size: 20px; opacity: 0.45; }
    .hcc-state p        { margin: 0; line-height: 1.5; }
    .hcc-state strong   { color: var(--text-primary); font-size: 12.5px; }

    .hcc-legend {
        display: flex;
        flex-wrap: wrap;
        gap: 4px;
        margin-bottom: 12px;
    }

    .hcc-leg {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 10px;
        color: var(--text-muted);
        padding: 2px 7px 2px 4px;
        border-radius: 20px;
        border: 1px solid var(--border-color);
        background: var(--bg-tertiary);
    }

    .hcc-leg-dot { width: 7px; height: 7px; border-radius: 50%; }

    /* Tooltip */
    #hccTooltip {
        display: none;
        position: fixed;
        z-index: 99999;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 8px 11px;
        font-size: 11.5px;
        min-width: 160px;
        max-width: 220px;
        color: #1e293b;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        pointer-events: none;
    }

    #hccTooltip.on { display: block; }

    .hcc-tip-date {
        font-weight: 700;
        color: #8b5cf6;
        font-size: 10.5px;
        margin-bottom: 5px;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 4px;
    }

    .hcc-tip-item {
        display: flex;
        align-items: flex-start;
        gap: 5px;
        padding: 2px 0;
        line-height: 1.35;
    }

    .hcc-err-reload-btn {
        background: none;
        border: none;
        color: #ef4444;
        text-decoration: underline;
        font-weight: bold;
        cursor: pointer;
        padding: 0;
        font-size: 11.5px;
    }

    .hcc-err-reload-btn:hover { color: #b91c1c; }
</style>

{{-- Scroll Buttons --}}
<button id="scrollTopBtn"    title="Scroll to top">↑</button>
<button id="scrollBottomBtn" title="Scroll to bottom">↓</button>

{{-- ===== TICKER ===== --}}
<div class="hc-ticker-section">
    <div class="row mx-0">
        <div class="col-12 px-0">
            <div class="hc-ticker-container">
                <div class="hc-ticker-label">
                    <i class="fa-solid fa-bullhorn"></i>
                    <span>Latest Announcement</span>
                </div>
                <div class="hc-ticker-content-wrapper">
                    <div class="hc-ticker-track">

                        {{-- Set 1 —————————————————————————— --}}
                        <ul class="hc-updates-list">
                            <li><a href="#" class="hc-update-item">Silent WhatsApp Chat not to respond as on 10/07/2024 <span class="badge bg-danger" style="font-size: 9px; padding: 2px 4px;">NEW</span></a></li>
                            <li class="hc-separator">/</li>
                            <li><a href="#" class="hc-update-item">Important Point Corruption at RNSSR/PTNR in Rajasthan <span class="badge bg-danger" style="font-size: 9px; padding: 2px 4px;">NEW</span></a></li>
                            <li class="hc-separator">/</li>
                            <li><a href="#" class="hc-update-item">Accessibility Committee <span class="badge bg-danger" style="font-size: 9px; padding: 2px 4px;">NEW</span></a></li>
                            <li class="hc-separator" style="margin-right: 12px;">/</li>
                        </ul>

                        {{-- Set 2: Duplicate for seamless loop —————— --}}
                        <ul class="hc-updates-list" aria-hidden="true">
                            <li><a href="#" class="hc-update-item">Silent WhatsApp Chat not to respond as on 10/07/2024 <span class="badge bg-danger" style="font-size: 9px; padding: 2px 4px;">NEW</span></a></li>
                            <li class="hc-separator">/</li>
                            <li><a href="#" class="hc-update-item">Important Point Corruption at RNSSR/PTNR in Rajasthan <span class="badge bg-danger" style="font-size: 9px; padding: 2px 4px;">NEW</span></a></li>
                            <li class="hc-separator">/</li>
                            <li><a href="#" class="hc-update-item">Accessibility Committee <span class="badge bg-danger" style="font-size: 9px; padding: 2px 4px;">NEW</span></a></li>
                            <li class="hc-separator" style="margin-right: 12px;">/</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===== FOOTER ===== --}}
<footer class="hc-main-footer">
    <div class="row g-4">

        {{-- Important Links --}}
        <div class="col-lg-3 col-md-6">
            <div class="hc-footer-card d-flex flex-column justify-content-between">
                <div>
                    <h5 class="card-title-links"><i class="fa-solid fa-link"></i> Important Links</h5>
                    <ul class="hc-footer-links">
                        <li><a href="#">The President of India</a>             <i class="fa-solid fa-chevron-right hc-arrow-icon"></i></li>
                        <li><a href="#">Prime Minister of India</a>             <i class="fa-solid fa-chevron-right hc-arrow-icon"></i></li>
                        <li><a href="#">Supreme Court of India</a>              <i class="fa-solid fa-chevron-right hc-arrow-icon"></i></li>
                        <li><a href="#">e-Committee, Supreme Court of India</a> <i class="fa-solid fa-chevron-right hc-arrow-icon"></i></li>
                        <li><a href="#">Indian Parliament</a>                   <i class="fa-solid fa-chevron-right hc-arrow-icon"></i></li>
                        <li><a href="#">Central Acts and Rules</a>              <i class="fa-solid fa-chevron-right hc-arrow-icon"></i></li>
                    </ul>
                </div>
                <a href="#" class="hc-btn-more">View All Links <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>

        {{-- Legal Services Committee --}}
        <div class="col-lg-3 col-md-6">
            <div class="hc-footer-card d-flex flex-column justify-content-between">
                <div>
                    <h5 class="card-title-committee"><i class="fa-solid fa-users"></i> Supreme Court Legal Services Committee</h5>
                    <div class="row">
                        <div class="col-6">
                            <ul class="hc-footer-links">
                                <li><a href="#">Indian Courts</a></li>
                                <li><a href="#">Government Of India</a></li>
                                <li><a href="#">Government Of Rajasthan</a></li>
                                <li><a href="#">Rajasthan Legislative Assembly</a></li>
                                <li><a href="#">National Legal Services Authority</a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="hc-footer-links">
                                <li><a href="#">National Judicial Academy</a></li>
                                <li><a href="#">State Judicial Academy</a></li>
                                <li><a href="#">District Courts</a></li>
                                <li><a href="#">Screen Reader Access</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="#" class="hc-btn-more">More Resources <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>

        {{-- Contact --}}
        <div class="col-lg-3 col-md-6">
            <div class="hc-footer-card d-flex flex-column justify-content-between">
                <div>
                    <h5 class="card-title-contact"><i class="fa-solid fa-location-dot"></i> Get In Touch</h5>
                    <div class="hc-contact-row">
                        <div class="hc-icon-box bg-green-light"><i class="fa-solid fa-building-columns"></i></div>
                        <div class="hc-contact-text">
                            <p>Rajasthan High Court Principal Seat, Jodhpur</p>
                            <span>Jodhpur, Rajasthan</span>
                        </div>
                    </div>
                    <div class="hc-contact-row">
                        <div class="hc-icon-box bg-blue-light"><i class="fa-solid fa-headset"></i></div>
                        <div class="hc-contact-text">
                            <p>e-Services Helpline: 9414056244</p>
                            <span>(for litigant-in-person)</span>
                        </div>
                    </div>
                    <div class="hc-contact-row">
                        <div class="hc-icon-box bg-red-light"><i class="fa-solid fa-map-location-dot"></i></div>
                        <div class="hc-contact-text">
                            <p>Rajasthan High Court Bench, Jaipur</p>
                            <span>Helpline: 7023103127 | 0141-2227764</span>
                        </div>
                    </div>
                </div>
                <a href="#" class="hc-btn-more">View Contact Details <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>

        {{-- Holiday Calendar Widget --}}
        <div class="col-lg-3 col-md-6">
            <div class="hc-footer-card d-flex flex-column" style="padding: 24px 22px;">
                <h5 class="card-title-calendar" style="margin-bottom: 12px;">
                    <i class="fa-solid fa-calendar-days"></i> Holiday Calendar
                </h5>

                <div class="hcc-legend">
                    <span class="hcc-leg"><span class="hcc-leg-dot" style="background:#dc2626"></span>GH</span>
                    <span class="hcc-leg"><span class="hcc-leg-dot" style="background:#d97706"></span>RH</span>
                    <span class="hcc-leg"><span class="hcc-leg-dot" style="background:#2563eb"></span>LH</span>
                    <span class="hcc-leg"><span class="hcc-leg-dot" style="background:#7c3aed"></span>Mela</span>
                </div>

                <div class="hcc-nav-row">
                    <span class="hcc-nav-month" id="hccMonthLabel">— —</span>
                    <div class="hcc-nav-btns">
                        <button class="hcc-nav-btn" id="hccToday" title="Current Month" style="padding: 0 6px; font-weight: 600; font-size: 10px; width: auto;">Today</button>
                        <button class="hcc-nav-btn" id="hccPrev"  title="Previous month"><i class="fa-solid fa-chevron-left"></i></button>
                        <button class="hcc-nav-btn" id="hccNext"  title="Next month"><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>

                <div id="hccCalWrap"></div>
                <div class="hcc-holiday-list" id="hccHolidayList"></div>
            </div>
        </div>

    </div>
</footer>

{{-- Bottom Strip --}}
<div class="hc-bottom-strip">
    <div class="row align-items-center">
        <div class="col-lg-8 col-12 text-center text-lg-start mb-3 mb-lg-0">
            <div class="mb-2">
                <i class="fa-solid fa-code text-muted me-1"></i>
                Site Developed and Hosted by
                <a href="https://www.nic.in/" target="_blank">National Informatics Centre</a>
            </div>
            <div>
                <i class="fa-solid fa-circle-copyright text-muted me-1"></i>
                Content owned, maintained and updated by
                <strong>Rajasthan High Court</strong> © 2026
            </div>
        </div>
        <div class="col-lg-4 col-12 hc-counter-wrapper text-center">
            <span class="me-2 fw-semibold text-secondary" style="font-size: 13.5px;">Total Hits:</span>
            <div class="d-inline-flex gap-1">
                <span class="hc-digit">0</span>
                <span class="hc-digit">1</span>
                <span class="hc-digit">2</span>
                <span class="hc-digit">3</span>
                <span class="hc-digit">4</span>
                <span class="hc-digit">5</span>
                <span class="hc-digit">6</span>
                <span class="hc-digit">7</span>
                <span class="hc-digit">8</span>
                <span class="hc-digit">9</span>
            </div>
        </div>
    </div>
</div>

<div id="hccTooltip"></div>

<script>
(function () {
    'use strict';

    const API_URL = '/api/calendar-api';
    const MONTHS  = ['January','February','March','April','May','June',
                     'July','August','September','October','November','December'];
    const DOW_S   = ['Su','Mo','Tu','We','Th','Fr','Sa'];
    const DOW_F   = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];

    const today      = new Date();
    let curMonth     = today.getMonth() + 1;
    let curYear      = today.getFullYear();
    const yearlyCache = {};

    /* ── Helpers ── */
    const pad       = n => String(n).padStart(2, '0');
    const isSatSun  = n => ['Sunday', 'Second Saturday', 'Fourth Saturday', 'Saturday'].includes(n);
    const titleCase = s => s ? s.toLowerCase().replace(/\b\w/g, c => c.toUpperCase()) : '';

    function typeOf(t) {
        if (t === 'GH') return 'gh';
        if (t === 'RH') return 'rh';
        if (t === 'LH') return 'lh';
        return 'lo';
    }

    function labelOf(t) { return t || '●'; }

    function bestType(entries) {
        if (entries.some(e => e.type === 'GH' && !isSatSun(e.name))) return 'gh';
        if (entries.some(e => e.type === 'RH')) return 'rh';
        if (entries.some(e => e.type === 'LH')) return 'lh';
        if (entries.some(e => e.type === null))  return 'lo';
        return null;
    }

    /* ── API: fetch year data with caching ── */
    function getYearData(year, cb) {
        if (yearlyCache[year] !== undefined) { cb(yearlyCache[year]); return; }

        const xhr = new XMLHttpRequest();
        xhr.open('POST', API_URL, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Accept', 'application/json');

        xhr.onreadystatechange = function () {
            if (xhr.readyState !== 4) return;
            if (xhr.status === 200) {
                try {
                    const json = JSON.parse(xhr.responseText);
                    yearlyCache[year] = json.decrypted_response.holiday_list || [];
                } catch (_) {
                    yearlyCache[year] = null;
                }
            } else {
                yearlyCache[year] = null;
            }
            cb(yearlyCache[year]);
        };

        xhr.send(JSON.stringify({ year: String(year) }));
    }

    /* ── Build holiday map for a specific month ── */
    function buildActiveMonthMap(allYearList, month, year) {
        const map    = {};
        const prefix = `${year}-${pad(month)}`;
        if (!Array.isArray(allYearList)) return map;

        allYearList.forEach(function (h) {
            if (!h.leave_date || !h.leave_date.startsWith(prefix)) return;
            const k = h.leave_date;
            if (!map[k]) map[k] = [];
            const dup = map[k].some(x => x.name === h.holiday_name && x.type === h.leave_type);
            if (!dup) map[k].push({ name: h.holiday_name, type: h.leave_type, court: h.court });
        });

        return map;
    }

    /* ── Render calendar grid ── */
    function renderGrid(month, year, hmap) {
        const firstDay    = new Date(year, month - 1, 1).getDay();
        const daysInMonth = new Date(year, month, 0).getDate();

        let thead = '<thead><tr>' + DOW_S.map(d => `<th>${d}</th>`).join('') + '</tr></thead>';
        let rows  = '<tr>';
        let col   = 0;

        for (let i = 0; i < firstDay; i++) { rows += '<td></td>'; col++; }

        for (let d = 1; d <= daysInMonth; d++) {
            const date    = new Date(year, month - 1, d);
            const dow     = date.getDay();
            const key     = `${year}-${pad(month)}-${pad(d)}`;
            const entries = hmap[key] || [];
            const isToday = year === today.getFullYear() && month - 1 === today.getMonth() && d === today.getDate();
            const bt      = bestType(entries);

            let cls = 'hcc-cell';
            if (dow === 0) cls += ' is-sun';
            if (dow === 6) cls += ' is-sat';
            if (isToday)   cls += ' is-today';
            if (bt)        cls += ' h-' + bt + ' has-h';

            const attr = entries.length ? `data-date="${key}"` : '';
            rows += `<td><span class="${cls}" ${attr}>${d}</span></td>`;
            col++;

            if (col === 7 && d !== daysInMonth) { rows += '</tr><tr>'; col = 0; }
        }

        if (col > 0 && col < 7) {
            for (let r = col; r < 7; r++) rows += '<td></td>';
        }

        return `<table class="hcc-grid">${thead}<tbody>${rows}</tbody></table>`;
    }

    /* ── Render holiday list below calendar ── */
    function renderList(hmap) {
        let items = [];

        Object.keys(hmap).sort().forEach(function (dateStr) {
            const d   = parseInt(dateStr.split('-')[2]);
            const dow = DOW_F[new Date(dateStr).getDay()];
            hmap[dateStr].forEach(function (e) {
                if (!isSatSun(e.name)) items.push({ d, dow, name: e.name, type: e.type });
            });
        });

        if (!items.length) return '';

        // Deduplicate
        const seen = {};
        items = items.filter(function (it) {
            const k = `${it.d}|${it.type}|${it.name}`;
            if (seen[k]) return false;
            seen[k] = true;
            return true;
        });

        return items.map((h, i) => {
            const tc = typeOf(h.type);
            return `<div class="hcc-h-row" style="animation-delay:${i * 0.04}s">
                <div class="hcc-h-day ${tc}">${h.d}</div>
                <span class="hcc-h-name" title="${h.name}">${titleCase(h.name)}</span>
                <span class="hcc-h-badge ${tc}">${labelOf(h.type)}</span>
            </div>`;
        }).join('');
    }

    /* ── State templates ── */
    function renderEmpty(month, year) {
        return `<div class="hcc-state">
            <i class="fa-solid fa-gavel"></i>
            <p><strong>No Holidays Notified</strong><br>
            Rajasthan High Court has not yet declared holidays for ${MONTHS[month - 1]} ${year}.</p>
        </div>`;
    }

    function renderErrorState() {
        return `<div class="hcc-state" style="padding: 10px 0;">
            <i class="fa-solid fa-triangle-exclamation" style="color: #ef4444; opacity: 1;"></i>
            <p style="color: #ef4444; margin: 2px 0;"><strong>HOLIDAYS COULD NOT LOAD</strong></p>
            <button class="hcc-err-reload-btn" onclick="window.location.reload()">
                <i class="fa-solid fa-rotate-right"></i> REFRESH
            </button>
        </div>`;
    }

    function renderLoading() {
        return '<div class="hcc-state"><i class="fa-solid fa-spinner fa-spin"></i><p>Loading…</p></div>';
    }

    /* ── Main render ── */
    function render(month, year) {
        document.getElementById('hccMonthLabel').textContent   = `${MONTHS[month - 1]} ${year}`;
        document.getElementById('hccCalWrap').innerHTML        = renderLoading();
        document.getElementById('hccHolidayList').innerHTML    = '';

        getYearData(year, function (entireYearList) {
            if (entireYearList === null) {
                delete yearlyCache[year];
                document.getElementById('hccCalWrap').innerHTML     = renderGrid(month, year, {});
                document.getElementById('hccHolidayList').innerHTML = renderErrorState();
                return;
            }

            const hmap = buildActiveMonthMap(entireYearList, month, year);
            document.getElementById('hccCalWrap').innerHTML = renderGrid(month, year, hmap);

            const listHTML = Object.keys(hmap).length ? renderList(hmap) : '';
            document.getElementById('hccHolidayList').innerHTML = listHTML || renderEmpty(month, year);

            // Attach tooltip events to holiday cells
            document.querySelectorAll('#hccCalWrap .hcc-cell.has-h').forEach(function (cell) {
                const entries = hmap[cell.dataset.date] || [];
                cell.addEventListener('mouseenter', e => showTip(e, cell.dataset.date, entries));
                cell.addEventListener('mouseleave', hideTip);
                cell.addEventListener('mousemove',  moveTip);
            });
        });
    }

    /* ── Tooltip ── */
    const tip = document.getElementById('hccTooltip');

    function showTip(e, dateStr, entries) {
        const parts = dateStr.split('-');
        const label = `${parseInt(parts[2])} ${MONTHS[parseInt(parts[1]) - 1]} ${parts[0]}`;
        let html    = `<div class="hcc-tip-date"><i class="fa-regular fa-calendar"></i> ${label}</div>`;
        const seen  = {};

        entries.forEach(function (en) {
            const k = `${en.type}|${en.name}`;
            if (seen[k] || isSatSun(en.name)) return;
            seen[k] = true;
            const tc = typeOf(en.type);
            html += `<div class="hcc-tip-item">
                <span class="hcc-h-badge ${tc}" style="margin-top:1px">${labelOf(en.type)}</span>
                <span>${titleCase(en.name)}</span>
            </div>`;
        });

        tip.innerHTML = html;
        tip.classList.add('on');
        moveTip(e);
    }

    function hideTip() { tip.classList.remove('on'); }

    function moveTip(e) {
        const tw = tip.offsetWidth  || 180;
        const th = tip.offsetHeight || 60;
        let x = e.clientX + 14;
        let y = e.clientY + 14;
        if (x + tw > window.innerWidth  - 8) x = e.clientX - tw - 10;
        if (y + th > window.innerHeight - 8) y = e.clientY - th - 10;
        tip.style.left = `${x}px`;
        tip.style.top  = `${y}px`;
    }

    /* ── Navigation events ── */
    document.getElementById('hccToday').addEventListener('click', function () {
        curMonth = today.getMonth() + 1;
        curYear  = today.getFullYear();
        render(curMonth, curYear);
    });

    document.getElementById('hccPrev').addEventListener('click', function () {
        if (--curMonth < 1) { curMonth = 12; curYear--; }
        render(curMonth, curYear);
    });

    document.getElementById('hccNext').addEventListener('click', function () {
        if (++curMonth > 12) { curMonth = 1; curYear++; }
        render(curMonth, curYear);
    });

    /* ── Scroll buttons ── */
    document.getElementById('scrollBottomBtn').addEventListener('click', function () {
        window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    });

    document.getElementById('scrollTopBtn').addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    /* ── Initial render ── */
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => render(curMonth, curYear));
    } else {
        render(curMonth, curYear);
    }
})();
</script>