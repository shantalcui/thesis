<?php
session_start();


include 'dbconnect.php';

foreach ($_SESSION['user']as $ucart ) {
  $uart = $ucart['userid'];
  
  
}
$userblock = "UPDATE orders SET order_served='off' WHERE order_user_id='$uart' and order_status='Served' and order_served='on'";
  $userblockresult = $con->query($userblock);