<?php
session_start();
include 'dbcall.php';
foreach ($_SESSION['takeout']as $utableid ) {
  	$get=$utableid['takeoutid'];
  	}	

              $disql = "UPDATE take_out_number SET take_out_discount='verifying' WHERE take_out_number_id='$get'";
              $disqlresult = mysqli_query($con, $disql);
            

?>