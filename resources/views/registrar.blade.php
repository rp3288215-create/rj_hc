@extends('layouts.app2')

@section('title', 'Registrar General - Rajasthan High Court')

@section('styles')
<style>
    :root {
        --hc-blue: #003366;
        --hc-light-blue: #e6f0fa;
        --hc-border: #eaeaea;
        --text-main: #1e293b;
        --text-muted: #64748b;
    }

    .hc-registry-container {
        padding: 4px 0 60px 0;
    }

    /* Modern Styled Panel Card */
    .hc-profile-card {
        background: #ffffff;
        border: 1px solid var(--hc-border);
     
        border-radius: 20px;
        padding: 30px !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
    }

    .hc-page-title {
        font-family: 'Georgia', serif;
        font-size: 24px;
        font-weight: 700;
        color: #111111;
        position: relative;
        padding-left: 14px;
    }

    .hc-page-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 4px;
        bottom: 4px;
        width: 4px;
        background-color: var(--hc-blue);
        border-radius: 2px;
    }

    /* Current Officer Layout Elements */
    .hc-officer-showcase {
        background: #f8faff;
        border: 1px solid #e8eef5;
        border-radius: 16px;
        overflow: hidden;
    }

    .hc-officer-img-container {
        max-width: 180px;
        width: 100%;
        border-radius: 12px;
        overflow: hidden;
        border: 3px solid #ffffff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    }

    .hc-officer-details h3 {
        font-family: 'Georgia', serif;
        font-size: 22px;
        font-weight: 700;
        color: var(--hc-blue);
        margin-bottom: 4px;
    }

    .hc-officer-details .hc-designation {
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1px;
        color: var(--text-main);
        text-transform: uppercase;
    }

    .hc-officer-details .hc-tenure {
        font-size: 12.5px;
        color: var(--text-muted);
        font-weight: 500;
    }

    .hc-contact-link {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--text-main);
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: color 0.2s;
    }
    a.hc-contact-link:hover {
        color: var(--hc-blue);
    }

    .hc-contact-link i {
        color: var(--hc-blue);
        width: 20px;
        font-size: 14px;
    }

    /* Former List Section Typography */
    .hc-sub-heading {
        font-family: 'Georgia', serif;
        font-size: 18px;
        font-weight: 700;
        color: #111111;
    }

    /* Beautiful Form Customizations & Tables */
    .hc-search-input {
        max-width: 260px;
        border-radius: 20px !important;
        padding: 6px 16px;
        font-size: 13px;
        border-color: #cbd5e1;
    }
    .hc-search-input:focus {
        border-color: var(--hc-blue);
        box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
    }

    .hc-select-count {
        border-radius: 8px;
        padding: 4px 8px;
        font-size: 13px;
        border-color: #cbd5e1;
    }

    .hc-table-custom {
        margin-bottom: 0;
    }

    .hc-table-custom thead th {
        background-color: #f1f5f9;
        color: var(--text-main);
        font-size: 13px;
        font-weight: 700;
        border-bottom: 2px solid #e2e8f0 !important;
        padding: 12px 16px;
    }

    .hc-table-custom tbody td {
        font-size: 13.5px;
        color: #334155;
        vertical-align: middle;
        padding: 12px 16px;
        border-color: #f1f5f9;
    }

    .hc-table-custom tbody tr:nth-of-type(even) {
        background-color: #f8fafc;
    }

    /* Custom Pagination Setup */
    .hc-pagination-wrapper .pagination {
        margin-bottom: 0;
        gap: 4px;
    }

    .hc-pagination-wrapper .page-link {
        color: var(--text-main);
        border-radius: 6px !important;
        font-size: 13px;
        font-weight: 600;
        border-color: #e2e8f0;
        padding: 6px 12px;
    }

    .hc-pagination-wrapper .page-item.active .page-link {
        background-color: var(--hc-blue);
        border-color: var(--hc-blue);
        color: #ffffff;
    }

    .hc-pagination-wrapper .page-item.disabled .page-link {
        color: #cbd5e1;
        background-color: #f8fafc;
    }

    @media (max-width: 768px) {
        .hc-officer-showcase { text-align: center; }
        .hc-officer-img-container { margin: 0 auto; }
    }
</style>
@endsection

@section('content')
<div class="container-fluid px-2 px-md-5 hc-registry-container">
    <div class="row mx-0">
        <div class="col-12 px-0">
            <div class="hc-profile-card">
                
                {{-- Header Division Row --}}
                <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
                    <h2 class="hc-page-title mb-0">Registrar General</h2>
                </div>

                {{-- Showcase Section: Current Sitting Registrar --}}
                <div class="hc-officer-showcase p-4 mb-5">
                    <div class="row align-items-center g-4">
                        <div class="col-md-auto d-flex justify-content-center">
                            <div class="hc-officer-img-container">
                                <img src="{{ asset('assets/chanchalmishra.jpg') }}" alt="Sh. Chanchal Mishra" class="img-fluid d-block w-100">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="hc-officer-details">
                                <span class="hc-designation d-block mb-1">Current Office Holder</span>
                                <h3>Sh. Chanchal Mishra</h3>
                                <div class="hc-tenure mb-3">
                                    <i class="far fa-calendar-check me-1"></i> Since 27.01.2025
                                </div>
                                
                                <hr class="my-3 opacity-25">

                                <div class="d-flex flex-column gap-2 mt-2">
                                    <a href="tel:01412227518" class="hc-contact-link">
                                        <i class="fas fa-phone-alt"></i> <span>0141-2227518 (Jaipur Bench)</span>
                                    </a>
                                    <a href="tel:02912888030" class="hc-contact-link">
                                        <i class="fas fa-phone-alt"></i> <span>0291-2888030 (Main Seat Jodhpur)</span>
                                    </a>
                                    <a href="mailto:rg.rajhc@indiancourts.nic.in" class="hc-contact-link">
                                        <i class="fas fa-envelope"></i> <span>rg.rajhc@indiancourts.nic.in</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- History Section: Former Office Registry Table --}}
                <div class="mt-4">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
                        <h4 class="hc-sub-heading mb-0">Former Registrar Generals</h4>
                        
                        <div class="d-flex align-items-center gap-3 ms-auto">
                            <div class="d-flex align-items-center gap-2 small text-muted">
                                <span>Show</span>
                                <select class="form-select form-select-sm hc-select-count">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="-1">All</option>
                                </select>
                            </div>
                            <input type="search" class="form-control form-control-sm hc-search-input" placeholder="Search records...">
                        </div>
                    </div>

                    <div class="table-responsive border rounded-3 overflow-hidden">
                        <table class="table hc-table-custom align-middle">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%;">Sr. No.</th>
                                    <th style="width: 50%;">Name</th>
                                    <th class="text-center" style="width: 20%;">From</th>
                                    <th class="text-center" style="width: 20%;">To</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center fw-semibold">1</td>
                                    <td class="fw-medium">Shri Madho Prasad Gupta</td>
                                    <td class="text-center text-muted">---</td>
                                    <td class="text-center fw-medium">30.09.1951</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-semibold">2</td>
                                    <td class="fw-medium">Shri Mohan Lal Razdan</td>
                                    <td class="text-center">30.09.1951</td>
                                    <td class="text-center fw-medium">03.12.1957</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-semibold">3</td>
                                    <td class="fw-medium">Shri Gopal Mal Mehta</td>
                                    <td class="text-center">03.12.1957</td>
                                    <td class="text-center fw-medium">17.10.1958</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-semibold">4</td>
                                    <td class="fw-medium">Shri C. Jecob</td>
                                    <td class="text-center">17.10.1958</td>
                                    <td class="text-center fw-medium">04.02.1961</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-semibold">5</td>
                                    <td class="fw-medium">Shri Rajvi Roop Singh</td>
                                    <td class="text-center">04.02.1961</td>
                                    <td class="text-center fw-medium">16.09.1963</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-semibold">6</td>
                                    <td class="fw-medium">Shri Sukhdeo Mirdha</td>
                                    <td class="text-center">16.09.1963</td>
                                    <td class="text-center fw-medium">01.07.1967</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-semibold">7</td>
                                    <td class="fw-medium">Shri S.P. Mehta</td>
                                    <td class="text-center">21.07.1967</td>
                                    <td class="text-center fw-medium">20.08.1970</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-semibold">8</td>
                                    <td class="fw-medium">Shri Brij Behari Saxena</td>
                                    <td class="text-center">06.10.1970</td>
                                    <td class="text-center fw-medium">06.05.1972</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-semibold">9</td>
                                    <td class="fw-medium">Shri Ramji Lal Gupta</td>
                                    <td class="text-center">06.05.1972</td>
                                    <td class="text-center fw-medium">12.11.1973</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-semibold">10</td>
                                    <td class="fw-medium">Shri Sampat Raj Singhvi</td>
                                    <td class="text-center">15.11.1973</td>
                                    <td class="text-center fw-medium">14.03.1974</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- DataTables Footer Metadata Alignment --}}
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-3 hc-pagination-wrapper">
                        <div class="small text-muted fw-medium">
                            Showing 1 to 10 of 44 entries
                        </div>
                        <nav aria-label="Table navigation">
                            <ul class="pagination pagination-sm mb-0">
                                <li class="page-item disabled"><a class="page-link" href="#">First</a></li>
                                <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                <li class="page-item"><a class="page-link" href="#">Last</a></li>
                            </ul>
                        </nav>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection