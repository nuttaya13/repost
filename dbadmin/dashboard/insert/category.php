<?php
error_reporting(0);
include("../config/file-upload2.php"); 
include '../../../config/connect.php';
include_once('../../../config/functions.php');
include '../config/header.php'; 
include '../config/nav.php'; 
session_start();
$sqlc = "SELECT * FROM products where id  order by id DESC";
$resultc = $conn->query($sqlc);
$rowc = $resultc ->fetch_assoc();

$sqlcat = "SELECT * FROM categories where catId order by catId DESC";
$resultcat = $conn->query($sqlcat);

$sqlplace = "SELECT * FROM tblplace where placeid order by placeid DESC";
$resultplace = $conn->query($sqlplace);

$role = $_SESSION['role_id'];
?>
    <section class="content">
    <div class="content">
        <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">เพิ่มหมวดหมู่สินค้า</h4>
                </div>
                <div class="card-body table-responsive">
                <div class="form-group">
                <form action="" method="post" enctype="multipart/form-data" class="mb-3">
          <hr>
          <div class="row">
       <div class="col-sm">
  
       <div class="mb-2">
            <label for="product_name" class="form-label">ชื่อหมวดหมู่</label>
            <input type="text" class="form-control" id="catName" name="catName" onblur="checkusername(this.value)">
            <span id="usernameavailable"></span>
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
        </div>
        </div>
  
        <button type="submit" name="submit" class="btn btn-warning btn-block mt-4">
          เพิ่มหมวดหมู่
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
