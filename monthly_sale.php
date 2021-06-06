<?php
include './php/dbconnect.php';
require_once('./php/component.php');
session_start();
foreach ($_SESSION['admin'] as $uid) {
  $id = $uid['adminid'];
}
$logsql = "SELECT * FROM admin WHERE admin_id =$id";
$logresult = mysqli_query($con, $logsql);
if ($id > 0) {
} else {
  header("location:admin.php");
}

date_default_timezone_set("Asia/Taipei");
$date = date("F Y");



$usql = "SELECT * FROM weekly";
$uresult = $con->query($usql);
while ($rowzs = mysqli_fetch_assoc($uresult)) {

  $monthNum  = $rowzs['month'];
  if ($monthNum > 12) {
    $monthNum = $monthNum - 12;
  }
  $monthName = $monthNum;


  $dup = mysqli_query($con, "select * from monthly where  monthly_month='$monthName'");
  if (mysqli_num_rows($dup) > 0) {
  } else {

    $query = "insert into monthly( monthly_month ) value ('$monthName')";
    $orderresult = mysqli_query($con, $query);
  }
}
$wsql = "SELECT month as d, SUM(weekly_tnorder) AS monthly_tnorder,SUM(weekly_discount) AS monthly_discount,SUM(weekly_vat) AS monthly_vat,SUM(weekly_sale) AS monthly_sales
FROM weekly GROUP BY d";
$wresult = $con->query($wsql);
while ($rowzsx = mysqli_fetch_assoc($wresult)) {
  $s = 0;
  $monthNum  = $rowzsx['d'];
  if ($monthNum > 12) {
    $monthNum = $monthNum - 12;
  }
  $monthName = date('F Y', mktime(0, 0, 0, $monthNum, 10));

  $t = $rowzsx['monthly_tnorder'];

  $d = $rowzsx['monthly_discount'];

  $v = $rowzsx['monthly_vat'];

  $st = $rowzsx['monthly_sales'];
  $s = $rowzsx['monthly_sales'] + $rowzsx['monthly_vat'] + $rowzsx['monthly_discount'];

  $updatequery = "UPDATE monthly SET monthly_tnorder='$t', monthly_discount='$d',monthly_vat='$v',monthly_sales='$st',monthly_gross_sales='$s',month_m='$monthName' WHERE monthly_month='$monthNum'";
  $updateresult = mysqli_query($con, $updatequery);
}

?>
<!doctype html>
<html lang="en">

<head>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
  <script type="text/javascript" src="./js/jquery.min.js"></script>
  <script type="text/javascript" src="./js/Chart.min.js"></script>
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
              <a class="nav-link active" href="dashboard.php">
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
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Sales Summary</h1>
          <div class="dropdown">
            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
              <span data-feather="calendar"></span>
              Monthly Sales
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="dashboard.php">Product Sales</a>
              <a class="dropdown-item" href="daily_sales.php">Daily Sales</a>
              <a class="dropdown-item " href="weekly_sales.php">Weekly Sales</a>
              <a class="dropdown-item disabled" href="monthly_sale.php">Monthly Sales</a>
            </div>
          </div>
        </div>


        <div id="chart-container">
          <canvas id="graphCanvas"></canvas>
        </div>
        <script>
          $(document).ready(function() {
            showGraph();
          });


          function showGraph() {
            {
              $.post("dd.php",
                function(data) {
                  console.log(data);
                  var name = [];
                  var marks = [];

                  for (var i in data) {
                    name.push(data[i].month_m);
                    marks.push(data[i].monthly_gross_sales);
                  }

                  var chartdata = {
                    labels: name,
                    datasets: [{
                      label: 'SALES',
                      backgroundColor: '#00FF7F',
                      borderColor: '#00FF7F',
                      hoverBackgroundColor: '#9ACD32',
                      hoverBorderColor: '#666666',
                      data: marks
                    }]
                  };

                  var graphTarget = $("#graphCanvas");

                  var barGraph = new Chart(graphTarget, {
                    type: 'bar',
                    data: chartdata
                  });
                });
            }
          }
        </script>

        <h2>Monthly Sales</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>Month No.</th>
                <th>Total No. of Orders</th>
                <th>Discounts(Php)</th>
                <th>VAT(Php)</th>
                <th>Net Sales</th>
                <th>Gross Sales</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $dsql = "SELECT * FROM monthly";
              $dresult = $con->query($dsql);



              while ($row = mysqli_fetch_assoc($dresult)) {


                monthlysales($row['month_m'], $row['monthly_tnorder'], $row['monthly_discount'], $row['monthly_vat'], $row['monthly_sales'], $row['monthly_gross_sales']);
              }
              ?>

            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <script>
    window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')
  </script>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>

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
</script>