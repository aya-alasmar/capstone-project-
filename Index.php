

<?php

require("admin/includes/connection.php");
$path     ='admin/images/';
include_once("includes/public_header.php");


if (isset($_GET['add_cart'])) {
	array_push($_SESSION['cart'], $_GET['add_cart']);
	header("location:index.php");
}

if (isset($_GET['customer_id'])){
  $_SESSION['customer']=$_GET['customer_id'];
    
}

?>

<!-- Hero section -->
<section class="hero-section set-bg" data-setbg="img/bg.jpg">
 <div class="hero-slider owl-carousel">
  <div class="hs-item">
   <div class="hs-left"><img src="img/slider-img.png" alt=""></div>
   <div class="hs-right">
    <div class="hs-content">
     <?php
     $query="SELECT *
     FROM product 
     WHERE product_season= 'Summer'
     ORDER BY product_price";
     $result=mysqli_query($conn, $query);

     while($min =mysqli_fetch_assoc($result)){
      echo"<div class='price'>from $min[product_price] $</div> ";
      break;
     }
     ?>
     <h2><span>2020</span> <br>Summer Collection</h2>
     <a href="category.php?Summer" class="site-btn">Shop NOW!</a>
    </div> 
   </div>
  </div>
 </div>
</section>
<!-- Hero section end -->


<section class="intro-section spad pb-0">
 <div class="section-title mb-2">
  <h2 class="color">SPECIAL PRICE</h2>
  
 </div>
 <div >
  <ul class="d-inline-block mx-5 px-4 ul-size">

   <?php 
   $query="SELECT * FROM product WHERE product_offer != 0 ORDER BY product_price  DESC LIMIt 0,5 ";
   $result=mysqli_query($conn, $query);
        while($product =mysqli_fetch_assoc($result) ){

   echo"<li class='d-inline-block bg-custom pb-5'>

    <div class='intro-item best-price d-inline-block'>
     <figure class='figure mb-5'>";
      echo "<div class='custom-sale'>$product[product_offer]%</div>";
	   

      echo"<img class='d-block img-sal'  src='$path$product[product_img]' width=250 height=270>

        </figure>

     <div class='product-info text-center mt-0'>

      <h5 class='cat-name2'>$product[product_name]</h5>";
      if ($product['product_offer']==0) {
			echo "<p class='text-danger '>$product[product_price]</p>";
		}
		else {
			$rate=$product['product_price']*$product['product_offer']/100;

			$new= $product['product_price'] - $rate ;
			echo" <p  class='d-inline-block '><del class='text-muted h6'>$product[product_price]</del></p>";
			echo" <p class='d-inline-block text-danger '>$new</p>";

		}
     echo" <a href='product.php?id=$product[product_id]' class='site-btn btn-line'>SEE MORE</a>
     </div>
    </div>
   </li>";
   
  }
   ?>
  </ul>
 </div>
 </section>

<!-- Intro section -->


<!-- Intro section end -->


<!-- Featured section -->
<div class="featured-section spad">
 <div class="container">
  <div class="row">
   <div class="col-md-6">
    <div class="featured-item">
     <img src="img/super_offer.png" height="490" width="400">
     <a href="category.php?big_offer" class="site-btn">see more</a>
    </div>
   </div>
   <div class="col-md-6">
    <div class="featured-item mb-0">
     <img src="img/featured/featured-2.jpg" height="490" width="400">
     <a href="category.php?offer25" class="site-btn">see more</a>
    </div>
   </div>
  </div>
 </div>
</div>
<!-- Featured section end -->


<section class="intro-section spad pb-0">
 <div class="section-title">
  <h2 class="color">NEW ARRIVALS</h2>
  
 </div>
 <div class="intro-slider">
  <ul class="slidee">

   <?php 
   $query="SELECT * FROM product ORDER BY product_date  DESC LIMIt 10";
   $result=mysqli_query($conn, $query);
            
               while($product =mysqli_fetch_assoc($result) ){

   echo"<li>

    <div class='intro-item '>
     <figure>
      <img class='d-block px-5 ' src='$path$product[product_img]' width=350 height=450>
      <div class='bache'>NEW</div>
      
     </figure>
     <div class='product-info'>
      <h5>$product[product_name]</h5> ";
      if ($product['product_offer']==0) {
      echo "<p class='text-danger '>$product[product_price]</p>";
    }
    else {
      $rate=$product['product_price']*$product['product_offer']/100;

      $new= $product['product_price'] - $rate ;
      echo" <p  class='d-inline-block '><del class='text-muted h6'>$product[product_price]</del></p>";
      echo" <p class='d-inline-block text-danger '>$new</p>";

    }
      echo"
      <a href='product.php?id=$product[product_id]' class='site-btn btn-line d-block'>SEE MORE</a>
     </div>
    </div>
   </li>";
   
  }
   ?>
  </ul>
 </div>
 <div class="container">
  <div class="scrollbar">
   <div class="handle">
    <div class="mousearea"></div>
   </div>
  </div>
 </div>
</section>

<section class="intro-section spad pb-0">
 <div class="section-title mb-2">
  <h2 class="color">CATEGORIES</h2>
  
 </div>
 <div >
  <ul class="d-inline-block mx-5 px-4 ul-size">

   <?php 
   $query="SELECT * FROM category";
   $result=mysqli_query($conn, $query);
            
      while($cat =mysqli_fetch_assoc($result) ){

   echo"<li class='d-inline-block bg-custom pb-5'>

    <div class='intro-item best-price d-inline-block'>
     <figure class='figure'>";
      echo"<img class='d-block ' src='$path$cat[cat_img]' width=250 height=250>

        </figure>

     <div class='product-info text-center mt-0'>
      <h5 class='cat-name2'>$cat[cat_name]</h5>";
      
     echo" <a href='category.php?id=$cat[cat_id]' class='site-btn btn-line '>SEE MORE</a>
     </div>
    </div>
   </li>";
   
  }
   ?>
  </ul>
 </div>
 </section>

<!-- Blog section --> 
<section class="blog-section spad">
 <div class="container">
  <div class="row">
   <div class="col-lg-5">
    <div class="featured-item">
     <img src="img/featured/featured-3.jpg" alt="">
     <a href="category.php?offer30" class="site-btn">see more</a>
    </div>
   </div>
   <div class="col-lg-7">
    <h4 class="bgs-title mb-5">Seasons Collections</h4>
    <div class='row '>
    <?php
    $q="SELECT * FROM product GROUP BY product_season";
    $r=mysqli_query($conn,$q);
    while ($p=mysqli_fetch_assoc($r)) {
     echo" 
     
     <div class='col-lg-6 my-2'>
     <div class='blog-item '>
     <div >
      <a href='category.php?$p[product_season]'><img src='img/$p[product_season]1.jpg' width=350 height=200></a>
     </div>
     
    </div>
    </div>
   ";
        }

  
   ?>
    </div>
   </div>
  </div>
 </div>
</section>
<!-- Blog section end --> 


<?php include_once("includes/public_footer.php");?>