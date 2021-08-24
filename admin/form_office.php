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
                $form_action = "add_office.php";
                $text = "Thêm";
                if(isset($_SESSION['add_office_error'])){
                    echo $_SESSION['add_office_error'];
                    unset($_SESSION['add_office_error']);
                }
            }
            else if($_GET['function'] == 'edit'){
                $id = $_GET['id'];
                $form_action = "edit_office.php?id=$id";
                $text = "Sửa";
                $disabled = "disabled";

                $sql = "SELECT * FROM tb_donvi WHERE id = $id";
                $res = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($res);
                $tendonvi = $row['tendonvi'];
                $madonvi = $row['madonvi'];
                $sdt = $row['sdt'];
                $website = $row['website'];
                $diachi = $row['diachi'];
            }
        }
    ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <form action="<?php echo $form_action?>" class="col-5" method="POST">
                <h1 class="text-center text-primary fs-1"><?php echo $text?> đơn vị</h1>
                <div class="form-group">
                    <label>Tên đơn vị</label>
                    <input type="text" name="tendonvi" class="form-control" required value="<?php if(isset($tendonvi)) echo $tendonvi?>">
                </div>
                <div class="form-group">
                    <label>Mã đơn vị</label>
                    <input <?php if(isset($disabled)) echo $disabled?> type="text" name="madonvi" class="form-control" required value="<?php if(isset($madonvi)) echo $madonvi?>">
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="sdt" class="form-control" value="<?php if(isset($sdt)) echo $sdt?>">
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input type="text" name="website" class="form-control" value="<?php if(isset($website)) echo $website?>">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="diachi" class="form-control" value="<?php if(isset($diachi)) echo $diachi?>">
                </div>
                <div class="d-flex justify-content-between"><button type="submit" class="btn btn-primary"><?php echo $text?></button><a href="./office.php" class="btn btn-danger">Hủy</a></div>
            </form>
        </div>
    </div>

    <script src="../assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
