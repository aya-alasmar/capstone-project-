<?php 
require("includes/connection.php");
if (isset($_POST['submit'])) {
   $name     =$_POST['name'];
   $img      =$_FILES['img']['name'];
   $img      =time().$img;
   $tmp_name =$_FILES['img']['tmp_name'];
   $path     ='images/';
   move_uploaded_file($tmp_name, $path.$img);

    $query= "INSERT INTO category (cat_name,cat_img)
             VALUES ('$name','$img')" ;
          
    mysqli_query($conn, $query);
    header("location:manage_category.php");

}
if (isset($_GET['edit'])) {  

       if (isset($_POST['update'])) {
          $name=$_POST['name'];
          if ($_FILES['img']['error']==0) {
              $img      =$_FILES['img']['name'];
              $tmp_name =$_FILES['img']['tmp_name'];
              $path     ='images/';
              move_uploaded_file($tmp_name, $path.$img);
        } 
        else {
           $qimg ="SELECT cat_img 
                   FROM category 
                   WHERE cat_id = {$_GET['edit']} " ;

           $rimg= mysqli_query($conn,$qimg) ;
           $new_img =mysqli_fetch_assoc($rimg);
           $img=$new_img['cat_img'];


       }
       $query= " UPDATE category 
                 SET cat_name  ='$name',
                 cat_img   ='$img' 
                 WHERE cat_id  ={$_GET['edit']}";    
       mysqli_query($conn, $query);
       header("location:manage_category.php");

      }
      $query     = "select * from category where cat_id ={$_GET['edit']}";
      $result    = mysqli_query($conn,$query);
      $category  = mysqli_fetch_assoc($result);
}

elseif (isset($_GET['del'])) {
  $query ="DELETE FROM category WHERE cat_id = {$_GET['del']}";
  mysqli_query($conn,$query);

}
include_once("includes/admin_header.php") ?>
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
              <?php if (!isset($_GET['edit'])) {
                  echo "Manage Category";}
                  else 
                    echo"Update Category ";

                  ?></div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">
                  <?php if (!isset($_GET['edit'])) {
                  echo "Create Category";}
                  else 
                    echo"Edit Category ";

                  ?>
                    
                  </h3>
							</div>
							<hr>
							<form action="" method="post" enctype="multipart/form-data">
								
                 <div class="wrap-input100 ">
                  <span class="label-input100" >Name</span>
                  <input class="input100" type="text" name="name" placeholder="Name..."   value="<?php if (isset($_GET['edit'])){echo $category['cat_name'];}?>" required>
                  <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100" >
                      <span class="label-input100" >Image</span>
                      <input class="input100" type="file" name="img" value="<?php if (isset($_GET['edit'])){echo $category['cat_img'];}?>" required>
                      <span class="focus-input100"></span>
                    </div>
			
								<div>
									 <?php
                if (!isset($_GET['edit'])) {
                  echo "<button id='manage_category_btn' type='submit' class='btn btn-lg btn-info btn-block custom' name='submit'>
                    Create
                  </button>";
                }
                
                elseif (isset($_GET['edit'])) {
                  echo "<button id='update_category_btn' type='submit' class='btn btn-lg btn-info btn-block custom' name='update'>
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
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                     
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <thead>
                                            <tr>
                                                <th class='text-center'>ID</th>
                                                <th class='text-center'>NAME</th>
                                                <th class='text-center'>IMAGE</th>
                                                <th class='text-center'>EDIT</th>
                                                <th class='text-center'>DELETE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	 <?php $query="SELECT * FROM category" ;
                                                 $result= mysqli_query($conn,$query) ;

                                                while ($category =mysqli_fetch_assoc($result)) {
                                                	echo '<tr>';
                                                	echo "<td class='text-center'> {$category['cat_id']} </td>";
                                                	echo "<td class='text-center'> {$category['cat_name']} </td>";
                                                	echo "<td class='text-center'> <img class='rounded-circle' src='images/{$category['cat_img']}'> </td>";
                                                	echo "<td class='text-center'><a href='manage_category.php?edit={$category['cat_id']}' class='btn btn-warning' name='edit'> <i class='fa fa-wrench'</i> </a></td>";
                                                    echo "<td class='text-center'><a href='manage_category.php?del={$category['cat_id']}' class='btn btn-danger' name='del'><i class='fa fa-trash-o' > </i></a></td>";
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
<?php

 include_once("includes/admin_footer.php") ?>