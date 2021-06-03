<?php
session_start();
include './php/dbcall.php';
foreach ($_SESSION['user'] as $ema) {


    $get = $ema['userid'];
    $Username = $ema['username'];
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

                                            echo "Php " . $_SESSION['gtotal']; ?></label>

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
                                }).then(function() {
                                    window.location = 'payment.php';
                                });
                            </script>

                    <?php
                   


                            }else{
                     date_default_timezone_set("Asia/Taipei");
                    $date=date("F d Y/h:ia");
                    $money=$_SESSION['subtotal'];
                    $incomesql="INSERT INTO income( income_Transaction,income_Date_Time,income_amount) VALUES ('$Username','$date','$money')";
                    $incomesqlresult=mysqli_query($con,$incomesql);



                            $ququ1 = "UPDATE user_tables SET user_payment='Credit',user_amount='$money' WHERE utable_Status='Reserved'and utable_user_id='$get'";
                            $tresult1 = mysqli_query($con, $ququ1);

                    ?>
                            <script type="text/javascript">
                                swal({
                                    title: "Done!",
                                    text: "Successful.",
                                    icon: "success",
                                }).then(function() {
                                    window.location = 'main_receipt.php';
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    function billingdone_payment()
                {
                    $.post( "./php/billingdone.php", function( data ) {

                        if(data == "yes")
                        {
                                swal({
                              title: 'Transaction is over!',
                              text: 'Cant go Back',
                              icon: 'warning',
                            }).then(function(){

                              window.location="main_receipt.php";
                            });
                            
                        }

                    });
                }

 var billingSession = setInterval(billingdone_payment, 1000);
</script>