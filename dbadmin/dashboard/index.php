<?php
error_reporting(0);
include '../../config/connect.php';
include_once('../../config/functions.php');
include 'config/header.php'; 
include 'config/nav.php'; 
session_start();
?>
    
    <section class="content">
      <div class="container-fluid">
        <?php include 'config/card/card.php'; ?>
        <div class="row">
            <!-- content -->
            <div class="col-md-6">
                  <div class="card card-chart">
                    <div class="card-header card-header-info">
                      <div class="ct-chart" id="piechwart"></div>
                    </div>
                    <div class="card-body">
                      <h4 class="card-title">จำนวนสินค้าที่ขายไปของร้าน</h4>
                      <p class="card-category">
                        <span class="text-success"><i class="fa fa-long-arrow-up"></i></span> จำนวนสินค้าที่ขายออกไปทั้งหมดของร้าน.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-chart">
                    <div class="card-header card-header-info">
                      <div class="ct-chart" id="barchart"></div>
                    </div>
                    <div class="card-body">
                      <h4 class="card-title">จำนวนสินค้าที่ขายไปของร้าน</h4>
                      <p class="card-category">
                        <span class="text-success"><i class="fa fa-long-arrow-up"></i></span> จำนวนสินค้าที่ขายออกไปทั้งหมดของร้าน.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                <div class="card">
                  <div class="card-header card-header-warning">
                    <h4 class="card-title">สินค้าขายดีของทางร้าน</h4>
                  </div>
                  <div class="card-body table-responsive">
                  <table class="table table-hover" id="example"> 
                  <hr>
                  <thead>
                  <tr>
                  <th>รหัสสินค้า</th>
                  <th>ชื่อสินค้า</th>
                  <th align = 'right'>ราคา</th>
                  <th>จำนวนการขาย</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  while($row8 = mysqli_fetch_array($result8)) {
                          ?>
                  <tr>
                  <td><?php echo $row8['product_code']; ?></td>
                  <td><?php echo $row8['product_name']; ?></td>
                  <td align = 'right'><?php echo number_format($row8['product_price']).' บาท'; ?></td>
                  <td><?php echo $row8['order_detail_quantity'].' รายการ'; ?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  </tbody>
                  </table>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header card-header-warning">
                    <h4 class="card-title">สินค้าที่ใกล้หรือหมดสต๊อค</h4>
                  </div>
                  <div class="card-body table-responsive">
                  <table class="table table-hover" id="example2"> 
                  <hr>
                  <thead>
                  <tr>
                  <th>รหัสสินค้า</th>
                  <th>ชื่อสินค้า</th>
                  <th align = 'right'>ราคา</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  while($row9 = mysqli_fetch_array($result9)) {
                          ?>
                  <tr>
                  <td><?php echo $row9['product_code']; ?></td>
                  <td><?php echo $row9['product_name']; ?></td>
                  <td align = 'right'><?php echo number_format($row9['product_price']).' บาท'; ?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  </tbody>
                  </table>
                  </div>
                </div>
              </div>

            <!-- content -->   
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php 
include 'config/jqscript.php';
include 'config/footer.php';
include 'config/scchart.php';
?> 
