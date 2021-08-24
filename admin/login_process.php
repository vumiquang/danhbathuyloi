<?php 
include('../config/constants.php');
//CHeck whether the Submit Button is Clicked or NOt
if(isset($_POST['submit']))
{
    //Process for Login
    //1. Get the Data from Login form
    // $username = $_POST['username'];
    // $password = md5($_POST['password']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    
    $raw_password = $_POST['password'];
    $password = mysqli_real_escape_string($conn, $raw_password);
    $pwh = md5($password);
    //2. SQL to check whether the user with username and password exists or not
    $sql = "SELECT * FROM tb_admin WHERE user='$username' AND password='$pwh'";
   
    //3. Execute the Query
    $res = mysqli_query($conn, $sql);

    //4. COunt rows to check whether the user exists or not
    $count = mysqli_num_rows($res);

    if($count==1)
    {
        //User AVailable and Login Success
        $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it
        $_SESSION['login-success'] = "login";
        // REdirect to HOme Page/Dashboard
        header('location:'.SITEURL.'admin/index.php');
    }
    else
    {
        //User not Available and Login FAil
        $_SESSION['login-error'] = '<div class="alert alert-danger">Tài khoản hoặc mật khẩu không đúng</div>';
        //REdirect to HOme Page/Dashboard
        header('location:'.SITEURL.'admin/login.php');
    }


}
else{
    echo "not post";
}

?>
