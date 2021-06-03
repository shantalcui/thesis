<?php
include './php/dbconnect.php';
session_start();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
       foreach ($_SESSION['user']as $e) {
  $e=$e['userid'];
  $logsql = "SELECT * FROM user_tables WHERE utable_Status='Reserved'and utable_user_id='$e'";
}
  $logresult = mysqli_query($con, $logsql);
  $row = mysqli_fetch_assoc($logresult);
    if ($row['user_payment']=="Paying") {

     ?>
     <button type="submit" onclick="document.location='payment.php'" class="btn mx-5 my-0 px-5 text-white" style="font-size: 18px;">Card Payment</button><?php
    }else{
      ?><button type="submit" onclick="document.location='payment.php'" class="btn mx-5 my-0 px-5 text-white" style="display: none; ,font-size: 18px;">Card Payment</button>
  <?php
      
    }
    
 
       ?>
             

          