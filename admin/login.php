<?php
include_once('../config/constants.php');
unset($_SESSION['login-success']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Đăng nhập</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet" />
  </head>

  <body class="text-center">
    <form class="form-signin" action="./login_process.php" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Đăng nhập</h1>
      <label for="inputName" class="sr-only">UserName</label>
      <input
        type="text"
        id="inputName"
        class="form-control"
        placeholder="UserName"
        required
        autofocus
        name = "username"
      />
      <br />
      <label for="inputPassword" class="sr-only">Password</label>
      <input
        type="password"
        id="inputPassword"
        class="form-control"
        placeholder="Password"
        required
        name="password"
      />
      <?php 
                if(isset($_SESSION['login-error']))
                {
                    echo $_SESSION['login-error'];
                    unset($_SESSION['login-error']);
                }             
            ?>
      <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Sign In">
      <a href="../index.php">Trở về trang chủ</a>
      <p class="mt-5 mb-3 text-muted">&copy; Danh bạ đại học Thủy Lợi</p>
    </form>
   
  </body>
</html>
