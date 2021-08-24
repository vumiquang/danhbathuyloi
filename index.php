<?php
include('./config/constants.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Danh bạ thủy lợi</title>
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <script src="./assets/js/font-awesome.min.js"></script>
  </head>
  <body>
    <header>
      <div class="container title">
        <h1 class="text-center">Tra cứu thông tin danh bạ đại học Thủy lợi</h1>
      </div>
    </header>
    <section>
      <div class="container">
        <div class="search">
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
            <div class="form-group">
              <label>Đơn vị</label>
              <select class="form-control form-control-sm">
              <option value="">Tất cả</option>
              <?php 
                $sql = "SELECT * FROM tb_donvi";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    $stt = 0;
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $tendonvi = $row['tendonvi'];
                    ?>
                    <option value="<?php echo $tendonvi?>"><?php echo $tendonvi?></option>

                <?php }}?>
                  
              </select>
            </div>
            <button type="submit" class="btn btn-primary btn-search">Tìm kiếm</button>
          </form>
        </div>
        <div class="info">
          <table class="table table-hover table-bordered ">
            <thead>
              <tr>
                <th scope="col" rowspan="2">STT</th>
                <th scope="col" rowspan="2">Họ tên</th>
                <th scope="col" rowspan="2">Chức vụ</th>
                <th scope="col" colspan="4" class="text-center">Đơn vị</th>
                <th scope="col" rowspan="2">Email</th>
                <th scope="col" rowspan="2">SĐT Di động</th>
              </tr>
              <tr>
                <th scope="col">Tên đơn vị</th>
                <th scope="col">SĐT </th>
                <th scope="col">Website</th>
                <th scope="col">Địa chỉ</th>
              </tr>
            </thead>
            <tbody id="myTable">
            <?php 
                $sql = "SELECT * FROM tb_canbo,tb_donvi WHERE tb_canbo.madonvi = tb_donvi.madonvi";
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
                        $sdtcoquan = $row['sdt'];
                        $web=$row['website'];
                        $diachi=$row['diachi'];
                        $email = $row['email'];
                        $didong = $row['didong'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $stt?></th>
                            <td><?php echo $hoten?></td>
                            <td><?php echo $chucvu?></td>
                            <td><?php echo $donvi?></td>
                            <td><?php echo $sdtcoquan?></td>
                            <td><?php echo $web?></td>
                            <td><?php echo $diachi?></td>
                            <td><?php echo $email?></td>
                            <td><?php echo $didong?></td>
                        </tr>
              <?php 
                    }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <script src="./assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script>
    const btnSearch  = document.querySelector(".btn-search");
    btnSearch.onclick = (e)=>{
        e.preventDefault();

        let inputName = document.querySelector("input[name=hoten]").value.toUpperCase();
        let inputChucVu = document.querySelector("input[name=chucvu]").value.toUpperCase();
        let inputDonVi = document.querySelector("select").value.toUpperCase();
        let table = document.getElementById("myTable");
        let tr = table.getElementsByTagName("tr");
        console.log(table,tr);
        for (i = 0; i < tr.length; i++) {
            let tdName = tr[i].querySelectorAll("td")[0];
            let tdChucVu= tr[i].querySelectorAll("td")[1];
            let tdDonVi= tr[i].querySelectorAll("td")[2];
   
            let txtName =  tdName.textContent || tdName.innerText;
            let txtChucVu =  tdChucVu.textContent || tdChucVu.innerText;
            let txtDonVi =  tdDonVi.textContent || tdDonVi.innerText;

            if (txtDonVi.toUpperCase().indexOf(inputDonVi) > -1 && txtName.toUpperCase().indexOf(inputName) > -1 && txtChucVu.toUpperCase().indexOf(inputChucVu) > -1) {
                tr[i].style.display = "";
                // console.log(1);
            } else {
                // console.log(2);
                tr[i].style.display = "none";
            }
        }
    }
    </script>
  </body>
</html>
