<?php include_once('../config/constants.php');?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:'.SITEURL.'admin/login.php');
    }
?>
<?php
if(isset($_POST['hoten'])){
    $hoten = $_POST['hoten'];
    $chucvu = $_POST['chucvu'];
    $mdv = $_POST['madonvi'];
    $email = $_POST['email'];
    $didong = $_POST['didong'];

    $sql = "INSERT INTO `tb_canbo`( `hoten`, `chucvu`, `email`, `didong`, `madonvi`) VALUES ('$hoten','$chucvu','$email','$didong','$mdv')";
    
    $res = mysqli_query($conn,$sql);
    if($res == true){
        $_SESSION['msg_employee'] = "<script> alert('Thêm cán bộ thành công')</script>";
        header('location:'.SITEURL.'admin/index.php');
    }
}
