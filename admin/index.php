<?php
include_once("includes/admin_header.php");
?>
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-cash"></i>
                            </div> 
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">$<span class="count">

                                          <?php
                                        $q2="SELECT SUM(total) FROM `order` ";
                                        $r2=mysqli_query($conn,$q2);
                                        $sum=0;
                                        while($x2=mysqli_fetch_assoc($r2)){
                                          $sum+=$x2['SUM(total)'];
                                        }
                                        echo ($sum) ;
                                        ?>

                                    </span></div>
                                    <div class="stat-heading">Revenue</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-cart"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"> 

                                       <?php
                                        $q="SELECT COUNT(order_id) FROM `order`";
                                        $r=mysqli_query($conn,$q);

                                        while($x=mysqli_fetch_assoc($r)){
                                            $COUNT=$x['COUNT(order_id)'];
                                        }
                                        
                                        echo "$COUNT";?>
                                            
                                        </span></div>
                                    <div class="stat-heading">Orders</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-browser"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">

                                        <?php
                                        $q="SELECT COUNT(vendor_id)
                                        FROM vendor";
                                        $r=mysqli_query($conn,$q);

                                        while($x=mysqli_fetch_assoc($r)){
                                            $COUNT=$x['COUNT(vendor_id)'];
                                        }
                                        
                                        echo "$COUNT";?>

                                            </span></div>
                                    <div class="stat-heading">Vendors</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">

                                          <?php
                                        $q="SELECT COUNT(admin_id)
                                        FROM admin";
                                        $r=mysqli_query($conn,$q);

                                        while($x=mysqli_fetch_assoc($r)){
                                            $COUNT=$x['COUNT(admin_id)'];
                                        }
                                        
                                        echo "$COUNT";?>

                                    </span></div>
                                    <div class="stat-heading">Admins</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center custom">
            <img src="logo.png" width="800" height="600" class="d-block mx-5 pl-5">
            
        </div>
    </div>
</div>





<?php
include_once("includes/admin_footer.php");
?>

