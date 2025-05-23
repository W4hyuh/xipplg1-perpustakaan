<?php
session_start();
include 'koneksi.php'; // File koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validasi input tidak boleh kosong
    if (empty($username) || empty($password)) {
        header("Location: ../Log/login.php?error=Username dan Password wajib diisi!");
        exit();
    }

    // Debug: Tampilkan nilai yang diterima
    error_log("Username: " . $username);
    error_log("Password: " . $password);

    // Query untuk mencari user
    $stmt = $db->prepare("SELECT * FROM user WHERE username = ? AND status = '1' LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // Username tidak ditemukan
        header("Location: ../Log/login.php?error=Username tidak ditemukan!");
        exit();
    }

    $user = $result->fetch_assoc();

    // Debug: Tampilkan data user yang ditemukan
    error_log("User data: " . print_r($user, true));

    // Cek password
    if ($password !== $user['password']) {
        // Password salah
        header("Location: ../Log/login.php?error=Password salah!");
        exit();
    }

    // Login berhasil
    $_SESSION['username'] = $user['username'];
    $_SESSION['level'] = $user['level'];
    $_SESSION['name'] = $user['name'];

    // Debug: Tampilkan level user
    error_log("User level: " . $user['level']);

    // Pengalihan halaman berdasarkan level
    switch (strtolower($user['level'])) {
        case 'admin':
            header("Location: ../landing/admin.php");
            break;
        case 'siswa':
            header("Location: ../landing/siswa.php");
            break;
        case 'petugas':
            header("Location: ../landing/petugas.php");
            break;
        default:
            header("Location: ../Log/login.php?error=Level user tidak dikenali!");
            break;
    }
    exit();
}
?>