<?php 
session_start();
include_once('functions.php');
include_once('connect.php'); 
    
    $userdata = new DB_con();

    if (isset($_POST['submit'])) {
      $fname = $_POST['fullname'];
      $uname = $_POST['username'];
      $uemail = $_POST['email'];
	  $usertel = $_POST['usertel'];
      $custaddr = $_POST['custaddr'];
      $password = md5($_POST['password']);

      $sql = $userdata->registration($fname, $uname, $uemail,$usertel,$custaddr, $password);

      if ($sql) {
		echo '<script type="text/javascript">';
		echo 'setTimeout(function () { swal.fire({
			title: "สำเร็จ!",
			text: "สมัครสมาชิกเรียบร้อย!",
			type: "success",
			icon: "success"
		});';
		echo '}, 500 );</script>';

		echo '<script type="text/javascript">';
		echo 'setTimeout(function () { 
			window.location.href = "signin";';
		echo '}, 3000 );</script>';
      } else {
          echo "<script>alert('Something went wrong! Please try again.');</script>";
          echo "<script>window.location.href='registor'</script>";
      }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/thecart/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="/thecart/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="/thecart/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="/thecart/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="/thecart/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="/thecart/node_modules/sweetalert2/dist/sweetalert2.min.css">
	
	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&display=swap" rel="stylesheet">
<!--===============================================================================================-->
</head>
<style type="text/css">
    body {
      font-family: 'Kanit', sans-serif;
    }
    h1,h2,h3,h4,h5 {
      font-family: 'Kanit', sans-serif;
    }
    p,span {
      font-family: 'Kanit', sans-serif;
    }
  </style>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" id="signupForm" method="post">
					
  						<center><h2>สมัครสมาชิก</h2></center><br><br>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="fullname" placeholder="ชื่อ - นามสกุล">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="number" name="usertel" placeholder="Tel">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="custaddr" placeholder="ที่อยู่">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input">
						<input class="input100 span2 required" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100 span2 required" type="password" name="confirm_password" id="confirm_password" placeholder="Re - Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<input onclick="checkEmail()" type="submit" value="สมัครสมาชิก" name="submit" class="login100-form-btn " >
					</div>

				</form>
			</div>
		</div>
	</div>
	
	

	
	<script src="jqueryvalidate/lib/jquery.js"></script>
	<script src="jqueryvalidate/dist/jquery.validate.js"></script>
	<script>
	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});

	$().ready(function() {
		// validate the comment form when it is submitted
		$("#commentForm").validate();

		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				firstname: "required",
				lastname: "required",
				username: {
					required: true,
					minlength: 2
				},
				usertel: {
					required: true,
					minlength: 10
				},
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
				topic: {
					required: "#newsletter:checked",
					minlength: 2
				},
				agree: "required"
			},
			messages: {
				firstname: "Please enter your firstname",
				lastname: "Please enter your lastname",
				usertel: "โปรดกรอกให้ครบ 10 ตัวค่ะ",
				
				username: {
					required: "Please enter a username",
					minlength: "ต้องไม่ต่ำกว่า 2 ตัวอักษร"
				},
				password: {
					required: "Please provide a password",
					minlength: "ต้องไม่ต่ำกว่า 5 ตัวอักษร"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "ต้องไม่ต่ำกว่า 5 ตัวอักษร",
					equalTo: "Password ไม่ตรงกัน"
					
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy",
				topic: "Please select at least 2 topics"
			},
			submitHandler: function (form) {
            $(".submit").attr("disabled", true);
            form.submit(); // commented out for demo
        }
		});

		

		//code to hide topic selection, disable for demo
		var newsletter = $("#newsletter");
		// newsletter topics are optional, hide at first
		var inital = newsletter.is(":checked");
		var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
		var topicInputs = topics.find("input").attr("disabled", !inital);
		// show when newsletter is checked
		newsletter.click(function() {
			topics[this.checked ? "removeClass" : "addClass"]("gray");
			topicInputs.attr("disabled", !this.checked);
		});
	});
	</script>
<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>

</body>
</html>