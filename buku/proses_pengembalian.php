<?php

session_start();
include '../config/controller.php';

if (isset($_POST['id_peminjaman'])) {
    $id_peminjaman = intval($_POST['id_peminjaman']);
    $tgl_kembali = date('Y-m-d');

    // Update status dan tanggal pengembalian
    $query = "UPDATE peminjaman SET status='dikembalikan', tgl_pengembalian='$tgl_kembali' WHERE id_peminjaman=$id_peminjaman";
    mysqli_query($db, $query);
}

header('Location: list-page.php');
exit;