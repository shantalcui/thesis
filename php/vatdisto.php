<?php
include 'dbconnect.php';
require_once('component.php');
session_start();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--order-->
<?php


$total = $tpprice = $vat = $vvat = $dis = $ddis = 0;

foreach ($_SESSION['user'] as $uisd) {

  $usname = $uisd['username'];
  $i = $uisd['userid'];

  $billoutsql = "SELECT * FROM orders WHERE   order_username ='$usname' and order_status='Served'";
  $billoutsqlresult = $con->query($billoutsql);
  $userquery = "select * from users WHERE user_id=$i";
  $userqueryresult = mysqli_query($con, $userquery);
  $rows = mysqli_fetch_array($userqueryresult);

  while ($row = mysqli_fetch_assoc($billoutsqlresult)) {
    bill($row['order_image'], $row['order_name'], $row['order_price'], $row['order_qty'], $row['order_tprice']);
    $tpprice = ($row['order_price'] * $row['order_qty']);




    if ($rows['user_age'] <= 49) {
      $vat = (0.12 * (int)$tpprice);
      $vvat = $vvat + $vat;

      $total = $total + $tpprice + $vat;
      $_SESSION['subtotal'] = $total;
      $_SESSION['vattotal'] = $vvat;
      $_SESSION['distotal'] = $ddis;
    } else {
      $dis = ((int)$tpprice * 0.2);
      $ddis = $ddis + $dis;

      $total = $total + ($tpprice - $dis);
      $_SESSION['subtotal'] = $total;
      $_SESSION['vattotal'] = $vvat;
      $_SESSION['distotal'] = $ddis;
    }


    $totolupdate="UPDATE user_tables SET utable_change='$total' WHERE utable_Username='$usname' and utable_Status='Reserved'";
    $totolupdateresult = mysqli_query($con, $totolupdate);


  }
}





?>
<li class="row list-group-item d-flex justify-content-between">
  <div class="form-check-inline col-12 mr-auto mb-3" id="dis">
    <button type="button" name="discount" id="discount" class="btn btn-outline-danger col-12" onclick="mydiscount()">
      <small>Click to Apply Discount <br>(Senior, PWD etc.)</small>
    </button>
  </div>



  <div class="form-check-inline col-12 mx-auto my-n1">
    <small class="col">VAT 12%</small>
    <small class="col-3 text-right mr-n1"><?php echo "₱" . $_SESSION['vattotal']; ?>
      <!--(VAT=AMOUNT*0.12)-->
      <!--PAG MAY SENIOR DISCOUNT PHP0.00 NA YUNG VAT-->
    </small>
  </div>
  <div class="form-check-inline col-12 mx-auto my-n1">
    <small class="col">Discount 20%</small>
    <small class="col-3 text-right mr-n1"><?php echo "₱" . $_SESSION['distotal']; ?>
      <!--(DISCOUNT=AMOUNT*0.2)-->
    </small>
  </div>



  <strong class="col">SubTotal</strong>
  <strong class="col text-right"><?php

  $k=$_SESSION['subtotal'];
  $g=$_SESSION['subtotal']- $rows['user_approve'];
  $totolupdates="UPDATE user_tables SET utable_change='$g' WHERE utable_Username='$usname' and utable_Status='Reserved'";
    $totolupdatesresult = mysqli_query($con, $totolupdates);
  if ($g<0) {
   $updatepointsquery="UPDATE users SET user_approve='$k' WHERE user_id=$i";
  $updatepointsqueryresult=mysqli_query($con,$updatepointsquery);

  
  }
  $_SESSION['gtotal']=$g;
  
  
                                  echo "₱" . $g;
                                  ?></strong>
</li>