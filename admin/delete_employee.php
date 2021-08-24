<?php include_once('../config/constants.php');?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:'.SITEURL.'admin/login.php');
    }
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM tb_canbo WHERE id = $id";
    
    $res = mysqli_query($conn,$sql);
    if($res == true){
        $_SESSION['msg_employee'] = "<script> alert('Xóa cán bộ thành công')</script>";
        header('location:'.SITEURL.'admin/index.php');
    }
}
