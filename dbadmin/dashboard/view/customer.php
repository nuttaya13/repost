<?php
error_reporting(0);
include '../../../config/connect.php';
include_once('../../../config/functions.php');
include '../config/header.php'; 
include '../config/nav.php'; 
session_start();
$sql = "SELECT fullname FROM tblusers where id order by id desc ";
$result = $conn->query($sql);
$row = $result ->fetch_assoc();

$sql3 = "SELECT tblusers.id,username,useremail,regdate,fullname, custaddr ,  role_id
from tblusers ";
$result3 = $conn->query($sql3);

$sqlc = "SELECT count(id) as cid FROM tblusers";
$resultc = $conn->query($sqlc);
$rowc = $resultc ->fetch_assoc();
?>
    <section class="content">
      <div class="container-fluid">
        <?php include '../config/card/card.php'; ?>
        <div class="row">
          <section class="col-lg-12 connectedSortable">
              <!-- content -->
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">รายงานลูกค้า</h4>
                </div>
                <div class="card-body table-responsive">
                <table class="table table-hover" id="example"> 
                <hr>
                <thead>
                <tr>
                <th>รหัสลูกค้า</th>
                <th>ชื่อลูกค้า</th>
                <th>Usersname</th>
                <th>Email</th>
                <th>ที่อยู่</th>
                <th>วันที่สมัครสมาชิก</th>
                <th>สถานะสิทธิ์</th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                while($row3 = mysqli_fetch_array($result3)) {
                        ?>
                <tr>
                <td><?php echo $row3['id'];?></td>
                <td><?php echo $row3['fullname'];?></td>
                <td><?php echo $row3['username'];?></td>
                <td><?php echo $row3['useremail'];?></td>
                <td><?php echo $row3['custaddr'];?></td>
                <td><?php echo $row3['regdate']; ?></td>
                <?php if($row3['role_id']==1) : ?>
                  <td><span style="color:#2E8B57;font-weight:"><i class="fa fa-check"></i> Admin</span></td>
                <?php endif; ?>
                <?php if($row3['role_id']==0) : ?>
                  <td><span style="color:#FF6347;font-weight:"><i class="fa fa-times-circle"></i> Users</span></td>
                <?php endif; ?>
                <td> 
                <a class="btn btn-info"  href="../config/changerole?repair_id=<?php echo $row3['id']; ?>" role="button">
                แก้ไขสิทธิ์ <i class="fa fa-edit"></i></a>

                <a class="btn btn-warning"  href="../config/Infomation?id=<?php echo $row3['id']; ?>" role="button">
                แก้ไขข้อมูลส่วนตัว <i class="fa fa-edit"></i> </a>

                <a class="btn btn-danger"  href="../delete/deleteusers?user_id=<?php echo $row3['id']; ?>" role="button">
                ลบ <i class="fa fa-trash"></i> </a>
                </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
                </table>
              </div>
            </div>
            <!-- content -->
          </section>
        </div>
      </div>
    </section>
  </div>
<?php 
include '../config/jqscript.php';
include '../config/footer.php';
include '../config/scchart.php';
?> 
