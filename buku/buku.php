<?php
session_start();
include '../config/controller.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Buku - Perpustakaan SMKN 7 Samarinda</title>
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
    padding: 4rem 0;
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

.book-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 4px 6px rgba(56, 142, 60, 0.08);
    transition: all 0.3s ease;
    border: none;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.book-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(56, 142, 60, 0.12);
}

.book-icon {
    width: 70px;
    height: 70px;
    background: var(--cream-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
}

.book-card:hover .book-icon {
    transform: scale(1.1);
    background: var(--primary-color);
}

.book-card:hover .book-icon i {
    color: white;
}

.book-icon i {
    font-size: 2rem;
    color: var(--primary-color);
    transition: all 0.3s ease;
}

.book-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.book-info {
    color: var(--secondary-color);
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.btn-borrow {
    background-color: var(--primary-color);
    color: white;
    border: none;
    padding: 0.8rem 1.5rem;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    margin-top: auto;
}

.btn-borrow:hover {
    background-color: var(--secondary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(56, 142, 60, 0.15);
}

.search-section {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(56, 142, 60, 0.08);
    margin-bottom: 2rem;
}

.search-input {
    border: 2px solid var(--light-green);
    border-radius: 10px;
    padding: 0.8rem 1rem;
    width: 100%;
    transition: all 0.3s;
}

.search-input:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.25rem rgba(56, 142, 60, 0.18);
    outline: none;
}

.category-filter {
    background: var(--cream-color);
    border: 2px solid var(--light-green);
    border-radius: 10px;
    padding: 0.8rem 1rem;
    width: 100%;
    transition: all 0.3s;
}

.category-filter:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.25rem rgba(56, 142, 60, 0.18);
    outline: none;
}

.section-title {
    color: var(--primary-color);
    margin-bottom: 2rem;
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

@media (max-width: 768px) {
    .hero-section {
        padding: 3rem 0;
    }

    .search-section {
        padding: 1.5rem;
    }

    .book-card {
        margin-bottom: 1rem;
    }
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
                        <a class="nav-link" href="../landing/siswa.php">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-book"></i>
                            <span>Buku</span>
                        </a>
                    </li>
                </ul>
                <a href="#" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container text-center hero-content" data-aos="fade-up">
            <h1 class="display-4 fw-bold mb-4">Koleksi Buku Perpustakaan</h1>
            <p class="lead mb-5">Temukan ribuan koleksi buku untuk menambah wawasan dan pengetahuanmu</p>
        </div>
    </section>

    <!-- Search Section -->
    <div class="container">
        <div class="search-section" data-aos="fade-up">
            <form method="GET" class="row g-3">
                <div class="col-md-8">
                    <input type="text" class="search-input" name="search" placeholder="Cari buku berdasarkan judul, pengarang, atau kategori..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                </div>
                <div class="col-md-4">
                    <select class="category-filter" name="category">
                        <option value="">Semua Kategori</option>
                        <?php 
                        $kategori = select("SELECT * FROM kategori");
                        foreach ($kategori as $k) : 
                        ?>
                        <option value="<?= $k['nama']; ?>" <?= (isset($_GET['category']) && $_GET['category'] == $k['nama']) ? 'selected' : '' ?>><?= $k['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-success"><i class="fas fa-search"></i> Cari</button>
                </div>
            </form>
        </div>

        <!-- Books Section -->
        <h2 class="section-title" data-aos="fade-up">Daftar Buku</h2>
        <div class="row g-4" id="bookContainer">
            <?php 
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $category = isset($_GET['category']) ? $_GET['category'] : '';

            $where = [];
            if ($search) {
                $where[] = "(judul_buku LIKE '%$search%' OR pengarang LIKE '%$search%' OR nama LIKE '%$search%')";
            }
            if ($category) {
                $where[] = "nama = '$category'";
            }
            $whereSql = $where ? 'WHERE ' . implode(' AND ', $where) : '';

            $buku = select("SELECT * FROM buku $whereSql");
            foreach ($buku as $b): 
            ?>
            <div class="col-md-4" data-aos="fade-up">
                <div class="book-card">
                    <div class="book-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h5 class="book-title">
                        <a href="detail-buku.php?id=<?= $b['id']; ?>" style="text-decoration:none;color:inherit;">
                            <?= htmlspecialchars($b['judul_buku']); ?>
                        </a>
                    </h5>
                    <div class="book-info">
                        <p><i class="fas fa-user-edit"></i> <?= $b['pengarang']; ?></p>
                        <p><i class="fas fa-calendar"></i> <?= $b['tahun_terbit']; ?></p>
                        <p><i class="fas fa-layer-group"></i> <?= $b['nama']; ?></p>
                        <p><i class="fas fa-box"></i> Stok: <?= $b['stok']; ?></p>
                    </div>
                    <a href="detail-buku.php?id=<?= $b['id']; ?>" class="btn-borrow">
                        <i class="fas fa-hand-holding"></i>
                        <span>Pinjam Buku</span>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

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

        // Real-time search functionality
        function performSearch() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const category = document.getElementById('categoryFilter').value.toLowerCase();
            const bookCards = document.querySelectorAll('.book-card');
            let visibleCount = 0;

            bookCards.forEach(card => {
                const title = card.querySelector('.book-title').textContent.toLowerCase();
                const author = card.querySelector('.book-info').querySelector('p:nth-child(1)').textContent.toLowerCase();
                const bookCategory = card.querySelector('.book-info').querySelector('p:nth-child(3)').textContent.toLowerCase();
                
                const matchesSearch = searchTerm === '' || 
                    title.includes(searchTerm) || 
                    author.includes(searchTerm) || 
                    bookCategory.includes(searchTerm);
                
                const matchesCategory = category === '' || bookCategory.includes(category);
                
                const shouldShow = matchesSearch && matchesCategory;
                
                const bookContainer = card.closest('.col-md-4');
                bookContainer.style.display = shouldShow ? 'block' : 'none';
                
                if (shouldShow) {
                    visibleCount++;
                    bookContainer.style.order = visibleCount;
                }
            });

            // Show/hide "no results" message
            const noResults = document.getElementById('noResults');
            if (visibleCount === 0) {
                if (!noResults) {
                    const message = document.createElement('div');
                    message.id = 'noResults';
                    message.className = 'col-12 text-center py-5';
                    message.innerHTML = `
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Tidak ada buku yang ditemukan</h4>
                        <p class="text-muted">Coba kata kunci atau kategori yang berbeda</p>
                    `;
                    document.getElementById('bookContainer').appendChild(message);
                }
            } else if (noResults) {
                noResults.remove();
            }
        }

        // Add event listeners for real-time search
        document.getElementById('searchInput').addEventListener('input', performSearch);
        document.getElementById('categoryFilter').addEventListener('change', performSearch);

        // Initial search to handle any pre-selected category
        performSearch();
    </script>
</body>
</html>
