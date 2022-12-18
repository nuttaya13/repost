<?php 
session_start();

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   
    <br><div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     
          <a class="nav-link" href="javascript:;">
          <i class="fa fa-tachometer-alt"></i> 
            สวัสดี, <?php echo $_SESSION['fname']; ?>
          </a>
         
          <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i> เมนูผู้ใช้งาน
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
          <a class="dropdown-item" href="/thecart/">หน้าหลัก</a>
          <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])) : ?>
            <a class="dropdown-item" href="/thecart/config/logout">ออกจากระบบ</a>
        <?php endif; ?> 

        <?php if(empty($_SESSION['id'])) : ?>
          <a class="dropdown-item" href="/thecart/config/signin">เข้าสู่ระบบ</a>
        <?php endif; ?>   
          </div>
        <hr>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/thecart/dbadmin/dashboard/" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
          
            <a class="nav-link" href="/thecart/dbadmin/dashboard/view/customer">
            <i class="fa fa-users"></i>
              <p> จัดการผู้ใช้งาน</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/thecart/dbadmin/dashboard/config/changelinetoken">
            <i class="fab fa-line"></i> 
              <p>จัดการ Line Token</p>
            </a>
          </li>
          <div class="logo"></div>
          <li class="nav-item ">
            <a class="nav-link" href="/thecart/dbadmin/dashboard/view/category">
            <i class="fa fa-angle-double-right"></i> 
              <p>จัดการหมวดหมู่สินค้า</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/thecart/dbadmin/dashboard/view/product">
            <i class="fa fa-angle-double-right"></i> 
              <p>จัดการสินค้า</p>
            </a>
          </li>
          <div class="logo"></div>
          <li class="nav-item ">
            <a class="nav-link" href="/thecart/dbadmin/dashboard/view/reportorder">
            <i class="fa fa-receipt"></i> 
              <p>รายงานบิลชำระแล้ว</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/thecart/dbadmin/dashboard/view/reportordernostatus">
            <i class="fa fa-receipt"></i> 
              <p>รายงานบิลรอชำระ</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/thecart/dbadmin/dashboard/view/reportpayment">
            <i class="fa fa-money-bill-wave"></i> 
              <p>รายงานรายจ่าย</p>
            </a>
          </li>
         
        </ul>
      </div>
          
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>