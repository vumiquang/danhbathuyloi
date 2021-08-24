<?php include_once('../config/constants.php');?>
<?php
session_destroy();
header('location:'.SITEURL.'admin/login.php');