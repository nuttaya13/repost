<?php
error_reporting(0);
include 'header.php'; 
include 'nav.php'; 
session_start();
error_reporting(0);
include("../../../config/connect.php");
include("../../../config/functions.php");

$rid = $_GET['repair_id'];

    $sql = "SELECT * FROM products  where id ='$rid'";
    $result = $conn->query($sql);
    $mem = $result ->fetch_assoc();

    $updatedata2 = new DB_con();

    if (isset($_POST['update'])) {

        $uid = $_POST['uid'];
        $ucredit = $_POST['ucredit'];
        $uprice = $_POST['uprice'];
        
        $sqll = $updatedata2->updateqty($ucredit,$uid);
        if ($sqll) {
            $sql2 = $updatedata2->insertpdata($uid,$ucredit,$uprice);
        
            echo "<script>alert('เพิ่มรายการเรียบร้อย');</script>";
             echo "<script>window.location.href='../view/product'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='changeqty?repair_id=$rid'</script>";
        }
    }

?>
    <section class="content">
    <div class="content">
        <div class="container-fluid">
          
          
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">เพิ่มจำนวนสินค้า</h4>
            </div>
            <div class="card-body">
              <div id="typography">

	<div class="modal-body">
		
                    
        <div class="row" >    
            <div class="col-md-12" id="repair_cause">
				<label class="control-label">ชื่อสินค้า :</label>
					<?php echo $mem['product_name'] ;?>
            </div>
        </div>

        <div class="row" >    
            <div class="col-md-12" id="repair_cause">
				<label class="control-label">จำนวนคงเหลือ :</label>

                <?php echo $mem['qty'] ;?>
					
            </div>
        </div>
   
       <form action="" method="post" enctype="multipart/form-data" class="mb-3">
          
        <hr>
        <div class="row">
        <div class="col-sm">

            <div class="mb-2">
                <input type="text" style="display:none" class="form-control" id="uid" name="uid" value="<?php echo $mem['id'] ;?>">
            </div>

            <div class="mb-2">
                <label for="qty" class="form-label">เพิ่มจำนวน</label>
                <input type="text" class="form-control" id="ucredit" name="ucredit" value="">
                
            </div>

            <div class="mb-2">
                <label for="qty" class="form-label">ราคาต่อชิ้น</label>
                <input type="text" class="form-control" id="uprice" name="uprice" value="">
                
            </div>
            <button type="submit" name="update" class="btn btn-primary btn-block mt-4" onclick="showNotification2('top','right')">
                เพิ่มข้อมูล
            </button>

     
    </form>
</div>
</div>

<!-- content -->
    </section>
  </div>
<?php 
include 'jqscript.php';
include 'footer.php';
include 'scchart.php';
?> 
