<?php
include './php/dbconnect.php';
session_start();

foreach ($_SESSION['user'] as $e) {
  $e = $e['userid'];
  $logsql = "SELECT * FROM user_tables WHERE utable_Status='Reserved'and utable_user_id='$e' and p1=1";
}
$logresult = mysqli_query($con, $logsql);
$row = mysqli_fetch_assoc($logresult);
 echo $row['user_payment'];

 ?>