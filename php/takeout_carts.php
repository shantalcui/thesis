<?php
include 'dbcall.php';
require_once ('component.php');
session_start();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <?php     
   $total=$tpprice=$vat=$vvat=$dis=$ddis=0;
foreach ($_SESSION['takeout'] as $uid ) {
  $uname=$uid['takeout_id'];
  $i=$uid['takeoutid'];
}




 






$orderquery="select * from orders where order_user_id='$uname' and order_status='' or order_user_id='$uname' and order_status='Preparing'";
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

        
takeoutcart($row['order_image'], $row['order_name'], $row['order_price'],$row['order_name_id'],$tpprice,$row['order_qty'],$btn,$status,$preparing);
      $userquery="select * from take_out_number WHERE take_out_number_id='$i'";
$userqueryresult=mysqli_query($con,$userquery);
$takeoutrows=mysqli_fetch_array($userqueryresult);
 
          
      if ($takeoutrows['take_out_age']<=49) 
            {
            $vat=(0.12 * (int)$tpprice);
            $vvat=$vvat+$vat;
            
            $total=$total+$tpprice+$vat;
            $_SESSION['takeout_$vat']=$vvat;
            $_SESSION['takeout_$dis']=0;
            $_SESSION['takeout_total']=$total;
            
            
            }else
            {
              $dis=((int)$tpprice * 0.2 );
              $ddis=$ddis+$dis;
              
              $total=$total+($tpprice-$dis);
              $_SESSION['takeout_$vat']=0;
              $_SESSION['takeout_$dis']=$ddis;
              $_SESSION['takeout_total']=$total;
             
            }
        
        
      
    }  
    
  
     ?>
     </li>
   
    
       
       
<li class="row list-group-item d-flex justify-content-between">
  <div class="form-check-inline col-12 mr-auto mb-3" id="dis">
    <button type="button" name="discount" id="discount" class="btn btn-outline-danger col-12" onclick="yesdiscount()">
      <small>Click to Apply Discount <br>(Senior, PWD etc.)</small>
    </button>
  </div>

             <div class="form-check-inline col-12 mx-auto my-n1">
            <small class="col">VAT 12%</small>
            <small class="col text-right"><?php echo "₱".$vvat;?> </small>
            </div>
            <div class="form-check-inline col-12 mx-auto my-n1">
            <small class="col">Discount 20%</small>
            <small class="col text-right"><?php echo "₱".$ddis;?> </small>
           
            </div>
          <strong class="col">SubTotal</strong>

          <strong class="col text-right"><?php echo "₱".$total;?> </strong>
        </li>

        <?php
        $cancel = "SELECT * FROM orders WHERE   order_user_id ='$uname' and order_status='Served'";
          $cancelresult = $con->query($cancel);
        
        if (mysqli_num_rows($cancelresult) > 0) {
           ?> <button type="button" onclick="document.location='takeout_receipt.php'" class="btn mx-5 my-0 px-5 text-white" style="font-size: 18px;">Receipt</button><?php
         
        } else {
           
        }
        ?>
             
