<?php

require("admin/includes/connection.php");
$path     ='admin/images/';
include_once("includes/public_header.php");


if (isset($_GET['Summer'])) {
	$season="Summer";}
	elseif (isset($_GET['Winter'])) {
		$season="Winter";}
		elseif (isset($_GET['Spring'])) {
			$season="Spring";}
			elseif (isset($_GET['Autumn'])) {
				$season="Autumn";}


				if (isset($_GET['id'])) {

					$id=$_GET['id'];
					$q="SELECT * FROM category WHERE cat_id=$id";
					$re=mysqli_query($conn,$q);
					$category=mysqli_fetch_assoc($re);
				}
				if (isset($_GET['add_cart'])) {
					array_push($_SESSION['cart'], $_GET['add_cart']);
					header("location:index.php");
				}


				if (isset($season)) {
					$query="SELECT * FROM product WHERE product_season ='$season' ";
				}
				elseif (isset($_GET['big_offer'])) {
					$query="SELECT * FROM product WHERE product_offer BETWEEN 60 AND 100 ";
				}
				elseif (isset($_GET['offer25'])) {
					$query="SELECT * FROM product WHERE product_offer =25 ";

				}
				elseif (isset($_GET['offer30'])) {
					$query="SELECT * FROM product WHERE product_offer =30 ";

				}

				elseif(isset($id)){
					$query="SELECT * FROM product WHERE cat_id =$id ";
				}
				else{
					$query="SELECT * FROM product";
				}
				?>

				<!-- Page Info -->
				<div class="page-info-section page-info-big">
					<div class="container">
						<h2><?php        if (isset($season)){
							echo"$season";}
							elseif (isset($_GET['big_offer'])) {
								$_GET['big_offer']= "special offers";
								echo "$_GET[big_offer]";
							} 
							elseif (isset($_GET['offer30'])) {
								$_GET['offer30']="30%" ;
								echo "$_GET[offer30]";
							}
							elseif (isset($_GET['offer25'])) {
								$_GET['offer25']="25%" ;
								echo "$_GET[offer25]";
							}
							elseif (isset($id)) {
								echo "$category[cat_name]";

							}
							else{
								echo "All Products";
							}


							?></h2>
							<div class="site-breadcrumb">
								<a href="index.php">Home</a> / 
								<a href="category.php?women">Women </a>/
								<span> <?php if (isset($season)){echo"$season";}
								elseif (isset($_GET['big_offer'])) {
									$_GET['big_offer']= "special offers";
									echo "$_GET[big_offer]";
								} 
								elseif (isset($_GET['offer30'])) {
									$_GET['offer30']="30%" ;
									echo "$_GET[offer30]";
								}
								elseif (isset($_GET['offer25'])) {
									$_GET['offer25']="25%" ;
									echo "$_GET[offer25]";
								}
								elseif (isset($id)) {
									echo "$category[cat_name]";

								}
								else{
									echo "All Products";
								}				             



								echo"</span>
								</div>";
								if (isset($id)) {
									echo"<img src='$path$category[cat_img]' class='cata-top-pic' width=400 height=500>";
								}
								else
									{ echo"<img src='img/categorie-page-top.png' class='cata-top-pic' width=400 height=500>";}

								?>



							</div>
						</div>
						<!-- Page Info end -->


						<!-- Page -->
						<div class="page-area categorie-page spad">
							<div class="container">
								<div class="categorie-filter-warp">
									<p>Showing 

										<?php 
										if (isset($season)){
											$q="SELECT COUNT(product_id)
											FROM product
											WHERE product_season = '$season'";


										}
										elseif (isset($id)) {
											$q="SELECT COUNT(product_id)
											FROM product
											WHERE cat_id = $id ";

										}
										elseif (isset($_GET['big_offer'])) {
											$q="SELECT COUNT(product_id)
											     FROM product
											     WHERE product_offer BETWEEN 60 and 100";
										} 
										elseif (isset($_GET['offer30'])) {
											$q="SELECT COUNT(product_id)
											     FROM product
											     WHERE product_offer =30";
										}
										elseif (isset($_GET['offer25'])) {
											$q="SELECT COUNT(product_id)
											     FROM product
											     WHERE product_offer=25";
										}
										else{
											$q="SELECT COUNT(product_id)
											FROM product";
										}
										$r=mysqli_query($conn,$q);

										while($x=mysqli_fetch_assoc($r)){
											$COUNT=$x['COUNT(product_id)'];
										}
										echo "$COUNT";

										?>


									results</p>

								</div>
								<div class="row">

									<?php
									$result=mysqli_query($conn,$query);
									while ($product=mysqli_fetch_assoc($result)) {
										echo"
										<div class='col-lg-3 product'>
										<div class='product-item'>
										<figure>
										<img src='$path$product[product_img]' width=250 height=350>";
										if ((!(isset($id))) && $product['product_offer']!=0) {
											echo "<div class='bache sale'>$product[product_offer]%</div>";
										}

										echo"<div class='pi-meta'>
										<div class='pi-m-left'>
										<a href='product.php?id=$product[product_id]'> <img src='img/icons/eye.png' ></a>
										<p>quick view</p>
										</div>
										</div>
										</figure>
										<div class='product-info'>
										<h6 class='cat-name'>$product[product_name]</h6>";

										if ($product['product_offer']==0) {
											echo "<p class='text-danger '>$product[product_price]</p>";
										}
										else {
											$rate=$product['product_price']*$product['product_offer']/100;

											$new= $product['product_price'] - $rate ;
											echo" <p  class='d-inline-block '><del class='text-muted h6'>$product[product_price]</del></p>";
											echo" <p class='d-inline-block text-danger '>$new</p>";

										}

										echo"<a href='product.php?id=$product[product_id]' class='site-btn btn-line d-block'>SEE MORE</a>
										</div>
										</div>
										</div>";

									}

									?>


								</div>

							</div>
						</div>
						<!-- Page -->
						<?php
						include_once("includes/public_footer.php");?>