<?php 
require("includes/connection.php");

if (isset($_GET['id'])) {  
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
           $qimg ="SELECT vendor_img 
                   FROM   vendor 
                   WHERE  vendor_id = {$_GET['id']} " ;

            $rimg    = mysqli_query($conn,$qimg) ;
            $new_img =mysqli_fetch_assoc($rimg);
            $img     =$new_img['vendor_img'];
            

          }

          $query= "UPDATE  vendor SET  vendor_name       ='$name',
                                        vendor_email     ='$email',
                                         vendor_password ='$password',
                                         vendor_mobile   ='$mobile',
                                         
                                         vendor_img      ='$img'
                                    WHERE vendor_id      ='$_GET[id]'";

         mysqli_query($conn,$query);
      
        $msg="    <div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
                                        <span class='badge badge-pill badge-success'>UPDATED</span>
                                        You successfully updated your profile
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>";


        }
       $query     = "select * from vendor where vendor_id ={$_GET['id']}";

       $result    = mysqli_query($conn,$query);
       $vendor  = mysqli_fetch_assoc($result);
        }
    

include_once("includes/vendor_header.php") ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">Update Vendor</div>
            <div class="card-body">
              <div class="card-title">
                <h3 class="text-center title-2">edit vendor</h3>
              </div>
              <hr>
              <?php
              if (isset($msg)) {
               echo $msg;
              }
              ?>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="vendor_name" class="control-label mb-1"> name</label>
                  <input id="vendor_name" name="name" type="text" class="form-control"  
                  value="<?php echo $vendor['vendor_name'];?>">
                </div>
                                <div class="form-group">
                                    <label for="customer_email" class="control-label mb-1"> email</label>
                                    <input id="customer_email" name="email" type="text" class="form-control"  value="<?php echo $vendor['vendor_email'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="customer_password" class="control-label mb-1"> password</label>
                                    <input id="customer_password" name="password" type="password" class="form-control" value="<?php echo $vendor['vendor_password'];?>">
                                </div><div class="form-group">
                                    <label for="customer_mobile" class="control-label mb-1">mobile</label>
                                    <input id="customer_mobile" name="mobile" type="text" class="form-control" value="<?php echo $vendor['vendor_mobile'];?>">
                                </div>

                                <div class="form-group">
                                    <label for="customer_img" class="control-label mb-1">image</label>
                                    <input id="customer_img" name="img" type="file" class="form-control cc-number identified visa" value="<?php echo $vendor['vendor_img'];?>"> 
                                
                                    
                                </div>
                       <div>
                                <button id='update_admin_btn' type='submit' class='btn btn-lg btn-info btn-block custom' name='update'>
                                        update
                                    </button>
                              
                                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
<?php include_once("includes/admin_footer.php") ?>