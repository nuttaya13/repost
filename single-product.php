<?php 
include 'config/header.php';
include 'config/functions.php';
$pid=$_GET['id'];
?>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Carts</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
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
                            <h2><a href="/thecart/single-product/<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></a></h2>
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
                <?php
                $products = new DB_con();
                $sql = $products->fetchdata_1_product($pid);
                while($row1 = mysqli_fetch_array($sql)) 
                {
                    
                ?>
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="index">Home</a>
                            <a><?php echo $row1['product_name']; ?></a>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="/thecart/dbadmin/assets/img/product/<?php echo $row1['product_img_name']; ?>" onerror="this.src='/thecart/assets/img/nopic.jpg';" alt="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $row1['product_name']; ?></h2>
                                    <div class="product-inner-price">
                                        <ins><?php echo $row1['product_price']; ?></ins>
                                    </div>    
                                    
                                    <form action="" class="cart">
                                    <?php if($row1['qty']>=1) : ?>
                                    <p class="card-text add-to-cart-link"><span class="badge badge-secondary" style="background-color:#000000">คงเหลือจำนวน <?php echo $row1['qty']; ?></span></p>
                                    <div class="product-option-shop">
                                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/thecart/config/updatecart.php?catId=<?php echo $catId; ?>&itemId=<?php echo $row1['id']; ?>"><i class="fa fa-shopping-cart"></i>หยิบใส่ตระกร้า</a>
                                    </div>  
                                    <?php endif; ?> 

                                    <?php if($row1['qty']<=0) : ?>
                                    <p class="card-text add-to-cart-link"><span class="badge badge-secondary" style="background-color:red">สินค้าหมด</span></p>
                                    <div class="product-option-shop">
                                    </div>
                                    <?php endif; ?> 
                                    </form>   
                                    
                                    
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a  aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>รายละเอียดสินค้า</h2>  
                                                <?php echo $row1['product_desc']; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
                <?php } ?>
            </div>
        </div>
    </div>


    <?php 
    include 'config/footer.php';
    ?>