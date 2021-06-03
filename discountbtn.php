<?php
include './php/dbconnect.php';
session_start();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
     foreach ($_SESSION['user'] as $uised) {

          $nam = $uised['username'];

          $billoutdiscount = "SELECT * FROM orders WHERE   order_username ='$nam' and order_status='Served'";
          $billoutdiscountresult = $con->query($billoutdiscount);
        }
        if (mysqli_num_rows($billoutdiscountresult) > 0) {

          ?>

     <input type="checkbox" name="discount" id="discount" class="form-check-intput ml-n3 mr-n2 px-0" onclick="myFunction()">
              <small for="discount" class="form-check-label"><b>Apply Discount (Senior, PWD etc.)</b></small>
              <?php
        } else {
          ?><input type="checkbox" name="discount" id="discount" class="form-check-intput ml-n3 mr-n2 px-0" onclick="myFunction()" style='display: none'>
              <small for="discount" class="form-check-label" style='display: none'><b>Apply Discount (Senior, PWD etc.)</b></small>
              <?php
        }
        ?>

        

     


        