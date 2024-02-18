<?php
// Memasukkan skrip untuk terhubung ke database
include 'db_connect.php';

// Mengambil data pengguna berdasarkan ID yang diberikan dalam parameter GET
$qry = $conn->query("SELECT * FROM users where id = " . $_GET['id'])->fetch_array();

// Iterasi melalui hasil query dan menetapkan nilai-nilainya ke variabel
foreach ($qry as $k => $v) {
    // Menetapkan nilai variabel
    $$k = $v;
}

// Memasukkan skrip dari file 'new_user.php'
include 'new_user.php';
?>
