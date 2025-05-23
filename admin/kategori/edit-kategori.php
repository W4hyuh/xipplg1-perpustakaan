<?php
include "../../config/controller.php";

//mengambil id kategori
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $kategori = select("SELECT * FROM kategori WHERE id=$id")[0];
    if (isset($_POST['ubah'])) {
        if (ubah_kategori($_POST) > 0) {
            echo "<script>
                    alert('Data Berhasil Diubah');
                    document.location.href='kategori.php';
                    </script>";
        } else {
            echo "<script>
                    alert('Data Gagal Diubah');
                    document.location.href='kategori.php';
                    </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori - Perpustakaan SMKN 7 Samarinda</title>
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
    background: linear-gradient(135deg, var(--cream-color), white);
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

.register-container {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
    min-height: calc(100vh - 70px);
}

.register-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(56, 142, 60, 0.1);
    overflow: hidden;
    width: min(100% - 2rem, 500px);
    position: relative;
    transform: translateY(0);
    transition: all 0.3s ease;
}

.register-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(56, 142, 60, 0.15);
}

.register-header {
    background: var(--primary-color);
    color: white;
    padding: 2.5rem;
    text-align: center;
    position: relative;
}

.register-header::after {
    content: '';
    position: absolute;
    bottom: -20px;
    left: 50%;
    transform: translateX(-50%);
    width: 40px;
    height: 40px;
    background: var(--primary-color);
    transform: rotate(45deg);
}

.register-header i {
    font-size: 3.5rem;
    margin-bottom: 1.2rem;
    background: rgba(255, 255, 255, 0.1);
    width: 90px;
    height: 90px;
    line-height: 90px;
    border-radius: 50%;
    display: inline-block;
    transition: all 0.3s ease;
}

.register-header:hover i {
    transform: scale(1.1);
    background: rgba(255, 255, 255, 0.2);
}

.register-body {
    padding: 2.5rem;
}

.form-floating {
    margin-bottom: 1.5rem;
}

.form-floating > .form-control {
    padding: 1rem 0.75rem;
    height: calc(3.5rem + 2px);
    line-height: 1.25;
    border: 2px solid var(--light-green);
    border-radius: 10px;
    background-color: var(--cream-color);
    transition: all 0.3s ease;
}

.form-floating > .form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.25rem rgba(56, 142, 60, 0.25);
    transform: translateY(-2px);
}

.form-floating > label {
    padding: 1rem 0.75rem;
    color: var(--secondary-color);
}

.form-select {
    padding: 1rem 0.75rem;
    height: calc(3.5rem + 2px);
    line-height: 1.25;
    border: 2px solid var(--light-green);
    border-radius: 10px;
    background-color: var(--cream-color);
    transition: all 0.3s ease;
}

.form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.25rem rgba(56, 142, 60, 0.25);
    transform: translateY(-2px);
}

.btn-group {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
}

.btn-primary {
    background-color: var(--primary-color);
    border: none;
    padding: 1rem 2rem;
    border-radius: 10px;
    font-weight: 600;
    font-size: 1.1rem;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    color: #fff;
}

.btn-primary:hover {
    background-color: var(--secondary-color);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(56, 142, 60, 0.2);
}

.btn-secondary {
    background-color: var(--light-green);
    color: var(--dark-green);
    border: none;
    padding: 1rem 2rem;
    border-radius: 10px;
    font-weight: 600;
    font-size: 1.1rem;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    text-decoration: none;
}

.btn-secondary:hover {
    background-color: var(--accent-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(56, 142, 60, 0.2);
}

.btn-primary:active, .btn-secondary:active {
    transform: translateY(0);
}

.btn-primary i, .btn-secondary i {
    font-size: 1.2rem;
    transition: transform 0.3s ease;
}

.btn-primary:hover i, .btn-secondary:hover i {
    transform: translateX(3px);
}

@media (max-width: 768px) {
    .register-container {
        padding: 1rem;
    }

    .register-card {
        margin: 1rem;
    }

    .btn-group {
        flex-direction: column;
    }
}
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="../../index.php">
                <i class="fas fa-book-open"></i>
                <span>E-Perpus</span>
            </a>
        </div>
    </nav>

    <!-- Edit Form -->
    <div class="register-container">
        <div class="register-card" data-aos="fade-up">
            <div class="register-header">
                <i class="fas fa-tags"></i>
                <h2>Edit Kategori</h2>
                <p>Ubah data kategori</p>
            </div>
            
            <div class="register-body">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $kategori['id']; ?>">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kategori" value="<?= $kategori['nama']; ?>" required>
                        <label for="nama">Nama Kategori</label>
                    </div>
                    <div class="btn-group">
                        <a href="kategori.php" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali</span>
                        </a>
                        <button type="submit" name="ubah" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            <span>Simpan</span>
                        </button>
                    </div>
                </form>
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

        // Add form validation animation
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            
            form.addEventListener('submit', function(e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    form.classList.add('was-validated');
                }
            });
        });
    </script>
</body>
</html>
