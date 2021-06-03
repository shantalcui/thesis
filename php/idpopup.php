<?php
session_start();


include 'dbconnect.php';




$userorder= "SELECT * FROM orders WHERE order_status='Preparing' and notice='alert' or order_status='' and notice='alert'";
  $userorderresult = $con->query($userorder);
   $userorderrow = mysqli_fetch_assoc($userorderresult);
          echo $userorderrow['order_username'];