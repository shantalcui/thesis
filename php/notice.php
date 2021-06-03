<?php
session_start();


include 'dbconnect.php';


$userblock = "UPDATE user_tables SET off=1 WHERE utable_Status='Reserved' and off=0";
  $userblockresult = $con->query($userblock);