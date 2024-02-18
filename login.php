<?php
session_start();

include('./db_connect.php');

if (isset($_SESSION['login_id'])) {
    header("location:index.php?page=home");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login | Lapor Kegiatan Tenaga Honorer BPAD Prov NTT </title>
    <link rel="icon" type="image/png" href="assets/logo.png">
    <?php include('./header.php'); ?>

    <style>
        body {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background: #0066cc;
        }

        main#main {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
        }

        #login-center {
            background: #ffcc00;
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .logo {
            width: 250px; /* Increased the size of the logo */
            display: block;
            margin: 0 auto;
            margin-bottom: 20px; /* Added margin to separate logo from form */
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            color: #555;
        }

        .btn-primary {
            background-color: #0066cc !important;
            color: #fff !important;
            border: 1px solid #0066cc !important;
        }
    </style>

</head>

<body class="bg-dark">

    <main id="main">
        <div id="login-center" class="row justify-content-center">
            <img src="assets/logo.png" alt="Logo" class="logo">
               <h4 class="text-center" style="font-size: 24px; font-weight: bold;">Lapor Kegiatan Tenaga Honorer</h4>
            <div class="card">
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

                        <center><button class="btn-sm btn-block btn-wave btn-primary">Login</button></center>
                    </form>
                       <div class="contact-admin">
                         <br> <a href="https://wa.me/6281338238485">Hubungi Admin</a>
                        </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $('#login-form').submit(function (e) {
            e.preventDefault();
            $('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
            if ($(this).find('.alert-danger').length > 0)
                $(this).find('.alert-danger').remove();

            $.ajax({
                url: 'ajax.php?action=login',
                method: 'POST',
                data: $(this).serialize(),
                error: err => {
                    console.log(err);
                    $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
                },
                success: function (resp) {
                    if (resp == 1) {
                        location.href = 'index.php?page=home';
                    } else {
                        $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>');
                        $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
                    }
                }
            });
        });

        $('.number').on('input', function () {
            var val = $(this).val();
            val = val.replace(/[^0-9 \,]/, '');
            $(this).val(val);
        });
    </script>

</body>

</html>
