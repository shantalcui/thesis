<?php

session_start();

require_once('./php/component.php');
include './php/dbconnect.php';

$osql = "SELECT * FROM user_receipt";
$oresult = $con->query($osql);
$rowzs = mysqli_fetch_assoc($oresult);





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
  <!--head-->
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
              <a class="nav-link active" href="issued.php">
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

        <div class="row mb-3">
          <h2 class="col-6">Issued Official Receipt</h2>
          <button type="submit" class="btn btn-primary col-2 pt-2 ml-auto" data-toggle="modal" data-target="#myModal" name="check">Show</button>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>Official Receipt #</th>
                <th>Customer's Name</th>
                <th>Customer's email</th>
                <th>Total item order</th>
                <th>Total quantity of order</th>
                <th>SUBTOTAL</th>
                <th>Table #</th>
                <th>Date/Time Issued</th>
                <th>Check the receipt</th>
              </tr>
            </thead>

            <tbody>




              <!--User receipt-->
              <?php
              $sql = "SELECT * FROM user_receipt";
              $result = $con->query($sql);


              while ($row = mysqli_fetch_assoc($result)) {
                $s = $row['user_receipt_or'];


              ?>
                <form action="issued.php?action=check&id=<?php echo $row['user_receipt_or']; ?>" method="post">

                  <tr>
                    <td><?php echo $row['user_receipt_or']; ?></td>
                    <input type="hidden" name="or" value="$or">
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['user_email']; ?></td>
                    <input type="hidden" name="u" value="$user">
                    <td><?php echo $row['user_torder']; ?></td>
                    <td><?php echo $row['user_tqty']; ?></td>
                    <td>Php <?php echo $row['user_subtotal']; ?></td>
                    <td><?php echo $row['user_table']; ?></td>
                    <td class="text-muted"><?php echo $row['receipt_date']; ?></td>


                    <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" name="check">Check</button></td>

                    <input type="hidden" name="checkitem" value="<?php echo $row['user_receipt_or']; ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                  </tr>
                </form>
              <?php

              }
              ?>


            </tbody>

          </table>
          <?php

          if (isset($_POST['check'])) {
            $ooor = $_GET['id'];
            $query = "select * from orders where user_or='$ooor'";
            $reresult = mysqli_query($con, $query);
            $rowzsw = mysqli_fetch_assoc($reresult);

            $useror = $rowzsw['user_or'];
            $username = $rowzsw['order_username'];
            $userdate = $rowzsw['order_date'] . " / " . $rowzsw['order_date_out'];
            $usertable = $rowzsw['order_table'];
            $admin = $rowzsw['order_cashier'];

          ?>
            <!-- POP UP RECIEPT -->
            <div class="modal fade my-auto" id="myModal" role="dialog">
              <div class="modal-dialog modal-dialog-centered modal-md">

                <!-- RECEIPT CONTENT -->
                <form class="modal-content" action="/action_page.php">
                  <div class="modal-body">
                    <div class="row text-dark">
                      <div class="col-10 mx-auto">
                        <h3 class="text-center pt-2 mb-0 font-weight-bold">Don Covido's</h3>
                        <h6 class="bottom text-center pt-0 pb-2 mr-3">Southcrest vill., San Agustin 2, City of Dasmarinas</h6>

                        <h6>OR#<?php echo $useror; ?></h6>
                        <h6>CUSTOMER'S NAME:<?php echo $username; ?></h6>
                        <h6><?php echo $userdate; ?></h6>
                        <h6>TABLE #<?php echo $usertable; ?></h6>
                        <h6>CASHIER: <?php echo $admin; ?></h6>

                        <li class="bottom row d-flex mb-3 justify-content-between lh-condensed">
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
                        //echo $_POST['checkitem'];
                        //display all item



                        $uuquery = "select * from orders where user_or='$ooor'";
                        $reresultuuu = mysqli_query($con, $uuquery);

                        while ($row = mysqli_fetch_assoc($reresultuuu)) {
                          if ($row['user_or'] == $_GET['id']) {

                            $n = $row['order_name'];
                            $op = $row['order_price'];
                            $q = $row['order_qty'];
                            $t = $row['order_tprice'];
                            $ti = $row['order_time'];
                        ?>
                            <li class="row d-flex mb-3 justify-content-between lh-condensed">
                              <div class="col-1 pt-1">
                                <h6 class="my-0 font-weight-bold text-left"><?php echo $q; ?></h6>
                              </div>
                              <div class="col-4 pt-1">
                                <h6 class="my-0 font-weight-bold text-left"><?php echo $n; ?></h6>
                              </div>
                              <div class="col-3 pt-1">
                                <p class="my-0 font-weight-bold text-right"><?php echo "Php" . $t; ?></p>
                              </div>
                            </li>
                        <?php




                          }
                        }


                        $totalsql = "SELECT * FROM user_receipt where user_receipt_or='$ooor'";
                        $yawa = $con->query($totalsql);
                        $trowzs = mysqli_fetch_assoc($yawa);
                        $vatt = $trowzs['user_vat'];
                        $discc = $trowzs['user_discount'];
                        $amc = $trowzs['user_subtotal'];
                        $Change = $trowzs['user_change'];
                        $tender = $trowzs['user_tender'];





                        ?>

                        <!-- VAT -->
                        <li class="top row d-flex pt-3 justify-content-between">
                          <small class="col font-weight-bold text-right">VAT 12%</small>
                          <small class="col-5 font-weight-bold text-right">Php <?php echo $vatt; ?>
                            <!--(VAT=AMOUNT*0.12)-->
                            <!--PAG MAY SENIOR DISCOUNT PHP0.00 NA YUNG VAT-->
                          </small>
                        </li>
                        <!-- DISCOUNT -->
                        <li class="row d-flex justify-content-between">
                          <small class="col font-weight-bold text-right">Discount 20%</small>
                          <small class="col-5 font-weight-bold text-right">Php <?php echo $discc; ?>
                            <!--(DISCOUNT=AMOUNT*0.2)-->
                          </small>
                        </li>
                        <!-- TOTAL AMOUNT -->
                        <li class="row d-flex mb-n2 justify-content-between">
                          <h5 class="col font-weight-bold text-right">AMOUNT</h5>
                          <h5 class="col-5 font-weight-bold text-right">Php <?php echo $amc; ?>
                            <!--(SUBTOTAL+VAT)-->
                            <!--PAG MAY SENIOR DISCOUNT: (SUBTOTAL-DISCOUNT)-->
                          </h5>
                        </li>

                        <li class="row d-flex justify-content-between">
                          <small class="col font-weight-bold text-right">Amount Tendered</small>
                          <small class="col-5 font-weight-bold text-right">Php <?php echo $tender; ?>
                            <!--(DISCOUNT=AMOUNT*0.2)-->
                          </small>
                        </li>

                        <li class="bottom row pb-3 d-flex justify-content-between">
                          <small class="col font-weight-bold text-right">Change</small>
                          <small class="col-5 font-weight-bold text-right">Php <?php echo $Change; ?>
                            <!--(DISCOUNT=AMOUNT*0.2)-->
                          </small>
                        </li>





                        <li class="row d-flex justify-content-center">
                          <h5 class=" col-12 text-center font-weight-bold">THANK YOU FOR DINING WITH US!</h5>
                          <img src="./images/barcode.png" width="200" height="80" class="col-5  pb-3">
                        </li>
                        </ul>
                      </div>
                    </div><!-- end of pop up receipt -->
                  <?php
                }
                  ?>

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
</script>