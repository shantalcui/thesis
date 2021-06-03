<?php
session_start();
include 'dbcall.php';
foreach ($_SESSION['user']as $utableid ) {
  	$get=$utableid['userid'];
  	}	

              $disql = "UPDATE user_tables SET user_verify='verifying' WHERE utable_Status='Reserved'and utable_user_id='$get'";
              $disqlresult = mysqli_query($con, $disql);
            

?>