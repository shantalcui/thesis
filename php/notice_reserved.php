<?php
include 'dbconnect.php';


          
          $notice = "SELECT * FROM user_tables WHERE utable_Status='Reserved' and off=0";
          $noticeresult=mysqli_query($con,$notice);
          $noticerow = mysqli_fetch_assoc($noticeresult);
          echo $noticerow['utable_Status'];
          ?>
