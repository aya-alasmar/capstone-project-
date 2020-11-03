<?php

require("admin/includes/connection.php");
$path     ='admin/images/';
include_once("includes/public_header.php");

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if (isset($_POST['submit'])) {
	if (isset($_POST['radio_size'])){
		array_push($_SESSION['cart'], "$id,$_POST[radio_size]");
		$size_error="you choose $_POST[radio_size] size";
		header("location:product.php?id=$id");
	}
	else
		{$size_error="please choose the size ";}

}

$query   ="SELECT * FROM product 
WHERE product_id = $id";

$result  = mysqli_query($conn,$query);
$product =mysqli_fetch_assoc($result);


$query2 ="SELECT * FROM category WHERE cat_id= $product[cat_id]";

$r      =mysqli_query($conn,$query2);
$cat    =mysqli_fetch_assoc($r);

?>

<!-- Page Info -->
<div class="page-info-section page-info">
	<div class="container">
		<div class="site-breadcrumb">
			<a href="index.php">Home</a> / 
			<?php

			echo "<a href='category.php?id=$cat[cat_id]'>$cat[cat_name]</a>/
			<span> $product[product_name]
			</span>
			</div>";?>
			<img src="img/page-info-art.png" alt="" class="page-info-art">
		</div>
	</div>
	<!-- Page Info end -->



	<!-- Page --><?php

	
	echo "<div class='page-area product-page spad'>
	<div class='container'>
	<div class='row'>
	<div class='col-lg-6'>
	<figure>
	<img class='product-big-img' src=$path$product[product_img] width=500 heigth=70>
	</figure>
	</div>
	<div class='col-lg-6'>
	<div class='product-content'>
	<h2>$product[product_name]</h2>
	<div class='pc-meta'>";
	if ($product['product_offer']==0) {
		echo "<p class='text-danger h3'>$product[product_price]</p>";
	}
	else {
		$rate=$product['product_price']*$product['product_offer']/100;

		$new= $product['product_price'] - $rate ;
		echo" <p  class='d-inline-block '><del class='text-muted h6'>$product[product_price]</del></p>";
		echo" <p class='d-inline-block text-danger h3'>$new</p>";}


		echo "

		</div>
		</div>
		<div>
		<form class='display-block' method='POST'>	";
		if (isset($size_error)) {
			echo "<div class='alert alert-danger'> $size_error</div>";
		} 				

		echo"<div>Size:</div>";
		$size=explode(",", $product['product_size']);
		foreach ($size as $key => $value) {
			if (!empty($value)) {
				echo"<div class='sc-item d-inline-block m-2'>
				<input name='radio_size' type='radio' value='$value' class='d-inline-block m-2 p-0'>$value</a>";
			}


		}

		echo"</div></div></div>";


		echo"<button class='site-btn btn-line d-block' name='submit'>ADD TO CART</button></form>
		</div>
		</div>
		</div>
		<div class='product-details col-lg-12'>
		<div class='row'>
		<div class='col-lg-10 offset-lg-1'>
		<ul class='nav' role='tablist'>
		<li class='nav-item'>
		<a class='nav-link active' id='1-tab' data-toggle='tab' href='#tab-1' role='tab' aria-controls='tab-1' aria-selected='true'>Description</a>
		</li>
		</ul>
		<div class='tab-content'>
		<!-- single tab content -->
		<div class='tab-pane fade show active' id='tab-1' role='tabpanel' aria-labelledby='tab-1'>
		<p><pre>$product[product_desc]</pre></p>
		</div>
		</div>
		</div>
		</div>
		</div>";

	


	?>
</div>
</div>
</div> 
<!-- Page end -->
<?php include_once("includes/public_footer.php");?>