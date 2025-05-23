<?php
session_start();
// if (isset($_SESSION['username'])) {
//     header("Location: ../config/login.php");
//     exit();
// }

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan koneksi ke database
    include '../config/controller.php';

    // Cek username dan password
    $stmt = $db->prepare("SELECT * FROM user WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verifikasi password jika sudah di hash
        // if (password_verify($password, $user['password'])) {

        // Verifikasi password
        if ($password === $user['password']) {
            // Password benar, buat session
            $_SESSION['id_user'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['level'] = $user['level']; // tambahkan ini

            // Redirect sesuai level
            if ($user['level'] == 'admin') {
                header("Location: ../landing/admin.php");
            } elseif ($user['level'] == 'petugas') {
                header("Location: ../landing/petugas.php");
            } else {
                header("Location: ../landing/siswa.php");
            }
            exit;
        } else {
            // Password salah
            $error = "Username atau password salah.";
        }
    } else {
        // Username tidak ditemukan
        $error = "Username atau password salah.";
    }

    $stmt->close();
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan SMKN 7 Samarinda</title>
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

.login-container {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: clamp(1rem, 4vw, 2rem);
    min-height: calc(100vh - 70px);
}

.login-card {
    background: white;
    border-radius: clamp(15px, 3vw, 20px);
    box-shadow: 0 10px 30px rgba(56, 142, 60, 0.1);
    overflow: hidden;
    width: min(100% - 2rem, 400px);
    position: relative;
    transform: translateY(0);
    transition: all 0.3s ease;
}

.login-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(56, 142, 60, 0.15);
}

.login-header {
    background: var(--primary-color);
    color: white;
    padding: clamp(1.5rem, 5vw, 2.5rem);
    text-align: center;
    position: relative;
}

.login-header::after {
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

.login-header i {
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

.login-header:hover i {
    transform: scale(1.1);
    background: rgba(255, 255, 255, 0.2);
}

.login-body {
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

.register-link {
    text-align: center;
    margin-top: 1.5rem;
    color: var(--secondary-color);
    font-size: clamp(0.85rem, 2.5vw, 0.95rem);
}

.register-link a {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-block;
}

.register-link a:hover {
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

/* Responsive Breakpoints */
@media (max-width: 768px) {
    .login-container {
        padding: 1rem;
    }

    .login-card {
        margin: 1rem;
    }
}

@media (max-width: 576px) {
    .login-header {
        padding: 1.5rem;
    }

    .login-body {
        padding: 1.5rem;
    }

    .btn-primary {
        padding: 0.8rem 1.5rem;
    }
}

/* Touch Device Optimizations */
@media (hover: none) {
    .login-card:hover {
        transform: none;
    }

    .login-header:hover i {
        transform: none;
    }

    .btn-primary:hover {
        transform: none;
        box-shadow: none;
    }

    .btn-primary:hover i {
        transform: none;
    }

    .register-link a:hover {
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

    <!-- Login Form -->
    <div class="login-container">
        <div class="login-card" data-aos="fade-up">
            <div class="login-header">
                <i class="fas fa-user-circle"></i>
                <h2>Login</h2>
                <p>Masuk ke akun Anda</p>
            </div>
            
            <div class="login-body">
                <?php if (isset($error)): ?>
                <div class="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php echo htmlspecialchars($error); ?>
                </div>
                <?php endif; ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                    </button>
                </form>
                <div class="register-link">
                    Belum punya akun? <a href="registrasi.php">Daftar disini</a>
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