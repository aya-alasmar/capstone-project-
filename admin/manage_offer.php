<?php
require("includes/connection.php");
 

if (isset($_POST['submit'])) {
 $offer    =$_POST['offer_rate'];
 $query   = "UPDATE product SET offer ='$offer' WHERE product_id= '$_GET[offer]' " ;
 
 mysqli_query($conn,$query);
 header("location:manage_offer.php");

}


include_once("includes/admin_header.php") ?>
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
            NEW OFFER</div>
                <div class="card-body">
                 <div class="card-title">
                  <h3 class="text-center title-2">
                   ADD OFFER</h3>
                    </div>
                    <hr>
                    <form method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="control-label mb-1"> product name : </label>
                    
                          <?php
                         if (isset($_GET['offer'])) {  
                        
                          $query="SELECT *  FROM product WHERE product_id= {$_GET['offer']}";
                          $result=mysqli_query($conn,$query);

                          while($pro=mysqli_fetch_assoc($result)){

                             echo "<label class='control-label mb-1 font-weight-bold'> $pro[product_name] </label>";
                             $old_offer=$pro['offer'];
                          
                       }
                     }
                          ?>

                         </div>
                        <div class="form-group col-lg-5 p-0">
                          <label  class="control-label mb-1"> Offer Rate</label>
                          <input  name="offer_rate" type="text" 
                          class="form-control d-inline  col-lg-3" maxlength="4" size="2" value="<?php if (isset($old_offer)){
                            echo $old_offer;}?>"><i class="font-weight-bold big ">%</i>

                          </div>
                      <div>
                        
                        <button type='submit' class='btn btn-lg btn-info btn-block custom' name='submit'>
                         ADD
                          </button>
                     </div>
                    </form>
                  </div>
                </div>
              </div>
            

           <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                     
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                    <thead>
                      <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">NAME</th>
                        <th class="text-center">IMAGE</th>
                        <th class="text-center">PRICE</th>
                        <th class="text-center">DESCRIPTION</th>
                        <th class="text-center">CATEGORY NAME</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Offer</th>

                  
                        <th class="text-center">EDIT</th>
                        <th class="text-center">DELETE</th>

                      </tr>
                    </thead>
                    <tbody>
                     <?php
                     $query ="SELECT * FROM product" ;
                     $result= mysqli_query($conn,$query) ;

                     $query2="SELECT cat_name
                     FROM category
                     INNER JOIN product
                     ON category.cat_id= product.cat_id";

                     $result2= mysqli_query($conn,$query2) ;
                     while ($product =mysqli_fetch_assoc($result)) {

                       $catname=mysqli_fetch_assoc($result2);

                       echo '<tr>';
                       echo "<td class=text-center> {$product['product_id']} </td>";
                       echo "<td class=text-center> {$product['product_name']} </td>";
                       echo "<td class=text-center><img src='images/{$product['product_img']}' class='rounded-circle'> </td>";
                       echo "<td class=text-center> {$product['product_price']} </td>";
                       echo "<td class=text-center> {$product['product_desc']} </td>";
                       echo "<td class=text-center> {$catname['cat_name']}</td>";
                        echo "<td class=text-center> {$product['product_date']}</td>";
                        echo "<td class=text-center> {$product['offer']}%</td>";
                        
                       echo "<td class=text-center><a href='manage_product.php?edit={$product['product_id']}' class='btn btn-warning' name='edit'> EDIT </a></td>";
                       echo "<td class=text-center><a href='manage_product.php?del={$product['product_id']}' class='btn btn-danger' name='del'> DELETE </a ></td>";
                       echo "</tr>";
                     }

                     ?>
                     
                   </tbody>
                 </table>
               </div>
               <!-- END DATA TABLE-->
             </div>
           </div>
         </div>
       </div>
     </div>
     <?php include_once("includes/admin_footer.php") ?>