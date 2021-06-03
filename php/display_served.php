<?php
session_start();


include 'dbconnect.php';

foreach ($_SESSION['user']as $ucart ) {
  $uart = $ucart['userid'];
  $userblock = "SELECT * FROM orders WHERE order_user_id='$uart' and order_status='Served'and order_served='on'";
  $userblockresult = $con->query($userblock);
  $userb= mysqli_fetch_assoc($userblockresult);
  echo  $userb['order_served'];
}
