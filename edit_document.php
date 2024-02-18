<?php
// Memasukkan skrip untuk terhubung ke database
include 'db_connect.php';

// Mengambil data dokumen berdasarkan ID yang diberikan dalam parameter GET
$qry = $conn->query("SELECT * FROM documents where id = " . $_GET['id'])->fetch_array();

// Iterasi melalui hasil query dan menetapkan nilai-nilainya ke variabel
foreach ($qry as $k => $v) {
    // Jika kunci (kolom) adalah 'title', maka nama variabel diubah menjadi 'ftitle'
    if ($k == 'title')
        $k = 'ftitle';
    
    // Menetapkan nilai variabel
    $$k = $v;
}

// Memasukkan skrip dari file 'new_document.php'
include 'new_document.php';
?>
