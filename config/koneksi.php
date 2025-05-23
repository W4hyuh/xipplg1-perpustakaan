<?php
// config/koneksi.php
$db = mysqli_connect("localhost", "root", "", "db_perpus"); // Ganti nama database sesuai milik Anda
if (!$db) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>