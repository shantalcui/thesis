<?php
include './php/dbcall.php';
require_once ('./php/component.php');
session_start();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <?php     
foreach ($_SESSION['user']as $uid ) {
  $uname=$uid['userid'];

}
 
  $total=0;
$tpprice=0;
$arr="Preparing";

$orderquery="select * from orders where order_user_id='$uname' and order_status='Preparing' or order_user_id='$uname' and order_status=''";
$orderqueryresult=mysqli_query($con,$orderquery);
  while ($row = mysqli_fetch_assoc($orderqueryresult)) {
$n=$row['order_name'];
      
      if ($row['order_status']=="Preparing") {
      $btn="button";
      $status="disabled";
      $preparing="Preparing";
          }else{
      $btn="submit";
      $status="";
      $preparing="<img src='https://img.icons8.com/fluent-systems-filled/25/ffffff/delete-trash.png'/>";

    }
    $tpprice=($row["order_qty"] * (int)$row['order_price']);
          $total=$total+$tpprice;
getcart($row['order_image'], $row['order_name'], $row['order_price'],$row['order_name_id'],$tpprice,$row['order_qty'],$btn,$status,$preparing);
      
          
          

        
        
      }
      
    
  
     ?>
     </li>
   
    
       
       
        <li class="row list-group-item d-flex justify-content-between">
          <strong class="col">SubTotal</strong>

          <strong class="col text-right">
            <?php
      echo "Php ".$total.".00";


        ?>
          
        </strong>
        </li>
             

          