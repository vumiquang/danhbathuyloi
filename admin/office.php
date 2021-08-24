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
    
    if(isset($_SESSION['msg_office'])){
      echo $_SESSION['msg_office'];
      unset($_SESSION['msg_office']);
    }
    ?>

    <div class="container title">
        <h1 class="text-center">Quản lý đơn vị</h1>
      </div>
      <div class="container">
      <div style="margin-bottom:10px;"><a href="./form_office.php?function=add" class="btn btn-primary">Thêm đơn vị</a></div>
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên đơn vị</th>
            <th>Mã đơn vị</th>
            <th>Số điện thoại</th>
            <th>Website</th>
            <th>Địa chỉ</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody id="myTable">
        <?php 
                $sql = "SELECT * FROM tb_donvi";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    $stt = 0;
                    
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $stt++;
                        $id = $row['id'];
                        $tendonvi = $row['tendonvi'];
                        $mdv = $row['madonvi'];
                        $sdt = $row['sdt'];
                        $website = $row['website'];
                        $diachi = $row['diachi'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $stt?></th>
                            <td><?php echo $tendonvi?></td>
                            <td><?php echo $mdv?></td>
                            <td><?php echo $sdt?></td>
                            <td><?php echo $website?></td>
                            <td><?php echo $diachi?></td>
                            <td><a href="./form_office.php?function=edit&id=<?php echo $id?>" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                            <td><a href="./delete_office.php?id=<?php echo $id?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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
