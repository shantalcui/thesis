<?php
session_start();


include 'dbconnect.php';

$userorder= "UPDATE orders SET notice='scam' WHERE order_status='Not Paid' and notice='notice' or order_status='Not Paid' and notice='stop'";
  $userorderresult = $con->query($userorder);
   $userorderrow = mysqli_fetch_assoc($userorderresult);