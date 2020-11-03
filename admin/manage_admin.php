<?php 
require("includes/connection.php");
$path     ='images/';
if (isset($_POST['submit'])) {
	$img      =$_FILES['img']['name'];

	$img      =time().$img;
	$tmp_name =$_FILES['img']['tmp_name'];
	move_uploaded_file($tmp_name, $path.$img);

	$email    =$_POST['email'];
	$fullname =$_POST['fullname'];
	$password =$_POST['password'];
	$password2=$_POST['pass2'];



	$query    ="SELECT * FROM admin 
	WHERE admin_email= '$email'";

	$result   =mysqli_query($conn,$query);
	$admin = mysqli_fetch_assoc($result);

	if (empty($admin['admin_id'])){
		if ($password!=$password2) {
			$pass_error="the password you entered do not match , try again please";
		}
		else{

			$query= "INSERT INTO admin (admin_email,admin_fullname,admin_password,admin_img)
			VALUES ('$email','$fullname','$password','$img')" ;    

			mysqli_query($conn, $query);

			header("location:manage_admin.php");

		}
	}
	else
	{
		$email_error="this Email is already registered "; 
	}

}


if (isset($_GET['edit'])) {  
	$id=$_GET['edit'];
	if (isset($_POST['update'])) {
		$email    =$_POST['email'];
		$fullname =$_POST['fullname'];
		$password =$_POST['password'];

		if ($_FILES['img']['error']==0) {
			$img      =$_FILES['img']['name'];
			$tmp_name =$_FILES['img']['tmp_name'];
			$path     ='images/';
			move_uploaded_file($tmp_name, $path.$img);
		}
		else {

			$qimg ="SELECT admin_img FROM admin 
			WHERE admin_id = $id " ;

			$rimg= mysqli_query($conn,$qimg) ;
			$new_img =mysqli_fetch_assoc($rimg);
			$img=$new_img['admin_img'];


		}

		$query    = "UPDATE admin 
		SET admin_email    ='$email',
		admin_fullname ='$fullname',
		admin_password ='$password',
		admin_img      ='$img'

		WHERE admin_id     =$id";    
		mysqli_query($conn, $query);
		header("location:manage_admin.php");

	}
	$query  = "select * from admin where admin_id =$id";
	$result = mysqli_query($conn,$query);
	$admin  = mysqli_fetch_assoc($result);
}



if (isset($_GET['del'])) {
	$id=$_GET['del'];
	$query ="DELETE FROM admin WHERE admin_id=$id";
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
								echo "Manage Admin";}
								else 
									echo"Update Admin ";

								?></div>
								<div class="card-body">
									<div class="card-title">
										<h3 class="text-center title-2" name="create">
											<?php if (!isset($_GET['edit'])) {
												echo "Create Admin";}
												else 
													echo"Edit Admin ";

												?>

											</h3>
										</div>
										<hr>
										<form action="" method="post" enctype="multipart/form-data">

											<div class="wrap-input100 validate-input">
												<span class="label-input100">Email</span>
												<input class="input100" type="email" name="email" placeholder="Email addess..." value="<?php if (isset($_GET['edit'])){ echo $admin['admin_email'];}?>" required>
												<span class="focus-input100"></span>
											</div>
											 <?php if (isset($email_error)) {
				                               echo "<div class='alert alert-danger'> $email_error</div>";
				                            } ?>


											<div class="wrap-input100 ">
												<span class="label-input100" > Full Name</span>
												<input class="input100" type="text" name="fullname" placeholder="Name..." value="<?php if (isset($_GET['edit'])){ echo $admin['admin_fullname'];}?>" required>
												<span class="focus-input100"></span>
											</div>




											<div class="wrap-input100 validate-input" data-validate = "Password is required">
												<span class="label-input100">Password</span>
												<input class="input100" type="password"  name="password" placeholder="*************" value="<?php if (isset($_GET['edit'])){echo $admin['admin_password'];}?>" required>
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

											<div class="wrap-input100" >
												<span class="label-input100" >Profile Picture</span>
												<input class="input100" name="img" type="file"  value="<?php if (isset($_GET['edit'])){echo $admin['admin_img'];}?>"required>
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
														<tr>
															<th class="text-center " >ID</th>
															<th class="text-center " >Email</th>
															<th class="text-center " >Full Name</th>

															<th class="avatar text-center " >profile picture</th>
															<th class="text-center " >Edit</th>
															<th class="text-center " >Delete</th>
														</tr>
													</thead>
													<tbody>
														<?php $query="SELECT * FROM admin" ;
														$result= mysqli_query($conn,$query);
														while ($admin =mysqli_fetch_assoc($result)) {
															echo '<tr>';
															echo "<td class=text-center > {$admin['admin_id']} </td>";
															echo "<td class=text-center > {$admin['admin_email']} </td>";
															echo "<td class=text-center > {$admin['admin_fullname']} </td>";
															echo "<td class=text-center > <img src='images/{$admin['admin_img']}' class='rounded-circle'  > </td>";
															echo "<td class=text-center ><a href='manage_admin.php?edit={$admin['admin_id']}' class='btn btn-warning' name='edit'> <i class='fa fa-wrench'></i></a></td>";

															echo "<td class=text-center ><a href='manage_admin.php?del={$admin['admin_id']}' class='btn btn-danger' name='del'><i class='fa fa-trash-o'></i> </a ></td>";

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
						<?php include_once("includes/admin_footer.php"); ?>
