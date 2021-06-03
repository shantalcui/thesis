<?php

session_start();

include './php/dbcall.php';
require_once ('./php/component.php');
//OR code






//login failed

 foreach ($_SESSION['takeout']as $uid ) {
  $uname=$uid['takeoutname'];
  $tid=$uid['takeout_id'];

  }
   

 if($uname> 0){
  

  
 }else{
  header("location:takeout_front.php");
      session_destroy();
 }
  



  


?>
<!doctype html>
<html lang="en">
  <head>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <title>Don Covido's | Cart</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="./css/form-validation.css" rel="stylesheet">
  </head>
  
  <body class="bg-dark text-white">
<header>
  <?php
  include './php/takeout_navbar.php';
   if (isset($_POST['takeout_remove'])){
  if ($_GET['action'] == 'remove'){
   
   $removeid=$_GET['id'];
      
          
               $orderremovesql = "DELETE FROM orders WHERE order_name_id='$removeid' and order_status=''";
               $orderremovesqlresult=mysqli_query($con,$orderremovesql);
             ?>
      <script type="text/javascript">
          swal({
            title: 'Successful!',
            text: 'Successfully Remove!',
            icon: 'success',
          });
        </script>
    
    
      <?php
              
          
      
  }
}
  ?>

 

</header>
    <div class="container">
  <div class="py-5 text-center">
    <h1 class="mt-5">CART</h1>
  </div>

  <div class="row text-dark">
    <div class="col-12 mx-auto">
      <ul class="list-group mb-3" id="cart"></ul>

          <div class="row" id="cartbtn"></div>
        
          


<!-- Modal -->
        <div class="modal fade" id="payment" role="dialog">
          <div class="modal-dialog">
            <form method="post">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Mode of Payment</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body row">

                  <button type="submit" class="btn btn-large col" name="cash">
                    <span><img src="https://img.icons8.com/plasticine/70/ffffff/money.png"/></span>
                    <br>
                    <span>Cash</span>
                  </button>
                  <button type="submit" class="btn btn-large col" name="card">
                    <span><img src="https://img.icons8.com/bubbles/70/000000/bank-card-back-side.png"/></span>
                    <br>
                    <span>Card</span>
                  </button>

            </form>
            <?php

            
            if (isset($_POST['cash'])) {

              foreach ($_SESSION['takeout'] as $key) {
                $outid=$key['takeout_id'];
                $toutid=$key['takeoutid'];
                $change=$_SESSION['takeout_total'];
           $table_sql = "UPDATE ptb AS tb JOIN orders AS tbl ON (tbl.order_name_id = tb.id) SET tb.pqty = (tb.pqty - tbl.order_qty) WHERE tbl.order_user_id='$outid' and tbl.order_status='' and tbl.order_place='' and tbl.takeout_id='$toutid'";
            $statement = mysqli_query($con,$table_sql);      
 }
             

   $ordersql="SELECT * FROM orders";
   $ordersqlresult=mysqli_query($con,$ordersql);







        while ($orderrow = mysqli_fetch_assoc($ordersqlresult)) {
          
         
        
          foreach ($_SESSION['takeout']  as $email => $uvalue) {        
           
              
              
              
                
                   
                   $user_iid=$uvalue['takeout_id'];
                   
                   $useremail=$uvalue['takeoutemail'];
                   $useruname=$uvalue['takeoutname'];
                 }

                   $orderqty=$orderrow['order_qty'];
                   $ordernameid=$orderrow['order_name_id'];
                   $ordername=$orderrow['order_name'];
                   
                   
                   

                   date_default_timezone_set("Asia/Taipei");
                    $date=date("y-m-d");
                    $ddate=date("y-m");
                    $time=date("h:ia");

              

            

              $dup=mysqli_query($con,"select * from orders where order_name_id='$ordernameid' and order_name='$ordername' and order_user_id='$user_iid' and order_qty='$orderqty' and order_status='Preparing' and order_place='place'");

             if (mysqli_num_rows($dup)>0) {

              


                
              
           }
              else{
                
                $iiiid=$orderrow['order_name_id'];
                $iquery="select * from orders where order_user_id='$user_iid' and order_status=''";
                $iqueryresult=mysqli_query($con,$iquery);
                while ($rowx = mysqli_fetch_assoc($iqueryresult)) {
                  # code...
                
                  # code...
                

                 $tprice=$rowx['order_qty'] * $rowx['order_price'];
                
                
                 $query = "UPDATE orders SET order_tprice='$tprice',order_status='Preparing',order_place='place' WHERE order_name_id='$iiiid' and order_user_id='$user_iid' and order_status=''";
              $utresult=mysqli_query($con,$query);
                
                 }
              
               /*update Product qty*/  

      
        
         
            
          
          
          
              
                 
                 }
               
            }
              

              $ququ = "UPDATE take_out_number SET take_out_payment='Cash',take_out_bill='$change' WHERE take_out_number_id='$tid'";
              $tresult = mysqli_query($con, $ququ);
            ?>
              <script type="text/javascript">
                swal({
                  title: "Pay with Cash!",
                  text: "Please ready your cash and wait for an employee.",
                  icon: "success",
                });
              </script>




            <?php
            
          }

            ?>

            <?php
            if (isset($_POST['card'])) {



                 

              
              

              $ququ = "UPDATE take_out_number SET take_out_payment='Paying' WHERE take_out_number_id='$tid'";
              $tresult = mysqli_query($con, $ququ);
            ?>
              <script type="text/javascript">
                swal({
                  title: "Pay with Card!",
                  text: "Please fill up the form",
                  icon: "success",
                }).then(function(){
                  window.location="takeout_payment.php";
                });
              </script>




            <?php
            
          }

            ?>

      
       </div>
        </div><!-- end modal content-->

        </div>
    </div><!-- end modal -->
      
      
   
    

    
  

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2020 Don Covido's</p>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="form-validation.js"></script></body>
</html>

 <script>
function yesdiscount() {
  
  
                  swal({
                  title: "Verifying",
                  text: "Please wait for an employee.",
                  icon: "success",
                });

                   var xmlhttp = new XMLHttpRequest();
                
                
                
                xmlhttp.open("GET", "./php/takeout_verify.php", true);
                xmlhttp.send();
    
   
}
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




<script>
    $(document).ready(function(){
 

        function takeout_btn(){
            $.ajax({
                type: 'POST',
                url: './php/takeout_btn.php',
                success: function(data){
                    $('#cartbtn').html(data);
                }
            });
        }
        takeout_btn();
        setInterval(function () {
            takeout_btn(); 
        }, 1000);  // it will refresh your data every 1 sec

    });

    $(document).ready(function(){
 

        function takeout_carts(){
            $.ajax({
                type: 'POST',
                url: './php/takeout_carts.php',
                success: function(data){
                    $('#cart').html(data);
                }
            });
        }
        takeout_carts();
        setInterval(function () {
            takeout_carts(); 
        }, 1000);  // it will refresh your data every 1 sec

    });
$(document).ready(function(){
 

        function takeout_count(){
            $.ajax({
                type: 'POST',
                url: './php/takeout_count.php',
                success: function(data){
                    $('#takeout_count').html(data);
                }
            });
        }
        takeout_count();
        setInterval(function () {
            takeout_count(); 
        }, 1000);  // it will refresh your data every 1 sec

    });
function takeout_additem(addupdate){

    var take_xmlhttp = new XMLHttpRequest();

    
    take_xmlhttp.open("GET", "./php/takeout_add.php?id=" +addupdate, true);
    take_xmlhttp.send();
}
function takeout_minusitem(minusupdate){

    var takeout_xmlhttp = new XMLHttpRequest();
   
    takeout_xmlhttp .open("GET", "./php/takeout_minus.php?id=" +minusupdate, true);
    takeout_xmlhttp .send();
}


</script>

  

</head>
<body>


