<?php
include "../config/koneksi.php";

//Fungsi Tambah Akun
function create_akun($post)
{
    global $db;
    $name = strip_tags($post['name']);
    $username = strip_tags($post['username']);
    $password = strip_tags($post['password']);
    $level = 'siswa';
    $status = '1';

    //Query untuk Tambah data
    $query = "INSERT INTO user VALUES (null, '$name', '$username', '$password', '$level', '$status')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

if (isset($_POST['regist'])) {
    if (create_akun($_POST) > 0) {
        echo "<script>
            alert('Data Berhasil Ditambahkan');
            document.location.href='login.php';
            </script>";
    } else {
        echo "<script>
            alert('Data Gagal Ditambahkan');
            document.location.href='login.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Perpustakaan SMKN 7 Samarinda</title>
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
    background: linear-gradient(135deg, var(--cream-color), white);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.navbar {
    background-color: rgba(255, 255, 255, 0.95) !important;
    box-shadow: 0 2px 10px rgba(56, 142, 60, 0.1);
    padding: 0.75rem 0;
    position: sticky;
    top: 0;
    z-index: 1000;
}

.navbar-brand {
    color: var(--primary-color) !important;
    font-size: clamp(1.2rem, 4vw, 1.8rem);
    font-weight: 700;
    letter-spacing: 0.5px;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.navbar-brand i {
    font-size: clamp(1.4rem, 4vw, 2rem);
}

.register-container {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: clamp(1rem, 4vw, 2rem);
    min-height: calc(100vh - 70px);
}

.register-card {
    background: white;
    border-radius: clamp(15px, 3vw, 20px);
    box-shadow: 0 10px 30px rgba(56, 142, 60, 0.1);
    overflow: hidden;
    width: min(100% - 2rem, 400px);
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
    padding: clamp(1.5rem, 5vw, 2.5rem);
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
    font-size: clamp(2.5rem, 6vw, 3.5rem);
    margin-bottom: clamp(0.8rem, 3vw, 1.2rem);
    background: rgba(255, 255, 255, 0.1);
    width: clamp(70px, 15vw, 90px);
    height: clamp(70px, 15vw, 90px);
    line-height: clamp(70px, 15vw, 90px);
    border-radius: 50%;
    display: inline-block;
    transition: all 0.3s ease;
}

.register-header:hover i {
    transform: scale(1.1);
    background: rgba(255, 255, 255, 0.2);
}

.register-body {
    padding: clamp(1.5rem, 5vw, 2.5rem);
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

.btn-primary {
    background-color: var(--primary-color);
    border: none;
    padding: clamp(0.8rem, 3vw, 1rem) clamp(1.5rem, 5vw, 2rem);
    border-radius: 10px;
    font-weight: 600;
    font-size: clamp(1rem, 3vw, 1.1rem);
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.btn-primary:hover {
    background-color: var(--secondary-color);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(56, 142, 60, 0.2);
}

.btn-primary:active {
    transform: translateY(0);
}

.btn-primary i {
    font-size: clamp(1rem, 3vw, 1.2rem);
    transition: transform 0.3s ease;
}

.btn-primary:hover i {
    transform: translateX(3px);
}

.login-link {
    text-align: center;
    margin-top: 1.5rem;
    color: var(--secondary-color);
    font-size: clamp(0.85rem, 2.5vw, 0.95rem);
}

.login-link a {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-block;
}

.login-link a:hover {
    color: var(--accent-color);
    transform: translateX(3px);
}

.alert {
    border-radius: 10px;
    margin-bottom: 1.5rem;
    padding: 1rem;
    border: none;
    background-color: #fff3f3;
    color: #dc3545;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    animation: shake 0.5s ease-in-out;
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

.alert i {
    font-size: 1.2rem;
}

.footer {
    background-color: var(--dark-green);
    color: white;
    padding: 1rem 0;
    margin-top: auto;
}

.btn-logout {
    background-color: var(--primary-color);
    color: #fff !important;
    border: 1.5px solid #fff;
    border-radius: 8px;
    padding: 0.45rem 1.3rem;
    font-weight: 600;
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: background 0.2s, color 0.2s, box-shadow 0.2s;
    box-shadow: none;
}
.btn-logout i {
    font-size: 1.2rem;
}
.btn-logout:hover, .btn-logout:focus {
    background-color: var(--secondary-color);
    color: #fff !important;
    border-color: #fff;
    box-shadow: 0 2px 8px rgba(56,142,60,0.15);
}

/* Responsive Breakpoints */
@media (max-width: 768px) {
    .register-container {
        padding: 1rem;
    }

    .register-card {
        margin: 1rem;
    }
}

@media (max-width: 576px) {
    .register-header {
        padding: 1.5rem;
    }

    .register-body {
        padding: 1.5rem;
    }

    .btn-primary {
        padding: 0.8rem 1.5rem;
    }
}

/* Touch Device Optimizations */
@media (hover: none) {
    .register-card:hover {
        transform: none;
    }

    .register-header:hover i {
        transform: none;
    }

    .btn-primary:hover {
        transform: none;
        box-shadow: none;
    }

    .btn-primary:hover i {
        transform: none;
    }

    .login-link a:hover {
        transform: none;
    }
}

    </style>

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/xipplg1-perpustakaan/index.php">
                <i class="fas fa-book-open"></i>
                <span>Perpustakaan SMKN 7 Samarinda</span>
            </a>
        </div>
    </nav>

    <!-- Register Form -->
    <div class="register-container">
        <div class="register-card" data-aos="fade-up">
            <div class="register-header">
                <i class="fas fa-user-plus"></i>
                <h2>Registrasi</h2>
                <p>Buat akun perpustakaan baru</p>
            </div>
            
            <div class="register-body">
                <?php if (isset($_GET['error'])): ?>
                <div class="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
                <?php endif; ?>

                <form action="" method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                        <label for="name">Nama Lengkap</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <button type="submit" name="regist" class="btn btn-primary">
                        <i class="fas fa-user-plus"></i>
                        <span>Daftar</span>
                    </button>
                </form>
                <div class="login-link">
                    Sudah memiliki akun? <a href="login.php">Masuk di sini</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 Perpustakaan SMKN 7 Samarinda. All rights reserved.</p>
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

        // Add password visibility toggle
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const form = document.querySelector('form');
            
            // Add password visibility toggle
            const togglePassword = document.createElement('button');
            togglePassword.type = 'button';
            togglePassword.className = 'btn btn-link position-absolute end-0 top-50 translate-middle-y';
            togglePassword.innerHTML = '<i class="fas fa-eye"></i>';
            togglePassword.style.color = 'var(--primary-color)';
            togglePassword.style.textDecoration = 'none';
            togglePassword.style.zIndex = '10';
            togglePassword.style.right = '10px';
            
            passwordInput.parentElement.style.position = 'relative';
            passwordInput.parentElement.appendChild(togglePassword);
            
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.innerHTML = `<i class="fas fa-eye${type === 'password' ? '' : '-slash'}"></i>`;
            });

            // Add form validation animation
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