    <?php 
    include 'config/header.php';
    include 'config/functions.php';
    $sqlcolor = "SELECT * FROM categories";
    $resultcolor = $conn->query($sqlcolor);
    ?>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2 >Products </h2>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="container">
    <div class="row">
    <div class="col-lg-2">
    <form class="mb-3" name="frmSearch" method="post" action="">
    <div id="customer_details" class="col2-set">
        <select  class="country_to_state country_select"  name="txtKeyword" id="catId" ">
            <option value="">เลือกหมวดหมู่</option>
            <?php while($resultcolor2 = mysqli_fetch_assoc($resultcolor)): ?>
                <option value="<?=$resultcolor2['catId']?>"><?=$resultcolor2['catName']?></option>
            <?php endwhile; ?>
        </select>
        
    
    </div>
    </div>
    <button class="add_to_cart_button" name="submit" type="submit" >ค้นหา</button>
    </form>
    </div>
    </div>
    <div class="single-product-area">
        <div class="container">
            <div class="row">
                <?php
                $strKeyword = null;
                if(isset($_POST["submit"]))
                {
                $strKeyword = $_POST["txtKeyword"];
                $perpage = 12;
                if (isset($_GET['page'])) {
                $page = $_GET['page'];
                } else {
                $page = 1;
                }
                
                $start = ($page - 1) * $perpage;
                $products = new DB_con();
                $sql = $products->fetchdata_product($strKeyword,$start,$perpage);
                }
                else{

                $perpage = 12;
                if (isset($_GET['page'])) {
                $page = $_GET['page'];
                } else {
                $page = 1;
                }
                
                $start = ($page - 1) * $perpage;
                $products = new DB_con();
                $sql = $products->fetchdataproduct($start,$perpage);
                }
                while($row = mysqli_fetch_array($sql)) 
                {   
                ?>
                
                <div class="col-md-3 col-sm-12">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="/thecart/dbadmin/assets/img/product/<?php echo $row['product_img_name']; ?>" class="img-fluid img-thumbnail" onerror="this.src='/thecart/assets/img/nopic.jpg';" style="width: 100%;" alt="">
                        </div>
                        <h2><a href="single-product/<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo number_format($row['product_price'],2); ?> บาท</ins>
                        </div>  
                        
                        <?php if($row['qty']>=1) : ?>
                        <p class="card-text add-to-cart-link"><span class="badge badge-secondary" style="background-color:#000000">คงเหลือจำนวน <?php echo $row['qty']; ?></span></p>
                        <div class="product-option-shop">
                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="config/updatecart.php?catId=<?php echo $catId; ?>&itemId=<?php echo $row['id']; ?>"><i class="fa fa-shopping-cart"></i>หยิบใส่ตระกร้า</a>
                        </div>  
                        <?php endif; ?> 

                        <?php if($row['qty']<=0) : ?>
                        <p class="card-text add-to-cart-link"><span class="badge badge-secondary" style="background-color:red">สินค้าหมด</span></p>
                        <div class="product-option-shop">
                        <a class="out_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow"><i class="fa fa-minus"></i> Coming Soon</a>
                        </div>
                        <?php endif; ?> 
                    </div>
                </div>
                <?php  } ?>	
            </div>
            <?php
            $sql2 = "select * from products ";
            $query2 = mysqli_query($conn, $sql2);
            $total_record = mysqli_num_rows($query2);
            $total_page = ceil($total_record / $perpage);
            ?>
            
            <nav>
            <ul class="pagination">
            <li>
            <a href="shop.php?page=1" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            </a>
            </li>
            <?php for($i=1;$i<=$total_page;$i++){ ?>
            <li><a href="shop.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
            <li>
            <a href="shop.php?page=<?php echo $total_page;?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
            </ul>
            </nav>
        </div>
    </div>
    
<?php include 'config/footer.php'; ?>