<?php
error_reporting(0);
include("../config/file-upload.php"); 
include '../../../config/connect.php';
include_once('../../../config/functions.php');
include '../config/header.php'; 
include '../config/nav.php'; 
session_start();
$userdata = new DB_con();

if (isset($_POST['submit'])) {
  $order_id = $_GET['itemId'];
  $shipping = $_POST['shipping'];
  $trackid = $_POST['tracknumber'];
  $datestart = $_POST['datestart'];
  $dateend = $_POST['dateend'];

  $sql = $userdata->inserttrack($order_id, $shipping,$trackid, $datestart,$dateend);

  if ($sql) {
      echo "<script>alert('ทำรายการเรียบร้อย');</script>";
      echo "<script>window.location.href='/thecart/dbadmin/dashboard/view/reportorder'</script>";
  } else {
      echo "<script>alert('Something went wrong! Please try again.');</script>";
      echo "<script>window.location.href='/thecart/dbadmin/dashboard/view/reportorder'</script>";
  }
}
?>
    <section class="content">
    <div class="content">
        <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">ข้อมูลการจัดส่ง</h4>
                </div>
                <div class="card-body table-responsive">
                <div class="form-group">
                <form action="" method="post" enctype="multipart/form-data" class="mb-3">
          <hr>
          <div class="row">
       <div class="col-sm">
  
       <div class="mb-2">
            <label for="product_name" class="form-label">ชื่อบริษัทขนส่ง</label>
            <input type="text" class="form-control" id="shipping" name="shipping" onblur="checkusername(this.value)">
            <span id="usernameavailable"></span>
       </div>
       <div class="mb-2">
            <label for="product_name" class="form-label">เลขพัสดุ</label>
            <input type="text" class="form-control" id="tracknumber" name="tracknumber" onblur="checkusername(this.value)">
            <span id="usernameavailable"></span>
       </div>
       <div class="mb-2">
            <label for="product_name" class="form-label">วันที่จัดส่ง</label>
            <input type="date" class="form-control" id="datestart" name="datestart" onblur="checkusername(this.value)">
            <span id="usernameavailable"></span>
       </div>
       <div class="mb-2">
            <label for="product_name" class="form-label">วันที่รับสินค้า</label>
            <input type="date" class="form-control" id="dateend" name="dateend" onblur="checkusername(this.value)">
            <span id="usernameavailable"></span>
       </div>
              
        
        </div>
        </div>
  
        <button type="submit" name="submit" class="btn btn-warning btn-block mt-4">
          ทำรายการ
        </button>
      </form>
      </div>
      </div>
    </section>
  </div>
<?php 
include '../config/jqscript.php';
include '../config/footer.php';
include '../config/scchart.php';
?> 
