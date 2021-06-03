<?php
session_start();
include './php/dbcall.php';


 foreach ($_SESSION['takeout']as $uid ) {
  $uname=$uid['takeoutname'];
  $tid=$uid['takeout_id'];
  }
   

 if($uname> 0){
  

  
 }else{
  header("location:takeout_front.php");
      session_destroy();
 }



foreach ($_SESSION['takeout'] as $ema) {


    $get = $ema['takeout_id'];
    $Username = $ema['takeoutname'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Credit Card Validation Demo</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/payment.css">
    <link rel="stylesheet" type="text/css" href="./css/demo.css">
</head>

<body>
    <div class="container-fluid bg-dark">
        <div class="row justify-content-center">
            <img src="./images/logo_transparent.png" width="200" height="auto" class="col-12 mt-n5 mb-n5">
        </div>
        <div class="creditCardForm mt-n1">
            <div class="heading">
                <h1><strong>CONFIRM PURCHASE</strong></h1>
            </div>
            <div class="payment">
                <form method="post">
                    <div class="form-group owner">
                        <label for="owner">Owner Name</label>
                        <input type="text" class="form-control" id="owner" name="owner">
                    </div>
                    <div class="form-group CVV">
                        <label for="cvv">Card Number</label>
                        <input type="text" class="form-control" id="cvv" name="cvv" max="3">
                    </div>
                    <div class="form-group" id="card-number-field">
                        <label for="cardNumber">CVV</label>
                        <input type="text" class="form-control" id="cardNumber" name="cardNumber">
                    </div>
                    <div class="form-group" id="expiration-date">
                        <label>Expiration Date</label>
                        <select name="d">
                            <option value="1">January</option>
                            <option value="2">February </option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select name="year">
                            
                            
                            <option value="21"> 2021</option>
                            <option value="22"> 2022</option>
                            <option value="23"> 2023</option>
                            <option value="24"> 2024</option>
                            <option value="25"> 2025</option>
                           
                        </select>
                    </div>
                    <div class="form-group" id="credit_cards">
                        <img src="./images/visa.jpg" id="visa">
                        <img src="./images/mastercard.jpg" id="mastercard">
                        <img src="./images/amex.jpg" id="amex">
                    </div>
                    <div class="form-group owner mt-3">
                        <label for="cvv">Payment</label>
                        <label for="cvv"><?php

                                            echo "Php " . $_SESSION['takeout_total']; ?></label>

                    </div>

                    <div class="form-group" id="pay-now">
                        <button type="submit" class="btn btn-default" id="confirm-purchase" name="confirm">Confirm</button>
                    </div>
                    <?php

                    if (isset($_POST['confirm'])) {

                    

                        if ($_POST['owner'] == "Bogart" && $_POST['cvv'] == "4716108999716531" && $_POST['cardNumber'] == "257" || $_POST['owner'] == "Baldo" && $_POST['cvv'] == "5281037048916168" && $_POST['cardNumber'] == "043" || $_POST['owner'] == "Grego" && $_POST['cvv'] == "342498818630298" && $_POST['cardNumber'] == "3156") {
                            if ($_POST['d']<3) {
                               ?>
                            <script type="text/javascript">
                                swal({
                                    title: 'Your CARD is expired',
                                    text: 'Try Again!',
                                    icon: 'error',
                                    button: 'Back',
                                });
                            </script>

                    <?php
                   


                            }else{
                 foreach ($_SESSION['takeout'] as $key) {
                $outid=$key['takeout_id'];
                $toutid=$key['takeoutid'];
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








                     date_default_timezone_set("Asia/Taipei");
                    $datee=date("F d Y/h:ia");
                    $money=$_SESSION['takeout_total'];
                    $incomesql="INSERT INTO income( income_Transaction,income_Date_Time,income_amount) VALUES ('$Username','$datee','$money')";
                    $incomesqlresult=mysqli_query($con,$incomesql);



                            $ququ1 = "UPDATE take_out_number SET take_out_payment='Credit' WHERE take_out_number_id='$get'";
                            $tresult1 = mysqli_query($con, $ququ1);
                    ?>
                            <script type="text/javascript">
                                swal({
                                    title: "Done!",
                                    text: "Successful.",
                                    icon: "success",
                                }).then(function() {
                                    window.location = 'takeout_cart.php';
                                });
                            </script>

                        <?php
                    }
                        } else {
                   
                   
                        ?>
                            <script type="text/javascript">
                                swal({
                                    title: 'Failed Incorrect Inputs!',
                                    text: 'Try Again!',
                                    icon: 'error',
                                    button: 'Back',
                                });
                            </script>

                    <?php
                        }
                    }

                    ?>
                </form>
            </div>
        </div>
            <p class="examples-note">Don Covido's, Inc. <br> &copy; Est. 2020</p>

        <div class="examples">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Owner Name</th>
                            <th>Card Number</th>
                            <th>Security Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                             <td>Bogart</td>
                            <td>4716108999716531</td>
                            <td>257</td>
                        </tr>
                        <tr>
                            <td>Baldo</td>
                            <td>5281037048916168</td>
                            <td>043</td>
                        </tr>
                        <tr>
                            <td>Grego</td>
                            <td>342498818630298</td>
                            <td>3156</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="./js/jquery.payform.min.js" charset="utf-8"></script>
    <script src="./js/script.js"></script>
</body>

</html>