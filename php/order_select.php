<?php
session_start();


include 'dbconnect.php';




$userorder= "SELECT * FROM orders WHERE order_status='Preparing' and notice=''";
  $userorderresult = $con->query($userorder);
   $userorderrow = mysqli_fetch_assoc($userorderresult);
          echo $userorderrow['order_status'];