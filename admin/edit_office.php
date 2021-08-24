<?php include_once('../config/constants.php');?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:'.SITEURL.'admin/login.php');
    }
?>
<?php
if(isset($_POST['tendonvi']) && isset($_GET['id'])){
    $id = $_GET['id'];
    $tendonvi = $_POST['tendonvi'];
    $madonvi = $_POST['madonvi'];
    $sdt = $_POST['sdt'];
    $website = $_POST['website'];
    $diachi = $_POST['diachi'];

    $sql = "UPDATE `tb_donvi` SET `tendonvi`='$tendonvi',`sdt`='$sdt',`website`='$website',`diachi`='$diachi' WHERE id=$id";
  
    $res = mysqli_query($conn,$sql);
    if($res == true){
        $_SESSION['msg_office'] = "<script> alert('Sửa thành công')</script>";
        header('location:'.SITEURL.'admin/office.php');
    }
}
