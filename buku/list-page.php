<?php

session_start();
include '../config/controller.php'; // pastikan $db sudah tersedia

$id_user = $_SESSION['id_user'];

// Ambil data peminjaman user
$query = "SELECT p.*, judul_buku FROM peminjaman p 
          JOIN buku b ON p.id_buku = b.id
          WHERE p.id_user = $id_user AND p.status = 'dipinjam'
          ORDER BY p.id_peminjaman DESC";
$result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>List Buku Dipinjam</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
:root {
    --primary-color: #388e3c;
    --secondary-color: #2e7d32;
    --accent-color: #43a047;
    --light-green: #a5d6a7;
    --cream-color: #e8f5e9;
    --dark-green: #1b5e20;
}
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: var(--cream-color);
}
.navbar {
    background-color: var(--primary-color) !important;
    box-shadow: 0 2px 10px rgba(56,142,60,0.1);
}
.navbar-brand {
    color: #fff !important;
    font-size: 1.5rem;
    font-weight: bold;
}
.nav-link {
    color: #fff !important;
    font-weight: 500;
    transition: color 0.3s, background 0.3s, box-shadow 0.3s;
    border-radius: 8px;
    padding: 0.5rem 1.2rem;
    position: relative;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}
.nav-link.active, .nav-link:focus, .nav-link:active {
    color: var(--light-green) !important;
    background: rgba(255,255,255,0.18);
    box-shadow: 0 0 0 6px rgba(0,0,0,0.10);
    outline: none;
}
.nav-link:hover {
    color: var(--light-green) !important;
    background: rgba(255,255,255,0.14);
    box-shadow: 0 0 0 6px rgba(0,0,0,0.08);
}
.card {
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(56,142,60,0.08);
}
.card-header {
    background: var(--primary-color);
    color: #fff;
    border-radius: 15px 15px 0 0;
}
.btn-success {
    background-color: var(--accent-color);
    border: none;
}
.btn-success:hover {
    background-color: var(--secondary-color);
}
.table-primary {
    background: var(--light-green);
}
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: var(--primary-color);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="../landing/siswa.php">
                <i class="fas fa-book-open me-2"></i>E-Perpus
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link<?php if(basename($_SERVER['PHP_SELF']) == 'siswa.php') echo ' active'; ?>" href="../landing/siswa.php">
                            <i class="fas fa-home me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-list me-1"></i>List
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-pengembalian.php">
                            <i class="fas fa-undo me-1"></i>Pengembalian
                        </a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge rounded-pill bg-success px-3 py-2" id="waktu-sekarang" style="font-size: 1rem;">
                        <i class="fas fa-clock me-1"></i>
                        <span id="tanggal-jam"></span>
                    </span>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container" style="margin-top: 90px; margin-bottom: 40px;">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0"><i class="fas fa-book-reader me-2"></i>Daftar Buku yang Dipinjam</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['judul_buku']) ?></td>
                                    <td><?= htmlspecialchars($row['tgl_peminjaman']) ?></td>
                                    <td>
                                        <?php if (
                                            empty($row['tgl_bukukembali']) ||
                                            $row['tgl_bukukembali'] == '0000-00-00' ||
                                            $row['status'] == 'dipinjam'
                                        ): ?>
                                            <span class="text-danger">Buku belum dikembalikan</span>
                                        <?php else: ?>
                                            <?= htmlspecialchars($row['tgl_bukukembali']) ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-success"><?= htmlspecialchars($row['status']) ?></span>
                                    </td>
                                    <td>
                                        <form action="proses_pengembalian.php" method="post" style="display:inline;">
                                            <input type="hidden" name="id_peminjaman" value="<?= $row['id_peminjaman'] ?>">
                                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin mengembalikan buku ini?')">
                                                <i class="fas fa-undo"></i> Pengembalian
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                        <?php if(mysqli_num_rows($result) == 0): ?>
                            <div class="alert alert-warning text-center mb-0">
                                Tidak ada buku yang sedang dipinjam.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Script untuk menampilkan waktu real-time dalam format Indonesia
    function updateWaktu() {
        const bulan = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        const hari = [
            "Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"
        ];
        const now = new Date();
        const namaHari = hari[now.getDay()];
        const tanggal = now.getDate();
        const namaBulan = bulan[now.getMonth()];
        const tahun = now.getFullYear();
        const jam = now.toLocaleTimeString('id-ID', { hour12: false });
        document.getElementById('tanggal-jam').textContent =
            `${namaHari}, ${tanggal} ${namaBulan} ${tahun} pukul ${jam}`;
    }
    setInterval(updateWaktu, 1000);
    updateWaktu();
    </script>
</body>
</html>