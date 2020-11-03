<?php 
require("includes/connection.php");
if (isset($_POST['submit'])) {
 $email   =$_POST['email'];
 $name    =$_POST['name'];
 $password=$_POST['password'];
 $password2=$_POST['pass2'];
 $mobile  =$_POST['mobile'];
 $img     =$_FILES['img']['name'];
 $img=time().$img;
 $tmp_name=$_FILES['img']['tmp_name'];
 $path    ='images/';
 move_uploaded_file($tmp_name, $path.$img);


$query    ="SELECT * FROM vendor 
  WHERE vendor_email= '$email'";

  $result   =mysqli_query($conn,$query);
  $vendor = mysqli_fetch_assoc($result);

  if (empty($vendor['vendor_id'])){
    if ($password!=$password2) {
      $pass_error="the password you entered do not match , try again please";
    }
    else{
     $query2= "INSERT INTO vendor (vendor_name, vendor_email, vendor_password,
     vendor_mobile,vendor_img)
     VALUES ('$name','$email','$password','$mobile','$img')" ;
     mysqli_query($conn, $query2);
     header("location:manage_vendor.php");

    }
  }
  else
  {
    $email_error="this Email is already registered "; 
  }

}
if (isset($_GET['edit'])) {  
 if (isset($_POST['update'])) {
   $email   =$_POST['email'];
   $name    =$_POST['name'];
   $password=$_POST['password'];
   $mobile  =$_POST['mobile'];


   if ($_FILES['img']['error']==0) {
    $img      =$_FILES['img']['name'];
    $tmp_name =$_FILES['img']['tmp_name'];
    $path     ='images/';
    move_uploaded_file($tmp_name, $path.$img);
  } 
  else {
   $qimg ="SELECT vendor_img 
   FROM vendor 
   WHERE vendor_id = {$_GET['edit']} " ;

   $rimg    = mysqli_query($conn,$qimg) ;
   $new_img =mysqli_fetch_assoc($rimg);
   $img     =$new_img['vendor_img'];


 }

 $query= "UPDATE  vendor SET  vendor_name    ='$name',
 vendor_email   ='$email',
 vendor_password ='$password',
 vendor_mobile  ='$mobile',
 vendor_img     ='$img'
 WHERE vendor_id     ='$_GET[edit]'";

 mysqli_query($conn,$query);
 header("location:manage_vendor.php");

}
$query     = "select * from vendor where vendor_id ={$_GET['edit']}";

$result    = mysqli_query($conn,$query);
$vendor  = mysqli_fetch_assoc($result);
}
elseif(isset($_GET['del'])){
  $query ="DELETE FROM vendor WHERE vendor_id ={$_GET['del']}";
  mysqli_query($conn,$query);        
}


include_once("includes/admin_header.php") ?>
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">Manage vendor</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">Create vendor</h3>
							</div>
							<hr>
							<form action="" method="post" enctype="multipart/form-data">
					        <div class="wrap-input100 ">
                  <span class="label-input100" > Full Name</span>
                  <input class="input100" type="text" name="name" placeholder="Name..." value="<?php if (isset($_GET['edit'])){ echo $vendor['vendor_name'];}?>" required>
                  <span class="focus-input100"></span>
                </div>
               
                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="email" name="email" placeholder="Email addess..." value="<?php if (isset($_GET['edit'])){echo $vendor['vendor_email'];}?>" required>
                    <span class="focus-input100"></span>
                </div>
               <?php
                if (isset($email_error)) {
                  echo "<div class='alert alert-danger'> $email_error</div>";
                } ?>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                  <span class="label-input100">Password</span>
                  <input class="input100" type="password"  name="password" placeholder="*************" value="<?php if (isset($_GET['edit'])){echo $vendor['vendor_password'];}?>"required>
                  <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
                  <span class="label-input100">Repeat Password</span>
                  <input class="input100" type="password" name="pass2" placeholder="*************">
                  <span class="focus-input100"></span>
                  <?php if (isset($pass_error)) {
                    echo "<div class='alert alert-danger'>$pass_error</div>";
                  } ?>
                </div>
                  <div class="wrap-input100 validate-input" data-validate="Mobile NO. is required">
                      <span class="label-input100" >Mobile NO.</span>
                      <input class="input100" type="number" name="mobile" placeholder="Mobile NO..." value="<?php if (isset($_GET['edit'])){
                        echo $vendor['vendor_mobile'];}?>" required>
                      <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100" >
                    <span class="label-input100" >Profile Picture</span>
                    <input class="input100" name="img" type="file"  value="<?php if (isset($_GET['edit'])){ echo $vendor['vendor_img'];}?>" required>
                    <span class="focus-input100"></span>
                  </div>

                        <div>
                          <?php
                          if (!isset($_GET['edit'])) {
                            echo "<button id='manage_admin_btn' type='submit' class='btn btn-lg btn-info btn-block custom' name='submit'>
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
                <div class="row">
                  <div class="col-xl-12">
                    <div class="card">

                      <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                          <table class="table ">
                            <thead>
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>NAME</th>
                                  <th>EMAIL</th>
                                  <th>MOBILE</th>
                                  <th>IMAGE</th>
                                  <th> #.Products</th>
                                  <th>EDIT</th>
                                  <th>DELETE</th>


                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $query="SELECT * FROM vendor" ;
                                $result= mysqli_query($conn,$query) ;

                                
                                while ($vendor =mysqli_fetch_assoc($result)) {
                                  echo '<tr>';
                                  echo "<td> {$vendor['vendor_id']} </td>";
                                  echo "<td> {$vendor['vendor_name']} </td>";
                                  echo "<td> {$vendor['vendor_email']} </td>";
                                  echo "<td> {$vendor['vendor_mobile']} </td>";

                                  echo "<td><img src='images/{$vendor['vendor_img']}' class='rounded-circle' > </td>";
                                  echo "<td>";
                                  $q="SELECT COUNT(product_id)
                                              FROM product
                                              WHERE vendor_id={$vendor['vendor_id']}";
                                          $r=mysqli_query($conn,$q);
                                          
                                          while($x=mysqli_fetch_assoc($r)){
                                          $COUNT=$x['COUNT(product_id)'];
                                          }
                                          echo "$COUNT </td>";
                                  echo "<td><a href='manage_vendor.php?edit={$vendor['vendor_id']}' class='btn btn-warning' name='edit'><i class='fa fa-wrench'></i></a></td>";
                                  echo "<td><a href='manage_vendor.php?del={$vendor['vendor_id']}' class='btn btn-danger' name='del'><i class='fa fa-trash-o'></i></a></td>";
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