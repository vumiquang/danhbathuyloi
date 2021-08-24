<?php include_once('../config/constants.php');?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:'.SITEURL.'admin/login.php');
    }
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sqlCanBo = "DELETE FROM tb_canbo WHERE madonvi = (select madonvi from tb_donvi where id = $id)";
    $res = mysqli_query($conn,$sqlCanBo);

    $sql = "DELETE FROM tb_donvi WHERE id = $id";
    $res = mysqli_query($conn,$sql);
    if($res == true){
        $_SESSION['msg_office'] = "<script> alert('Xóa thành công')</script>";
        header('location:'.SITEURL.'admin/office.php');
    }
}
