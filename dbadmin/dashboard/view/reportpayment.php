<?php
error_reporting(0);
include '../../../config/connect.php';
include_once('../../../config/functions.php');
include '../config/header.php'; 
include '../config/nav.php'; 
session_start();
$sql = "SELECT product_id , product_name ,productdata.qty,price,pdate FROM productdata , products
where products.id=productdata.product_id and  productdata.id order by productdata.id DESC";
$query = mysqli_query($conn, $sql);
?>
    <section class="content">
    <div class="content">
        <div class="container-fluid">
         <?php include '../config/card/card.php' ?>
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">รายงานการสั่งซื้อ</h4>
                </div>
            <div class="card-body table-responsive">
            <div class="form-group">
            <form action="" method="post">
            <div class="form-group row">
            <div class="col-xs-2">
            
            </div>
            <div class="card-body table-responsive">
            <div class="form-group">
            <table class="table table-hover" id="example">
              <thead>
                <tr>
                <th>ชื่อสินค้า</th>
                <th>จำนวนที่สั่งซื้อ</th>
                <th>ราคาต่อชิ้น</th>
                <th>รวมเป็นเงิน</th>
                <th>วันที่สั่งซื้อ</th>
                </tr>
              </thead>
          <tbody>

          <?php 
          while($row = mysqli_fetch_assoc($query)){  
          ?>
          <tr>
              <td><?php echo $row['product_name']; ?></td>
              <td><?php echo $row['qty']; ?></td>
              <td><?php echo $row['price']; ?> บาท</td>
              <td><?php echo $row['price']*$row['qty']; ?> บาท</td>
              <td><?php echo $row['pdate']; ?></td>
          </tr>
          <?php } ?>
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
