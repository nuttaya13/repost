
<?php 
include 'config/header.php'; 
include 'config/functions.php'; 
error_reporting(0);
  
    $action = isset($_GET['a']) ? $_GET['a'] : "";
    $itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    if (isset($_SESSION['qty']))
    {
    $meQty = 0;
    foreach ($_SESSION['qty'] as $meItem)
    {
    $meQty = $meQty + $meItem;
    }
    } else
    {
    $meQty = 0;
    }
    if (isset($_SESSION['cart']) and $itemCount > 0)
    {
    $itemIds = "";
    foreach ($_SESSION['cart'] as $itemId)
    {
    $itemIds = $itemIds . $itemId . ",";
    }
    $inputItems = rtrim($itemIds, ",");
    $meSql = "SELECT * FROM products WHERE id in ({$inputItems})";
    $result = $conn->query($meSql); 
    $meCount = mysqli_num_rows($result);
    } else
    {
    $meCount = 0;
    }

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
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <?php
                        $products = new DB_con();
                        $sql = $products->fetchdataproduct1();
                        $rowcount=mysqli_num_rows($sql);
                            if($rowcount<=0){
                            echo "<div class=\"alert alert-warning\">ไม่พบสินค้า</div>";
                            }
                            else{
                        while($row = mysqli_fetch_array($sql)) 
                        {
                            
                        ?>
                        <div class="thubmnail-recent">
                            <img src="/thecart/dbadmin/assets/img/product/<?php echo $row['product_img_name']; ?>" onerror="this.src='/thecart/assets/img/nopic.jpg';" class="recent-thumb" alt="">
                            <h2><a href="single-product/<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></a></h2>
                            <div class="product-sidebar-price">
                            <?php if($row['qty']>=1) : ?>
                            <p class="card-text add-to-cart-link"><span class="badge badge-secondary" style="background-color:#000000">คงเหลือจำนวน <?php echo $row['qty']; ?></span></p>
                             
                            <?php endif; ?> 

                            <?php if($row['qty']<=0) : ?>
                            <p class="card-text add-to-cart-link"><span class="badge badge-secondary" style="background-color:red">สินค้าหมด</span></p>
                            <?php endif; ?> 
                                <ins><?php echo number_format($row['product_price'],2); ?> บาท</ins>
                            </div>                             
                        </div>
                        <?php } }?>	
                    </div>
                    
                   
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                        <form action="config/updatecart.php" method="post" name="fromupdate">
                            <?php
                        if ($action == 'removed')
                            {
                            echo "<div class=\"alert alert-warning\">ลบสินค้าเรียบร้อยแล้ว</div>";
                            }
                        
                        if ($meCount == 0)
                            {
                            echo "<div class=\"alert alert-warning\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
                            } else
                            {
                        ?>
                                <table cellspacing="0" class="shop_table cart">
                                <thead>
                        <tr class="cart_menu">
                        <th></th>   
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคาต่อหน่วย</th>
                        <th>จำนวนเงิน</th>
                        <th>&nbsp;</th>
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
                        <td>
                        <a class="btn btn-light " href="config/removecart.php?itemId=<?php echo $meResult['id']; ?>" role="button">
                        <i class="fa fa-minus-circle"></i></a>
                        </td>
                        <td><?php echo $meResult['product_code']; ?></td>
                        <td><?php echo $meResult['product_name']; ?></td>
                        <td>
                        <input type="number" name="qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['qty'][$key]; ?>" class="form-control" style="width: 60px;text-align: center;">
                        <input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">
                        </td>
                        <td><?php echo number_format($meResult['product_price'],2); ?></td>
                        <td><?php echo number_format(($meResult['product_price'] * $_SESSION['qty'][$key]),2); ?></td>
                        <td><img height="100" width="100"  src="/thecart/dbadmin/assets/img/product/<?php echo $meResult['product_img_name']; ?>" onerror="this.src='/thecart/assets/img/nopic.jpg';" border="0"></td>
                        </tr>
                        <?php
                        $num++;
                        }
                        ?>
                        <tr>
                        </tr>
                        <tr>
                        <td colspan="8" style="text-align: right;">
                        <a href="shop" type="button" class="add_to_cart_button">เลือกสินค้า</a>
                        <button type="submit" class="add_to_cart_button">คำนวณราคาใหม่</button>
                        <a href="order" type="button" class="add_to_cart_button">สั่งซื้อสินค้า</a>
                        </td>
                        </tr>
                        </tbody>
                                </table>
                                <?php } ?>
                            </form>

                            <div class="cart-collaterals">


                            <div class="cross-sells">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>ชื่อลูกค้า</th>
                                            <td><span><?php echo $_SESSION['fname']; ?></span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>วันที่สั่งซื้อ</th>
                                            <td><span><?php echo date('d-m-Y') ?></span></td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>จำนวนสินค้า</th>
                                            <td><strong><span><?php echo $meQty ?> ชิ้น</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>ราคารวม</th>
                                            <td><span><?php echo number_format($total_price,2); ?> บาท</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>ค่าจัดส่ง</th>
                                            <td><span>Free</span></td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>รวมเป็นเงิน</th>
                                            <td><strong><span><?php echo number_format($total_price,2); ?> บาท</b></span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <?php include 'config/footer.php' ?>