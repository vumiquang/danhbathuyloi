<?php include_once('../config/constants.php');?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:'.SITEURL.'admin/login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý danh bạ</title>
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <script src="../assets/js/font-awesome.min.js"></script>
    <style>
      table select.form-control {
        display: unset;
        width: unset;
      }
    </style>
  </head>
  <body>
    <?php include('./component/header.php'); ?>
    <?php 
        if(isset($_GET['function'])){
            if($_GET['function'] == 'add'){
                $form_action = "add_user.php";
                $text = "Thêm tài khoản";
                $title = "Mật khẩu";
                if(isset($_SESSION['add_user_error'])){
                    echo $_SESSION['add_user_error'];
                    unset($_SESSION['add_user_error']);
                }
            }
            else if($_GET['function'] == 'edit'){
                $id = $_GET['id'];
                $form_action = "edit_user.php?id=$id";
                $text = "Đổi mật khẩu";
                $disabled = "disabled";
                $title = "Mật khẩu mới";

                if(isset($_SESSION['edit_user_error'])){
                    echo $_SESSION['edit_user_error'];
                    unset($_SESSION['edit_user_error']);
                }
                $sql = "SELECT * FROM tb_admin WHERE id = $id";
                $res = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($res);
                $user = $row['user'];
            }
        }
    ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <form action="<?php echo $form_action?>" class="col-5" method="POST">
                <h1 class="text-center text-primary fs-1"><?php echo $text?></h1>
                <div class="form-group">
                    <label>Tên tài khoản</label>
                    <input <?php if(isset($disabled)) echo $disabled?> type="text" name="user" class="form-control" required value="<?php if(isset($user)) echo $user?>">
                </div>
                <?php
                if($_GET['function'] == 'edit'){ ?>
                    <div class="form-group">
                    <label>Mật khẩu cũ</label>
                    <input  type="password" name="oldpassword" class="form-control" required>
                    </div>
                <?php
                }
                ?>
                <div class="form-group">
                    <label><?php if(isset($title)) echo $title?></label>
                    <input  type="password" name="password" class="form-control" required value="<?php if(isset($madonvi)) echo $madonvi?>">
                </div>
                <?php
                if($_GET['function'] == 'edit'){ ?>
                    <div class="form-group">
                    <label>Lặp lại mật khẩu mới</label>
                    <input  type="password" name="repassword" class="form-control" required onchange="checkRepassword()">
                    </div>
                    <span class="alert alert-pass alert-danger d-none">Mật khẩu mới phải trùng nhau</span>
                <?php
                }
                ?>
                <div class="d-flex justify-content-between"><button type="submit" class="btn btn-primary"><?php echo $text?></button><a href="./user.php" class="btn btn-danger">Hủy</a></div>
               
            </form>
        </div>
    </div>

    <script src="../assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script>
        function checkRepassword(){
            let pass = document.querySelector("input[name=password]").value;
            let repass = document.querySelector("input[name=repassword]").value;
            let alert = document.querySelector(".alert-pass");

            if(pass == repass){
                alert.classList.add("d-none");
            }else{
                alert.classList.remove("d-none");
            }

        }
    </script>
  </body>
</html>
