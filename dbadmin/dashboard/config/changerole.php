<?php
error_reporting(0);
include 'header.php'; 
include 'nav.php'; 
session_start();
error_reporting(0);
include("../../../config/connect.php");
include("../../../config/functions.php");

//    $id = $_GET['id'];
$rid = $_GET['repair_id'];

$sql = "SELECT * FROM tblusers  where id ='$rid'";
$result = $conn->query($sql);
$mem = $result ->fetch_assoc();

$updatedata2 = new DB_con();

if (isset($_POST['update'])) {

    $uid = $_POST['uid'];
    $role_id = $_POST['role_id'];
    
    $sqll = $updatedata2->updaterole($role_id,$uid);
    if ($sqll) {
        echo "<script>alert('แก้ไขเรียบร้อย');</script>";
         echo "<script>window.location.href='../view/customer'</script>";
    } else {
        echo "<script>alert('Something went wrong! Please try again!');</script>";
        echo "<script>window.location.href='changerole?repair_id=$rid'</script>";
    }
}

?>
    <section class="content">
      <div class="container-fluid">
        <?php include '../config/card/card.php'; ?>
        <div class="content">
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title">แก้ไขสิทธิ์ของผู้ใช้งาน</h4>
            </div>
                <div class="card-body">
                  <div id="typography">
                <div class="row" > 
                <div class="col-md-12" id="repair_cause">
                <label class="control-label">ชื่อผู้ใช้ :</label>
                  <?php echo $mem['fullname'] ;?>
                    </div>
                </div>

                <div class="row" >    
                    <div class="col-md-12" id="repair_cause">
                <label class="control-label">สิทธิ์ :</label>

                    <?php if($mem['role_id']!=1) : ?>
                        Users
                    <?php endif; ?>
                    <?php if($mem['role_id']==1) : ?>
                        Admin
                    <?php endif; ?>
                  
                    </div>
                </div>

                <form action="" method="post" enctype="multipart/form-data" class="mb-3">
                  
                <hr>
                <div class="row">
                <div class="col-sm">

                    <div class="mb-2">
                        <input type="text" class="form-control" style="display:none;" id="uid" name="uid" value="<?php echo $mem['id'] ;?>">
                        
                    </div>

                    <div class="mb-2">
                        <label for="qty" class="form-label">สิทธ์เข้าใช้งาน</label>
                        
                        <select class="form-control" id="role_id" name="role_id"">
                        <option value="1">Admin</option>
                        <option value="0">Users</option>
                        </select>
                    </div>
                    <button type="submit" name="update" class="btn btn-info btn-block mt-4" onclick="showNotification2('top','right')">
                        แก้ไขข้อมูล
                    </button>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
<!-- content -->
    </section>
  </div>
<?php 
include 'jqscript.php';
include 'footer.php';
include 'scchart.php';
?> 
