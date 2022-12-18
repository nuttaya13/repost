<?php 
$sql44 = "SELECT sum(order_detail_price*order_detail_quantity) as price FROM order_details,orders where order_details.order_id=orders.id and month(order_date) = month(now())";
$result44 = $conn->query($sql44);
$row44 = $result44 ->fetch_assoc();

$sql5 = "SELECT sum(order_detail_price) as price FROM order_details";
$result5 = $conn->query($sql5);
$row5 = $result5 ->fetch_assoc();

$sql6 = "SELECT count(id) as ord FROM orders";
$result6 = $conn->query($sql6);
$row6 = $result6 ->fetch_assoc();

$sql7 = "SELECT count(id) as cid FROM tblusers";
$result7 = $conn->query($sql7);
$row7 = $result7 ->fetch_assoc();

$sql8 = "SELECT product_code, product_price,order_detail_quantity , product_name,count(order_details.product_id) as ccc FROM order_details,products WHERE order_details.id and order_details.product_id=products.id group by order_details.product_id";
$result8 = $conn->query($sql8);

$sql9 = "SELECT * FROM products WHERE id and qty<1";
$result9 = $conn->query($sql9);
?>
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo number_format($row5["price"]); ?> </h3>

                <p>รายได้ทั้งหมด</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo number_format($row44["price"]); ?></h3>

                <p>รายได้ต่อเดือน</p>
                
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $row6["ord"]; ?></h3>

                <p>จำนวนออเดอร์</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $row7["cid"]; ?></h3>

                <p>จำนวนสมาชิก</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>