<?php
ob_start();
require("admin/includes/connection.php");
include_once("includes/public_header.php");
$path     ='admin/images/';
$total=0;
$array =array();
$date=date("Y-m-d");

if (!isset($_SESSION['customer'])) {
	header("location:login.php");
}
$customer_id=$_SESSION['customer'];
?>

<!-- Page Info -->
<div class="page-info-section page-info">
	<div class="container">
		<div class="site-breadcrumb">
			<a href="index.php">Home</a> / 
			<a href="cart.php">Cart</a> / 
			<span>Checkout</span>
		</div>
		<img src="img/page-info-art.png" alt="" class="page-info-art">
	</div>
</div>
<!-- Page Info end -->


<!-- Page -->
<div class="page-area cart-page spad">
	<div class="container">
		<form class="checkout-form" method="POST">
			<div class="row">
				<div class="col-lg-6">
					<h4 class="checkout-title">Billing Address</h4>
					<?php
					$query  = "SELECT * FROM customer WHERE customer_id ={$_SESSION['customer']}";

					$result = mysqli_query($conn,$query);
					$customer  = mysqli_fetch_assoc($result);
					echo "<form method='POST' class='bg-white p-5'>
					<div class='row'>
					<div class='col-12 mb-3'>";

					echo "<label for='first_name' class='font-weight-bold'> Name :</label>
					<label>$customer[customer_name]</label>
					</div>


					<div class='col-12 mb-3'>
					<label for='street_address' class='font-weight-bold'>Address :</label>
					<label  class=' mb-3'>$customer[customer_address]</label>

					</div>
					<div class='col-12 mb-3'>
					<label for='phone_number' class='font-weight-bold'>Phone No :</label>
					<label >$customer[customer_mobile]</label>
					</div>
					<div class='col-12 mb-4'>
					<label for='email_address' class='font-weight-bold'>Email Address :</label>
					<label >$customer[customer_email]</label>
					</div>
					</div>
					</form>";
					?>
				</div>
				<div class="col-lg-6">
					<div class="order-card">
						<div class="order-details">
							<div class="od-warp">
								<h4 class="checkout-title">Your order</h4>
								<table class="order-table">
									<thead>
										<tr>
											<th>img </th>
											<th>name</th>
											<th>Size</th>
											<th>Price</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($_SESSION['cart'] as $key => $value ) {
											$cart= $_SESSION['cart'][$key];
										 	$arr=explode(",",$cart);
											$id=$arr[0];
											$size= $arr[1];
											$query1="SELECT * FROM product where product_id=$id";

 									     	$result1=mysqli_query($conn,$query1);
											$product=mysqli_fetch_assoc($result1);    
											echo"<tr>
											<td> 
											<img src=$path$product[product_img] width=70  height=100 ></td>
											<td > $product[product_name] </td>
											<td >$size</td>
											<td>";
											if ($product['product_offer']==0) {
												$new=$product['product_price'];
												echo "<p class='text-danger '>$new$</p> </td>";
											}
											else {
												$rate=$product['product_price']*$product['product_offer']/100;
  											    $new= $product['product_price'] - $rate ;
												echo" <p  class='d-inline-block '><del class='text-muted h6'>$product[product_price]</del></p>";
												echo" <p class='d-inline-block text-danger '>$new$</p>
												</td>";

											}
										$total=$total+$new;
						
										}
											
										 if (isset($_POST['place_order'])){

										     $query2 ="INSERT INTO `order`(`order_date`, `customer_id`, `total`) VALUES ('$date','$customer_id','$total')";
										     mysqli_query($conn, $query2);

										     foreach ($_SESSION['cart'] as $key => $value) {
									     		$cart= $_SESSION['cart'][$key];
											 	$arr=explode(",",$cart);
												$id=$arr[0];
												$size= $arr[1];
                                              
										      $query3="SELECT * FROM `order` WHERE `order_date` = '$date' AND `customer_id`='$customer_id' AND `total`='$total'";
										     
										      $result3 =mysqli_query($conn,$query3);
										      $order   = mysqli_fetch_assoc($result3);
										      $order_id=$order['order_id'];


										      $query4= "INSERT INTO order_d(order_id,product_id , size )
										                 VALUES('$order_id','$id','$size')";
										       mysqli_query($conn, $query4);

										       }

										     unset($_SESSION['cart']);
										     header("location:checkout.php");

										}
										?>
										<tr class="cart-subtotal">
											<td>Shipping</td>
											<td>Free</td>
										</tr>
									</tbody>
									<tfoot>
										<tr class="order-total">
											<th>Total</th>
											<th>
												<?php echo $total."$"; ?>
											</th>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="payment-method">
								<div class="pm-item">
									<label >Cash on delievery</label>
								</div>

							</div>
						</div>
						<button class="site-btn btn-full" name="place_order">Place Order</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- Page -->

<?php include_once("includes/public_footer.php");?>