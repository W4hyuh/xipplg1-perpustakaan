<?php
include '../config/controller.php';
$total_siswa = select("SELECT COUNT(*) as total FROM user WHERE level='siswa'")[0]['total'];
$total_petugas = select("SELECT COUNT(*) as total FROM user WHERE level='petugas'")[0]['total'];
$total_kategori = select("SELECT COUNT(*) as total FROM kategori")[0]['total'];
$total_buku = select("SELECT COUNT(*) as total FROM buku")[0]['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Perpustakaan SMKN 7 Samarinda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

.welcome-section {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 2rem 0;
    margin-bottom: 2rem;
    border-radius: 0 0 20px 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.welcome-text {
    font-size: 1.5rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.stat-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 4px 6px rgba(56, 142, 60, 0.08);
    transition: all 0.3s ease;
    border: none;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(56, 142, 60, 0.12);
}

.stat-icon {
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

.stat-card:hover .stat-icon {
    transform: scale(1.1);
    background: var(--primary-color);
}

.stat-card:hover .stat-icon i {
    color: white;
}

.stat-icon i {
    font-size: 2rem;
    color: var(--primary-color);
    transition: all 0.3s ease;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: bold;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
    line-height: 1;
}

.stat-title {
    color: var(--secondary-color);
    font-size: 1.1rem;
    margin-bottom: 0;
    font-weight: 500;
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

@media (max-width: 768px) {
    .welcome-section {
        padding: 1.5rem 0;
    }

    .welcome-text {
        font-size: 1.2rem;
    }

    .stat-card {
        margin-bottom: 1rem;
    }
}

.table-container {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 4px 6px rgba(56, 142, 60, 0.08);
    margin-bottom: 2rem;
}

.table {
    margin-bottom: 0;
}

.table thead th {
    background-color: var(--cream-color);
    color: var(--primary-color);
    font-weight: 600;
    border: none;
    padding: 1rem;
}

.table tbody td {
    padding: 1rem;
    vertical-align: middle;
    border-color: #e0f2f1;
}

.table tbody tr:hover {
    background-color: #e8f5e9;
}

.status-badge {
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.875rem;
    font-weight: 500;
}

.status-active {
    background-color: #e8f5e9;
    color: #2e7d32;
}

.status-inactive {
    background-color: #ffebee;
    color: #d32f2f;
}

.btn-action {
    padding: 0.5rem 1rem;
    border-radius: 5px;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
    margin-right: 0.5rem;
}

.btn-edit {
    background-color: var(--light-green);
    color: var(--dark-green);
}

.btn-edit:hover {
    background-color: var(--accent-color);
    color: white;
}

.btn-delete {
    background-color: #ffebee;
    color: #d32f2f;
}

.btn-delete:hover {
    background-color: #d32f2f;
    color: white;
}

.btn-add {
    background-color: var(--primary-color);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    transition: all 0.3s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 500;
    border: none;
}

.btn-add:hover {
    background-color: var(--secondary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(56, 142, 60, 0.12);
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
                        <a class="nav-link" href="../admin/siswa/siswa.php">
                            <i class="fas fa-users"></i>
                            <span>Siswa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/kategori/kategori.php">
                            <i class="fas fa-tags"></i>
                            <span>Kategori</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/buku/buku.php">
                            <i class="fas fa-book"></i>
                            <span>Buku</span>
                        </a>
                    </li>
                </ul>
                <a href="#" class="logout-btn" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Welcome Section -->
    <div class="welcome-section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="welcome-text">
                    <i class="fas fa-user-circle"></i>
                    <span>Selamat Datang, Admin</span>
                </div>
                <div class="current-time">
                    <i class="far fa-clock"></i>
                    <span id="current-time"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="container">
        <div class="row g-4 mb-4">
            <!-- Total Siswa Card -->
            <div class="col-md-3" data-aos="fade-up">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number"><?= $total_siswa ?></div>
                    <div class="stat-title">Total Siswa</div>
                </div>
            </div>

            <!-- Total Petugas Card -->
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="stat-number"><?= $total_petugas ?></div>
                    <div class="stat-title">Total Petugas</div>
                </div>
            </div>

            <!-- Total Kategori Card -->
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <div class="stat-number"><?= $total_kategori ?></div>
                    <div class="stat-title">Total Kategori</div>
                </div>
            </div>

            <!-- Total Buku Card -->
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="stat-number"><?= $total_buku ?></div>
                    <div class="stat-title">Total Buku</div>
                </div>
            </div>
        </div>

        <!-- Petugas Table Section -->
        <div class="table-container" data-aos="fade-up">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0">Daftar Petugas</h5>
                <a href="../admin/petugas/tambah-petugas.php" class="btn-add">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Data</span>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $petugas = select("SELECT * FROM user WHERE level='petugas'");
                        $no = 1; 
                        foreach ($petugas as $p): 
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $p['name']; ?></td>
                            <td><?= $p['username']; ?></td>
                            <td><?= $p['password']; ?></td>
                            <td>
                                <span class="status-badge <?= $p['level'] == 'petugas' ? 'status-active' : 'status-inactive'; ?>">
                                    <?= ucfirst($p['level']); ?>
                                </span>
                            </td>
                            <td>
                                <span class="status-badge <?= $p['status'] == 'aktif' ? 'status-active' : 'status-inactive'; ?>">
                                    <?= ucfirst($p['status']); ?>
                                </span>
                            </td>
                            <td>
                                <a href="../admin/petugas/edit-petugas.php?id=<?= $p['id']; ?>" class="btn-action btn-edit">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit</span>
                                </a>
                                <a href="../admin/petugas/hapus-petugas.php?id=<?= $p['id']; ?>" class="btn-action btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                    <span>Hapus</span>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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
            document.getElementById('current-time').textContent = now.toLocaleDateString('id-ID', options);
        }

        // Update clock immediately and then every second
        updateClock();
        setInterval(updateClock, 1000);
    </script>
</body>
</html>