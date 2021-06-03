<?php 
session_start();
include 'dbcall.php';
if(isset($_GET['cash']) && !empty($_GET['cash']))
{	
	date_default_timezone_set("Asia/Taipei");
    $date=date("F d Y/h:ia");
    $user=$_GET['user'];
	$cash=$_GET['cash'];
	$id=$_GET['id'];
	$change=$_GET['change'];
	$amount=$_GET['amount'];
	
		$incomesql="INSERT INTO income( income_Transaction,income_Date_Time,income_amount) VALUES ('$user','$date','$cash')";
      $incomesqlresult=mysqli_query($con,$incomesql);

      $quu = "UPDATE take_out_number SET take_out_change='$change',take_out_amount='$amount' WHERE take_out_number_id='$id'";
      $presult=mysqli_query($con,$quu);
      

   }