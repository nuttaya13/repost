
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>THECART | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/thecart/dbadmin/dashboard/asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/itborrow/config/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/thecart/dbadmin/dashboard/asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/thecart/dbadmin/dashboard/asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/thecart/dbadmin/dashboard/asset/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/thecart/dbadmin/dashboard/asset/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/thecart/dbadmin/dashboard/asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/thecart/dbadmin/dashboard/asset/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/thecart/dbadmin/dashboard/asset/plugins/summernote/summernote-bs4.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&display=swap" rel="stylesheet">
</head>
<style type="text/css">
    body {
      font-family: 'Kanit', sans-serif;
    }
    h1,h2,h3,h4,h5 {
      font-family: 'Kanit', sans-serif;
    }
    p {
      font-family: 'Kanit', sans-serif;
    }

    .connect-status {
			display: inline-block;
			width: 1em;
			height: 1em;
			background-color: red;
			border-radius: 10px;
		}
		.connect-status.connected {
			background-color: #009933;
		}
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <?php
    $date2 = new DateTime();
    $date2->setTimezone(new DateTimeZone('Asia/Bangkok'));
    echo $date2->format(DateTime::RFC850) . "\n";
    ?>
    |&nbsp;<b>สถานะเชื่อมต่อ internet </b>&nbsp;<span class="connect-status">&nbsp;</span>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        
        </a>
      </li>
  </nav>
    