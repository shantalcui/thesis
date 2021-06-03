<?php

session_start();

require_once('./php/component.php');
include './php/dbconnect.php';
foreach ($_SESSION['admin'] as $uid) {
  $id = $uid['adminid'];
}
$logsql = "SELECT * FROM admin WHERE admin_id =$id";
$logresult = mysqli_query($con, $logsql);
if ($id > 0) {
} else {
  header("location:admin.php");
}



if (isset($_POST['kick'])) {

  if ($_GET['action'] == 'kick') {
    $sta = "Reserved";

    date_default_timezone_set("Asia/Taipei");
    $date = date("y-m-d / h:ia");
    $get = $_GET['userid'];
    $tsa = "Available";
    $block = "block";



    $quub = "UPDATE users SET user_block='block' WHERE user_id=$get";
    $quubresult = mysqli_query($con, $quub);


    $ququ = "UPDATE user_tables SET utable_Status='Available', utable_Date_time_out='$date' WHERE utable_Status='$sta'and utable_user_id='$get'";
    $tresult = mysqli_query($con, $ququ);



    $order_stockquery = "UPDATE orders SET order_status='Not Paid',order_time='Not Paid',order_date_out='Not Paid' WHERE order_user_id='$get' and order_status='Preparing' or order_user_id='$get' and order_status='Served' or order_user_id='$get' and order_status=''";

    $order_stockquery_result = mysqli_query($con, $order_stockquery);
  }



  /*update tables*/
  $num = "SELECT * FROM tables";
  $table_result = $con->query($num);



  while ($row = mysqli_fetch_assoc($table_result)) {

    $ta = $_GET['userid'];

    if ($row['table_email'] == $ta) {


      $table_total = $row["table_status"] - $row["table_status"];
      $table_email_total = $row["table_email"] - $get;

      $table_sql = "UPDATE tables SET table_status= $table_total, table_email=$table_email_total WHERE table_email= $ta";
    }
  }





  if ($con->query($table_sql) === TRUE) {
    header("location:tables.php");
  } else {
    echo "Error updating record: " . $con->error;
  }
}




if (isset($_POST['discount'])) {
  if ($_GET['action'] == 'kick') {

    $ea = $_GET['userid'];




    $disquu = "UPDATE user_tables SET user_verify='Discounted' WHERE utable_Status='Reserved'and utable_user_id='$ea'";
    $disquuresult = mysqli_query($con, $disquu);

    $disusersql = "UPDATE users SET user_age=60 WHERE  user_id='$ea'";
    $disusersqlresult = mysqli_query($con, $disusersql);
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
  <title>Don Covido's | Admin</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

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
  <link href="./css/dashboard.css" rel="stylesheet">
</head>

<body>
  <?php
  if (isset($_POST['good'])) {

    if ($_GET['action'] == 'kick') {

      $e = $_GET['userid'];


      $change_user = "SELECT * FROM user_tables WHERE utable_Status='Reserved'and utable_user_id='$e'";
      $change_user_result = mysqli_query($con, $change_user);
      $change_row = mysqli_fetch_assoc($change_user_result);
  ?>
      <script>
        swal({
          title: "BILL ₱<?php echo $change_row['utable_change']; ?>",
          text: "Input the Payment",
          icon: "info",
          content: "input",
          button: "Paid",
        }).then((value) => {
          if (value >= <?php echo $change_row['utable_change']; ?>) {
            var xmlhttp = new XMLHttpRequest();
            var change = value - <?php echo $change_row['utable_change']; ?>;
            xmlhttp.open("GET", "./php/cashincome.php?cash=<?php echo $change_row['utable_change']; ?>&user=<?php echo $change_row['utable_Username']; ?>&id=<?php echo $e; ?>&change=" + change + "&amount=" + value, true);
            xmlhttp.send();
            swal({
              title: 'Change ₱' + change,
              icon: 'success',
            }).then(function() {
              window.location = "tables.php";
            });
          } else {
            swal({
              title: 'Insufficient Payment',
              icon: 'warning',
            });
          }
        });





        ;
      </script>


  <?php


    }
  }

  ?>
  <!--navbar--><?php
                include './php/adminnavbar.php';
                ?>
  <!-- end navbar -->

  <!-- SIDE BAR -->
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link text-white" href="dashboard.php">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="tables.php">
                <span data-feather="users"></span>
                Table Status
                <sup class="badge badge-pill badge-danger" id="table"></sup>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="orders.php">
                <span data-feather="file"></span>
                Orders
                <sup class="badge badge-pill badge-danger" id="order"></sup>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="stocks.php">
                <span data-feather="box"></span>
                Stocks
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="issued.php">
                <span data-feather="file-text"></span>
                Issued Official Receipts
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="feedback.php">
                <span data-feather="star"></span>
                Feedbacks
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="block-account.php">
                <span data-feather="user"></span>
                Blocked Accounts
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="income.php">
                <span data-feather="credit-card"></span>
                Income Overview
              </a>
            </li>
          </ul>
        </div>
      </nav><!-- end Side Bar -->

      <!-- MAIN CONTENT -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <br>
        <h2>Table Status</h2>
        <div class="table-responsive">
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
              $dd = date("y-m-d");
              $sql = "SELECT * FROM user_tables";
              $result = $con->query($sql);


              while ($row = mysqli_fetch_assoc($result)) {
                if ($row['user_payment'] == "") {

                  $hide = "style='display: none'";
                } else {


                  $hide = "";
                }
                if ($row['user_payment'] == "Cash") {
                  $Payment = "submit";
                } else {
                  $Payment = "button";
                }
                if ($row['user_verify'] == "verifying" or $row['user_verify'] == "Discounted") {
                  $discount_hide = "";
                } else {
                  $discount_hide = "style='display: none'";
                }


                if ($row['utable_Status'] == 'Reserved') {

                  $button = "text-danger";
                  $diss = "";
                  $db = "";
                } else {

                  $button = "text-success";
                  $diss = "disabled";
                  $db = "disabled";
                }

                if ($row['utable_dd'] == $dd) {
                  getactivetable($row['utable_Table_no'], $row['utable_Username'], $row['utable_Status'], $row['utable_Date_time'], $row['utable_Date_time_out'], $button, $diss, $row['user_payment'], $row['utable_Table_no'], $db, $row['utable_Table_no'], $row['utable_user_id'], $row['user_verify'], $row['user_change'], $Payment, $hide, $discount_hide);
                }
              }






              ?>

            </tbody>
          </table>

        </div>
      </main>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
  </script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="./js/dashboard.js"></script>
</body>

</html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  function noticetable() {
    $.post("./php/notice_reserved.php", function(rnt) {

      if (rnt == "Reserved") {
        swal({
          title: 'A Table has been Reserved',
          text: 'Check',
          icon: 'info',
        }).then(function() {
          window.location = "tables.php";
        })
        var notice_done = new XMLHttpRequest();

        notice_done.open("GET", "./php/notice.php", true);
        notice_done.send();



      }

    });





    $.post("./php/tableout.php", function(rnt) {

      if (rnt == "Available") {
        swal({
          title: 'A Table is now Available',
          text: 'Check',
          icon: 'info',
        }).then(function() {
          window.location = "tables.php";
        })
        var out_done = new XMLHttpRequest();

        out_done.open("GET", "./php/tableoutoff.php", true);
        out_done.send();



      }

    });


  }

  var n = setInterval(noticetable, 1000);
</script>


<script>
  function kaw() {
    $.post("./php/tableupdate.php", function(data) {




      $('#t').html(data);

    });
  }

  var validateSession = setInterval(kaw, 1000);



  $(document).ready(function() {


    function tabledata() {
      $.ajax({
        type: 'POST',
        url: './php/tablecount.php',
        success: function(data) {
          $('#table').html(data);
        }
      });
    }
    tabledata();
    setInterval(function() {
      tabledata();
    }, 1000); // it will refresh your data every 1 sec

  });


  $(document).ready(function() {


    function ordercount() {
      $.ajax({
        type: 'POST',
        url: './php/ordercount.php',
        success: function(data) {
          $('#order').html(data);
        }
      });
    }
    ordercount();
    setInterval(function() {
      ordercount();
    }, 1000); // it will refresh your data every 1 sec

  });
</script>