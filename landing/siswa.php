<?php
session_start();
include '../config/controller.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa Dashboard - Perpustakaan SMKN 7 Samarinda</title>
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
    background-color: #f8f9fa;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.navbar {
    background-color: var(--primary-color) !important;
    box-shadow: 0 2px 10px rgba(56, 142, 60, 0.1);
    padding: 1rem 0;
}

.navbar-brand {
    color: white !important;
    font-size: 1.5rem;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.nav-link {
    color: rgba(255, 255, 255, 0.9) !important;
    font-weight: 500;
    transition: all 0.3s;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.nav-link:hover {
    color: white !important;
    background-color: rgba(255, 255, 255, 0.1);
    transform: translateY(-1px);
}

.nav-link.active {
    color: white !important;
    background-color: rgba(255, 255, 255, 0.2);
}

.hero-section {
    background: linear-gradient(rgba(44, 101, 54, 0.7), rgba(44, 101, 54, 0.7)), 
                url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
    background-size: cover;
    background-position: center;
    height: 60vh;
    display: flex;
    align-items: center;
    color: white;
    position: relative;
    margin-bottom: 3rem;
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
    background: linear-gradient(45deg, rgba(56, 142, 60, 0.8), rgba(43, 94, 54, 0.8));
    z-index: 1;
}

.feature-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 4px 6px rgba(56, 142, 60, 0.08);
    transition: all 0.3s ease;
    border: none;
    height: 100%;
    text-align: center;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(56, 142, 60, 0.12);
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
    transition: all 0.3s ease;
}

.feature-card:hover .feature-icon {
    transform: scale(1.1);
    background: var(--primary-color);
}

.feature-card:hover .feature-icon i {
    color: white;
}

.feature-icon i {
    font-size: 2rem;
    color: var(--primary-color);
    transition: all 0.3s ease;
}

.feature-title {
    color: var(--primary-color);
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.feature-text {
    color: var(--secondary-color);
    font-size: 0.9rem;
    margin-bottom: 0;
}

.current-time {
    background: rgba(255, 255, 255, 0.1);
    padding: 0.5rem 1rem;
    border-radius: 5px;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.current-time i {
    color: var(--light-green);
}

.logout-btn {
    background-color: rgba(255, 255, 255, 0.1);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.2);
    padding: 0.5rem 1rem;
    border-radius: 5px;
    transition: all 0.3s;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.logout-btn:hover {
    background-color: rgba(255, 255, 255, 0.2);
    color: white;
    transform: translateY(-1px);
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

.footer {
    background-color: var(--dark-green);
    color: white;
    padding: 4rem 0 2rem;
    margin-top: auto;
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

@media (max-width: 768px) {
    .hero-section {
        height: 50vh;
    }

    .feature-card {
        margin-bottom: 1rem;
    }
}

.category-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 4px 6px rgba(56, 142, 60, 0.08);
    transition: all 0.3s ease;
    border: none;
    height: 100%;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(56, 142, 60, 0.12);
}

.category-icon {
    width: 70px;
    height: 70px;
    background: var(--cream-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    transition: all 0.3s ease;
}

.category-card:hover .category-icon {
    transform: scale(1.1);
    background: var(--primary-color);
}

.category-card:hover .category-icon i {
    color: white;
}

.category-icon i {
    font-size: 1.8rem;
    color: var(--primary-color);
    transition: all 0.3s ease;
}

.category-title {
    color: var(--primary-color);
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.category-link {
    color: var(--accent-color);
    text-decoration: none;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.category-link:hover {
    color: var(--primary-color);
    transform: translateX(5px);
}

.category-link i {
    transition: transform 0.3s ease;
}

.category-link:hover i {
    transform: translateX(3px);
}

.bg-light {
    background-color: var(--cream-color) !important;
}
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <i class="fas fa-book-open"></i>
                <span>E-Perpus</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../buku/buku.php">
                            <i class="fas fa-book"></i>
                            <span>Koleksi Buku</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#fitur">
                            <i class="fas fa-concierge-bell"></i>
                            <span>Layanan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kategori">
                            <i class="fas fa-tags"></i>
                            <span>Kategori</span>
                        </a>
                    </li>
                    <!-- Tambahkan menu List di sini -->
                    <li class="nav-item">
                        <a class="nav-link" href="../buku/list-page.php">
                            <i class="fas fa-list"></i>
                            <span>List</span>
                        </a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <div class="current-time d-none d-lg-flex">
                        <i class="far fa-clock"></i>
                        <span id="current-time"></span>
                    </div>
                    <a href="#" class="logout-btn" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container text-center hero-content" data-aos="fade-up">
            <h1 class="display-4 fw-bold mb-4">Selamat Datang, <?= $_SESSION['name'] ?? 'Siswa' ?></h1>
            <p class="lead mb-5">Temukan ribuan koleksi buku untuk menambah wawasan dan pengetahuanmu</p>
            <div class="current-time d-lg-none">
                <i class="far fa-clock"></i>
                <span id="current-time-mobile"></span>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5" id="fitur">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Layanan Perpustakaan</h2>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h5 class="feature-title">Peminjaman Buku</h5>
                        <p class="feature-text">Akses ribuan koleksi buku pelajaran, referensi, dan bacaan umum untuk mendukung kegiatan belajar Anda</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h5 class="feature-title">Jam Operasional</h5>
                        <p class="feature-text">Perpustakaan buka setiap hari Senin-Jumat pukul 07.00-16.00 WIB untuk melayani peminjaman dan pengembalian buku</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h5 class="feature-title">Layanan Siswa</h5>
                        <p class="feature-text">Nikmati fasilitas peminjaman buku, ruang baca yang nyaman, dan bantuan dari petugas perpustakaan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-5 bg-light" id="kategori">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Kategori Buku</h2>
            <div class="row g-4">
                <?php 
                $kategori = select("SELECT * FROM kategori");
                foreach ($kategori as $k): 
                ?>
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="<?= $loop * 100 ?>">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <h5 class="category-title"><?= $k['nama'] ?></h5>
                        <a href="../buku/buku.php?kategori=<?= urlencode($k['nama']) ?>" class="category-link">
                            Lihat Buku <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
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
                        <li><a href="#"><i class="fas fa-home me-2"></i>Dashboard</a></li>
                        <li><a href="../buku/buku.php"><i class="fas fa-book me-2"></i>Buku</a></li>
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

    <!-- Logout Confirmation Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="fas fa-question-circle fa-3x text-warning mb-3"></i>
                    <p>Apakah Anda yakin ingin keluar dari sistem?</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="../config/logout.php" class="btn btn-danger">
                        <i class="fas fa-sign-out-alt me-1"></i>Logout
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        // Real-time clock function
        function updateClock() {
            const now = new Date();
            const options = { 
                weekday: 'long',
                year: 'numeric', 
                month: 'long', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            };
            const timeString = now.toLocaleDateString('id-ID', options);
            document.getElementById('current-time').textContent = timeString;
            document.getElementById('current-time-mobile').textContent = timeString;
        }

        // Update clock immediately and then every second
        updateClock();
        setInterval(updateClock, 1000);
    </script>
</body>
</html>