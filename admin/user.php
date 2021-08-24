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
    <?php include('./component/header.php');
    
    if(isset($_SESSION['msg_user'])){
        echo $_SESSION['msg_user'];
        unset($_SESSION['msg_user']);
    }

    ?>

    <div class="container title">
        <h1 class="text-center">Quản lý Tài khoản</h1>
      </div>
      <div class="container">
      <div style="margin-bottom:10px;"><a href="./form_user.php?function=add" class="btn btn-primary">Thêm tài khoản</a></div>
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên tài khoản</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody id="myTable">
        <?php 
                $sql = "SELECT * FROM tb_admin";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    $stt = 0;
                    
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $stt++;
                        $id = $row['id'];
                        $user = $row['user'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $stt?></th>
                            <td><?php echo $user?></td>
                            <td><a href="./form_user.php?function=edit&id=<?php echo $id?>" class="btn btn-warning"><i class="fas fa-lock-open"></i></a></td>
                            <td><a href="./delete_user.php?id=<?php echo $id?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
              <?php 
                    }
                }
              ?>
        </tbody>
      </table>
    </div>
    <script src="../assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
