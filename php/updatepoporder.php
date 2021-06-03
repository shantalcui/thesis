<?php
session_start();


include 'dbconnect.php';


foreach ($_SESSION['user']as $uid ) {
  $uname=$uid['userid'];

}


$userorder= "UPDATE orders SET notice='alert' WHERE order_user_id='$uname' and order_status='Preparing' or order_user_id='$uname' and order_status=''";
  $userorderresult = $con->query($userorder);
   $userorderrow = mysqli_fetch_assoc($userorderresult);
         