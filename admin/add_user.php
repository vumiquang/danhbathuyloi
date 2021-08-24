<?php include_once('../config/constants.php');?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:'.SITEURL.'admin/login.php');
    }
?>
<?php
if(isset($_POST['user'])){
    $user = $_POST['user'];
    $password = $_POST['password'];

    $sqlCheck = "select * from tb_admin where user = '$user'";
    $res = mysqli_query($conn,$sqlCheck);
    $count = mysqli_num_rows($res);

    if($count==1)
    {
        $_SESSION['add_user_error'] = "<script> alert('Tài khoản đã tồn tại')</script>";
        header('location:'.SITEURL.'admin/form_user.php?function=add');
    }
    else{
        $pwh = md5($password);
        $sql = "INSERT INTO `tb_admin`( `user`, `password`) VALUES ('$user','$pwh')";
        $res = mysqli_query($conn,$sql);
        if($res == true){
            $_SESSION['msg_user'] = "<script> alert('Thêm tài khoản thành công')</script>";
            header('location:'.SITEURL.'admin/user.php');
        }
    }
}
