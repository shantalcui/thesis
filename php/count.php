<?php
include 'dbconnect.php';
session_start();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
          foreach ($_SESSION['user']as $iduser ) {
            $iduser=$iduser['userid'];
          }
          $cartquery = "SELECT COUNT(*) AS SUM FROM orders WHERE order_user_id='$iduser' and order_status='' or order_user_id='$iduser' and order_status='Preparing'";
          $cartqueryresult=mysqli_query($con,$cartquery);
          $cartrow = mysqli_fetch_assoc($cartqueryresult);
          echo $cartrow['SUM'];

            ?>