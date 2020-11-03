<?php

require("admin/includes/connection.php");

if (isset($_POST['submit'])) {
   $email   =$_POST['email'];
   $name    =$_POST['name'];
   $password=$_POST['pass'];
   $password2=$_POST['pass2'];
   $mobile  =$_POST['mobile'];
   $address =$_POST['address'];
   $img     =$_FILES['img']['name'];
   $img=time().$img;
   $tmp_name=$_FILES['img']['tmp_name'];
   $path    ='images/';
   move_uploaded_file($tmp_name, $path.$img);



   $query    ="SELECT * FROM customer 
              WHERE customer_email= '$email'";

    $result   =mysqli_query($conn,$query);
    $customer = mysqli_fetch_assoc($result);
     
    if (empty($customer['customer_id'])){
    	if ($password!=$password2) {
    		$pass_error="the password you entered do not match , try again please";
    	}
    	else{
		    $query2= "INSERT INTO customer(customer_name, customer_email, customer_password,
		                                customer_mobile, customer_address, customer_img)
		             VALUES ('$name','$email','$password','$mobile','$address','$img')" ;
		    mysqli_query($conn, $query2);
		    if ($_GET['order']) {
			    header("location:cart.php");
			}
			else
			    header("location:index.php");
	}
   }
   else
   {
   	$email_error="this Email is already registered "; 
   }
  
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>	Sign Up </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
    <link href="img/favicon.png" rel="shortcut icon"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" method="POST" enctype="multipart/form-data">
					<span class="login100-form-title p-b-59">
						Sign Up
					</span>
					<?php if (isset($email_error)) {
                               echo "<div class='alert alert-danger'> $email_error</div>";
                            } ?>

					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100" >Full Name</span>
						<input class="input100" type="text" name="name" placeholder="Name...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Email addess...">
						<span class="focus-input100"></span>
					</div>

					
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="*************" >
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Repeat Password</span>
						<input class="input100" type="password" name="pass2" placeholder="*************">
						<span class="focus-input100"></span>
						<?php if (isset($pass_error)) {
                               echo "<div class='alert alert-danger'>$pass_error</div>";
                            } ?>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Address is required">
						<span class="label-input100" >Adress</span>
						<input class="input100" type="text" name="address" placeholder="Address...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Mobile NO. is required">
						<span class="label-input100" >Mobile NO.</span>
						<input class="input100" type="number" name="mobile" placeholder="Mobile NO...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100" >
						<span class="label-input100" >Image</span>
						<input class="input100" type="file" name="img" placeholder="Image...">
						<span class="focus-input100"></span>
					</div>

					 <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">
								Sign Up
							</button>
						</div>

						<a href="login.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
						
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/mainlogin.js"></script>

</body>
</html>