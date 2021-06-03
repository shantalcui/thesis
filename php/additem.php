
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

<?php

session_start();
include 'dbcall.php';
require_once('component.php');

$_SESSION['cartproductid']=$_GET['id'];
$_SESSION['cartordername']=$_GET['name'];
$_SESSION['cartorderprice']=$_GET['price'];
$_SESSION['cartqty']=$_GET['qty'];

function subArraysToString($ar, $sep = ', ') {
              $str = '';
              foreach ($ar as $val) {
               $str .= join($sep, $val);  
                  $str .= $sep; // add separator between sub-arrays
            }
             $str = rtrim($str, $sep); // remove last separator
            return $str;
            }

             $tableiid=subArraysToString($_SESSION['table-id']);

           
          foreach ($_SESSION['user'] as $email => $uvalue) {        
           
              
              
              
                
                   
                   $user_iid=$uvalue['userid'];
                   
                   $useremail=$uvalue['useremail'];
                   $useruname=$uvalue['username'];

                   $orderqty=$_SESSION['cartqty'];
                   $ordernameid=$_SESSION['cartproductid'];
                   $ordername=$_SESSION['cartordername'];
                   
                }   
                   

                   date_default_timezone_set("Asia/Taipei");
                    $date=date("y-m-d");
                    $ddate=date("y-m");
                    $time=date("h:ia");

                    

            

              $dup=mysqli_query($con,"select * from orders where order_name_id='$ordernameid' and order_name='$ordername' and order_table='$tableiid' and order_username='$useruname' and order_user='$useremail' and order_status=''");
             if (mysqli_num_rows($dup)>0) {
             


                ?>
              <script type="text/javascript">
                swal({
                  title: 'Item Is Already In The Cart!',
                  text: 'Choose Another Item',
                  icon: 'error',
                  button: 'Back',
                });
              </script>
              <?php
              
           }
              else{
                $iiiid=$_SESSION['cartproductid'];
                $query="select * from ptb where id='$iiiid'";
                $queryresult=mysqli_query($con,$query);
                $rowx = mysqli_fetch_assoc($queryresult);
                  $p=$rowx['pprice'];
                  $image=$rowx['pimage'];
                  $tprice=($_SESSION['cartqty'] * (int)$rowx['pprice']);
              $query = "INSERT INTO orders(order_name_id,order_image,order_name, order_table,order_username,order_user,order_qty,order_price,order_tprice,order_status ,order_ddate,order_date , order_user_id ) VALUES ('$ordernameid','$image','$ordername' ,'$tableiid','$useruname','$useremail' , '$orderqty' ,'$p','$tprice','' ,'$ddate' , '$date' ,'$user_iid')";
              $utresult=mysqli_query($con,$query);
               /*update Product qty*/  

      
        
         
            
          
          
          ?>
      <script type="text/javascript">
          swal({
            title: 'Successfully Add To Cart!',
            text: 'Go For Another One?',
            icon: 'success',
          });
        </script>
    
    
      <?php
              
                 
                 }
?>


<script>
  function additem(productid,productname,productprice){

     var xmlhttp = new XMLHttpRequest();
     

     var x = document.getElementById("q").value;
   
    xmlhttp.open("GET", "./php/additem.php?id=" +productid+"&name="+productname+"&price="+productprice+"&qty="+x, true);
    xmlhttp.send();
  }
</script>