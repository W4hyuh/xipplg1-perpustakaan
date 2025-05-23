<?php
    // panggil koneksi database
    include "koneksi.php";

    // Fungsi Menampilkan
    function select($query) {
        global $db;
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc( $result)){
                      $rows[] = $row ;
        }
        return $rows;
    }
 
    // Fungsi Tambah akun
    function create_user($post) {
        global $db;
        $name = strip_tags($post ['name']);
        $username = strip_tags($post['username']);
        $password = strip_tags($post['password']);
        $level = strip_tags($post['level']);
        $status = strip_tags($post['status']);


        // Query Tambah Data
        $query = "INSERT INTO user VALUES (null, '$name','$username','$password','$level','$status')";
        // untuk mengkoneksi query
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);


    }

    //Fungsi Ubah akun
function ubah_user($post){
    global $db;
    $id = $post['id'];
    $name = $post['name'];
    $username = $post['username'];
    $password = $post['password'];
    $level = $post['level'];
    $status = $post['status'];

    //sql ubah akun
    $query = "UPDATE user SET name='$name', username='$username', password='$password', level='$level', status='$status'  WHERE id=$id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
 
}

//Fungsi Hapus akun
function delete_user($id){
    global $db;
    // Sql delete produk
    $query = "DELETE FROM user WHERE id=$id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}


// FUNGSI DARI KATEGORI //

// Fungsi Tambah Kategori
function create_kategori($post) {
    global $db;
    $nama = strip_tags($post ['nama']);

    // Query Tambah Data
    $query = "INSERT INTO kategori VALUES (null, '$nama')";
    // untuk mengkoneksi query
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);


}

// Fungsi Ubah Kategori
function ubah_kategori($post){
    global $db;
    $id = $post['id'];
    $nama = $post['nama'];

    //sql ubah kategori
    $query = "UPDATE kategori SET nama='$nama' WHERE id=$id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

//Fungsi Hapus kategori
function delete_kategori($id){

    global $db;
    // Sql delete produk
    $query = "DELETE FROM kategori WHERE id=$id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}


// Fungsi Dari Tabel Siswa //

function create_siswa($post) {
    global $db;
    $name = strip_tags($post ['name']);
    $username = strip_tags($post['username']);
    $password = strip_tags($post['password']);
    $level = strip_tags($post['level']);
    $status = strip_tags($post['status']);


    // Query Tambah Data
    $query = "INSERT INTO siswa VALUES (null, '$name','$username','$password','$level','$status')";
    // untuk mengkoneksi query
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);


}

// Fungsi Ubah Siswa
function ubah_siswa($post){
    global $db;
    $id = $post['id'];
    $name = $post['name'];
    $username = $post['username'];
    $password = $post['password'];
    $level = $post['level'];
    $status = $post['status'];

    //sql ubah akun
    $query = "UPDATE siswa SET name='$name', username='$username', password='$password', level='$level', status='$status'  WHERE id=$id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
 
}

// Fungsi Hapus Siswa

function delete_siswa($id){
    
    global $db;
    // Sql delete produk
    $query = "DELETE FROM siswa WHERE id=$id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// Fungsi Dari Buku //

// Fungsi Tambah Buku
function create_buku($post) {
    global $db;
    $nama = strip_tags($post['nama']);
    $judul_buku = strip_tags($post['judul_buku']);
    $pengarang = strip_tags($post['pengarang']);
    $tahun_terbit = strip_tags($post['tahun_terbit']);
    $stok = strip_tags($post['stok']);

    // Cek apakah kategori ada
    $check_kategori = mysqli_query($db, "SELECT nama FROM kategori WHERE nama = '$nama'");
    if(mysqli_num_rows($check_kategori) == 0) {
        return 0; // Kategori tidak ditemukan
    }

    // Query Tambah Data
    $query = "INSERT INTO buku (nama, judul_buku, pengarang, tahun_terbit, stok) VALUES ('$nama', '$judul_buku', '$pengarang', '$tahun_terbit', '$stok')";
    // untuk mengkoneksi query
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// Fungsi Ubah Buku
function ubah_buku($post){
    global $db;
    $id = $post['id'];
    $nama = $post['nama'];
    $judul_buku = $post['judul_buku'];
    $pengarang = $post['pengarang'];
    $tahun_terbit = $post['tahun_terbit'];
    $stok = $post['stok'];

    //sql ubah buku
    $query = "UPDATE buku SET nama='$nama', judul_buku='$judul_buku', pengarang='$pengarang', tahun_terbit='$tahun_terbit', stok='$stok' WHERE id=$id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// Fungsi Hapus Buku
function delete_buku($id){
    
    global $db;
    // Sql delete produk
    $query = "DELETE FROM buku WHERE id=$id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}






     // Fungsi Tambah akun
//  function create_user($post) {
//     global $db;
//     $name = strip_tags($post ['name']);
//     $username = strip_tags($post['username']);
//     $password = strip_tags($post['password']);
//     $level = strip_tags($post['level']);
//     $status = strip_tags($post['status']);

//     // Query Tambah data user
//     $query = "INSERT INTO user VALUES (null, '$name','$username','$password', '$level', '$status')";
//     // untuk mengkoneksi query
//     mysqli_query($db, $query);
//     return mysqli_affected_rows($db);
// }




?>