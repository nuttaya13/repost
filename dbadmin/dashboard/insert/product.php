<?php
error_reporting(0);
include("../config/file-upload.php"); 
include '../../../config/connect.php';
include_once('../../../config/functions.php');
include '../config/header.php'; 
include '../config/nav.php'; 
session_start();
$sqlcat = "SELECT * FROM categories";
$resultcat2 = $conn->query($sqlcat);
$sqlc = "SELECT * FROM products where id  order by id DESC";
$resultc = $conn->query($sqlc);
$rowc = $resultc ->fetch_assoc();
?>
    <section class="content">
    <div class="content">
        <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">เพิ่มสินค้า</h4>
                </div>
                <div class="card-body table-responsive">
                <div class="form-group">
                <form action="" method="post" enctype="multipart/form-data" class="mb-3">
     
       
     <div class="mb-3">
         <label for="product_code" class="form-label">รหัสสินค้า</label>
         <input type="text" class="form-control" id="product_code" name="product_code" value=""  >
     </div>
     <div class="mb-3">
         <label for="product_name" class="form-label">ชื่อสินค้า</label>
         <input type="text" class="form-control" id="product_name" name="product_name" onblur="checkusername(this.value)">
         <span id="usernameavailable"></span>
     </div>
     <div class="mb-3">
     <label for="product_desc" class="form-label">รายละเอียดสินค้า</label>
         <input type="text" class="form-control" id="product_desc" name="product_desc">
     </div>

     <div class="mb-3">
     <label for="product_desc" class="form-label">หมวดหมู่สินค้า</label></label>
     <select name="catId" id="catId" class="form-control">
                   <option value=""></option>
                   <?php while($resultcat = mysqli_fetch_assoc($resultcat2)): ?>
                       <option value="<?=$resultcat['catId']?>"><?=$resultcat['catName']?></option>
                   <?php endwhile; ?>
     </select>
     </div>
     
     <div class="mb-3">
         <label for="product_price" class="form-label">ราคา</label>
         <input type="text" class="form-control" id="product_price" name="product_price">
     </div>

     <div class="user-image mb-3 text-center">
       <div style="width: 100px; height: 100px; overflow: hidden; background: #cccccc; margin: 0 auto">
         <img src="..." class="figure-img img-fluid rounded" id="imgPlaceholder" alt="">
       </div>
     </div>

     <div class="custom-file">
       <input type="file" name="fileUpload" class="custom-file-input" id="chooseFile">
       <label class="custom-file-label" for="chooseFile">Select file</label>
     </div>

 <button type="submit" name="submit" class="btn btn-warning btn-block mt-4">
   เพิ่มสินค้า
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
