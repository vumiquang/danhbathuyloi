<?php include_once('../config/constants.php');?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:'.SITEURL.'admin/login.php');
    }
?>
<?php
if(isset($_POST['hoten']) && isset($_GET['id'])){
    $id = $_GET['id'];
    $hoten = $_POST['hoten'];
    $chucvu = $_POST['chucvu'];
    $mdv = $_POST['madonvi'];
    $email = $_POST['email'];
    $didong = $_POST['didong'];

    $sql = "UPDATE `tb_canbo` SET `hoten`='$hoten',`chucvu`='$chucvu',`email`='$email',`didong`='$didong',`madonvi`='$mdv' WHERE id = $id";
  
    $res = mysqli_query($conn,$sql);
    if($res == true){
        $_SESSION['msg_employee'] = "<script> alert('Sửa thông tin cán bộ thành công')</script>";
        header('location:'.SITEURL.'admin/index.php');
    }
}
