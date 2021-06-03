<?php
session_start();


include './php/dbconnect.php';

foreach ($_SESSION['user']as $ucart ) {
  $uart = $ucart['userid'];
  $userblock = "SELECT * FROM users WHERE user_id='$uart'";
  $userblockresult = $con->query($userblock);
  $userb= mysqli_fetch_assoc($userblockresult);
  }
  echo $userb['user_block'];