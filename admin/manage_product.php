<?php
ob_start();
require("includes/connection.php");
include_once("includes/admin_header.php");
$today = date("Y-m-d"); 
  $path     ='images/';
if (isset($_POST['submit'])) {
 
 $name    =$_POST['name'];
 $desc    =$_POST['desc'];
 $price   =$_POST['price'];
 $cat_id  =$_POST['category'];
 $offer   =$_POST['offer'];
 $season  =$_POST['season'];
 $checkbox1=$_POST['size'];  
 $chk="";  
 foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  


  $img      =$_FILES['img']['name'];

 $img      =time().$img;
 $tmp_name =$_FILES['img']['tmp_name'];
 move_uploaded_file($tmp_name, $path.$img);
 

 $query   = "INSERT INTO product (product_name,product_img,product_price,product_desc,vendor_id,cat_id,
 product_offer,product_season,product_size , product_date)
 VALUES ('$name','$img','$price','$desc','0','$cat_id','$offer','$season','$chk' ,'$today')" ;
 


 mysqli_query($conn,$query);
 header("location:manage_product.php");

}

if (isset($_GET['edit'])) {  
 if (isset($_POST['update'])) {
   $name     =$_POST['name'];
   $desc     =$_POST['desc'];
   $price    =$_POST['price'];
   $cat_id   =$_POST['category'];
   $offer    =$_POST['offer'];
   $season   =$_POST['season'];
 

   if (empty(($_POST['size']))){
    $q="SELECT product_size FROM product WHERE product_id={$_GET['edit']}";
    $r=mysqli_query($conn,$q);
    $size=mysqli_fetch_assoc($r);
   
   }
   else{
       $checkbox1=$_POST['size'];  
       $size="";  
       foreach($checkbox1 as $chk1)  
         {  
            $size .= $chk1.",";  
   }  
   }


  if ($_FILES['img']['error']==0) {
                  $img      =$_FILES['img']['name'];
                  $tmp_name =$_FILES['img']['tmp_name'];
                
                  move_uploaded_file($tmp_name, $path.$img);
              }
         else {

               $qimg ="SELECT product_img FROM product 
                       WHERE product_id = $id " ;

                $rimg= mysqli_query($conn,$qimg) ;
                $new_img =mysqli_fetch_assoc($rimg);
                $img=$new_img['product_img'];
                

              }


   $query    = " UPDATE product SET product_name   ='$name',
   product_price        ='$price',
   product_img          ='$img',
   product_desc         ='$desc',
   cat_id               ='$cat_id' ,

   product_offer        ='$offer' ,
   product_season       ='$season' ,
   product_size         ='$size'
   WHERE product_id     ='$_GET[edit]' ";    
   mysqli_query($conn, $query);
   header("location:manage_product.php");
 }
 $query    = "SELECT * FROM product WHERE product_id ={$_GET['edit']}";

 $result   = mysqli_query($conn,$query);
 $product  = mysqli_fetch_assoc($result);

}


elseif (isset($_GET['del'])) {
  $query ="DELETE FROM product WHERE product_id = {$_GET['del']}";
  mysqli_query($conn,$query);


}


?>
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row ">
        <div class="col-lg-11">
          <div class="card">
            <div class="card-header">
              <?php if (!isset($_GET['edit'])) {
                echo "Manage Product";}
                else 
                  echo"update Product";

                ?></div>
                <div class="card-body">
                 <div class="card-title">
                  <h3 class="text-center title-2">
                    <?php if (!isset($_GET['edit'])) {
                      echo "Create Product";}
                      else 
                        echo"Edit Product ";

                      ?></h3>
                    </div>
                    <hr>
                    <form action="" method="post" enctype="multipart/form-data">
                     
                     <div class="wrap-input100 ">
                      <span class="label-input100" > Name</span>
                      <input class="input100" type="text" name="name" placeholder="Name..." value="<?php if (isset($_GET['edit'])){echo $product['product_name'];}?>" required>
                      <span class="focus-input100"></span>
                    </div>
                     
                     
                      <div class="wrap-input100" >
                      <span class="label-input100" >Image</span>
                      <input class="input100" type="file" name="img" placeholder="Image..."  value="<?php if (isset($_GET['edit'])){
                        echo $product['product_img'];}?>" required>
                      <span class="focus-input100"></span>
                    </div>


                     <?php
                     echo "<div class='wrap-input100 validate-input'>
                            <span class='label-input100'>Size :</span>
                        <div class='form-check form-check-inline bg-secondary text-white p-2'>
                         <input type='checkbox' class='form-check-input' id='xs' name='size[]' value='xs' checked >
                          <label class='form-check-label pl-0' for='product_size'>XS</label>
                        </div>
                         <div class='form-check form-check-inline bg-secondary  text-white p-2'>
                          <input type='checkbox' class='form-check-input' id='s' name='size[]' value='s'>
                          <label class='form-check-label pl-0' for='product_size'>S</label>
                        </div>
                         <div class='form-check form-check-inline bg-secondary  text-white p-2'>
                          <input type='checkbox' class='form-check-input' id='m' name='size[]' value='m'>
                          <label class='form-check-label pl-0' for='product_size'>M</label>
                        </div>
                         <div class='form-check form-check-inline bg-secondary  text-white p-2'>
                          <input type='checkbox' class='form-check-input' id='1' name='size[]' value='l'>
                          <label class='form-check-label pl-0' for='product_size'>L</label>
                        </div>
                         <div class='form-check form-check-inline bg-secondary  text-white p-2'>
                          <input type='checkbox' class='form-check-input' id='xl' name='size[]' value='xl'>
                          <label class='form-check-label pl-0' for='product_size'>XL</label>
                        </div>
                         <div class='form-check form-check-inline bg-secondary  text-white p-2'>
                          <input type='checkbox' class='form-check-input' id='xxl' name='size[]' value='xxl'>
                          <label class='form-check-label pl-0' for='product_size'>XXL</label>
                        </div>
                        <div class='form-check form-check-inline bg-secondary  text-white p-2'>
                          <input type='checkbox' class='form-check-input' id='free_size' name='size[]' value='free_size'>
                          <label class='form-check-label pl-0' for='product_size'>Free Size</label>
                        </div>
                     ";
                      echo"</div>";



                      
                          /*<input type='checkbox' class='form-check-input' id='xs' name='size[]' value='xs' ";


                          echo">
                          <label class='form-check-label' for='product_size' "; 
                          if (in_array("xs", $explode_size)) {
                         
                          echo "checked";
                          }
                          echo">XS</label>
                        </div>
                         <div class='form-check form-check-inline'>
                          <input type='checkbox' class='form-check-input' id='s' name='size[]' value='s'>
                         <label class='form-check-label' for='product_size' "; 
                          if (in_array("s", $explode_size)) {
                         
                          echo "checked";
                          }
                          echo">S</label>
                        </div>
                         <div class='form-check form-check-inline'>
                          <input type='checkbox' class='form-check-input' id='m' name='size[]' value='m'>
                         <label class='form-check-label' for='product_size' "; 
                          if (in_array("m", $explode_size)) {
                         
                          echo "checked";
                          }
                          echo">M</label>
                        </div>
                         <div class='form-check form-check-inline'>
                          <input type='checkbox' class='form-check-input' id='1' name='size[]' value='l'>
                         <label class='form-check-label' for='product_size' "; 
                        
                          if (in_array("l", $explode_size)) {
                         
                          echo "checked";
                          }
                          echo">L</label>
                        </div>
                         <div class='form-check form-check-inline'>
                          <input type='checkbox' class='form-check-input' id='xl' name='size[]' value='xl'>
                          <label class='form-check-label' for='product_size' "; 
                          if (in_array("xl", $explode_size)) {
                         
                          echo "checked";
                          }
                          echo">XL</label>
                        </div>
                         <div class='form-check form-check-inline'>
                          <input type='checkbox' class='form-check-input' id='xxl' name='size[]' value='xxl'>
                         <label class='form-check-label' for='product_size' "; 
                          if (in_array("xll", $explode_size)) {
                         
                          echo "checked";
                          }
                          echo">XLL</label>
                        </div>
                        <div class='form-check form-check-inline'>
                          <input type='checkbox' class='form-check-input' id='free_size' name='size[]' value='free_size'>
                         <label class='form-check-label' for='product_size' "; 
                          if (in_array("free size", $explode_size)) {
                         
                          echo "checked";
                          }
                          echo">Free Size</label>
                        </div>
                     ";
                      echo"</div>";*/



                      ?>
                        

                      <div class="wrap-input100 validate-input">
                      <span class="label-input100" >Description</span>
                      <textarea class="input100" name="desc" required><?php if(isset($_GET['edit']))
                      {echo $product['product_desc'];}?></textarea>
                      <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                    <span class="label-input100" >Category Name</span>
                    <select class="input100" name="category" type="text" required>
                       <?php

                        $q= "SELECT * from category where cat_id = {$product['cat_id']}";
                        $rs = mysqli_query($conn,$q);
                        $r= mysqli_fetch_assoc($rs);
                        echo "<option>";
                        echo $r['cat_name'];
                        echo "</option>";
                        $query2 = "SELECT * from category";
                        $result2 = mysqli_query($conn,$query2);
                        while ($cat = mysqli_fetch_assoc($result2)) {
                          if ($cat['cat_name']!=$r['cat_name']) {
                            echo"<option value='$cat[cat_id]' >$cat[cat_name]</option>";
                          }
                        
                        }
                        ?>
                      </select>
                      <span class="focus-input100"></span>
                      </div>
                        
                           <div class="wrap-input100 validate-input">
                             <span class="label-input100" >Season</span>
                             <select  name="season" type="text" class="input100">

                              <?php

                              if (isset($_GET['edit'])) {
                               
                              echo
                              "<option ";
                              $summer="Summer";
                              if ($summer==$product['product_season']) {echo "selected";}
                              echo">Summer</option>

                              <option ";
                               $Winter="Winter";
                              if ($Winter==$product['product_season']){echo "selected";}
                              echo ">Winter</option>";

                            echo" <option ";
                               $Spring="Spring";
                              if ($Spring==$product['product_season']) {echo"selected";}
                              echo ">Spring</option>";

                              echo"<option ";
                               $Autumn="Autumn";
                              if ($Autumn==$product['product_season']) {
                               echo "selected";
                              }
                              echo ">Autumn</option>";

                            }
                            else {
                             echo "<option>Summer</option>";
                             echo "<option>Winter</option>";
                             echo "<option>Spring</option>";
                             echo "<option>Autumn</option>";}
                              ?>
                            
                              
                            </select>
                             <span class="focus-input100"></span>

                     </div>

                      
                        <div class="wrap-input100 col-lg-4">
                       <label class="label-input100 d-block" > price</label>
                        <input id="product_price" name="price"  class="input100 col-lg-3  mb-1 d-inline-block" type="number"
                          value="<?php if (isset($_GET['edit'])) {
                          echo $product['product_price'];}?>" required> <i class="fa fa-dollar d-inline-block big float-right"></i>

                        </div>
                  


                          <div class="wrap-input100 col-lg-4">
                       <label class="label-input100 d-block" > Offer</label>
                        <input id="product_price" name="offer"  class="input100 col-lg-3  mb-1 d-inline-block" type="number"
                          value="<?php if (isset($_GET['edit'])){
                            echo $product['product_offer'];}?>" required> <i class="big float-right">%</i>

                        </div>
                      <div>
                        <?php
                        if (!isset($_GET['edit'])) {
                          echo "<button id='manage_admin_btn' type='submit' class='btn btn-lg btn-info btn-block custom ' name='submit'>
                          Create
                          </button>";
                        }

                        elseif (isset($_GET['edit'])) {
                          echo "<button id='update_admin_btn' type='submit' class='btn btn-lg btn-info btn-block custom' name='update'>
                          update
                          </button>";
                        }

                        ?>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
              

                  <div class="orders">
                    <div class="row ">
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
                                    <th class="text-center">SIZE</th>
                                    
                                    <th class="text-center">CATEGORY NAME</th>
                                    <th class="text-center">DATE</th>
                                    <th class="text-center">SEASON</th>
                                    <th class="text-center">VENDOR NAME</th>
                                    <th class="text-center">OFFER</th>
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
                                   echo "<td class=text-center> {$product['product_price']}$ </td>";
                                   echo "<td class=text-center> {$product['product_size']} </td>";
                                 
                                   echo "<td class=text-center> {$catname['cat_name']}</td>";
                                   echo "<td class=text-center> {$product['product_date']}</td>";
                                   echo "<td class=text-center > {$product['product_season']}</td>";

                                   $q="SELECT * FROM vendor 
                                   WHERE vendor_id= {$product['vendor_id']}";
                                   $r=mysqli_query($conn,$q);
                                   while($vendor=mysqli_fetch_assoc($r)){
                                     echo "<td class=text-center> {$vendor['vendor_name']}</td>";}
                                     echo "<td class=text-center > {$product['product_offer']}%</td>";


                                     echo "<td class=text-center><a href='manage_product.php?edit={$product['product_id']}' class='btn btn-warning' name='edit'><i class='fa fa-wrench' ></i></a></td>";
                                     echo "<td class=text-center><a href='manage_product.php?del={$product['product_id']}' class='btn btn-danger' name='del'><i class='fa fa-trash-o'></i></a ></td>";
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

