<!-- Footer top section -->	

<?php
require("admin/includes/connection.php");
$q="SELECT * FROM admin LIMIT 1";
$re=mysqli_query($conn,$q);
$admin1=mysqli_fetch_assoc($re);
?>
	<section class="footer-top-section home-footer pt-5 pb-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-8 col-sm-12">
					<div class="footer-widget about-widget">
						<a href="index.php"><img src="logo.png" width="550" class="d-blck m-0 p-0"></a>
					
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">categories</h6>
						<ul>
							<?php
							$q="SELECT * FROM category ";
							$r=mysqli_query($conn,$q);
							while ($cat=mysqli_fetch_assoc($r)) {
								
							echo"<li><a href='category.php?id=$cat[cat_id]'>$cat[cat_name]</a></li>";
                             }
							?>
							
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Seasons</h6>
						<ul>
							<a href="category.php?Summer"><li>Summer</li></a>
							<a href="category.php?Winter"><li>Winter</li></a>
							<a href="category.php?Spring"><li>Spring</li></a>
							<a href="category.php?Autumn"><li>Autumn</li></a>




						</ul>
						
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">MATJAR.COM</h6>
						<ul>
							<li><a href="index.php">HOME</a></li>
							<li><a href="category.php">CATEGORY</a></li>
							<li><a href="product.php?id=53">PRODUCT</a></li>
							<li><a href="cart.php">CART</a></li>
							<li><a href="checkout.php">CHECKOUT</a></li>
							<li><a href="contact.php">CONTACT</a></li>
							<li><a href="register.php">REGISTER</a></li>
							<li><a href="login.php">LOGIN</a></li>
														
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">MATJAR.COM</h6>
						<div class="text-box">
							
							<p> admin name : <br><?php echo"$admin1[admin_fullname]";?></p>
							<p>admin email : <?php echo"$admin1[admin_email]";?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer top section end -->	

		<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<p class="copyright">
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>

		</div>
	</footer>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/sly.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/main.js"></script>
    </body>
</html>