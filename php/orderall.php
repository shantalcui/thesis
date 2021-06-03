
<?php
include 'dbcall.php';
require_once ('component.php');
session_start();
?>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<br>
      <h2>Orders</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Order</th>
              <th>Table #</th>
              <th>Customer's Username</th>
              <th>Customer's Email</th>
              <th>Status</th>
        <th>Time Served</th>
        <th>Time Paid</th>
        <th>Served</th>
            </tr>
          </thead>
          <tbody>
           
            
       <!--orders-->     
           <?php
$sql = "SELECT * FROM orders";
$result = $con->query($sql);
 
  
  while ($row = mysqli_fetch_assoc($result)) {

     if($row['order_status']=='Preparing'){
         
          $button="text-danger";
          $btn="";
          
          }elseif($row['order_status']=='Served'){
          
          $button="text-success";
          $btn="disabled";
          
        }

        else{
          
          $button="text-primary";
          $btn="disabled";
        }
        date_default_timezone_set("Asia/Taipei");
        $date=date("y-m-d");

        if ($row['order_date']==$date) {
          getorder($row['order_name'], $row['order_table'],$row['order_username'], $row['order_user'], $row['order_status'] , $row['order_time'] , $row['order_date_out'] , $button,$row['order_name'],$btn,$row['order_name_id'], $row['order_user_id']);
        }
          
      }
    
    
  

            

           ?>



          </tbody>
        </table>
      </div>


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




<script>
    $(document).ready(function(){
 

        function order(){
            $.ajax({
                type: 'POST',
                url: './php/orderall.php',
                success: function(data){
                    $('#orderall').html(data);
                }
            });
        }
        order();
        setInterval(function () {
            order(); 
        }, 1000);  // it will refresh your data every 1 sec

    });

</script>