<?php
include 'dbconnect.php';
session_start();

foreach ($_SESSION['user'] as $e) {
  $e = $e['userid'];
 
  $userblock = "UPDATE user_tables SET p1=3 WHERE utable_Status='Reserved'and utable_user_id='$e' and p1=1";
  $userblockresult = $con->query($userblock);
}


 ?>