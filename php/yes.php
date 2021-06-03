
<?php
session_start();
include 'dbcall.php';
foreach ($_SESSION['user']as $upoint ) {
  	$yes=$upoint ['userid'];
  	}	
  	$userquery="select * from users WHERE user_id=$yes";
    $userqueryresult=mysqli_query($con,$userquery);
    $userqueryrows=mysqli_fetch_array($userqueryresult);

    

    $p=$userqueryrows['user_points'];
$pointsql = "UPDATE users SET user_approve=$p WHERE  user_id='$yes'";
$pointsqlresult = mysqli_query($con, $pointsql);

?>