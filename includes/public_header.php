<?php
session_start();

$path="admin/images/";

if (!isset($_SESSION['cart'])) {
   $_SESSION['cart']=array();
}

$count=count($_SESSION);

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>MATJAR.COM</title>
	<meta charset="UTF-8">
	<meta name="description" content=" eCommerce website">
	<meta name="keywords" content="eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.png" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		

		$(document).ready(function(){
			
			$(window).scroll(function() {
				if ($(window).scrollTop() >700) {
					$("#box").show();
				} 
				else {
					$("#box").hide();
				}
			});

			$("#box").click(function(){
				window.scrollTo({top:0});

			});

		});


	</script>
	<style type="text/css">
		#box{
			width: 50px;
			height: 50px;
			position: fixed;
			bottom:70px;
			right: 50px;
			z-index: 1;
		}
		#box i{font-size: 50px !important;
			color:#660066;

		}

		.logo{position: absolute !important; top: -55px !important;


		}
		.color{animation: color 1s infinite;}
		@keyframes color{
			50%{color:#ffcc00 ;}
			100%{color:#cc00cc;}
		}
		.control1{
			list-style: none;
			display: inline-block;
			margin: 10px;
			font-size: 25px;
			font-weight: 600;
			color: #414141;
		}
		.best-price{
			width: 200px !important;
			height: 370px!important;
			margin: 15px !important;
			padding: 15px !important;
		}
		.custom-sale{
		   color: #fff;
		   font-size: 15px;
		   text-align: center;
			width: 40px !important;
			height: 40px;
			background-color: red !important;
			z-index: 1!important;
			position:relative;
			top: 40px;
			left: 130px;
			padding: 10px;
		}
		.figure{
			height: 270px !important;
		}
		.ul-size{
			height: 500px !important;
			width: 1200px !important;
			background-color:  #f1daf1!important;
		
		}
		
		.close{
			font-size: 25px;
		    text-align: center;
			width: 30px !important;
			height: 30px;
            z-index: 1!important;
			position:relative;
			right: 30px;
			background-color: #000;
		    color: #fff;
			}
        .icon-size{
        	font-size:30px;

        	}
       .cat-name{
       	height: 40px!important;
       }
       .cat-name2{
       	height:60px!important;
       }
	</style>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.m
	  in.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	<a id="box" ><i class="fa  fa-hand-o-up d-block" ></i></a>
	
	<!-- Header section -->
	<header class="header-section header-normal">
		<div class="container-fluid">
			<!-- logo -->
			<div class="site-logo">
				<a href="index.php"><img src="logo.png" class="logo"></a>
			</div>
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			

			 
			<div class="header-right">
				<a href="cart.php" class="card-bag"><img src="img/icons/bag.png" alt=""><span><?php echo count($_SESSION['cart'])?></span></a>
				<?php 

				if (isset($_SESSION['customer'])) {
					echo"<a href='logout.php' ><i class='fa fa-power-off text-white icon-size search '></i></a> ";
					
				}
				else
				    echo"<a href='login.php' ><i class='fa fa-user text-white icon-size search'></i></a> ";
                 
				?>
				
			</div>
			<!-- site menu -->
			<ul class="main-menu">
				
				<?php
				$path="admin/images/";
				$query="SELECT * FROM category ";
				$result= mysqli_query($conn,$query);
				while ($cat=mysqli_fetch_assoc($result)) {
					echo"<li><a href='category.php?id=$cat[cat_id]'>$cat[cat_name]</a></li>";

				}
				
				?>
				
			</ul>
		</div>
	</header>