<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Sekolah</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
:root {
    --primary-color: #388e3c;      /* Green */
    --secondary-color: #2e7d32;    /* Dark Green */
    --accent-color: #43a047;       /* Medium Green */
    --light-green: #a5d6a7;        /* Light Green */
    --cream-color: #e8f5e9;        /* Very Light Green */
    --dark-green: #1b5e20;         /* Very Dark Green */
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    overflow-x: hidden;
}

.navbar {
    background-color: rgba(255, 255, 255, 0.95) !important;
    box-shadow: 0 2px 10px rgba(56, 142, 60, 0.1); /* hijau muda */
}

.navbar-brand {
    color: var(--primary-color) !important;
    font-size: 1.8rem;
    font-weight: bold;
}

.nav-link {
    color: var(--secondary-color) !important;
    font-weight: 500;
    transition: color 0.3s;
}

.nav-link:hover {
    color: var(--accent-color) !important;
}

.hero-section {
    background: linear-gradient(rgba(56, 142, 60, 0.7), rgba(44, 101, 52, 0.7)), 
                url('https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=1350&q=80');
    background-size: cover;
    background-position: center;
    height: 100vh;
    display: flex;
    align-items: center;
    color: white;
    position: relative;
}

.hero-content {
    position: relative;
    z-index: 2;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(56, 142, 60, 0.8), rgba(67, 160, 71, 0.8));
    z-index: 1;
}

.feature-card {
    transition: transform 0.3s;
    border: none;
    box-shadow: 0 4px 6px rgba(56, 142, 60, 0.1);
    border-radius: 15px;
    overflow: hidden;
    background: white;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(56, 142, 60, 0.15);
}

.feature-icon {
    width: 80px;
    height: 80px;
    background: var(--cream-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.feature-icon i {
    font-size: 2rem;
    color: var(--primary-color);
}

.footer {
    background-color: var(--dark-green);
    color: white;
    padding: 4rem 0 2rem;
}

.footer h5 {
    color: var(--light-green);
    margin-bottom: 1.5rem;
}

.footer-links {
    list-style: none;
    padding: 0;
}

.footer-links li {
    margin-bottom: 0.8rem;
}

.footer-links a {
    color: white;
    text-decoration: none;
    transition: color 0.3s;
}

.footer-links a:hover {
    color: var(--light-green);
}

.social-links a {
    color: white;
    font-size: 1.5rem;
    margin-right: 1rem;
    transition: color 0.3s;
}

.social-links a:hover {
    color: var(--light-green);
}

.btn-primary {
    background-color: var(--primary-color);
    border: none;
    padding: 0.8rem 2rem;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s;
}

.btn-primary:hover {
    background-color: var(--secondary-color);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(56, 142, 60, 0.2);
}

.btn-secondary {
    background-color: var(--accent-color);
    border: none;
    color: white;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s;
}

.btn-secondary:hover {
    background-color: var(--secondary-color);
    color: #fff;
}

.section-title {
    color: var(--primary-color);
    margin-bottom: 3rem;
    text-align: center;
    position: relative;
}

.section-title::after {
    content: '';
    display: block;
    width: 50px;
    height: 3px;
    background: var(--accent-color);
    margin: 1rem auto;
}

.btn-primary.btn-lg.px-5.py-3 {
    background-color: #222 !important;
    border: none !important;
    color: #fff !important;
    transition: background 0.3s;
}

.btn-primary.btn-lg.px-5.py-3:hover {
    background-color: #111 !important;
    color: #fff !important;
}
</style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-book-open me-2"></i>Perpustakaan Sekolah
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#fitur">Fitur</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user me-2"></i>Login
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="Log/login.php">Login</a></li>
                            <li><a class="dropdown-item" href="Log/registrasi.php">Registrasi</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="beranda">
        <div class="hero-overlay"></div>
        <div class="container text-center hero-content" data-aos="fade-up">
            <h1 class="display-3 fw-bold mb-4">Selamat Datang di Perpustakaan Sekolah</h1>
            <p class="lead mb-5">Temukan ribuan koleksi buku untuk menambah wawasan dan pengetahuanmu</p>
            <a href="Log/login.php" class="btn btn-primary btn-lg px-5 py-3">
                <i class="fas fa-sign-in-alt me-2"></i>Login untuk Memulai
            </a>
        </div>
    </section>

    <!-- Login Alert Modal -->
    <div class="modal fade" id="loginAlert" tabindex="-1" aria-labelledby="loginAlertLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginAlertLabel">Perhatian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="fas fa-exclamation-circle fa-3x text-warning mb-3"></i>
                    <p>Anda harus login terlebih dahulu untuk menjelajahi koleksi buku.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="Log/login.php" class="btn btn-primary">Login</a>
                    <a href="Log/registrasi.php" class="btn btn-secondary">Registrasi</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <section class="py-5" id="fitur">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Fitur Perpustakaan</h2>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <h5 class="card-title">Koleksi Lengkap</h5>
                            <p class="card-text">Berbagai jenis buku pelajaran, referensi, dan bacaan umum untuk mendukung kegiatan belajar mengajar</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <h5 class="card-title">Jam Operasional</h5>
                            <p class="card-text">Buka setiap hari Senin-Jumat pukul 07.00-16.00 WIB untuk melayani peminjaman dan pengembalian buku</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h5 class="card-title">Layanan Siswa</h5>
                            <p class="card-text">Fasilitas peminjaman buku, ruang baca yang nyaman, dan bantuan dari petugas perpustakaan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Perpustakaan SMKN 7 Samarinda</h5>
                    <p>Menyediakan layanan perpustakaan untuk mendukung kegiatan belajar mengajar di SMKN 7 Samarinda.</p>
                </div>
                <div class="col-md-4">
                    <h5>Link Cepat</h5>
                    <ul class="footer-links">
                        <li><a href="#beranda">Beranda</a></li>
                        <li><a href="#fitur">Fitur</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <p>
                        <i class="fas fa-envelope me-2"></i> perpustakaan@smkn7samarinda.sch.id<br>
                        <i class="fas fa-phone me-2"></i> (0541) 123456<br>
                        <i class="fas fa-map-marker-alt me-2"></i> Jl. Pendidikan No. 123, Samarinda
                    </p>
                    <div class="social-links mt-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2024 Perpustakaan SMKN 7 Samarinda. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>
</html>

