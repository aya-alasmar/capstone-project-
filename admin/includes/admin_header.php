
<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:login.php');
}
else {
    $id=$_SESSION['id'];
   
}
require("includes/connection.php");

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }

        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }
        .custom{
             background-color:#aa7ad0!important;
            
        }
        .custom a{
             color:white!important;
             font-weight: 700!important;
             font-size: 18px!important;

        }
        .logo{
            color:#aa7ad0!important;
            font-size: 30px!important;
            font-weight: 900!important;
            padding-left:40px;
        }

       .big{
        font-size: 30px;
       }
       .size-93{
        width: 93%;
       }
       

    </style>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel custom" >
        <nav class="navbar navbar-expand-sm navbar-default custom" >
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                   
                  
                    <li class="menu-item-has-children dropdown">
                        <a href="manage_admin.php" class="dropdown-toggle"> </i>Admin</a>
                      
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="manage_category.php" class="dropdown-toggle"> </i>Category</a>
                      
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="manage_product.php" class="dropdown-toggle"> </i>Product</a>
                      
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="manage_customer.php" class="dropdown-toggle"> </i>Customer</a>
                      
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="manage_vendor.php" class="dropdown-toggle"> </i>Vendor</a>
                      
                    </li>
                    <?php
                    if (isset($_SESSION['id'])) {
                       echo"<li class='menu-item-has-children dropdown'>
                        <a href='logout_admin.php' class='dropdown-toggle'> </i>Log Out</a>
                      
                    </li>

                    <li class='menu-item-has-children dropdown'>
                        <a href='manage_admin.php?edit={$_SESSION['id']}' class='dropdown-toggle'> </i>Edit Profile</a>
                      
                    </li>";
                    }
                    ?>
                   
                  
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand logo" href="./">DashBoard</a>
            
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                     <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">
                            <?php
                            if (isset($_SESSION['id'])) {
                                $query  =" SELECT *  FROM admin 
                                           WHERE admin_id =$id";
                                $result = mysqli_query($conn,$query);
                                $admin1 = mysqli_fetch_assoc($result);

                            echo "<h5 class='pr-2'>$admin1[admin_fullname]</h5>";
                            echo " <img class='user-avatar rounded-circle' alt='User Avatar'src='images/$admin1[admin_img]' width=50 height=50>
                        
                           
                        </a>

                        <div class='user-menu dropdown-menu'>
                            <a class='nav-link'";
                              $id= $_SESSION['id'];
                            echo "href='manage_admin.php?edit=$id'
                            ><i class=fa fa -cog></i>Settings</a>

                            <a class='nav-link' href='logout.php?admin'><i class='fa fa-power -off'></i>Logout</a>";} 
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->