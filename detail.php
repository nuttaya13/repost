<?php
session_start();
include_once('config/functions.php');
include_once('config/connect.php');
error_reporting(0);

$sql = "SELECT orders.id ,order_date,fullname,status_name,orders.status_id,color FROM orders,tblusers,status_cash 
    where status_cash.status_id=orders.status_id and tblusers.id=orders.cust_id order by orders.id DESC ";
    $query = mysqli_query($conn, $sql);
    include 'config/header.php' ;
?>

<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>My Orders</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
<section id="cart_items">
  
<div class="table-responsive cart_info">
<div class="container">
  <div class="">
  <hr>
			<div class="heading">
				<h3>ข้อมูลรายการสั่งซื้อ</h3>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
            <table class="table table-bordered">
              <thead>
                <th>ชื่อลูกค้า</th>
                <th>ที่อยู่</th>
                <th>อีเมล</th>
              </thead>
              <tr>
                <td><?php echo $_SESSION['fname']; ?></td>
                <td><?php echo $_SESSION['custaddr']; ?></td>
                <td><?php echo $_SESSION['email']; ?></td>
              </tr>
            </table>
						
					</div>
				</div>
			</div>
		</div>
   
	<!-- New Arrivals section start -->
    <div class="layout_padding gallery_section">
    	<div class="container">
    		<div class="row">
        <table class="table table-condensed table-bordered" id="example">
          <thead>
          <tr class="cart_menu">
          <th>เลขที่สั่งซื้อ</th>
          <th>วันที่สั่งซื้อ</th>
          <th>ชื่อลูกค้า</th>
          <th>สถานะ</th>
          <th>จัดการ</th>
          </tr>
          </thead>
          <tbody>

          <?php 
          $userid = $_SESSION['id'];
          $updateuser = new DB_con();                         
          
          $sql = $updateuser->fetchdata_order_detail($userid);
          while($row = mysqli_fetch_array($sql)) { $status_id=$row['status_id']; ?>

          <tr>
          <td><?php echo $row['report_id']; ?></td>
          <td><?php echo $row['order_date']; ?></td>
          <td><?php echo $_SESSION['fname']; ?></td> 
          <td><span class="badge badge-secondary" style="background-color:<?php echo $row['color']; ?>"><?php echo $row['status_name']; ?></span></td>
          <td>
          <a class="btn btn-success" href="config/mpdf/printdata/<?php echo $row['id']; ?>" role="button">
          ใบเสร็จ <i class="fa fa-file"></i></a>
          <a class="btn btn-warning" href="config/tracker/<?php echo $row['id']; ?>" target="_blank" role="button">
          ข้อมูลการจัดส่ง <i class="fa fa-file"></i></a>
          <?php if($status_id==0) : ?>
          <a class="btn btn-success" href="cashout/<?php echo $row['id']; ?>" role="button">
          ชำระเงิน <i class="fa fa-credit-card"></i></a>
          <?php endif; ?> 
          <?php if($status_id==1) : ?>
          <a class="btn btn-success" href="cashout/<?php echo $row['id']; ?>" role="button" disabled>
          ชำระแล้ว <i class="fa fa-credit-card"></i></a>
          <?php endif; ?> 
          </td>
          
          </tr>
          </tbody>
          <?php }?>
          </table>	
    		</div>
    	</div>
    </div>
  </div>
  <hr>
    <?php include 'config/footer.php' ?>