<?php

session_start();

require_once('PHPMailer/PHPMailerAutoload.php');
require_once('./php/component.php');
include './php/dbcall.php';
$admin_sql = "SELECT * FROM admin WHERE admin_login= 'login'";
$admin_sql_tresult = mysqli_query($con, $admin_sql);
$adminrow = mysqli_fetch_assoc($admin_sql_tresult);
$admin = $adminrow['admin_name'];

$_SESSION['billingcomplete'] = 'yes';



foreach ($_SESSION['user'] as $uid) {
  $uname = $uid['username'];
}


if ($uname > 0) {
} else {
  header("location:login.php");
  session_destroy();
}




date_default_timezone_set("Asia/Taipei");
$yes = date("y/m/d--h:i:s A");
$query = "select * from user_receipt order by id desc limit 1";
$queryresult = mysqli_query($con, $query);
$row = mysqli_fetch_array($queryresult);
$lastid = $row['user_receipt_or'];
foreach ($_SESSION['user'] as $ename) {

  $tqty = 0;
  $i = $ename['userid'];
  $tname = $ename['username'];
  $namequery = "select * from users where user_id='$i'";
  $namequeryresult = mysqli_query($con, $namequery);
  $rowz = mysqli_fetch_array($namequeryresult);

  $name = $rowz['user_firstname'];
}

$cartquery = "SELECT COUNT(*) AS SUM FROM orders WHERE order_username='$uname' and  order_status='Served'";
$cartqueryresult = mysqli_query($con, $cartquery);
$cartrow = mysqli_fetch_assoc($cartqueryresult);
$coutnt = $cartrow['SUM'];

function subArraysToString($ar, $sep = ', ')
{
  $str = '';
  foreach ($ar as $val) {
    $str .= join($sep, $val);
    $str .= $sep; // add separator between sub-arrays
  }
  $str = rtrim($str, $sep); // remove last separator
  return $str;
}

$tableiid = subArraysToString($_SESSION['table-id']);


if ($lastid == " ") {
  $reno = "OR490191";
} else {
  $reno = substr($lastid, 7);
  $reno = intval($reno);
  $reno = "OR49019" . ($reno + 1);
}



?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $totalqty = 0;


  foreach ($_SESSION['user'] as $email) {
    $unme = $email['username'];

    $billoutsqlqty = "SELECT * FROM orders WHERE order_username ='$unme' and order_status='Served'";
    $billoutsqlqtylresult = $con->query($billoutsqlqty);

    while ($qtyrow = mysqli_fetch_assoc($billoutsqlqtylresult)) {
      $totalqty = $totalqty + $qtyrow['order_qty'];

      $user = $email['useremail'];
      $udii = $email['userid'];

      date_default_timezone_set("Asia/Taipei");
      $date = date("M d,Y");
      $time = date("h:ia");
    }
  }

  if (!$con) {
    die("connection failed" . mysqli_connect_error());
  } else {
    $v = $_SESSION['vat'];
    $d = $_SESSION['dis'];
    $total = $_SESSION['gtotal'];
    $user_tender = $_SESSION['User_tender'];
    $user_change = $_SESSION['User_change'];
    $resql = "insert into user_receipt(  user_receipt_or ,user_name, user_email ,user_torder,user_tqty,user_subtotal,user_tender,user_change,user_table,user_vat,user_discount,  receipt_date ,receipt_time )VALUES('$reno','$unme','$user','$coutnt','$totalqty','$total','$user_tender','$user_change','$tableiid','$v','$d','$date','$time')";
    if (mysqli_query($con, $resql)) {
      echo "Recorded";
    } else {
      echo " NOT Recorder";
    }
  }


  //update order OR
  if ($_GET['action'] == 'update') {
    # code...
    $s = $_GET['id'];
    $d = $_GET['date'];
    date_default_timezone_set("Asia/Taipei");
    $ddate = date("h:ia");

    $orderquery = "UPDATE orders SET user_or='$reno',order_cashier='$admin', order_status='Paid', order_date_out='$ddate' WHERE order_user_id='$udii' and order_status='$s' and order_date_out='$d'";
    $utresult = mysqli_query($con, $orderquery);
  }









  /*logout*/
  /*update user_tables*/

  $sta = "Reserved";
  foreach ($_SESSION['user'] as $ema) {
    date_default_timezone_set("Asia/Taipei");
    $date = date("y-m-d / h:ia");
    $get = $ema['userid'];
    $tsa = "Available";




    $ququ = "UPDATE user_tables SET utable_Status='Available', utable_Date_time_out='$date' WHERE utable_Status='$sta'and utable_user_id='$get'";
    $tresult = mysqli_query($con, $ququ);
  }




  /*update tables*/
  $num = "SELECT * FROM tables";
  $table_result = $con->query($num);

  if (isset($_SESSION['table-id'])) {
    if (isset($_SESSION['user'])) {

      while ($row = mysqli_fetch_assoc($table_result)) {

        foreach ($_SESSION['user'] as $emai_id => $email_value) {

          foreach ($_SESSION['table-id'] as $id => $value) {

            if ($row['table_email'] == $email_value['userid']) {

              $ta = $email_value['userid'];
              $table_total = $row["table_status"] - $row["table_status"];
              $table_email_total = $row["table_email"] - $email_value['userid'];

              $table_sql = "UPDATE tables SET table_status= $table_total, table_email=$table_email_total WHERE table_email= $ta";
            }
          }
        }
      }
    }
  }
  if ($con->query($table_sql) === TRUE) {
    header("location:customer_feedback.php");
    unset($_SESSION['user']);
    unset($_SESSION['table-id']);
  } else {
    echo "Error updating record: " . $con->error;
  }


  function Send_Mail($to, $subject, $body)
  {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML();
    $mail->Username = 'don.covidos@gmail.com';
    $mail->Password = 'DummyAccount';
    $mail->SetFrom('no-reply@howcode.org');
    $mail->Subject = $subject;
    $mail->Body = $body;

    $mail->AddAddress($to);

    $mail->Send();
  }











  $body = $_POST['w3review'];
  $euser = $_POST['emailuser'];
  Send_Mail($euser, 'Subject', $body);



  $number = $_SESSION['gtotal'] / 100;

  $resetpoints = "SELECT * FROM users WHERE user_id=$i";
  $resetsresult = mysqli_query($con, $resetpoints);
  $pointrow = mysqli_fetch_assoc($resetsresult);

  if ($pointrow['user_approve'] > 0) {
    $minuspoints = ($pointrow['user_points'] - $pointrow['user_approve']) + $number;
    $resetpoints = "UPDATE users SET user_points='$minuspoints',user_approve=0,user_age=22 WHERE user_id=$i";
    $resetpointsresult = mysqli_query($con, $resetpoints);
  } else {
    $pointsuser = "SELECT * FROM users WHERE user_id=$i";
    $pointsuserresult = mysqli_query($con, $pointsuser);
    $pointsrow = mysqli_fetch_assoc($pointsuserresult);

    $userpoints = $pointsrow['user_points'] + $number;

    $updatepointsquery = "UPDATE users SET user_points='$userpoints',user_age=22 WHERE user_id=$i";
    $updatepointsqueryresult = mysqli_query($con, $updatepointsquery);
  }

  $removeguest = "DELETE FROM users WHERE user_id=$get and user_guest='Guest'";
  $removeguestresult = mysqli_query($con, $removeguest);
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
  <title>Don Covido's | Bill Out</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
  <script type="text/javascript">
    var SwalColors = {

      black: "#000000"
    };

    function color_block(color) {
      setTimeout(function() {
        $(".swal-overlay").css({
          "background-color": SwalColors[color]
        });
      }, 200);
    }

    color_block("black");

    swal({
      title: 'Reminder!',
      text: 'Kindly show this receipt to the security guard as you exit',
      icon: 'info',
      button: 'OK',
    });
  </script>
  <header>

  </header>




  <!-- RECEIPT -->
  <div class="container shan">
    <div class="pt-5 pb-3 text-center">
      <!--<img class="d-block mx-auto mb-4" src="../images/logo.png" width="200" height="auto">-->
      <form action="<?php echo ($_SERVER['PHP_SELF']); ?>?action=update&id=Served&date=' '" method="POST">
        <h1 class="mt-5">RECEIPT</h1>
        <h2 class="text-muted" name="id" id="id" readonly><?php echo $reno; ?></h2>
    </div>

    <div class="row text-dark">
      <div class="col-12 col-md-7 mx-auto">

        <ul class="receipt mb-3 bg-white">
          <h3 class="text-center pt-2 mb-0 mr-3 font-weight-bold">Don Covido's</h3>
          <h6 class="bottom text-center pt-0 pb-2 mr-3">Southcrest vill., San Agustin 2, City of Dasmarinas</h6>

          <h6><?php echo $reno; ?></h6>
          <h6>CUSTOMER NAME: <?php echo $name; ?></h6>
          <h6><?php echo "DATE: " . $yes; ?></h6>
          <h6>TABLE # <?php echo  $tableiid; ?></h6>
          <h6>CASHIER: <?php echo $admin; ?></h6>

          <li class="bottom row d-flex mb-3 mr-3 justify-content-between lh-condensed">
            <div class="col-1 pt-3">
              <h5 class="my-0 font-weight-bold text-left">QTY</h5>
            </div>
            <div class="col-5 pt-3">
              <h5 class="my-0 font-weight-bold text-left">DESC</h5>
            </div>
            <div class="col-2 pt-3">
              <h5 class="my-0 font-weight-bold text-right">AMT</h5>
            </div>
          </li>





          <?php


          $total = $tpprice = $vat = $vvat = $dis = $ddis = 0;



          foreach ($_SESSION['user'] as $uisd) {

            $usname = $uisd['username'];

            $billoutsql = "SELECT * FROM orders WHERE  order_username ='$usname' and order_status='Served'";
            $billoutsqlresult = $con->query($billoutsql);

            while ($row = mysqli_fetch_assoc($billoutsqlresult)) {







              $n = $row['order_name'];
              $p = $row['order_price'];
              $q = $row['order_qty'];



              $tpprice = ($row["order_qty"] * (int)$row['order_price']);

              echo "
            <li class='row d-flex mb-3 mr-3 justify-content-between lh-condensed'>
            <div class='col-1 pt-1'>
              <h6 class='my-0 font-weight-bold text-left'>$q</h6>
            </div>
            <div class='col-4 pt-1'>
              <h6 class='my-0 font-weight-bold text-left'>$n</h6>
            </div>
            <div class='col-3 pt-1'>
            <p class=\"my-0 font-weight-bold text-center\">Php$tpprice</p>
           
              
            </div>
          </li>




            ";
              $userquery = "select * from users WHERE user_id=$i";
              $userqueryresult = mysqli_query($con, $userquery);
              $rows = mysqli_fetch_array($userqueryresult);




              if ($rows['user_age'] <= 49) {
                $vat = (0.12 * (int)$tpprice);
                $vvat = $vvat + $vat;


                $_SESSION['vat'] = $vvat;
                $_SESSION['dis'] = $ddis;;
              } else {
                $dis = ((int)$tpprice * 0.2);
                $ddis = $ddis + $dis;


                $_SESSION['vat'] = $vvat;
                $_SESSION['dis'] = $ddis;;
              }
            }
          }


          ?>

          <!-- VAT -->
          <li class="top row d-flex pt-3 mr-3 justify-content-between">
            <small class="col font-weight-bold text-right">VAT 12%</small>
            <small class="col-4 font-weight-bold text-right"><?php echo "Php" . $vvat; ?>
              <!--(VAT=AMOUNT*0.12)-->
              <!--PAG MAY SENIOR DISCOUNT PHP0.00 NA YUNG VAT-->
            </small>
          </li>
          <!-- DISCOUNT -->
          <li class="row d-flex mr-3 justify-content-between">
            <small class="col font-weight-bold text-right">Discount 20%</small>
            <small class="col-4 font-weight-bold text-right"><?php echo "Php" . $ddis; ?>
              <!--(DISCOUNT=AMOUNT*0.2)-->
            </small>
          </li>
          <!-- TOTAL AMOUNT -->
          <li class="row d-flex mt-1 mb-n2 mr-3 justify-content-between">
            <h5 class="col font-weight-bold text-right">AMOUNT</h5>
            <h6 class="col-4 font-weight-bold text-right">Php<?php
                                                              echo $_SESSION['gtotal'];


                                                              ?>
            </h6>
          </li>
          <!-- TENDERED -->
          <li class="row d-flex mr-3 justify-content-between">
            <small class="col font-weight-bold text-right">Amount Tendered</small>
            <small class="col-4 font-weight-bold text-right">Php<?php
                                                                foreach ($_SESSION['user'] as $tender) {
                                                                  $tender = $tender['userid'];
                                                                }
                                                                $querytender = "SELECT * FROM user_tables WHERE utable_Status='Reserved' and utable_user_id='$tender'";
                                                                $querytenderresult = mysqli_query($con, $querytender);
                                                                $tender_row = mysqli_fetch_assoc($querytenderresult);
                                                                $_SESSION['User_tender'] = $tender_row['user_amount'];
                                                                $_SESSION['User_change'] = $tender_row['user_change'];
                                                                echo $tender_row['user_amount'];


                                                                ?></small>
          </li>
          <!-- CHANGE -->
          <li class="bottom row d-flex pb-3  mb-3 mr-3 justify-content-between">
            <small class="col font-weight-bold text-right">Change</small>
            <small class="col-4 font-weight-bold text-right">Php<?php
                                                                echo $tender_row['user_change'];
                                                                ?></small>
          </li>

          <li class="row d-flex mr-3 justify-content-center">
            <h5 class=" col-12 text-center font-weight-bold">THANK YOU FOR DINING WITH US!</h5>
            <img src="./images/barcode.png" width="200" height="80" class="col-5  pb-3">
          </li>
        </ul>

        <div class="row justify-content-center">
          <button type="submit" class="btn btn-danger font-weight-bold col-11" name="ok">OK</button>
        </div>







        <textarea id="emailuser" name="emailuser" style='display: none'><?php foreach ($_SESSION['user'] as  $dsa) {
                                                                          $dsap = $dsa['useremail'];
                                                                          echo $dsap;
                                                                        } ?></textarea>
        <textarea id="w3review" name="w3review" style='display: none'>


      <div class="container">
    <div class="pt-5 pb-3 text-center">
    
      <h1 class="mt-5">RECEIPT</h1>
      
    </div>

    <div class="row text-dark">
      <div class="col-12 col-md-8 mx-auto">
        
        <ul class="receipt mb-3 bg-white">
          <h3 class="text-center pt-2 mb-0 mr-3 font-weight-bold">Don Covido's</h3>
          <h6 class="bottom text-center pt-0 pb-2 mr-3">Southcrest vill., San Agustin 2, City of Dasmarinas</h6>

          <h6><?php echo $reno; ?></h6>
          <h6>CUSTOMER NAME: <?php echo $name; ?></h6>
          <h6><?php echo "DATE: " . $yes; ?></h6>
          <h6>TABLE # <?php echo  $tableiid; ?></h6>
          <h6>CASHIER: <?php echo $admin; ?></h6>

          <li class="bottom row d-flex mb-3 mr-3 justify-content-between lh-condensed\">
            <div class="col-1 pt-3">
              <h5 class="my-0 font-weight-bold text-left">TOTAL QTY: <?php
                                                                      $qty = 0;
                                                                      $billoutqty = "SELECT * FROM orders WHERE order_username ='$tname' and order_status='Served'";
                                                                      $billoutqtyresult = $con->query($billoutqty);

                                                                      while ($tqtyrow = mysqli_fetch_assoc($billoutqtyresult)) {
                                                                        $qty = $qty + $tqtyrow['order_qty'];
                                                                      }
                                                                      echo $qty; ?></h5>
            </div>
            <div class="col-5 pt-3">
              <h5 class="my-0 font-weight-bold text-left">---DESCRIPTION---</h5>
            </div>
            
            
          </li>
<?php
foreach ($_SESSION['user'] as $u) {
  $ui = $u['userid'];

  $sql = "SELECT * FROM orders WHERE order_user_id='$ui' and order_status='Served'";
  $result = $con->query($sql);
}
while ($uuu = mysqli_fetch_assoc($result)) {

  b($uuu['order_name']);
}



?>
         <li class="top row d-flex pt-3 mr-3 justify-content-between">
            <small class="col font-weight-bold text-right">VAT 12%</small>
            <small class="col-4 font-weight-bold text-right"><?php $vatper = $_SESSION['vat'];
                                                              echo "Php" . $vatper; ?></small>
          </li>
         
          <li class="row d-flex mr-3 justify-content-between">
            <small class="col font-weight-bold text-right">Discount 20%</small>
            <small class="col-4 font-weight-bold text-right"><?php $disper = $_SESSION['dis'];
                                                              echo "Php" . $disper; ?></small>
          </li>
          <li class="bottom row d-flex mb-3 mr-3 justify-content-between">
           <small class="col font-weight-bold text-right">Amount</small>
            <small class="col-4 font-weight-bold text-right">Php<?php
                                                                echo $_SESSION['gtotal'];


                                                                ?> 
             </small>
          </li>
          <!-- TENDERED -->
          <li class="row d-flex mr-3 justify-content-between">
            <small class="col font-weight-bold text-right">Amount Tendered</small>
            <small class="col-4 font-weight-bold text-right">Php<?php
                                                                echo $tender_row['user_amount'];
                                                                ?></small>
          </li>
          <!-- CHANGE -->
          <li class="bottom row d-flex pb-3  mb-3 mr-3 justify-content-between">
            <small class="col font-weight-bold text-right">Change</small>
            <small class="col-4 font-weight-bold text-right">Php<?php
                                                                echo $tender_row['user_change'];
                                                                ?></small>
          </li>
          </ul>
   

</textarea>
        </form>



        <footer class="my-5 pt-5 text-muted text-center text-small">
          <p class="mb-1">&copy; 2020 Don Covido's</p>
        </footer>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>
        window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
      </script>
      <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
      <script src="form-validation.js"></script>
</body>

</html>