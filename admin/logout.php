<?php

session_start();

if (isset($_GET['admin'])) {
	unset($_SESSION['id']);
header('location:login.php');
}
elseif(isset($_GET['vendor'])){
unset($_SESSION['vendor']);
header('location:vendor_login.php');
}

?>