<?php
session_start();


include 'dbconnect.php';

$id=$_GET['id'];
$userorder= "UPDATE orders SET notice='notice' WHERE order_username='$id' and order_status='Preparing' or order_username='$id' and order_status=''";
  $userorderresult = $con->query($userorder);
   $userorderrow = mysqli_fetch_assoc($userorderresult);