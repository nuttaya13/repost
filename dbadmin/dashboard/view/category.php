<?php
error_reporting(0);
include '../../../config/connect.php';
include_once('../../../config/functions.php');
include '../config/header.php'; 
include '../config/nav.php'; 
session_start();

$sql8 = "SELECT * FROM products where id and product_name ";
$result8 = $conn->query($sql8);
?>
    <section class="content">
    <div class="content">
        <div class="container-fluid">
         <?php include '../config/card/card.php' ?>
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">รายงานสินค้า</h4>
                </div>
            <div class="card-body table-responsive">
            <div class="form-group">
            <form action="" method="post">
            <div class="form-group row">
            <div class="col-xs-2">
            <div class="col-xs-2">
            <a class="btn btn-warning" href="../insert/category" role="button">
                เพิ่มหมวดหมู่ <i class="fa fa-plus"></i></a>
            </div>
            </div>
            <div class="card-body table-responsive">
            <div class="form-group">
                <table class="table table-hover" id="example">
                  <thead class=" text-primary">
                  
                    <th class="text-primary">#</th>
                    <th class="text-primary">เลขหมวดหมู่</th>
                    <th class="text-primary">ชื่อหมวดหมู่</th>
                    <th class="text-primary"></th>
                    </thead>
                  <tbody>
                  <?php

                        $sname = $_POST['sname'];
                        $perpage = 4;
                        if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        } else {
                        $page = 1;
                        }
                        $start = ($page - 1) * $perpage;
                        $products = new DB_con();
                        $sql = $products->fetchdatacategory();
                        while($row = mysqli_fetch_array($sql)) 
                        {
                        ?>
                    <tr>
                      
                    <td><img height="100" width="100" src="../../assets/img/category/<?php echo $row['catPic']; ?>" alt=""></td>     
                      <td><?php echo $row['catId'];?></td>
                      <td><?php echo $row['catName'];?></td>
                      <td>
                      <a class="btn btn-danger"  href="../delete/deletecategory?user_id=<?php echo $row['catId']; ?>" role="button">
                      ลบ <i class="fa fa-trash"></i></a>
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
