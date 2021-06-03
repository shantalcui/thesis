<?php
session_start();
include './php/dbcall.php';
require_once('./php/component.php');
foreach ($_SESSION['admin'] as $uid) {
  $id = $uid['adminid'];
}
$logsql = "SELECT * FROM admin WHERE admin_id =$id";
$logresult = mysqli_query($con, $logsql);
if ($id > 0) {
} else {
  header("location:admin.php");
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

      <!-- SIDE BAR --><?php

                        date_default_timezone_set("Asia/Taipei");
                        $ddate = date("F d Y");
                        ?>
      <!-- end Side Bar -->


      <!-- MAIN CONTENT -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

          <h2>Product Sales for <?php echo $ddate; ?></h2>
          <div class="dropdown">
            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
              <span data-feather="calendar"></span>
              Product Sales
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item disabled" href="product-sales.html">Product Sales</a>
              <a class="dropdown-item" href="daily_sales.php">Daily Sales</a>
              <a class="dropdown-item" href="weekly_sales.php">Weekly Sales</a>
              <a class="dropdown-item" href="monthly_sale.php">Monthly Sales</a>
            </div>
          </div>
        </div>
        <!-- START THE PRODUCTS -->

        <div class="album py-5">
          <div class="container-fluid">
            <div class="container">
              <div class="row justify-content-center">

                <!-- PIC 1 -->











                <?php
                $sql = "SELECT * FROM orders";
                $result = $con->query($sql);
                $a1qty = $a2qty = $a3qty = $a4qty = $b1qty = $b2qty = $b3qty = $b4qty = $b5qty = $c1qty = $c2qty = $c3qty = $c4qty = $c5qty = $c6qty = $c7qty = $c8qty = $c9qty = $d1qty = $d2qty = $e1qty = $e2qty = $e3qty = $e4qty = $e5qty = $e6qty = $e7qty = $f1qty = $f2qty = $f3qty = $f4qty = $f5qty = 0;
                date_default_timezone_set("Asia/Taipei");
                $date = date("y-m-d");


                while ($row = mysqli_fetch_assoc($result)) {
                  if ($row['order_date'] == $date) {
                    if ($row['order_name'] == 'Fish Fillet Rice Bowl') {
                      $a1qty = $a1qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Tofu Rice Bowl') {
                      $a2qty = $a2qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Shanghai Rice Bowl') {
                      $a3qty = $a3qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Chicken Sisig Rice Bowl') {
                      $a4qty = $a4qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Platter Meal') {
                      $b1qty = $b1qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Fiesta Plate Meal') {
                      $b2qty = $b2qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Super Solo Meal') {
                      $b3qty = $b3qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Best Plate') {
                      $b4qty = $b4qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Basic Meal') {
                      $b5qty = $b5qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Bilao 1') {
                      $c1qty = $c1qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Bilao 2') {
                      $c2qty = $c2qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'All-In-One Bundle 1') {
                      $c3qty = $c3qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'All-In-One Bundle 2') {
                      $c4qty = $c4qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'All-In-One Bundle 3') {
                      $c5qty = $c5qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'All-In-One Bundle 4') {
                      $c6qty = $c6qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'All-In-One Bundle 5') {
                      $c7qty = $c7qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'All-In-One Bundle 6') {
                      $c8qty = $c8qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'All-In-One Bundle 7') {
                      $c9qty = $c9qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Halo Halo') {
                      $d1qty = $d1qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Leche Flan') {
                      $d2qty = $d2qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Bottled Water') {
                      $e1qty = $e1qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Softdrinks') {
                      $e2qty = $e2qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Diet Softdrinks') {
                      $e3qty = $e3qty + $row['order_qty'];
                    } elseif ($row['order_name'] == '1.5 Litre Softdrinks') {
                      $e4qty = $e4qty + $row['order_qty'];
                    } elseif ($row['order_name'] == '1.5 Litre Diet Softdrinks') {
                      $e5qty = $e5qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Orange Juice') {
                      $e6qty = $e6qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Mango Juice') {
                      $e7qty = $e7qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Red Wine') {
                      $f1qty = $f1qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'White Wine') {
                      $f2qty = $f2qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Rum') {
                      $f3qty = $f3qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Vodka') {
                      $f4qty = $f4qty + $row['order_qty'];
                    } elseif ($row['order_name'] == 'Whiskey') {
                      $f5qty = $f5qty + $row['order_qty'];
                    }
                  }
                }
                ?>
                <!-- PIC 1 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-mg">
                    <img src="./images/sweet-n-sour.png" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Fish Fillet Rice Bowl (RB#1)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $a1qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">

                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 2 -->

                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-mg">
                    <img src="./images/tofu.png" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Tofu Rice Bowl (RB#2)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $a2qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 3 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-mg">
                    <img src="./images/shanghai.png" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Shanghai Rice Bowl (RB#3)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $a3qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 4 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-mg">
                    <img src="./images/chicken-sisig.png" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Chicken Sisig Rice Bowl (RB#4)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $a4qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 5 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-mg">
                    <img src="./images/platter-meal.png" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Platter Meal (CM#1)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $b1qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 6 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-mg">
                    <img src="./images/fiesta.png" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Fiesta Plate Meal (CM#2)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $b2qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 7 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-mg">
                    <img src="./images/super-solo-meal.jpg" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Super Solo Meal (CM#3)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $b3qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 8 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-mg">
                    <img src="./images/best-plate.png" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Best Plate (CM#4)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $b4qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 9 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-mg">
                    <img src="./images/basic-meal.png" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Basic Meal (CM#5)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $b5qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 10 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-mg">
                    <img src="./images/bilao-trio-1.jpg" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Bilao 1 (GM#1)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $c1qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 11 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-mg">
                    <img src="./images/bilao-trio-2.jpg" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Bilao 2 (GM#2)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $c2qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 12 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-mg">
                    <img src="./images/bundle-1.png" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">All-In-One Bundle 1 (GM#3)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $c3qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 13 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/bundle-2.png" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">All-In-One Bundle 2 (GM#4)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $c4qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!--  <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 14 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/bundle-3.png" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">All-In-One Bundle 3 (GM#5)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $c5qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!--  <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 15 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/bundle-4.jpg" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">All-In-One Bundle 4 (GM#6)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $c6qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!--<div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 16 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/bundle-5.jpg" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">All-In-One Bundle 5 (GM#7)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $c7qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!--  <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 17 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/bundle-6.jpg" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">All-In-One Bundle 6 (GM#8)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $c8qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 18 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/bundle-6.jpg" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">All-In-One Bundle 7 (GM#9)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $c9qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 19 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/Halo Halo.png" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Halo Halo (D#1)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $d1qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 20 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/Leche Flan.png" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Leche Flan (D#2)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $d2qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 21 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/water.png" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Bottled Water (B#1)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $e1qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 22 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/pepsi.png" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Softdrink (B#2)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $e2qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 23 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/diet.jpg" width="200" height="auto" class="mx-auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Diet Softdrink (B#3)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $e3qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 24 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/litre.jpg" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">1.5 Litre of Softdrink (B#4)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $e4qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 25 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/litre-diet.jpg" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">1.5 Litre of Diet Softdrink (B#5)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $e5qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 26 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/orange.jpg" width="200" height="auto" class="mx-auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Orange Juice (B#6)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $e6qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 27 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/mango.jpg" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Mango Juice (B#7)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $e7qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 28 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/Red Wine.jpg" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Red Wine (B#8)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $f1qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 29 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/White Wine.jpg" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">White Wine (B#9)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $f2qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 30 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/Rum.jpg" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Rum (B#10)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $f3qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PIC 31 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/Vodka.jpg" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Vodka (B#11)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $f4qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>

                <!-- PIC 32 -->
                <div class="col-11 col-md-3">
                  <div class="card mb-4 shadow-md">
                    <img src="./images/Whiskey.jpg" width="250" height="auto"></img>
                    <div class="card-body">
                      <h5 class="card-text">Whiskey (B#12)</h5>
                      <h6 class="card-text text-primary">Sales Count: <?php echo $f5qty;  ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <!-- <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-danger">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>
                  <button type="button" class="btn btn-warning" onclick="document.location='../menu/menu3.html'">View menu &raquo;</button>
                </div> -->
                      </div>
                    </div>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div><!-- end album -->
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
  <script src="dashboard.js"></script>
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