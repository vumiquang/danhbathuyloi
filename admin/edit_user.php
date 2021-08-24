<?php include_once('../config/constants.php');?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:'.SITEURL.'admin/login.php');
    }
?>
<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $oldpass = $_POST['oldpassword'];
    $pass = $_POST['password'];
    $pwh = md5($oldpass);

    $sql = "SELECT * FROM tb_admin WHERE id=$id AND password='$pwh'";
   
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count==1)
    {
        $pwh = md5($pass);
        $sql = "UPDATE `tb_admin` SET `password`='$pwh' WHERE id = $id";
        $res = mysqli_query($conn,$sql);
        if($res == true){
            $_SESSION['msg_user'] = "<script> alert('Đổi mật khẩu thành công')</script>";
            header('location:'.SITEURL.'admin/user.php');
        }
    }else{
        $_SESSION['edit_user_error'] = "<script> alert('Mật khẩu cũ không đúng')</script>";
        header('location:'.SITEURL.'admin/form_user.php?function=edit&id='.$id);
    }
}