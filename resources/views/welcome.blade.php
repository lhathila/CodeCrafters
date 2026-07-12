<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TransitOps – Smart Transport Operations</title>

    <!-- Google Font: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Custom Theme -->
    <style>
    /* ============================================================
   TRANSITOPS - ROYAL BLUE THEME (FIXED LAYOUT)
   ============================================================ */
    :root {
        --royal: #2563eb;
        --dark-royal: #1e3a8a;
        --navy: #172554;
        --sky: #60a5fa;
        --light-blue: #dbeafe;
        --white: #ffffff;
        --light-gray: #f8fafc;
        --dark-text: #1e293b;
        --success: #22c55e;
        --warning: #f59e0b;
        --danger: #ef4444;
    }

    body {
        font-family: "Poppins", -apple-system, sans-serif;
        color: var(--dark-text);
        background: var(--light-gray);
        overflow-x: hidden;
        min-height: 100%;
    }

    /* --- UTILITIES --- */
    .text-royal {
        color: var(--royal) !important;
    }

    .text-navy {
        color: var(--navy) !important;
    }

    .text-sky {
        color: var(--sky) !important;
    }

    .bg-royal {
        background-color: var(--royal) !important;
    }

    .bg-navy {
        background-color: var(--navy) !important;
    }

    .bg-light-gray {
        background-color: var(--light-gray) !important;
    }

    .bg-soft-royal {
        background-color: var(--light-blue) !important;
    }

    .bg-royal-gradient {
        background: linear-gradient(135deg, var(--royal), var(--dark-royal)) !important;
    }

    .bg-gradient-royal {
        background: linear-gradient(90deg, var(--royal), var(--sky)) !important;
    }

    .text-gradient-royal {
        background: linear-gradient(to right, var(--sky), var(--royal));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* --- BUTTONS --- */
    .btn-royal {
        background-color: var(--royal);
        border-color: var(--royal);
        color: #fff;
        transition: all 0.3s ease;
    }

    .btn-royal:hover {
        background-color: var(--dark-royal);
        border-color: var(--dark-royal);
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.35);
    }

    .btn-royal-gradient {
        background: linear-gradient(135deg, var(--royal), var(--dark-royal));
        border: none;
        color: #fff;
        transition: all 0.3s ease;
    }

    .btn-royal-gradient:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 35px rgba(37, 99, 235, 0.4);
        color: #fff;
    }

    .btn-outline-royal {
        border: 2px solid var(--royal);
        color: var(--royal);
        background: transparent;
    }

    .btn-outline-royal:hover {
        background-color: var(--royal);
        border-color: var(--royal);
        color: #fff;
    }

    /* --- CARDS --- */
    .card-accent {
        border-top: 4px solid var(--royal) !important;
        border-radius: 12px !important;
    }

    .hover-lift {
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .hover-lift:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(37, 99, 235, 0.12) !important;
    }

    /* --- GLASS NAV --- */
    .glass-nav {
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
    }

    /* --- HERO --- */
    .hero-section {
        background: linear-gradient(145deg, var(--navy) 0%, var(--dark-royal) 50%, var(--royal) 100%);
        min-height: 100vh;
        padding: 120px 0 80px;
        position: relative;
        overflow: hidden;
    }

    .hero-glass {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.12);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
    }

    .mock-bar {
        flex: 1;
        border-radius: 6px 6px 0 0;
        transition: 0.3s;
        min-height: 20px;
    }

    /* --- NAV LINKS --- */
    .navbar {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .navbar-nav .nav-link {
        font-weight: 500;
        color: var(--dark-text);
        padding: 8px 18px;
        border-radius: 12px;
        transition: 0.3s ease;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        color: var(--royal);
        background: rgba(96, 165, 250, 0.12);
    }

    .navbar-toggler {
        border-color: rgba(37, 99, 235, 0.25);
    }

    .navbar-toggler-icon {
        filter: invert(0.2) sepia(1) saturate(5) hue-rotate(190deg);
    }

    /* --- FORM --- */
    .form-control:focus {
        border-color: var(--royal);
        box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.15);
    }

    /* --- MISC --- */
    .border-white-10 {
        border-color: rgba(255, 255, 255, 0.1) !important;
    }

    .stat-number {
        font-weight: 900;
        display: inline-block;
    }

    /* --- RESPONSIVE --- */
    @media (max-width: 1200px) {
        .hero-section {
            padding: 130px 0 70px;
        }
    }

    @media (max-width: 992px) {
        .hero-section {
            min-height: auto;
            padding: 130px 0 60px;
        }

        .display-2 {
            font-size: 2.8rem;
        }
    }

    @media (max-width: 768px) {
        .display-2 {
            font-size: 2.2rem;
        }

        .display-4 {
            font-size: 2rem;
        }

        .navbar-nav {
            gap: 0.5rem;
        }

        .hero-glass {
            padding: 3rem 1.5rem;
        }
    }

    @media (max-width: 576px) {
        .btn {
            width: 100%;
        }

        .hero-glass {
            text-align: center;
        }

        .hero-glass .d-flex {
            flex-direction: column;
            gap: 1rem;
        }
    }

    /* --- EXTRA THEME POLISH --- */
    * {
        box-sizing: border-box;
    }

    a {
        color: inherit;
        text-decoration: none;
    }

    .hero-glass,
    .bg-white,
    .card,
    footer {
        border-radius: 20px;
    }

    .card .card-body {
        padding: 1.8rem;
    }

    input.is-invalid,
    textarea.is-invalid {
        border-color: var(--danger) !important;
        box-shadow: 0 0 0 0.2rem rgba(239, 68, 68, 0.18);
    }

    .hero-section {
        overflow: visible;
    }

    .hero-glass {
        transition: transform 0.35s ease, box-shadow 0.35s ease;
    }

    .hero-glass:hover {
        transform: translateY(-4px);
    }
    </style>
</head>

<body>
    <!-- ============================================================
    NAVIGATION BAR (FIXED SPACING)
    ============================================================ -->
    <nav class="navbar navbar-expand-lg fixed-top glass-nav py-3" id="navbar">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3 text-navy" href="#hero">
                <i class="fas fa-truck-fast text-royal me-2"></i>
                Transit<span class="text-royal">Ops</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                <div class="d-flex flex-column flex-lg-row gap-2">
                    <a href="login.php" class="btn btn-outline-royal px-4">Log In</a>
                    <a href="#contact" class="btn btn-royal px-4">Get Started</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ============================================================
    HERO SECTION (PERFECT BALANCE)
    ============================================================ -->
    <section class="hero-section d-flex align-items-center" id="hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <span
                        class="badge bg-white bg-opacity-10 text-white fs-6 fw-semibold px-4 py-2 rounded-pill mb-4 border border-white border-opacity-10">
                        <i class="fas fa-rocket me-2"></i> Next-Gen Fleet Management
                    </span>
                    <h1 class="display-2 fw-bold text-white lh-1 mb-3">
                        Smart Transport <br />
                        <span class="text-gradient-royal">Operations Platform</span>
                    </h1>
                    <p class="text-white-50 fs-5 mb-4" style="max-width: 540px">
                        Centralize vehicles, drivers, trips, maintenance, and expenses in
                        one intelligent system.
                    </p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                        <a href="#features" class="btn btn-royal-gradient btn-lg px-5 fw-bold shadow-lg">
                            <i class="fas fa-play me-2"></i> Explore
                        </a>
                        <a href="#contact" class="btn btn-outline-light btn-lg px-5">
                            <i class="fas fa-headset me-2"></i> Contact
                        </a>
                    </div>
                    <div class="d-flex gap-5 mt-5 justify-content-center justify-content-lg-start">
                        <div>
                            <span class="d-block text-white fs-2 fw-bold">12K+</span><small
                                class="text-white-50">Vehicles Tracked</small>
                        </div>
                        <div>
                            <span class="d-block text-white fs-2 fw-bold">98%</span><small
                                class="text-white-50">Uptime</small>
                        </div>
                        <div>
                            <span class="d-block text-white fs-2 fw-bold">4.9★</span><small class="text-white-50">User
                                Rating</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-glass p-5 rounded-4 text-center">
                        <div class="d-flex justify-content-between align-items-end gap-2 mb-4" style="height: 200px">
                            <div class="mock-bar" style="height: 70%; background: var(--sky)"></div>
                            <div class="mock-bar" style="height: 45%; background: var(--royal)"></div>
                            <div class="mock-bar" style="height: 90%; background: var(--sky)"></div>
                            <div class="mock-bar" style="height: 30%; background: var(--royal)"></div>
                            <div class="mock-bar" style="height: 60%; background: var(--sky)"></div>
                            <div class="mock-bar" style="height: 80%; background: var(--royal)"></div>
                        </div>
                        <div class="d-flex justify-content-between text-white">
                            <span><i class="fas fa-circle text-success me-1"></i> 12
                                Active</span>
                            <span><i class="fas fa-circle text-warning me-1"></i> 4 On
                                Trip</span>
                            <span><i class="fas fa-circle text-danger me-1"></i> 2 In
                                Shop</span>
                        </div>
                        <hr class="border-white border-opacity-10" />
                        <p class="text-white-50 mb-0">
                            Fleet Utilization <strong class="text-white">76%</strong>
                        </p>
                        <div class="progress mt-2" style="height: 8px; background: rgba(255, 255, 255, 0.1)">
                            <div class="progress-bar bg-gradient-royal" style="width: 76%" role="progressbar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wave Divider -->
        <div class="position-absolute bottom-0 start-0 end-0">
            <svg viewBox="0 0 1440 120" xmlns="http://www.w3.org/2000/svg" style="display: block; width: 100%">
                <path
                    d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"
                    fill="#ffffff" />
            </svg>
        </div>
    </section>

    <!-- ============================================================
    ABOUT SECTION
    ============================================================ -->
    <section class="py-5 py-md-6 bg-light-gray" id="about">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-soft-royal text-royal fw-semibold px-4 py-2 rounded-pill">About TransitOps</span>
                <h2 class="display-4 fw-bold text-navy mt-3">
                    Built for the <span class="text-royal">Future of Logistics</span>
                </h2>
                <p class="text-secondary fs-5 mx-auto" style="max-width: 680px">
                    Digitizing every stage from vehicle registry to trip dispatch and
                    cost analytics.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift card-accent">
                        <div class="card-body p-4">
                            <div class="bg-soft-royal rounded-3 d-inline-flex p-3 fs-2 text-royal mb-3">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h5 class="text-navy fw-bold">Role-Based Access</h5>
                            <p class="text-secondary">
                                Fleet Managers, Dispatchers &amp; Analysts each see only what
                                they need.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift card-accent">
                        <div class="card-body p-4">
                            <div class="bg-soft-royal rounded-3 d-inline-flex p-3 fs-2 text-royal mb-3">
                                <i class="fas fa-sync-alt"></i>
                            </div>
                            <h5 class="text-navy fw-bold">Automated Workflows</h5>
                            <p class="text-secondary">
                                Dispatch a trip and vehicle/driver statuses update instantly.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift card-accent">
                        <div class="card-body p-4">
                            <div class="bg-soft-royal rounded-3 d-inline-flex p-3 fs-2 text-royal mb-3">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h5 class="text-navy fw-bold">Real-Time Analytics</h5>
                            <p class="text-secondary">
                                Track KPIs, fuel efficiency, ROI, and maintenance costs live.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    FEATURES
    ============================================================ -->
    <section class="py-5 py-md-6" id="features">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-soft-royal text-royal fw-semibold px-4 py-2 rounded-pill">Key Features</span>
                <h2 class="display-4 fw-bold text-navy mt-3">
                    Everything you need to
                    <span class="text-royal">run your fleet</span>
                </h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift card-accent text-center p-3">
                        <div class="card-body">
                            <div class="bg-soft-royal rounded-3 d-inline-flex p-3 fs-1 text-royal mb-3">
                                <i class="fas fa-truck"></i>
                            </div>
                            <h5 class="text-navy">Vehicle Registry</h5>
                            <p class="text-secondary small">
                                Capacity, odometer, status (Available / On Trip / In Shop).
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift card-accent text-center p-3">
                        <div class="card-body">
                            <div class="bg-soft-royal rounded-3 d-inline-flex p-3 fs-1 text-royal mb-3">
                                <i class="fas fa-id-card"></i>
                            </div>
                            <h5 class="text-navy">Driver Management</h5>
                            <p class="text-secondary small">
                                License validation, expiry alerts &amp; safety scores.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift card-accent text-center p-3">
                        <div class="card-body">
                            <div class="bg-soft-royal rounded-3 d-inline-flex p-3 fs-1 text-royal mb-3">
                                <i class="fas fa-route"></i>
                            </div>
                            <h5 class="text-navy">Trip Dispatching</h5>
                            <p class="text-secondary small">
                                Smart validation — weight, license, double-booking prevention.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift card-accent text-center p-3">
                        <div class="card-body">
                            <div class="bg-soft-royal rounded-3 d-inline-flex p-3 fs-1 text-royal mb-3">
                                <i class="fas fa-wrench"></i>
                            </div>
                            <h5 class="text-navy">Maintenance Logs</h5>
                            <p class="text-secondary small">
                                Auto-flip to "In Shop" during service and back when done.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift card-accent text-center p-3">
                        <div class="card-body">
                            <div class="bg-soft-royal rounded-3 d-inline-flex p-3 fs-1 text-royal mb-3">
                                <i class="fas fa-gas-pump"></i>
                            </div>
                            <h5 class="text-navy">Fuel &amp; Expenses</h5>
                            <p class="text-secondary small">
                                Track every litre, toll, and repair cost per vehicle.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift card-accent text-center p-3">
                        <div class="card-body">
                            <div class="bg-soft-royal rounded-3 d-inline-flex p-3 fs-1 text-royal mb-3">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <h5 class="text-navy">Reports &amp; Analytics</h5>
                            <p class="text-secondary small">
                                Export CSV, utilisation, cost per km, and vehicle ROI.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    SERVICES
    ============================================================ -->
    <section class="py-5 py-md-6 bg-light-gray" id="services">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-soft-royal text-royal fw-semibold px-4 py-2 rounded-pill">Our Services</span>
                <h2 class="display-4 fw-bold text-navy mt-3">
                    Industry‑specific <span class="text-royal">solutions</span>
                </h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden hover-lift card-accent">
                        <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=400&h=220&fit=crop&auto=format"
                            class="card-img-top" style="height: 200px; object-fit: cover" alt="Freight" />
                        <div class="card-body">
                            <h5 class="text-navy">Freight Logistics</h5>
                            <p class="text-secondary small">
                                Heavy cargo, weight validation &amp; long‑haul trip planning.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden hover-lift card-accent">
                        <img src="https://images.unsplash.com/photo-1566576912321-d58ddd7a6088?w=400&h=220&fit=crop&auto=format"
                            class="card-img-top" style="height: 200px; object-fit: cover" alt="Public" />
                        <div class="card-body">
                            <h5 class="text-navy">Public Transport</h5>
                            <p class="text-secondary small">
                                Bus fleets, route scheduling &amp; passenger capacity
                                tracking.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden hover-lift card-accent">
                        <img src="https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?w=400&h=220&fit=crop&auto=format"
                            class="card-img-top" style="height: 200px; object-fit: cover" alt="Last Mile" />
                        <div class="card-body">
                            <h5 class="text-navy">Last‑Mile Delivery</h5>
                            <p class="text-secondary small">
                                City vans, rapid dispatch &amp; real‑time driver tracking.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    WHY CHOOSE
    ============================================================ -->
    <section class="py-5 py-md-6" id="why">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="badge bg-soft-royal text-royal fw-semibold px-4 py-2 rounded-pill">Why
                        TransitOps</span>
                    <h2 class="display-4 fw-bold text-navy mt-3">
                        The <span class="text-royal">smartest</span> choice for your fleet
                    </h2>
                    <ul class="list-unstyled mt-4">
                        <li class="d-flex align-items-center gap-3 py-2">
                            <i class="fas fa-check-circle text-success fs-4"></i>
                            Centralised database – no more spreadsheets
                        </li>
                        <li class="d-flex align-items-center gap-3 py-2">
                            <i class="fas fa-check-circle text-success fs-4"></i> Automatic
                            status updates – eliminate double‑booking
                        </li>
                        <li class="d-flex align-items-center gap-3 py-2">
                            <i class="fas fa-check-circle text-success fs-4"></i>
                            Maintenance tracking – reduce breakdowns by 40%
                        </li>
                        <li class="d-flex align-items-center gap-3 py-2">
                            <i class="fas fa-check-circle text-success fs-4"></i> Role‑based
                            dashboards – right data for right people
                        </li>
                    </ul>
                    <a href="#contact" class="btn btn-royal-gradient btn-lg mt-3">Start Free Trial <i
                            class="fas fa-arrow-right ms-2"></i></a>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?w=600&h=400&fit=crop&auto=format"
                        class="img-fluid rounded-4 shadow-lg" alt="Fleet" />
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    WORKFLOW
    ============================================================ -->
    <section class="py-5 py-md-6 bg-light-gray" id="workflow">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-soft-royal text-royal fw-semibold px-4 py-2 rounded-pill">How It Works</span>
                <h2 class="display-4 fw-bold text-navy mt-3">
                    Simple <span class="text-royal">4‑step</span> workflow
                </h2>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-3 text-center">
                    <div class="bg-white p-4 rounded-4 shadow-sm hover-lift card-accent h-100">
                        <span class="badge bg-royal rounded-circle fs-5 px-3 py-2">1</span>
                        <div class="fs-1 text-royal my-2">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h5 class="text-navy">Onboard</h5>
                        <p class="small text-secondary">Add vehicles &amp; drivers.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="bg-white p-4 rounded-4 shadow-sm hover-lift card-accent h-100">
                        <span class="badge bg-royal rounded-circle fs-5 px-3 py-2">2</span>
                        <div class="fs-1 text-royal my-2">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <h5 class="text-navy">Dispatch</h5>
                        <p class="small text-secondary">Smart trip validation.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="bg-white p-4 rounded-4 shadow-sm hover-lift card-accent h-100">
                        <span class="badge bg-royal rounded-circle fs-5 px-3 py-2">3</span>
                        <div class="fs-1 text-royal my-2">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h5 class="text-navy">Maintain</h5>
                        <p class="small text-secondary">Log services &amp; costs.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="bg-white p-4 rounded-4 shadow-sm hover-lift card-accent h-100">
                        <span class="badge bg-royal rounded-circle fs-5 px-3 py-2">4</span>
                        <div class="fs-1 text-royal my-2">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <h5 class="text-navy">Analyse</h5>
                        <p class="small text-secondary">View KPIs &amp; reports.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    STATISTICS
    ============================================================ -->
    <section class="py-5 bg-navy text-white" id="stats">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-6 col-md-3">
                    <span class="display-3 fw-bold text-gradient-royal stat-number" data-target="1250">0</span>
                    <p class="text-white-50 mb-0">Vehicles Managed</p>
                </div>
                <div class="col-6 col-md-3">
                    <span class="display-3 fw-bold text-gradient-royal stat-number" data-target="340">0</span>
                    <p class="text-white-50 mb-0">Active Drivers</p>
                </div>
                <div class="col-6 col-md-3">
                    <span class="display-3 fw-bold text-gradient-royal stat-number" data-target="2800">0</span>
                    <p class="text-white-50 mb-0">Trips Completed</p>
                </div>
                <div class="col-6 col-md-3">
                    <span class="display-3 fw-bold text-gradient-royal stat-number" data-target="97">0</span>
                    <p class="text-white-50 mb-0">Satisfaction %</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    TESTIMONIALS
    ============================================================ -->
    <section class="py-5 py-md-6 bg-light-gray" id="testimonials">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-soft-royal text-royal fw-semibold px-4 py-2 rounded-pill">Testimonials</span>
                <h2 class="display-4 fw-bold text-navy mt-3">
                    Trusted by <span class="text-royal">logistics leaders</span>
                </h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift card-accent p-4">
                        <div class="d-flex text-warning mb-3">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-secondary fst-italic">
                            "TransitOps cut our manual scheduling time by 60%. The real-time
                            dashboard is a game-changer."
                        </p>
                        <div class="d-flex align-items-center mt-3">
                            <div class="rounded-circle bg-royal text-white d-flex align-items-center justify-content-center"
                                style="width: 48px; height: 48px; font-weight: 700">
                                JD
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-navy">John Doe</h6>
                                <small class="text-secondary">Fleet Manager</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift card-accent p-4">
                        <div class="d-flex text-warning mb-3">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-secondary fst-italic">
                            "Automated license validation saved us from major compliance
                            headaches. Essential for safety."
                        </p>
                        <div class="d-flex align-items-center mt-3">
                            <div class="rounded-circle bg-royal text-white d-flex align-items-center justify-content-center"
                                style="width: 48px; height: 48px; font-weight: 700">
                                SM
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-navy">Sarah Miles</h6>
                                <small class="text-secondary">Safety Officer</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift card-accent p-4">
                        <div class="d-flex text-warning mb-3">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-secondary fst-italic">
                            "Fuel expense tracking and ROI reports gave us the insights we
                            needed to retire inefficient vehicles."
                        </p>
                        <div class="d-flex align-items-center mt-3">
                            <div class="rounded-circle bg-royal text-white d-flex align-items-center justify-content-center"
                                style="width: 48px; height: 48px; font-weight: 700">
                                AK
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-navy">Alex Kim</h6>
                                <small class="text-secondary">Financial Analyst</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    CALL TO ACTION
    ============================================================ -->
    <section class="py-5">
        <div class="container">
            <div
                class="p-5 bg-royal-gradient rounded-4 shadow-lg d-flex flex-column flex-md-row align-items-center justify-content-between gap-4">
                <div>
                    <h2 class="text-white fw-bold display-6">
                        Ready to
                        <span style="text-decoration: underline; text-underline-offset: 8px">transform</span>
                        your operations?
                    </h2>
                    <p class="text-white-50 mb-0">
                        Join 200+ logistics companies already using TransitOps.
                    </p>
                </div>
                <a href="#contact" class="btn btn-light btn-lg fw-bold text-royal px-5"><i
                        class="fas fa-arrow-right me-2"></i> Get Started</a>
            </div>
        </div>
    </section>

    <!-- ============================================================
    CONTACT
    ============================================================ -->
    <section class="py-5 py-md-6 bg-light-gray" id="contact">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-soft-royal text-royal fw-semibold px-4 py-2 rounded-pill">Contact Us</span>
                <h2 class="display-4 fw-bold text-navy mt-3">
                    Let’s talk about <span class="text-royal">your fleet</span>
                </h2>
            </div>
            <div class="row g-5">
                <div class="col-md-5">
                    <div class="d-flex flex-column gap-4">
                        <div class="bg-white p-4 rounded-4 shadow-sm d-flex align-items-center gap-3 card-accent">
                            <div class="bg-soft-royal rounded-3 p-3 fs-4 text-royal">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <strong class="d-block text-navy">Email</strong><span>support@transitops.com</span>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-4 shadow-sm d-flex align-items-center gap-3 card-accent">
                            <div class="bg-soft-royal rounded-3 p-3 fs-4 text-royal">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <strong class="d-block text-navy">Phone</strong><span>+1 (555) 000‑9999</span>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-4 shadow-sm d-flex align-items-center gap-3 card-accent">
                            <div class="bg-soft-royal rounded-3 p-3 fs-4 text-royal">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <strong class="d-block text-navy">Address</strong><span>Logistics Hub, Fleet City</span>
                            </div>
                        </div>
                        <div class="d-flex gap-3 mt-2">
                            <a href="#" class="btn btn-outline-royal rounded-circle p-3"
                                style="width: 56px; height: 56px"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="btn btn-outline-royal rounded-circle p-3"
                                style="width: 56px; height: 56px"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-outline-royal rounded-circle p-3"
                                style="width: 56px; height: 56px"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <form class="bg-white p-4 p-md-5 rounded-4 shadow-sm" id="contactForm">
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="Full Name" required />
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control form-control-lg" placeholder="Email Address"
                                required />
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="Company Name" />
                        </div>
                        <div class="mb-4">
                            <textarea class="form-control form-control-lg" rows="4"
                                placeholder="Tell us about your fleet..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-royal-gradient btn-lg w-100">
                            <i class="fas fa-paper-plane me-2"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    FOOTER
    ============================================================ -->
    <footer class="bg-navy text-white-50 py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <a class="navbar-brand fw-bold fs-2 text-white" href="#"><i
                            class="fas fa-truck-fast text-sky me-2"></i>Transit<span class="text-sky">Ops</span></a>
                    <p class="mt-2" style="max-width: 280px">
                        Smart transport operations for the modern logistics industry.
                    </p>
                </div>
                <div class="col-6 col-md-3">
                    <h5 class="text-white fw-semibold">Product</h5>
                    <a href="#features" class="d-block text-white-50 text-decoration-none py-1">Features</a><a
                        href="#services" class="d-block text-white-50 text-decoration-none py-1">Services</a>
                </div>
                <div class="col-6 col-md-3">
                    <h5 class="text-white fw-semibold">Company</h5>
                    <a href="#about" class="d-block text-white-50 text-decoration-none py-1">About</a><a href="#contact"
                        class="d-block text-white-50 text-decoration-none py-1">Contact</a>
                </div>
                <div class="col-6 col-md-3">
                    <h5 class="text-white fw-semibold">Support</h5>
                    <a href="#" class="d-block text-white-50 text-decoration-none py-1">Help Center</a><a href="#"
                        class="d-block text-white-50 text-decoration-none py-1">Privacy</a>
                </div>
            </div>
            <hr class="border-white-10 mt-4" />
            <div class="d-flex flex-wrap justify-content-between">
                <span>&copy; 2026 TransitOps. All rights reserved.</span><span>Built with <i
                        class="fas fa-heart text-danger"></i> for
                    hackathon</span>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js code/script.js"></script>
</body>

</html>