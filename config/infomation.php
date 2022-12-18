<?php
error_reporting(0);
session_start();
include_once('functions.php');
include_once('connect.php');
include 'header.php' ;
$id = $_GET['id'];
$sql = "SELECT * FROM tblusers where id ='$id'";
$result = $conn->query($sql);
$mem = $result ->fetch_assoc();
$pw = $mem['password'];
$updatedata = new DB_con();

if (isset($_POST['update'])) {

    $userid = $id;
    $fname = $_POST['fullname'];
    $uname = $_POST['username'];
    $email = $_POST['useremail'];
    $custaddr = $_POST['custaddr'];
    $date = $_POST['regdate'];

    if(empty($_POST['password'])){
    $password = $pw;
    $sql = $updatedata->update($fname, $uname, $email,$custaddr, $password, $date, $userid);
    }
    else{
    $password = md5($_POST['password']);
    $sql = $updatedata->update($fname, $uname, $email,$custaddr, $password, $date, $userid);
    }
    if ($sql) {
        $_SESSION['fname'] = $fname;
        $_SESSION['custaddr'] = $custaddr;
        $_SESSION['email'] = $email;
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "ทำรายการเรียบร้อย!",
            showConfirmButton: false,
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "/thecart/config/Infomation/'.$userid.'";';
        echo '}, 3000 );</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "ผิดพลาด!",
            text: "ไม่สามารถทำรายการได้!",
            type: "error",
            icon: "error"
        });';
        echo '}, 500 );</script>';
    }
}
?>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>ข้อมูลส่วนตัว</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
<section id="cart_items">

<div class="container">
  <div class="">
  <hr>
			<div class="heading">
      <div class="container-fluid">
          <div class="card">
                <div class="card-header card-header-info">
                  
                </div>
                <div class="card-body table-responsive">
                       <?php 

                        $userid = $_GET['id'];
                        $updateuser = new DB_con();
                        $sql = $updateuser->fetchonerecord($userid);
                        while($row = mysqli_fetch_array($sql)) {
                        ?>

                        <form action="" method="post">
                        <div class="mb-3">
                            <label for="firstname" class="form-label" style="color:">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" name="fullname" 
                                value="<?php echo $row['fullname']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label" style="color:">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" name="username"
                                value="<?php echo $row['username']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" style="color:">อีเมล</label>
                            <input type="email" class="form-control" name="useremail" 
                                value="<?php echo $row['useremail']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label" style="color:">ที่อยู่</label>
                            <input type="text" class="form-control" name="custaddr"
                                value="<?php echo $row['custaddr']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phonenumber" style="color:">รหัสผ่าน</label>
                            <input type="password" class="form-control" name="password"
                                value="" placeholder="กรอก Password ที่ต้องการแก้ไขค่ะ">
                        </div>
                        <div class="mb-3">
                            <label for="phonenumber" style="color:">วันที่สมัครสมาชิก</label>
                            <input type="text" class="form-control" name="regdate"
                                value="<?php echo $row['regdate']; ?>" required>
                        </div>
                        <?php } ?>
                        <br>
                        <button type="submit" name="update" class="btn btn-warning">แก้ไขข้อมูล</button>
                        </form>

			</div>
      </div>
      </div>
      </div>
      </div>
      </div>
			<div class="row">
				<div class="col-sm-6">
				
				</div>
			</div>
		</div>
  </div>
  <hr>
    <?php include '../dbadmin/dashboard/config/jqscript.php' ?>
    <?php include 'footer.php' ?>