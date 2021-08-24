<?php include_once('../config/constants.php');
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$index = false;
$office = false;
$user = false;
$active = "active";
if (strpos($actual_link, 'index') !== false) {
  $index = true;
}else if(strpos($actual_link, 'office') !== false){
  $office = true;
}else if(strpos($actual_link, 'user') !== false){
  $user = true;
}
?>
<div class="container">
    <header class="d-flex flex-wrap justify-content-between py-3 mb-4 border-bottom">
      <a href="<?php echo SITEURL.'admin/index.php'?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <h3 class="fs-4">Danh bạ ĐHTL</h3>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?php echo SITEURL.'admin/index.php'?>" class="nav-link <?php if($index) echo $active?>">Cán bộ</a></li>
        <li class="nav-item"><a href="<?php echo SITEURL.'admin/office.php'?>" class="nav-link <?php if($office) echo $active?>">Đơn vị</a></li>
        <li class="nav-item"><a href="<?php echo SITEURL.'admin/user.php'?>" class="nav-link <?php if($user) echo $active?>">Tài khoản</a></li>
        <li class="nav-item"><a href="./logout.php" class="nav-link">Đăng xuất</a></li>
      </ul>
    </header>
  </div>