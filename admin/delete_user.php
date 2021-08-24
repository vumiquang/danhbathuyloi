<?php include_once('../config/constants.php');?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:'.SITEURL.'admin/login.php');
    }
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT user FROM tb_admin where id = $id";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);

    if($row['user'] == "admin")
    {
        $_SESSION['msg_user'] = "<script> alert('Không thể xóa tài khoản admin')</script>";
        header('location:'.SITEURL.'admin/user.php');
    }
    else if($row['user'] == $_SESSION['user']){
        $_SESSION['msg_user'] = "<script> alert('Tài khoản đang đăng nhập')</script>";
        header('location:'.SITEURL.'admin/user.php');
    }else{
        $sql = "DELETE FROM tb_admin WHERE id = $id";
        $res = mysqli_query($conn,$sql);
        if($res == true){
            $_SESSION['msg_user'] = "<script> alert('Xóa thành công')</script>";
            header('location:'.SITEURL.'admin/user.php');
        }
    }
}
