<?php
error_reporting(0);
include '../../../config/connect.php';
include_once('../../../config/functions.php');
include '../config/header.php'; 
include '../config/nav.php'; 
session_start();
$sql_pd = "SELECT * FROM products where id and status_id = 2 ";
$result_pd = $conn->query($sql_pd);
?>
    <section class="content">
    <div class="content">
        <div class="container-fluid">
         <?php include '../config/card/card.php' ?>  
        <div class="card">
        <div class="card-header card-header-primary">
        <h4 class="card-title">รายงานสินค้า</h4>   
        </div>
        <div class="card-body table-responsive">
        <div class="center">
        <a class="btn btn-warning " href="../insert/product" role="button">เพิ่มสินค้า</a>
        <a class="btn btn-primary " href="../insert/product" role="button">กู้คืนสินค้า</a>
        </div>
        
        <div class="form-group mt-2"> 
        <table class="table table-hover" id="example">
        <thead>
        <th>วันที่เพิ่มสินค้า</th>
        <th></th>
        <th>รหัสสินค้า</th>
        <th>ชื่อสินค้า</th>
        <th>รายละเอียด</th>
        <th>ราคาต่อหน่วย</th>
        <th>คงเหลือ</th>
        <th>จัดการข้อมูล</th>
        </thead>
        <tbody>
        <?php
        $total_price = 0;
        $num = 0;
        while($meResult = mysqli_fetch_array($result_pd)) 
        {
        $pid=$meResult['status_id'];
        ?>
        <tr>
        <td><?php echo $meResult['dateadd']; ?></td>
        <td><img height="70" width="70" src="/thecart/dbadmin/assets/img/product/<?php echo $meResult['product_img_name']; ?>" border="0"></td>
        <td><?php echo $meResult['product_code']; ?></td>
        <td><?php echo $meResult['product_name']; ?></td>
        <td><?php echo $meResult['product_desc']; ?></td>
        <td><?php echo number_format($meResult['product_price'],2); ?></td>
        <td><?php echo $meResult['qty']." ชิ้น"; ?></td>
        <td>

        <a class="btn btn-info"  href="../config/addqty?repair_id=<?php echo $meResult['id']; ?>" role="button">
        เพิ่มจำนวนสินค้า <i class="fa fa-edit"></i></a>

        <a class="btn btn-warning"  href="../config/editproduct?repair_id=<?php echo $meResult['id']; ?>" role="button">
        แก้ไขสินค้า <i class="fa fa-edit"></i></a>
            
        <a class="btn btn-success"  href="../delete/recovproduct?user_id=<?php echo $meResult['id']; ?>" role="button">
        กู้คืน <i class="fa fa-retweet"></i></a>

        </td>
        </tr>
        <?php

        }
        ?>
        
        </tbody>
        </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php 
include '../config/jqscript.php';
include '../config/footer.php';
include '../config/scchart.php';
?> 
