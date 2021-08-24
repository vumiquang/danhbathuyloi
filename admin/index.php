<?php include_once('../config/constants.php');?>
<?php 
    if(!isset($_SESSION['login-success'])){
        header('location:'.SITEURL.'admin/login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý danh bạ</title>
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <script src="../assets/js/font-awesome.min.js"></script>
    <style>
      table select.form-control {
        display: unset;
        width: unset;
      }
    </style>
  </head>
  <body>
    <?php include('./component/header.php'); 
    if(isset($_SESSION['msg_employee'])){
      echo $_SESSION['msg_employee'];
      unset($_SESSION['msg_employee']);
    }
    ?>

    <div class="container title">
        <h1 class="text-center">Quản lý cán bộ</h1>
      </div>
    <div class="container">
        <div class="search position-relative">
              <form>
                <div class="form-group">
                  <label>Họ tên</label>
                  <input
                    type="text"
                    class="form-control"
                    id="ho"
                    aria-describedby="emailHelp"
                    placeholder="Họ và tên"
                    name="hoten"
                  />
                </div>
                <div class="form-group">
                  <label>Chức vụ</label>
                  <input
                    type="text"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Chức vụ"
                    name="chucvu"
                  />
                </div>
                <button type="submit" class="btn btn-primary btn-search">Tìm kiếm</button>
              </form>
              <div class="position-absolute" style="bottom: 0; right:0;"><a href="./form_employee.php?function=add" class="btn btn-primary">Thêm cán bộ</a></div>
            </div>
    </div>
    <div class="container">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>STT</th>
            <th>Họ tên</th>
            <th>Chức vụ</th>
            <th>
              Đơn vị
              <select class="form-control form-control-sm">
                <option value="">Tất cả</option>
                <?php 
                $sql = "SELECT * FROM tb_donvi";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count>0) { $stt = 0;
                while($row=mysqli_fetch_assoc($res)) { 
                    $tendonvi = $row['tendonvi']; ?>
                    <option value="<?php echo $tendonvi?>">
                        <?php echo $tendonvi?>
                    </option>
                <?php }}?>
              </select>
            </th>
            <th>Email</th>
            <th>Di động</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody id="myTable">
        <?php 
                $sql = "SELECT tb_canbo.id,tb_canbo.hoten,tb_canbo.chucvu,tb_canbo.email,tb_canbo.didong,tb_donvi.tendonvi FROM tb_canbo,tb_donvi WHERE tb_canbo.madonvi = tb_donvi.madonvi";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    $stt = 0;
                    
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $stt++;
                        $id = $row['id'];
                        $hoten = $row['hoten'];
                        $chucvu = $row['chucvu'];
                        $donvi = $row['tendonvi'];
                        $email = $row['email'];
                        $didong = $row['didong'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $stt?></th>
                            <td><?php echo $hoten?></td>
                            <td><?php echo $chucvu?></td>
                            <td><?php echo $donvi?></td>
                            <td><?php echo $email?></td>
                            <td><?php echo $didong?></td>
                            <td><a href="./form_employee.php?function=edit&id=<?php echo $id?>" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                            <td><a href="./delete_employee.php?id=<?php echo $id?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
              <?php 
                    }
                }
              ?>
        </tbody>
      </table>
    </div>
    <script src="../assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script>
    const btnSearch  = document.querySelector(".btn-search");
    const selectFilter  = document.querySelector("select");
   
    selectFilter.addEventListener('change',search);
    btnSearch.addEventListener('click',search);
    function search(e){
        e.preventDefault();

        let inputName = document.querySelector("input[name=hoten]").value.toUpperCase();
        let inputChucVu = document.querySelector("input[name=chucvu]").value.toUpperCase();
        let inputDonVi = document.querySelector("select").value.toUpperCase();
        let table = document.getElementById("myTable");
        let tr = table.getElementsByTagName("tr");
        console.log(table);
        for (i = 0; i < tr.length; i++) {
            let tdName = tr[i].querySelectorAll("td")[0];
            let tdChucVu= tr[i].querySelectorAll("td")[1];
            let tdDonVi= tr[i].querySelectorAll("td")[2];
   
            let txtName =  tdName.textContent || tdName.innerText;
            let txtChucVu =  tdChucVu.textContent || tdChucVu.innerText;
            let txtDonVi =  tdDonVi.textContent || tdDonVi.innerText;
            if (txtDonVi.toUpperCase().indexOf(inputDonVi) > -1 && txtName.toUpperCase().indexOf(inputName) > -1 && txtChucVu.toUpperCase().indexOf(inputChucVu) > -1) {
                tr[i].style.display = "";
                console.log(1);
            } else {
                console.log(2);
                tr[i].style.display = "none";
            }
        }
    }
    </script>
  </body>
</html>
