<?php
include 'dbconnect.php';

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
          
          $ordercount = "SELECT COUNT(*) AS SUM FROM orders WHERE order_status='Preparing'";
          $ordercountresult=mysqli_query($con,$ordercount);
          $cartrow = mysqli_fetch_assoc($ordercountresult);
          echo $cartrow['SUM'];
          ?>
