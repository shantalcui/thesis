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





if (isset($_POST['serve'])) {

  if ($_GET['action'] == 'served') {
    date_default_timezone_set("Asia/Taipei");
    $time = date("h:ia");
    $date = $_GET['date'];
    $sta = $_GET['sta'];
    $itemname = $_GET['itemid'];
    $userid = $_GET['userid'];





    $stockquery = "UPDATE orders SET order_status='Served', order_time='$time',order_served='on' WHERE order_name='$sta' and order_time='$date' and order_user_id='$userid'";
    $stockresult = mysqli_query($con, $stockquery);
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
              <a class="nav-link text-white" href="tables.php">
                <span data-feather="users"></span>
                Table Status
                <sup class="badge badge-pill badge-danger" id="table"></sup>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="orders.php">
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

                if ($row['order_status'] == 'Preparing') {

                  $button = "text-danger";
                  $btn = "";
                } elseif ($row['order_status'] == 'Served') {

                  $button = "text-success";
                  $btn = "disabled";
                } else {

                  $button = "text-primary";
                  $btn = "disabled";
                }
                date_default_timezone_set("Asia/Taipei");
                $date = date("y-m-d");

                if ($row['order_date'] == $date) {
                  getorder($row['order_name'], $row['order_table'], $row['order_username'], $row['order_user'], $row['order_status'], $row['order_time'], $row['order_date_out'], $button, $row['order_name'], $btn, $row['order_name_id'], $row['order_user_id']);
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
    window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')
  </script>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="./js/dashboard.js"></script>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



<script>
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

  function noticetable() {
    $.post("./php/notice_reserved.php", function(rnt) {

      if (rnt == "Reserved") {
        swal({
          title: 'A Table has been Reserved',
          text: 'Check',
          icon: 'info',
        })
        var notice_done = new XMLHttpRequest();

        notice_done.open("GET", "./php/notice.php", true);
        notice_done.send();



      }

    });
  }

  var n = setInterval(noticetable, 1000);




  function popuporder() {
    $.post("./php/notice_reserved.php", function(rnt) {

      if (rnt == "Reserved") {
        swal({
          title: 'A Table has been Reserved',
          text: 'Check',
          icon: 'info',
        })

        $.post("./php/notice_reserved.php", function(popup) {
          var notice_done = new XMLHttpRequest();

          notice_done.open("GET", "./php/notice.php?id=" + popup, true);
          notice_done.send();
        });


      }

    });
  }

  var n = setInterval(popuporder, 1000);




  function idpopup() {
    $.post("./php/popuporder.php", function(pop) {

      if (pop == "alert") {
        $.post("./php/idpopup.php", function(idpop) {
          swal({
            title: 'Customer ' + idpop,
            text: 'Request Update the order',
            icon: 'warning',
          })


          var notice_done = new XMLHttpRequest();

          notice_done.open("GET", "./php/popuporderupdate.php?id=" + idpop, true);
          notice_done.send();
        });


      }


    });
  }

  var n_idpopup = setInterval(idpopup, 1000);






  function popnotice() {
    $.post("./php/order_select.php", function(order_pop) {

      if (order_pop == "Preparing") {

        swal({
          title: 'Orders',
          text: 'There are orders',
          icon: 'info',
        }).then(function() {
          window.location = "orders.php";
        })


        var order_popup = new XMLHttpRequest();

        order_popup.open("GET", "./php/order_stop.php", true);
        order_popup.send();



      }


    });
  }

  var n_popnotice = setInterval(popnotice, 1000);





  function notpaid() {
    $.post("./php/notpaid.php", function(notpaid) {

      if (notpaid == "Not Paid") {

        swal({
          title: 'Scam!',
          text: 'Scamer Not Paid',
          icon: 'warning',
        }).then(function() {
          window.location = "orders.php";
        })


        var order_popup = new XMLHttpRequest();

        order_popup.open("GET", "./php/notpaidstop.php", true);
        order_popup.send();



      }


    });
  }

  var n_notpaid = setInterval(notpaid, 1000);
</script>