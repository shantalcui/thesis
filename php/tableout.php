<?php
session_start();


include 'dbconnect.php';


$userblock = "SELECT * FROM user_tables WHERE utable_Status='Available' and off=1";
  $userblockresult = $con->query($userblock);
   $noticerow = mysqli_fetch_assoc($userblockresult);
          echo $noticerow['utable_Status'];