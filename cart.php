<?php

require("admin/includes/connection.php");
$path     ='admin/images/';
include_once("includes/public_header.php");



if (!isset($_SESSION['cart'])) {
   $_SESSION['cart']=array();
}

if (isset($_GET['clearAll'])) {
	 unset($_SESSION['cart']);
}

if (isset($_GET['close'])) {
    $id=$_GET['close'];
    unset($_SESSION['cart'][$id]);
    header("location:cart.php");

}

?>
   <!-- Page Info -->
	<div class="page-info-section page-info">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="index.php">Home</a> / 
				<span>Cart</span>
			</div>
			<img src="img/page-info-art.png" class="page-info-art">
		</div>
	</div>
	<!-- Page Info end -->

	<!-- Page -->
	<div class="page-area cart-page spad">
		<div class="container">
			<div class="cart-table">
				<table>
					<thead>
						<tr>
							<th class="product-th">Product</th>
							<th>Size</th>
							<th>Price</th>
							
					    </tr>
					</thead>
					<tbody>
						<?php
						 if(isset($_SESSION['cart'])){
               
	                     foreach ($_SESSION['cart'] as $key => $value ) {
                            $cart= $_SESSION['cart'][$key];
						 	$arr=explode(",",$cart);
							$id=$arr[0];
							$size= $arr[1];

	                     $query1="SELECT * FROM product where product_id=$id";
	                   
	                    
	                     $result1=mysqli_query($conn,$query1);
	                     $u=mysqli_fetch_assoc($result1);            
	                    
                   
						echo"<tr>
							<td class='product-col'>
							
								<a class='close' href='cart.php?close=$key'> X </a>						
								<img src='$path$u[product_img]' >

								<div class='pc-title'>
									<h4>$u[product_name]</h4>
									
								</div>
							</td>
							<td  class='price-col'>$size</td>
							<td class='price-col'>";
							if ($u['product_offer']==0) {
								      $new=$u['product_price'];
										echo "<p class='text-danger '>$new</p> </td>";
									}
							else {
								$rate=$u['product_price']*$u['product_offer']/100;
		
								$new= $u['product_price'] - $rate ;
								echo" <p  class='d-inline-block '><del class='text-muted h6'>$u[product_price]</del></p>";
								echo" <p class='d-inline-block text-danger '>$new</p>
								</td>";

							}
							
         				    echo "</tr>";
					}
					
				}
						?>
						</tbody>
				</table>
			</div>
			<div class="row cart-buttons">
				<div class="col-lg-5 col-md-5">
					<a class="site-btn btn-continue" href="category.php">Continue shopping</a>
				</div>
				<div class="col-lg-7 col-md-7 text-lg-right text-left">
					<div class="site-btn btn-clear"><a href="cart.php?clearAll">Clear cart</a></div>
				    <div class="site-btn btn-clear"><a href="checkout.php">Proceed to checkout</a></div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page end -->
<?php include_once("includes/public_footer.php");?>