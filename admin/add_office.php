<?php include_once('../config/constants.php');?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:'.SITEURL.'admin/login.php');
    }
?>
<?php
if(isset($_POST['tendonvi'])){
    $tendonvi = $_POST['tendonvi'];
    $madonvi = $_POST['madonvi'];
    $sdt = $_POST['sdt'];
    $website = $_POST['website'];
    $diachi = $_POST['diachi'];

    $sqlCheckMdv = "select * from tb_donvi where madonvi = '$madonvi'";
    $res = mysqli_query($conn,$sqlCheckMdv);
    $count = mysqli_num_rows($res);

    if($count==1)
    {
        $_SESSION['add_office_error'] = "<script> alert('Mã đơn vị đã tồn tại, vui lòng nhập mã khác')</script>";
        header('location:'.SITEURL.'admin/form_office.php?function=add');
    }
    else{
        $sql = "INSERT INTO `tb_donvi`( `tendonvi`, `madonvi`, `sdt`, `website`, `diachi`) VALUES ('$tendonvi','$madonvi','$sdt','$website','$diachi')";
        $res = mysqli_query($conn,$sql);
        if($res == true){
            $_SESSION['msg_office'] = "<script> alert('Thêm đơn vị thành công')</script>";
            header('location:'.SITEURL.'admin/office.php');
        }
    }
}
