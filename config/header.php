<?php
session_start();
error_reporting(0);
include 'connect.php';
include 'lang.php';
$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if(isset($_SESSION['qty'])){
$meQty = 0;
foreach($_SESSION['qty'] as $meItem){
$meQty = $meQty + $meItem;
}
}else{
$meQty=0;
}
$userid = $_SESSION['id'];
$role = $_SESSION['role_id'];

$sql = "SELECT * FROM products WHERE id order by id limit 4";
$resultp = $conn->query($sql); 

$sql2 = "SELECT * FROM products WHERE id order by id limit 2";
$result2 = $conn->query($sql2); 

$sqlcat = "SELECT * FROM categories ";
$resultcat = $conn->query($sqlcat); 
?>
<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/thecart/assets/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/thecart/assets/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/thecart/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="/thecart/assets/style.css">
    <link rel="stylesheet" href="/thecart/assets/css/responsive.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style type="text/css">
    body {
      font-family: 'Kanit', sans-serif;
    }
    h1,h2,h3,h4,h5 {
      font-family: 'Kanit', sans-serif;
    }
    p,a {
      font-family: 'Kanit', sans-serif;
    }
    .section-title{
        font-family: 'Kanit', sans-serif;
    }
    
  </style>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                        <li><i class="fa fa-envelope"></i> monkcommerce@mail.com</li>
                        <li><i class="fa fa-phone"></i> 081 xxx xx48</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 text-right">
                <div class="user-menu">
                    <ul>
                    <li><i class="fa fa-facebook-official" aria-hidden="true"></i></li>
                    <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
                    <li><i class="fa fa-whatsapp" aria-hidden="true"></i></i></li>
                    </ul>
                    </div>
                    </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="/thecart/assets/img/logo.png" width="112px" ></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="/thecart/cart">ตระกร้าสินค้า -<i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo $meQty; ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/thecart/index">Home</a></li>
                        <li><a href="#footer">About us</a></li> 
                        <li><a href="/thecart/shop">Products</a></li>
                        <li><a href="/thecart/shop">Shipping</a></li>
                        <li><a href="#footer">Contact us</a></li> 
                    </ul>
                    
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->