<?php
session_start();
include '../config/controller.php'; // Pastikan file ini membuat $conn

// Cek login
if (!isset($_SESSION['id_user'])) {
    echo "<script>alert('Anda harus login terlebih dahulu!');window.location.href='../login.php';</script>";
    exit;
}

// Ambil ID buku dari URL
if (!isset($_GET['id'])) {
    header("Location: buku.php");
    exit;
}
$id = (int)$_GET['id'];
$buku = select("SELECT * FROM buku WHERE id = $id");
if (!$buku) {
    echo "<h3>Buku tidak ditemukan.</h3>";
    exit;
}
$buku = $buku[0];

// Proses peminjaman
if (isset($_POST['pinjam'])) {
    $id_buku = (int)$_POST['id_buku'];
    $jumlah = (int)$_POST['jumlah'];
    $id_user = $_SESSION['id_user'];

    // Cek stok
    $stok = select("SELECT stok FROM buku WHERE id = $id_buku")[0]['stok'];
    if ($jumlah > $stok) {
        echo "<script>alert('Stok tidak cukup!');</script>";
    } else {
        $tgl_pinjam = date('Y-m-d');
        $tgl_kembali = date('Y-m-d'); // atau date('Y-m-d', strtotime('+7 days')) jika ingin 7 hari ke depan
        $status = 'dipinjam';
        // Insert ke tabel peminjaman
        $query = "INSERT INTO peminjaman (tgl_peminjaman, id_user, id_buku, tgl_pengembalian, tgl_bukukembali, status) 
                  VALUES ('$tgl_pinjam', '$id_user', '$id_buku', '$tgl_kembali', '$tgl_kembali', '$status')";
        $result = mysqli_query($db, $query);

        // 
        // Kurangi stok buku
        $queryStok = "UPDATE buku SET stok = stok - $jumlah WHERE id = $id_buku";
        mysqli_query($db, $queryStok);

        if ($result) {
            echo "<script>
                alert('Buku berhasil dipinjam!');
                window.location.href='buku.php';
            </script>";
            exit;
        } else {
            echo "<script>alert('Gagal meminjam buku!');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku - <?= htmlspecialchars($buku['judul_buku']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #e8f5e9; }
        .detail-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 16px rgba(56,142,60,0.10);
            padding: 2rem;
            margin: 2rem auto;
            max-width: 600px;
        }
        .stok-indicator {
            font-size: 1.1rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }
        .btn-pinjam {
            background: #388e3c;
            color: #fff;
            border-radius: 8px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border: none;
            transition: 0.2s;
        }
        .btn-pinjam:hover {
            background: #2e7d32;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="detail-card mt-5">
            <h2 class="mb-3"><?= htmlspecialchars($buku['judul_buku']) ?></h2>
            <p><strong>Deskripsi:</strong> <?= !empty($buku['deskripsi']) ? htmlspecialchars($buku['deskripsi']) : '-' ?></p>
            <p><strong>Genre:</strong> <?= !empty($buku['nama']) ? htmlspecialchars($buku['nama']) : '-' ?></p>
            <p><strong>Pengarang:</strong> <?= htmlspecialchars($buku['pengarang']) ?></p>
            <p><strong>Tahun Terbit:</strong> <?= htmlspecialchars($buku['tahun_terbit']) ?></p>
            <div class="stok-indicator">
                <i class="fas fa-box"></i> Stok tersedia: 
                <span class="badge bg-success"><?= $buku['stok'] ?></span>
            </div>
            <form method="post" class="mb-0">
                <input type="hidden" name="id_buku" value="<?= $buku['id'] ?>">
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah yang ingin dipinjam</label>
                    <input 
                        type="number" 
                        class="form-control" 
                        id="jumlah" 
                        name="jumlah" 
                        min="1" 
                        max="<?= $buku['stok'] ?>" 
                        value="<?= $buku['stok'] == 0 ? '0' : '1' ?>" 
                        required
                        <?= $buku['stok'] == 0 ? 'disabled' : '' ?>
                    >
                </div>
                <button 
                    type="submit" 
                    name="pinjam" 
                    class="btn btn-pinjam"
                    <?= $buku['stok'] == 0 ? 'disabled' : '' ?>
                >
                    <i class="fas fa-hand-holding"></i> 
                    <?= $buku['stok'] == 0 ? 'Tidak Tersedia' : 'Pinjam Buku' ?>
                </button>
            </form>
            <a href="buku.php" class="btn btn-secondary mt-3">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Buku
            </a>
        </div>
    </div>
</body>
</html>