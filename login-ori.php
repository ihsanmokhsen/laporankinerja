<?php
session_start();

// Menghasilkan string acak untuk CAPTCHA
$captcha_string = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3);

// Menyimpan nilai CAPTCHA ke dalam sesi
$_SESSION['captcha'] = $captcha_string;

// Menghubungkan ke file untuk koneksi database
include('./db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login | Sistem Informasi Tenaga Honorer BPAD Prov NTT </title>

  <?php include('./header.php'); ?>

  <?php 
  // Jika pengguna sudah login, redirect ke halaman utama
  if(isset($_SESSION['login_id']))
    header("location:index.php?page=home");
  ?>

  <style>
    
  body {
    width: 100%;
    height: calc(100%);
    position: fixed;
    top: 0;
    left: 0;
    /*background: #007bff;*/
  }

  main#main {
    width: 100%;
    height: calc(100%);
    display: flex;
  }

  #captchaImage {
    font-family: 'Arial', sans-serif;
    font-size: 28px;
    font-weight: bold;
    letter-spacing: 2px;
    background-color: #f4f4f4;
    padding: 10px;
    margin-bottom: 20px;
    display: inline-block;
    text-align: center;
    width: 100%;
    color: #333; /* Warna teks CAPTCHA */
    border-radius: 5px;
    border: 2px solid #ccc; /* Warna border CAPTCHA */
  }

  .form-group {
    margin-bottom: 15px;
  }

  label {
    color: #555; /* Warna teks label */
  }

  #captchaInput {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #ccc; /* Warna border input CAPTCHA */
    border-radius: 4px;
  }

  .btn-primary {
    background-color: #007bff !important; /* Warna latar belakang tombol */
    color: #fff !important; /* Warna teks tombol */
    border: 1px solid #007bff !important; /* Warna border tombol */
  }
  
    body {
      width: 100%;
      height: calc(100%);
      position: fixed;
      top: 0;
      left: 0;
      /*background: #007bff;*/
    }

    main#main {
      width: 100%;
      height: calc(100%);
      display: flex;
    }
  </style>
  
</head>

<body class="bg-dark">

  <main id="main">
    <div class="align-self-center w-100">
      <img src="assets/logo.png" alt="Logo" style="width: 200px; display: block; margin: 0 auto;">

      <h5 class="text-white text-center"><b>Sistem Informasi Tenaga Honorer BPAD Prov NTT</b></h5><br>
      <div id="login-center" class="bg-dark row justify-content-center">
        <div class="card col-md-4">
          <div class="card-body">
            <form id="login-form">
              <div class="form-group">
                <label for="email" class="control-label text-dark">Username</label>
                <input type="text" id="email" name="email" class="form-control form-control-sm">
              </div>
              <div class="form-group">
                <label for="password" class="control-label text-dark">Password</label>
                <input type="password" id="password" name="password" class="form-control form-control-sm">
              </div>

              <!-- Tambahkan elemen reCAPTCHA -->
              <div id="captchaImage"><?= $_SESSION['captcha'] ?></div>

              <!-- Input untuk memasukkan jawaban CAPTCHA -->
              <div class="form-group">
                <label for="captchaInput" class="control-label text-dark">Masukkan CAPTCHA di atas:</label>
                <input type="text" id="captchaInput" name="captchaInput" class="form-control form-control-sm" required>
              </div>

              <center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <script>
    // Menangani pengiriman formulir login menggunakan Ajax
    $('#login-form').submit(function(e){
      e.preventDefault();
      $('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
      if($(this).find('.alert-danger').length > 0 )
        $(this).find('.alert-danger').remove();

      // Mengirim permintaan login menggunakan Ajax
      $.ajax({
        url:'ajax.php?action=login',
        method:'POST',
        data:$(this).serialize(),
        error:err=>{
          console.log(err);
          $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
        },
        success:function(resp){
          if(resp == 1){
            location.href ='index.php?page=home';
          }else{
            $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>');
            $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
          }
        }
      });
    });

    // Memastikan input hanya menerima angka dan koma
    $('.number').on('input',function(){
      var val = $(this).val();
      val = val.replace(/[^0-9 \,]/, '');
      $(this).val(val);
    });
  </script>

</body>

</html>
