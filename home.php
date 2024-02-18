<?php
// Menghubungkan ke file untuk koneksi database
include('db_connect.php');
?>

<?php if ($_SESSION['login_type'] == 1): ?>
    <!-- Jika login type adalah 1 (admin) -->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <!-- Informasi Box untuk Total Pengguna -->
            <?php
            $totalUsersQuery = "SELECT COUNT(*) as totalPengguna FROM users WHERE type = 2";
            $totalUsersResult = $conn->query($totalUsersQuery);

            if ($totalUsersResult) {
                $totalUsersRow = $totalUsersResult->fetch_assoc();
                $totalPengguna = $totalUsersRow['totalPengguna'];
            } else {
                $totalPengguna = "Error";
            }
            ?>
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Pengguna</span>
                    <span class="info-box-number"><?php echo $totalPengguna; ?></span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <!-- Informasi Box untuk Total Dokumen -->
            <?php
            $totalDocumentsQuery = "SELECT COUNT(*) as totalDokumen FROM documents";
            $totalDocumentsResult = $conn->query($totalDocumentsQuery);
            
            if ($totalDocumentsResult) {
                $totalDocumentsRow = $totalDocumentsResult->fetch_assoc();
                $totalDokumen = $totalDocumentsRow['totalDokumen'];
            } else {
                $totalDokumen = "Error";
            }
            ?>
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-folder"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Dokumen</span>
                    <span class="info-box-number"><?php echo $totalDokumen; ?></span>
                </div>
            </div>
        </div>
    </div>
                    <img src="admin.png" alt="Gambar Admin" style="width: 100%;">
<?php else: ?>
    <!-- Jika login type bukan 1 (bukan admin) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Selamat datang <?php echo $_SESSION['login_name'] ?>!</h1>
                        <p>Ini adalah Aplikasi  Sistem Informasi Lapor Kegiatan Tenaga Honorer BPAD Prov NTT.</p>
                        
                        <!-- Informasi Tata Cara dan Link Video Tutorial -->
                        <div class="alert alert-info">
                            <h5 class="alert-heading">Tata Cara Penginputan Aplikasi:</h5>
                            <ol>
                                <li>Langkah pertama klik Document yang terdapat di sebelah kiri layar;</li><br>
                                <li>Langkah kedua, untuk menambahkan Laporan klik Add New kemudian Isi Laporan Harian untuk menambahkan file dokumen klik add files;</li><br>
                                <li>Untuk Melihat Laporan yang sudah di Upload Klik Document kemudian List.</li><br>
                                <li>Apabila terjadi kendala dalam penginputan, hubungi admin <a href="https://wa.me/081338238485" target="_blank">melalui WhatsApp</a>.</li><br>
                                 <li>Anda dapat melihat Format Laporan >>> <a href="https://docs.google.com/document/d/10V1ldFQNV2Vry2O0nz5PzNb-3uqa9Nauwqka3qIMXYo/edit?usp=sharing" target="_blank">sini</a>.</li>
                           
                                <!-- Tambahkan langkah-langkah sesuai kebutuhan -->
                            </ol>
                            <hr>
                            <p class="mb-0">Untuk tutorial lebih lanjut, silakan nonton <a href="proses.php">video tutorial ini</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <!-- Informasi Box untuk Total Dokumen yang Di-upload oleh Pengguna -->
                        <?php
                        $totalDokumenQuery = "SELECT COUNT(*) as totalDokumen FROM documents WHERE user_id = {$_SESSION['login_id']}";
                        $totalDokumenResult = $conn->query($totalDokumenQuery);

                        if ($totalDokumenResult) {
                            $totalDokumenRow = $totalDokumenResult->fetch_assoc();
                            $totalDokumen = $totalDokumenRow['totalDokumen'];
                        } else {
                            $totalDokumen = "Error";
                        }
                        ?>
                        <div class="info-box">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-folder"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Dokumen</span>
                                <span class="info-box-number"><?php echo $totalDokumen; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
