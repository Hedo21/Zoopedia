<?php
session_start()
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/login/owl.carousel.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/login/bootstrap.min.css">
  <!-- Style -->
  <link rel="stylesheet" href="css/login/style.css">
  <title>Login</title>
  <style>
    body {
      background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('assets/img/bg-masthead.jpg');
      background-size: cover;
    }

    .form-block {
      opacity: 90%;
    }
  </style>
</head>

<body>
  <form action="aksi_login.php?op=in" method="POST">
    <div class="content">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 contents">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="form-block">
                  <div class="mb-4">
                    <h3>Sign In to <strong>Zoopedia</strong></h3>
                    <p class="mb-4">Silahkan Logi In dengan username dan password anda</p>
                  </div>
                  <form action="#" method="post">
                    <div class="form-group first">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group last mb-4">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <input type="submit" value="Log In" class="btn btn-pill text-white btn-block btn-primary">
                    <a class="d-block text-center my-4 text-muted" href="registrasi.php">Belum punya akun ? buat dulu yuk</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>