<?php

session_start();

include './php/dbcall.php';
require_once('./php/component.php');
//OR code







foreach ($_SESSION['user'] as $ucart) {
  $uname = $ucart['userid'];
  $userblock = "SELECT * FROM users WHERE user_id='$uname'";
  $userblockresult = $con->query($userblock);
  $userb = mysqli_fetch_assoc($userblockresult);
}
if ($uname > 0) {
  if ($userb['user_block'] == "block") {

    $sta = "Reserved";

    date_default_timezone_set("Asia/Taipei");
    $date = date("y-m-d / h:ia");





    $ququ = "UPDATE user_tables SET utable_Status='Available', utable_Date_time_out='$date' WHERE utable_Status='$sta'and utable_user_id='$uname'";
    $tresult = mysqli_query($con, $ququ);
    header("location:login.php");
    session_destroy();
  }
} else {
  header("location:login.php");
  session_destroy();
}



$tblreserve = mysqli_query($con, "select * from user_tables where utable_user_id='$uname' and utable_Status='Reserved'");

if (mysqli_num_rows($tblreserve) > 0) {
} else {
  header("location:home.php");
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
    include './php/navbar.php';
    if (isset($_POST['remove'])) {
      if ($_GET['action'] == 'remove') {

        $removeid = $_GET['id'];


        $orderremovesql = "DELETE FROM orders WHERE order_name_id=$removeid and order_status=''";
        $orderremovesqlresult = mysqli_query($con, $orderremovesql);
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

    <?php

    //insert order
    if (isset($_POST['placeorder'])) {
      $table_sql = "UPDATE ptb AS tb JOIN orders AS tbl ON (tbl.order_name_id = tb.id) SET tb.pqty = (tb.pqty - tbl.order_qty) WHERE tbl.order_user_id='$uname' and tbl.order_status='' and tbl.order_place=''";

      $statement = mysqli_query($con, $table_sql);
      $ordersql = "SELECT * FROM orders";
      $ordersqlresult = mysqli_query($con, $ordersql);






      $sqltable = "select * from user_tables where utable_user_id='$uname' and utable_Status='Reserved'";
      $sqltableresult = mysqli_query($con, $sqltable);
      $tables = mysqli_fetch_assoc($sqltableresult);

      $tableiid = $tables['utable_Table_no'];

      while ($orderrow = mysqli_fetch_assoc($ordersqlresult)) {



        foreach ($_SESSION['user'] as $email => $uvalue) {






          $user_iid = $uvalue['userid'];

          $useremail = $uvalue['useremail'];
          $useruname = $uvalue['username'];
        }

        $orderqty = $orderrow['order_qty'];
        $ordernameid = $orderrow['order_name_id'];
        $ordername = $orderrow['order_name'];




        date_default_timezone_set("Asia/Taipei");
        $date = date("y-m-d");
        $ddate = date("y-m");
        $time = date("h:ia");





        $dup = mysqli_query($con, "select * from orders where order_name_id='$ordernameid' and order_name='$ordername' and order_table='$tableiid' and order_username='$useruname' and order_user='$useremail' and order_qty='$orderqty' and order_status='Preparing' and order_place='place'");

        if (mysqli_num_rows($dup) > 0) {




    ?>
          <script type="text/javascript">
            swal({
              title: 'Successfully Order!',
              text: 'Please Wait for Your Order',
              icon: 'success',
            });
          </script>


        <?php

        } else {

          $iiiid = $orderrow['order_name_id'];
          $iquery = "select * from orders where order_username='$useruname' and order_status=''";
          $iqueryresult = mysqli_query($con, $iquery);
          while ($rowx = mysqli_fetch_assoc($iqueryresult)) {
            # code...

            # code...


            $tprice = $rowx['order_qty'] * $rowx['order_price'];


            $query = "UPDATE orders SET order_tprice='$tprice',order_status='Preparing',order_place='place' WHERE order_name_id='$iiiid' and order_username='$useruname' and order_status=''";
            $utresult = mysqli_query($con, $query);
          }

          /*update Product qty*/







        ?>
          <script type="text/javascript">
            swal({
              title: 'Successfully Order!',
              text: 'Please Wait for Your Order',
              icon: 'success',
            });
          </script>


    <?php


        }
      }
    }




















    ?>

  </header>
  <div class="container">
    <div class="py-5 text-center">
      <h1 class="mt-5">CART</h1>
    </div>

    <div class="row text-dark">
      <div class="col-11 mx-auto">

        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill mr-auto ml-2" id="countt"></span>
          <span class="badge badge-secondary badge-pill" id="bell_alert">



          </span>
        </h4>
        <ul class="list-group mb-3" id="cart"></ul>
        <form method="post">
          <div class="row" id="cartbtn"></div>
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
<?php
foreach ($_SESSION['user'] as $served_user) {
  $served_user = $served_user['userid'];
  $served_user_query = "SELECT * FROM orders WHERE order_user_id='$served_user' and order_status='Served' ";
  $served_user_query_result = $con->query($served_user_query);
  $served_user_row = mysqli_fetch_assoc($served_user_query_result);
}

?>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
  $(document).ready(function() {


    function cartbtn() {
      $.ajax({
        type: 'POST',
        url: './php/cartbtn.php',
        success: function(data) {
          $('#cartbtn').html(data);
        }
      });
    }
    cartbtn();
    setInterval(function() {
      cartbtn();
    }, 1000); // it will refresh your data every 1 sec

  });
  $(document).ready(function() {


    function cart() {
      $.ajax({
        type: 'POST',
        url: 'cart.php',
        success: function(data) {
          $('#cart').html(data);
        }
      });
    }
    cart();
    setInterval(function() {
      cart();
    }, 1000); // it will refresh your data every 1 sec

  });
  $(document).ready(function() {


    function countt() {
      $.ajax({
        type: 'POST',
        url: './php/count.php',
        success: function(data) {
          $('#count').html(data);
        }
      });
    }
    countt();
    setInterval(function() {
      countt();
    }, 1000); // it will refresh your data every 1 sec

  });
  $(document).ready(function() {


    function counts() {
      $.ajax({
        type: 'POST',
        url: './php/count.php',
        success: function(data) {
          $('#countt').html(data);
        }
      });
    }
    counts();
    setInterval(function() {
      counts();
    }, 1000); // it will refresh your data every 1 sec

  });

  function additem(addupdate) {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "addupdate.php?id=" + addupdate, true);
    xmlhttp.send();
  }

  function minusitem(minusupdate) {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "minusupdate.php?id=" + minusupdate, true);
    xmlhttp.send();
  }




  $(document).ready(function() {


    function bell_alert() {
      $.ajax({
        type: 'POST',
        url: './php/bell_alert.php',
        success: function(data) {
          $('#bell_alert').html(data);
        }
      });
    }
    bell_alert();
    setInterval(function() {
      bell_alert();
    }, 1000); // it will refresh your data every 1 sec

  });
</script>

<script>
  function notif() {
    $.post("./php/notorderyet.php", function(not_yet) {
      swal({
          title: 'BELL NOTICE!',
          text: 'Notify the admin that your order is delay!',
          icon: 'warning',
          buttons: ["NO!", "YES!"],
        })
        .then((yes_value) => {

          if (not_yet == "") {
            swal({
              title: 'Error!',
              text: 'Please place order first!',
              icon: 'error',

            })
          } else {
            if (yes_value) {
              swal({
                title: 'Alerting the admin!',
                text: 'Please wait!',
                icon: 'info',

              })
              var poporder = new XMLHttpRequest();

              poporder.open("GET", "./php/updatepoporder.php", true);
              poporder.send();



            } else {
              swal({
                title: 'BE PATIENT!',
                text: 'Thank you for understanding!',
                icon: 'success',

              })
            }


          }
        });
    });

  }





  function yawa() {
    $.post("./php/display_served.php", function(done) {

      if (done == "on") {

        $.post("./php/display_item.php", function(item) {


          swal({
            title: 'Done item ' + item,
            text: 'Serving your order!',
            icon: 'info',
          })
          var done_served = new XMLHttpRequest();

          done_served.open("GET", "./php/done.php?", true);
          done_served.send();;
        });
      }

    });
  }

  var validateSession = setInterval(yawa, 1000);



  function blocking_main_cart() {
    $.post("block.php", function(data) {

      if (data == "block") {
        swal({
          title: 'Block',
          text: 'You Are Now Block!',
          icon: 'warning',
        }).then(function() {

          window.location = "main_cart.php";
        });

      }

    });
  }

  var validateSession = setInterval(blocking_main_cart, 1000);



  function billingdone() {
    $.post("./php/billingdone.php", function(data) {

      if (data == "yes") {
        swal({
          title: 'Transaction is over!',
          text: 'Cant go Back',
          icon: 'warning',
        }).then(function() {

          window.location = "main_receipt.php";
        });

      }

    });
  }

  var billingSession = setInterval(billingdone, 1000);
</script>


</head>

<body>