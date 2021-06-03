<?php
session_start();


include 'dbconnect.php';

$id=$_GET['id'];
$userorder= "UPDATE orders SET notice='stop' WHERE order_status='Preparing' or order_status=''";
  $userorderresult = $con->query($userorder);
   $userorderrow = mysqli_fetch_assoc($userorderresult);