<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil - Sewa Mudah & Cepat</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background-color: #fff;
        }

        /* Navbar Glass Effect */
        .navbar {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 15px 0;
            transition: 0.3s;
        }

        .nav-btn {
            background: linear-gradient(90deg, #4e73df 0%, #224abe 100%);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(78, 115, 223, 0.3);
            transition: 0.3s;
        }

        .nav-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(78, 115, 223, 0.5);
            color: white;
        }

        /* Hero Section */
        .hero-section {
            padding: 120px 0 100px;
            background: radial-gradient(circle at top right, #f1f5fb, #ffffff);
            position: relative;
            overflow: hidden;
        }

        /* Lingkaran hiasan background */
        .blob {
            position: absolute;
            width: 500px;
            height: 500px;
            background: linear-gradient(135deg, #eef2ff 0%, #ffffff 100%);
            border-radius: 50%;
            top: -100px;
            right: -100px;
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 3.8rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 20px;
            background: -webkit-linear-gradient(45deg, #333, #4e73df);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Gambar Mobil */
        .hero-img {
            max-width: 100%;
            animation: floatImage 5s ease-in-out infinite;
            filter: drop-shadow(0 20px 30px rgba(0,0,0,0.15));
        }

        @keyframes floatImage {
            0% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }

        /* Cards */
        .feature-box {
            background: white;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 1px solid #f8f9fa;
            height: 100%;
        }

        .feature-box:hover {
            transform: translateY(-10px);
            border-color: #4e73df;
            box-shadow: 0 20px 50px rgba(78, 115, 223, 0.15);
        }

        .icon-wrapper {
            width: 70px;
            height: 70px;
            background: #f0f4ff;
            color: #4e73df;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin-bottom: 25px;
            transition: 0.3s;
        }

        .feature-box:hover .icon-wrapper {
            background: #4e73df;
            color: white;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            padding: 80px 0;
            color: white;
            border-radius: 30px;
            margin: 50px 0;
            position: relative;
            overflow: hidden;
        }
        
        .cta-pattern {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            opacity: 0.1;
            background-image: radial-gradient(#fff 1px, transparent 1px);
            background-size: 20px 20px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4 text-primary" href="#">
                <i class="bi bi-car-front-fill me-2"></i>Rental<span class="text-dark">Mobilku</span>
            </a>
            <div class="ms-auto">
                <a href="login" class="btn nav-btn">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Login Area
                </a>
            </div>
        </div>
    </nav>

    <section class="hero-section d-flex align-items-center">
        <div class="blob"></div>
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3 fw-bold border border-primary border-opacity-25">
                        🌟 Pilihan No.1 di Indonesia
                    </span>
                    <h1 class="hero-title">Perjalanan Nyaman Dimulai Di Sini.</h1>
                    <p class="lead text-muted mb-5 pe-lg-5">
                        Temukan mobil impianmu dengan harga terbaik. Proses sewa cepat, aman, dan armada terjamin bersih & wangi.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="login" class="btn btn-primary btn-lg rounded-pill px-5 shadow fw-bold py-3">Mulai Sewa</a>
                        <a href="#keunggulan" class="btn btn-outline-dark btn-lg rounded-pill px-4 fw-bold py-3">Pelajari Dulu</a>
                    </div>
                    
                    <div class="mt-5 d-flex gap-4 text-muted">
                        <div><i class="bi bi-check-circle-fill text-success me-1"></i> Asuransi Full</div>
                        <div><i class="bi bi-check-circle-fill text-success me-1"></i> 24/7 Support</div>
                        <div><i class="bi bi-check-circle-fill text-success me-1"></i> Supir Profesional</div>
                    </div>
                </div>
                
                <div class="col-lg-6 text-center position-relative">
                    <img src="public/img/hero1.png" alt="Mobil Keren" class="hero-img" 
                         onerror="this.src='https://cdni.iconscout.com/illustration/premium/thumb/car-rental-service-8854817-7177725.png'">
                </div>
            </div>
        </div>
    </section>

    <section id="keunggulan" class="py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h6 class="text-primary fw-bold text-uppercase ls-2">Kenapa Kami?</h6>
                <h2 class="fw-bold display-6">Fasilitas & Keunggulan</h2>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="icon-wrapper"><i class="bi bi-wallet2"></i></div>
                        <h4 class="fw-bold mb-3">Harga Jujur</h4>
                        <p class="text-muted mb-0">Tidak ada biaya tersembunyi. Apa yang kamu lihat, itu yang kamu bayar. Hemat & Transparan.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="icon-wrapper"><i class="bi bi-shield-check"></i></div>
                        <h4 class="fw-bold mb-3">Armada Terawat</h4>
                        <p class="text-muted mb-0">Setiap mobil melewati pengecekan mesin rutin dan pembersihan total sebelum diserahkan.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="icon-wrapper"><i class="bi bi-headset"></i></div>
                        <h4 class="fw-bold mb-3">Layanan 24 Jam</h4>
                        <p class="text-muted mb-0">Mogok di jalan? Bingung rute? Tim support kami siap membantumu kapanpun dimanapun.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="cta-section text-center">
            <div class="cta-pattern"></div>
            <div class="position-relative z-1">
                <h2 class="fw-bold mb-3">Siap untuk Perjalanan Seru?</h2>
                <p class="mb-4 opacity-75">Jangan biarkan rencana liburanmu tertunda. Booking mobil sekarang!</p>
                <a href="login" class="btn btn-light btn-lg rounded-pill px-5 fw-bold text-primary shadow">
                    Booking Sekarang <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>

    <footer class="py-4 mt-5 border-top bg-light">
        <div class="container text-center">
            <p class="mb-0 text-muted">
                &copy; <?= date('Y'); ?> <strong>Rental Mobilku</strong>. All Rights Reserved. <br>
                <small>Dibuat untuk Tugas UAS Pemrograman Web M. Ridho Febrian</small>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>