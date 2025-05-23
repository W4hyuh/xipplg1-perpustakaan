<?php 
include ("../../config/controller.php");

// menerima id login yang dipilih untuk dihapus
$id = (int)$_GET['id'];

//kondisi ketika tombol hapus diklik
if(delete_buku($id) > 0){
    echo "<script>
        alert('Data Berhasil Dihapus');
        document.location.href='buku.php';
        </script>";
} else {
    echo "<script>
        alert('Data Gagal Dihapus');
        document.location.href='siswa.php';
        </script>";
}
?>