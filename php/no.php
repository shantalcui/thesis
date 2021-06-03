<?php
session_start();
include 'dbcall.php';
foreach ($_SESSION['user']as $upoint ) {
  	$yes=$upoint ['userid'];
  	}	



$pointsql = "UPDATE users SET user_approve=0 WHERE  user_id='$yes'";
$pointsqlresult = mysqli_query($con, $pointsql);

?>