<?php 
require("includes/connection.php");
if (isset($_POST['submit'])) {
 $email   =$_POST['email'];
 $name    =$_POST['name'];
 $password=$_POST['password'];
 $password2=$_POST['pass2'];
 $mobile  =$_POST['mobile'];
 $address =$_POST['address'];
 $img     =$_FILES['img']['name'];
 $img=time().$img;
 $tmp_name=$_FILES['img']['tmp_name'];
 $path    ='images/';
 move_uploaded_file($tmp_name, $path.$img);


$query    ="SELECT * FROM customer 
              WHERE customer_email= '$email'";

    $result   =mysqli_query($conn,$query);
    $customer = mysqli_fetch_assoc($result);
     
    if (empty($customer['customer_id'])){
      if ($password!=$password2) {
        $pass_error="the password you entered do not match , try again please";
      }
      else{
        $query2= "INSERT INTO customer(customer_name, customer_email, customer_password,
                                    customer_mobile, customer_address, customer_img)
                 VALUES ('$name','$email','$password','$mobile','$address','$img')" ;
        mysqli_query($conn, $query2);
      
        header("location:manage_customer.php");
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
   $address =$_POST['address'];

   if ($_FILES['img']['error']==0) {
    $img      =$_FILES['img']['name'];
    $tmp_name =$_FILES['img']['tmp_name'];
    $path     ='images/';
    move_uploaded_file($tmp_name, $path.$img);
  } 
  else {
   $qimg ="SELECT customer_img 
   FROM customer 
   WHERE customer_id = {$_GET['edit']} " ;

   $rimg    = mysqli_query($conn,$qimg) ;
   $new_img =mysqli_fetch_assoc($rimg);
   $img     =$new_img['customer_img'];


 }

 $query= "UPDATE  customer SET  customer_name    ='$name',
 customer_email   ='$email',
 customer_password ='$password',
 customer_mobile  ='$mobile',
 customer_address ='$address',
 customer_img     ='$img'
 WHERE customer_id     ='$_GET[edit]'";

 mysqli_query($conn,$query);
 header("location:manage_customer.php");

}
$query     = "select * from customer where customer_id ={$_GET['edit']}";

$result    = mysqli_query($conn,$query);
$customer  = mysqli_fetch_assoc($result);
}
elseif(isset($_GET['del'])){
  $query ="DELETE FROM customer WHERE customer_id ={$_GET['del']}";
  mysqli_query($conn,$query);        
}


include_once("includes/admin_header.php") ?>
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">Manage customer</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">Create customer</h3>
							</div>
							<hr>
							<form action="" method="post" enctype="multipart/form-data">
							

                  <div class="wrap-input100 validate-input" data-validate="Name is required">
                  <span class="label-input100" >Full Name</span>
                  <input class="input100" type="text" name="name" placeholder="Name..."  value="<?php if (isset($_GET['edit'])){
                    echo $customer['customer_name'];}?>">
                  <span class="focus-input100"></span>
                  </div>
                
                  <div class="wrap-input100 validate-input">
                  <span class="label-input100">Email</span>
                  <input class="input100" type="email" name="email" placeholder="Email addess..." value="<?php if (isset($_GET['edit'])){echo $customer['customer_email'];}?>" required>
                  <span class="focus-input100"></span>
                  </div>
                  <?php if (isset($email_error)) {
                               echo "<div class='alert alert-danger'> $email_error</div>";
                            } ?>

                   
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="*************" value="<?php if (isset($_GET['edit'])){
                        echo $customer['customer_password'];}?>" required>
                    <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
                      <span class="label-input100">Repeat Password</span>
                      <input class="input100" type="password" name="pass2" placeholder="*************" required>
                      <span class="focus-input100"></span>
                      <?php if (isset($pass_error)) {
                                         echo "<div class='alert alert-danger'>$pass_error</div>";
                                      } ?>
                    </div>

                      <div class="wrap-input100 validate-input" data-validate="Mobile NO. is required">
                      <span class="label-input100" >Mobile NO.</span>
                      <input class="input100" type="number" name="mobile" placeholder="Mobile NO..." value="<?php if (isset($_GET['edit'])){echo $customer['customer_mobile'];}?>" required>
                      <span class="focus-input100"></span>
                    </div>

                      <div class="wrap-input100 validate-input" data-validate="Address is required">
                      <span class="label-input100" >Adress</span>
                      <input class="input100" type="text" name="address" placeholder="Address..." value="<?php if (isset($_GET['edit'])){
                          echo $customer['customer_address'];}?>">
                      <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100" >
                      <span class="label-input100" >Image</span>
                      <input class="input100" type="file" name="img" placeholder="Image..." value="<?php if (isset($_GET['edit'])){
                            echo $customer['customer_img'];}?>">
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
                                    <th>ADDRESS</th>
                                    <th>IMAGE</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>


                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $query="SELECT * FROM customer" ;
                                  $result= mysqli_query($conn,$query) ;

                                  while ($customer =mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    echo "<td> {$customer['customer_id']} </td>";
                                    echo "<td> {$customer['customer_name']} </td>";
                                    echo "<td> {$customer['customer_email']} </td>";
                                    echo "<td> {$customer['customer_mobile']} </td>";
                                    echo "<td> {$customer['customer_address']} </td>";
                                    echo "<td><img src='images/{$customer['customer_img']}' class='rounded-circle' > </td>";

                                    echo "<td><a href='manage_customer.php?edit={$customer['customer_id']}' class='btn btn-warning' name='edit'> <i class='fa fa-wrench '></i></a></td>";
                                    echo "<td><a href='manage_customer.php?del={$customer['customer_id']}' class='btn btn-danger' name='del'> <i class='fa fa-trash-o'></i> </a ></td>";
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