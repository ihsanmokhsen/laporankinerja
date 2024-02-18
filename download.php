<?php 
    // Mengambil nama file dari parameter GET
	$fname = $_GET['f'];   

    // Membagi nama file menjadi dua bagian dengan batas underscore (_)
	$fx = explode("_", $fname, 2);
	$name = $fx[1];  // Mengambil bagian kedua sebagai nama file

    // Menentukan path lengkap ke file
	$file = "assets/uploads/" . $fname;

    // Mengatur header HTTP untuk mengatur jenis konten, panjang konten, dan menentukan nama file untuk mengunduh
	header("Content-Type: " . filetype($file));
	header("Content-Length: " . filesize($file));
	header("Content-Disposition: attachment; filename={$name}");

    // Membaca dan mengirimkan konten file ke output HTTP
	readfile($file);
?>
