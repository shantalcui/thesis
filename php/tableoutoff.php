<?php
session_start();


include 'dbconnect.php';


$userblock = "UPDATE user_tables SET off=2 WHERE utable_Status='Available' and off=1 or utable_Status='Available' and off=0";
  $userblockresult = $con->query($userblock);