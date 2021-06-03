<?php
include 'dbconnect.php';

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
          
          $tablecount = "SELECT COUNT(*) AS SUM FROM user_tables WHERE user_verify='verifying' and p1=0 or user_payment='Paying' or user_payment='Cash' and p1=0";
          $tablecountresult=mysqli_query($con,$tablecount);
          $cartrow = mysqli_fetch_assoc($tablecountresult);
          echo $cartrow['SUM'];
          ?>
