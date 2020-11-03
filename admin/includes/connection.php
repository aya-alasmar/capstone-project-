<?php

$conn=mysqli_connect("localhost","root","","project");
   if(! $conn){
   	die("cannot connect to server");
   }