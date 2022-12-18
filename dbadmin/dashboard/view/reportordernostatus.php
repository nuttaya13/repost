<?php
error_reporting(0);
include '../../../config/connect.php';
include_once('../../../config/functions.php');
include '../config/header.php'; 
include '../config/nav.php'; 
session_start();
$sql = "SELECT orders.id ,order_date,fullname,status_name,orders.status_id,color,report_id FROM orders,tblusers,status_cash 
  where status_cash.status_id=orders.status_id and tblusers.id=orders.cust_id and orders.status_id = 0 order by orders.id DESC ";
  $query = mysqli_query($conn, $sql);
?>
    <section class="content">
    <div class="content">
        <div class="container-fluid">
         <?php include '../config/card/card.php' ?>
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">รายงานการสั่งซื้อรอชำระ</h4>
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
              </tr>
              </thead>
              <tbody>

              <?php 
              $userid = $_SESSION['role_id'];
              $updateuser = new DB_con();            
              if($userid==1)  
              { 
                $sql = $updateuser->fetchdata_order_detail_admin($userid);
                while($row = mysqli_fetch_assoc($query)){ $status_id=$row['status_id']; ?>
              <tr>
              <td><?php echo $row['report_id']; ?></td>
              <td><?php echo $row['order_date']; ?></td>
              <td><?php echo $row['fullname']; ?></td>
              <td><span class="badge badge-secondary" style="background-color:<?php echo $row['color']; ?>"><?php echo $row['status_name']; ?></span></td>
              <td>
              <a class="btn btn-primary" href="/thecart/config/mpdf/printdata/<?php echo $row['id']; ?>" role="button">
              ใบเสร็จ <i class="fa fa-file"></i></a>
              </td>
              </tr>
              <?php }}
              else
              {
                $sql = $updateuser->fetchdata_order_detail($userid);
                while($row = mysqli_fetch_array($sql)) { $status_id=$row['status_id']; ?>

              <tr>
              <td> <a href="order_detail_1?order_id=<?php echo $row['id']; ?>"><?php echo $row['id']; ?></a></td>
              <td><?php echo $row['order_date']; ?></td>
              <td><?php echo $_SESSION['fname']; ?></td> 
              <td><?php echo $row['status_name']; ?></td>
              <td><span class="badge badge-secondary" style="background-color:<?php echo $row['color']; ?>"><?php echo $row['status_name']; ?></span></td>
              <td>
              <a class="btn btn-success" href="/thecart/config/mpdf/printdata/<?php echo $row['id']; ?>" role="button">
              ใบเสร็จ <i class="fa fa-file"></i></a>

              <?php if($status_id==0) : ?>
              <td>
              <a class="btn btn-info" href="cashout?order_id=<?php echo $row['id']; ?>" role="button">
              ชำระเงิน <i class="fa fa-credit-card"></i></a>
              </td>
              <?php endif; ?> 
              <td>
              <a class="btn btn-info" href="cashout?order_id=<?php echo $row['id']; ?>" role="button">
              ชำระเงิน <i class="fa fa-credit-card"></i></a>
              </td>

              </tr>

              <?php }
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
