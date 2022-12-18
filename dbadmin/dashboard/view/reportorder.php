<?php
error_reporting(0);
include '../../../config/connect.php';
include_once('../../../config/functions.php');
include '../config/header.php'; 
include '../config/nav.php'; 
session_start();
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

      <th>เลขที่ใบสั่งซื้อ</th>
      <th>วันที่สั่งซื้อ</th>
      <th>ชื่อลูกค้า</th>
      <th>สถานะ</th>
      <th>ใบเสร็จ</th>
      <th>สลิปโอนเงิน</th>
      </tr>
      </thead>
      <tbody>

      <?php 
      $updateuser = new DB_con();
      $sql11 = $updateuser->fetchdata_order_detail_admin();
      while($row = mysqli_fetch_array($sql11)){ $status_id=$row['status_id']; ?>
      <tr>
      <td><?php echo $row['report_id']; ?></td>
      <td><?php echo $row['order_date']; ?></td>
      <td><?php echo $row['fullname']; ?></td>
      <td><span class="badge badge-secondary" style="background-color:<?php echo $row['color']; ?>"><?php echo $row['status_name']; ?></span></td>
      <td>
      <a class="btn btn-primary" href="/thecart/config/mpdf/printdata/<?php echo $row['id']; ?>" role="button">
      ใบเสร็จ <i class="fa fa-file"></i></a>

      <a class="btn btn-warning" href="/thecart/dbadmin/dashboard/insert/tracker?itemId=<?php echo $row['id']; ?>" role="button">
      การจัดส่ง <i class="fa fa-file"></i></a>
      </td>
      <td><a href="/thecart/dbadmin/assets/img/bill/<?php echo $row['pic']; ?>" target="_blank"><img height="70" width="70" src="/thecart/dbadmin/assets/img/bill/<?php echo $row['pic']; ?>" border="0"></a></td>
      </tr>
      <?php 
      }?>
            
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
