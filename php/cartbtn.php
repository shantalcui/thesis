<?php
include 'dbconnect.php';
require_once ('component.php');
session_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <?php
  foreach ($_SESSION['user'] as $e) {
  $e = $e['username'];
    $orderbutton="SELECT * FROM orders WHERE order_username='$e' and order_status='' or order_status='Preparing'";
	}	
    $orderbuttonresult=mysqli_query($con,$orderbutton);
    if(mysqli_num_rows($orderbuttonresult) > 0){
      	
      	cartbutton("submit","");
      }else{
        
        cartbutton("button","disabled");
      }
    


      ?>