<?php
session_start();
unset($_SESSION['customer']);
header('location:index.php');

?>