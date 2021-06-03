<?php
include 'dbconnect.php';
require_once ('component.php');
session_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <?php
  foreach ($_SESSION['takeout'] as $e) {
  $e = $e['takeout_id'];
    $orderbutton="SELECT * FROM orders WHERE order_user_id='$e' and order_status='' or order_user_id='$e' and order_status='Preparing'";
	}	
    $orderbuttonresult=mysqli_query($con,$orderbutton);
    if(mysqli_num_rows($orderbuttonresult) > 0){
      	
      	takeout_cartbutton("submit","","");
      }else{
        
        takeout_cartbutton("button","disabled","style='display: none'");
      }
    


      ?>