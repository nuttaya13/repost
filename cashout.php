<?php
   error_reporting(0);

   include_once('config/functions.php');
   include("config/file-upload2.php"); 
$updatedata = new DB_con();
   $order_id = $_GET['order_id'];
   $updateuser = new DB_con();
   $sql = $updateuser->fetchorder_detail($order_id);
   $row = mysqli_fetch_array($sql); 
?>
	</div>
  <section id="cart_items">
	<!-- New Arrivals section start -->
    <div class="layout_padding gallery_section">
        <div class="container">
    <div class="col-md-12">
                    <div class="single-sidebar ">
                        <table class="table table-hover table-dark">
                        <tr><br>
                        <th>ธนาคาร</th>
                        <th>ชื่อบัญชี</th>
                        <th>เลขที่บัญชี</th>
                        <th></th>
                        </tr>

                        <tr class = "  ">
                        <td>กรุงไทย</td>
                        <td>ชื่อร้าน</td>
                        <td>xxx-xxx-xxxx</td>
                        <td><img  height="80" width="80" src="https://tna.mcot.net/wp-content/uploads/2017/06/1497083701751.jpg" alt=""></td>
                        </tr>
                        </table>
                   
                        <table class="table table-hover table-dark">
                        <tr class="cart_menu"><br>
                        <th>ลำดับ</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคาสินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคาสุทธิ</th>
                        </tr>   
                        <?php 
                        $i = 0;
                        $total=0;

                        $order_id = $_GET['order_id'];
                        $updateuser = new DB_con();
                        $sql = $updateuser->fetchorder_detail($order_id);
                        while($row = mysqli_fetch_array($sql)) {$i++;
                        $sumqty= $row['order_detail_quantity']*$row['order_detail_price'];
                        $total+= $sumqty; ?>
                        <tr class = "  ">
                        <td><?=$i;?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['order_detail_price']; ?></td>
                        <td><?php echo $row['order_detail_quantity']; ?></td>
                        <td align = 'right'><?php echo number_format( $sumqty)." บาท.-"; ?></td>
                        <?php } ?></tr></table>
                        <div class="card">
                        <div class=" register-req">
                            <center><marquee><h2>แนบภาพสลิปโอนเงิน</h2></marquee></center>
                            <form action="" method="post" enctype="multipart/form-data" class="mb-3">
                            <div class="mb-3">
                            <input type="text" class="form-control" style="width: 300px; display: none;" id="order_id" name="order_id" value="<?php echo $order_id ?>">
                            </div>
                                <div class="mb-3">
                                      <select name="status_id" id="status_id" class="form-control" style="width: 300px; display: none;">
                                        <option value="1">ชำระเงิน</option>
                                      </select>
                                      </div>
                                      <div class="user-image mb-3 text-center">
                                  
                                </div>
                                <div class="user-image mb-3 text-center">
                                  <div style="width: 300px; height: 400px; overflow: hidden; background: #cccccc; margin: 0 auto">
                                    <img src="..." class="figure-img img-fluid rounded" id="imgPlaceholder" alt="">
                                  </div>
                                </div>
                                <div class="custom-file">
                                  <input type="file" name="fileUpload" class="custom-file-input" id="chooseFile">
                                  <label class="custom-file-label" for="chooseFile">เลือกสลิปที่ชำระเงิน</label>
                                </div>
                                <button type="submit" name="submit" class="btn btn-danger btn-block mt-4">
                                  ชำระเงิน
                                </button><br>
                              </form>
                              </div>
    		</div>
    	</div>
        </div>
    	</div><br>
        
    </div>
  
   	<!-- New Arrivals section end -->
	<!-- section footer start -->
    <?php 
    include 'dbadmin/dashboard/config/jqscript.php';
    include 'config/footer.php';
    ?>
