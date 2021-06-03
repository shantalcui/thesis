<?php
include 'dbconnect.php';
include 'component.php';
session_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Table #</th>
              <th>Customer's Username</th>
              <th>Status</th>
              <th>Date/Time Reserved</th>
              <th>Date/Time Out</th>
              <th>Payment</th>
              <th>Change</th>
              <th>Discount</th>
              <th>Kick</th>
            </tr>
          </thead>
          <tbody>

           <!--info-->
            <?php
            date_default_timezone_set("Asia/Taipei");
            $dd=date("y-m-d");
$sql = "SELECT * FROM user_tables";
$result = $con->query($sql);
 
  
  while ($row = mysqli_fetch_assoc($result)) {
     if($row['utable_Status']=='Reserved'){
         
          $button="text-danger";
          $diss="";
          $db="";

        }else{
          
          $button="text-success";
          $diss="disabled";
           $db="disabled";
        }
      
          if ($row['utable_dd']==$dd) {
            getactivetable($row['utable_Table_no'], $row['utable_Username'], $row['utable_Status'], $row['utable_Date_time'] , $row['utable_Date_time_out'] , $button,$diss,$row['user_payment'] ,$row['utable_Table_no'],$db,$row['utable_Table_no'],$row['utable_user_id'],$row['user_verify'],$row['user_change']);
          }
          
              }
    
    
  

            

           ?>
            
          </tbody>
        </table>