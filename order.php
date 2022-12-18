<?php
session_start();
include_once('config/functions.php');
error_reporting(0);
include 'config/header.php' ;
$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
$_SESSION['formid'] = sha1('' . microtime());
if (isset($_SESSION['qty'])) {
$meQty = 0;
foreach ($_SESSION['qty'] as $meItem) {
$meQty = $meQty + $meItem;
}
} else {
$meQty = 0;
}
if (isset($_SESSION['cart']) and $itemCount > 0) {
$itemIds = "";
foreach ($_SESSION['cart'] as $itemId) {
$itemIds = $itemIds . $itemId . ",";
}
$inputItems = rtrim($itemIds, ",");
$meSql = "SELECT * FROM products WHERE id in ({$inputItems})";
$result = $conn->query($meSql); 
$meCount = mysqli_num_rows($result);
} else {
$meCount = 0;
}
$sql1 = "SELECT MAX(`id`) AS `lastid` FROM `orders`";
$result1 = $conn->query($sql1);
$row1 = $result1 ->fetch_assoc();
$idf = $row1['lastid'];
$date = date('ym-d');
$code = sprintf($date.'-%04d', $idf);
?>
	
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->

	<section id="cart_items">
		<div class="container">
			<form action="config/updateorder.php" method="post" name="formupdate" role="form" id="formupdate" onsubmit="JavaScript:return updateSubmit();">
			<div class="container">
			<div class="step-one"><br>
				<h2 class="heading">รายละเอียดออเดอร์</h2>
			</div>
			<div class="checkout-options">
			
                        <div class="thubmnail-recent">

                            <table class="table table-condensed">
                                <tbody>
                                    <tr class="cart_menu">
                                    <input type="text" class="form-control" id="order_fullname" placeholder="ใส่ชื่อนามสกุล" style="width: 300px; display: none;" name="order_fullname" value="<?php echo $_SESSION['id']; ?>" >
                                        <th>เลขที่ใบสั่งซื้อ</th>
                                        <td><input type="text" class="form-control" id="report_id" placeholder="" style="width: 200px; display: none;" name="report_id" value="<?php echo $code; ?>"> <?php echo $code; ?></td>
                                    </tr>

                                    <tr class="shipping">
                                        <th>ชื่อผู้สั่งซื้อ</th>
                                        <td><?php echo $_SESSION['fname']; ?></td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>ที่อยู่จัดส่ง</th>
                                        <td><?php echo $_SESSION['custaddr']; ?></td>
                                    </tr>
									<tr class="shipping">
                                        <th>วันที่สั่งซื้อ</th>
                                        <td><?php echo date('d-m-Y') ?></td>
                                    </tr>
                                </tbody>
                            </table>             
                        </div>
                </div>

			<!--/checkout-options-->

			<div class="register-req">
				<p><- กรุณาตรวจสอบรายละเอียดการสั่งซื้อให้ครบถ้วน -></p>
			</div><!--/register-req-->
			
			
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
			<table class="table table-bordered">
                <thead>
                <tr class="cart_menu">
                <th>รหัสลูกค้า</th>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>จำนวน</th>
                <th>ราคาต่อหน่วย</th>
                <th>จำนวนเงิน</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $total_price = 0;
                $num = 0;
                while($meResult = mysqli_fetch_array($result)) 
                {
                $key = array_search($meResult['id'], $_SESSION['cart']);
                $total_price = $total_price + ($meResult['product_price'] * $_SESSION['qty'][$key]);
                ?>
                <tr>
                <td><?php echo $_SESSION['id']; ?></td>
                <td><?php echo $meResult['product_code']; ?></td>
                <td><?php echo $meResult['product_name']; ?></td>
                <td>
                <?php echo $_SESSION['qty'][$key]; ?>
                <input type="hidden" name="qty[]" value="<?php echo $_SESSION['qty'][$key]; ?>" />
                <input type="hidden" name="product_id[]" value="<?php echo $meResult['id']; ?>" />
                <input type="hidden" name="product_price[]" value="<?php echo $meResult['product_price']; ?>" />
                </td>
                <td><?php echo number_format($meResult['product_price'], 2); ?></td>
                <td><?php echo number_format(($meResult['product_price'] * $_SESSION['qty'][$key]), 2); ?></td>
                </tr>
                <?php
                $num++;
                }
                ?>
                <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>ราคารวม</b></td>
                <td colspan="8" style="text-align: right;">
                <b><?php echo number_format($total_price, 2); ?> บาท</b>
                </td>
                </tr>
                <tr>
                <td colspan="8" style="text-align: right;">
                <input type="hidden" name="formid" value="<?php echo $_SESSION['formid']; ?>"/>
                <a href="cart.php" type="button" class="add_to_cart_button">ย้อนกลับ</a>
                <button type="submit" class="add_to_cart_button">บันทึกการสั่งซื้อสินค้า</button>
                </td>
                </tr>
                </tbody>
                </table>
                </form>
			</div>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<?php include 'config/footer.php' ?>