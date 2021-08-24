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
                $form_action = "add_employee.php";
                $text = "Thêm";
            }
            else if($_GET['function'] == 'edit'){
                $id = $_GET['id'];
                $form_action = "edit_employee.php?id=$id";
                $text = "Sửa";
              

                $sql = "SELECT * FROM tb_canbo WHERE id = $id";
                $res = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($res);
                $hoten = $row['hoten'];
                $chucvu = $row['chucvu'];
                $mdv = $row['madonvi'];
                $email = $row['email'];
                $didong = $row['didong'];
            }
        }
    ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <form action="<?php echo $form_action?>" class="col-5" method="POST">
                <h1 class="text-center text-primary fs-1"><?php echo $text?> cán bộ</h1>
                <div class="form-group">
                    <label>Họ tên</label>
                    <input type="text" name="hoten" class="form-control" required value="<?php if(isset($hoten)) echo $hoten?>">
                </div>
                <div class="form-group">
                    <label>Chức vụ</label>
                    <input type="text" name="chucvu" class="form-control" value="<?php if(isset($chucvu)) echo $chucvu?>">
                </div>
                <div class="form-group">
                    <label>Đơn vị</label>
                    <select class="form-control form-control-sm" name="madonvi" value="<?php if(isset($mdv)) echo $mdv?>">
                        <?php 
                        $sql = "SELECT * FROM tb_donvi";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        if($count>0) { $stt = 0;
                        while($row=mysqli_fetch_assoc($res)) { 
                            $tendonvi = $row['tendonvi']; 
                            $madonvi = $row['madonvi'];
                            ?>
                            <option value="<?php echo $madonvi?>" <?php if(isset($mdv) && $mdv==$madonvi) echo "selected"?>>
                                <?php echo $tendonvi?>
                            </option>
                        <?php }}?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required value="<?php if(isset($email)) echo $email?>">
                </div>
                <div class="form-group">
                    <label>Di động</label>
                    <input type="text" name="didong" class="form-control" required value="<?php if(isset($didong)) echo $didong?>">
                </div>
                <div class="d-flex justify-content-between"><button type="submit" class="btn btn-primary"><?php echo $text?></button><a href="./index.php" class="btn btn-danger">Hủy</a></div>
            </form>
        </div>
    </div>

    <script src="../assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
