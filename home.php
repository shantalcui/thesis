<?php
session_start();


include './php/dbconnect.php';
$sql = "SELECT * FROM tables";
$result = $con->query($sql);
$_SESSION['gettable'] = $result;
if (mysqli_num_rows($_SESSION['gettable']) > 0) {
}
//login failed

foreach ($_SESSION['user'] as $ucart) {
  $uart = $ucart['userid'];
  $userblock = "SELECT * FROM users WHERE user_id='$uart'";
  $userblockresult = $con->query($userblock);
  $userb = mysqli_fetch_assoc($userblockresult);
}
if ($uart > 0) {
  if ($userb['user_block'] == "block") {

    $sta = "Reserved";

    date_default_timezone_set("Asia/Taipei");
    $date = date("y-m-d / h:ia");

    $tsa = "Available";


    $removeguest_sql = "DELETE FROM users WHERE user_id=$uart and user_guest='Guest'";
    $removeguest_sql_result = mysqli_query($con, $removeguest_sql);

    $ququ = "UPDATE user_tables SET utable_Status='Available', utable_Date_time_out='$date' WHERE utable_Status='$sta'and utable_user_id='$uart'";
    $tresult = mysqli_query($con, $ququ);
    header("location:login.php");


    session_destroy();
  }
} else {
  header("location:login.php");
}


/*If user dont reserve

if (isset($_SESSION['acc'])) {
  if (condition) {
   if((time() - $_SESSION['last_login_timestamp'])>10){
    header("location:./php/logout.php");
  }
  }
  
}else{
  header('location:login.php');
}*/








/*Call customer's username
  if (isset($_SESSION['user_login']) && isset($_SESSION['pass_login'])) {

*/
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
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
  <!-- ICONS -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!-- BOOTSTRAP -->
  <!-- CSS -->
  <link rel="stylesheet" href="front-page.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <!-- FONTAWESOME -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <title>Don Covido's | Home</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/carousel/">

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
  <link href="./css/home.css" rel="stylesheet">
</head>

<body>

  <!-- NAVBAR -->
  <section id="header">
    <nav class="navbar navbar-expand-md fixed-top bg-dark">
      <a class="navbar-brand text-white">Don Covidos</a>


      <div class="dropdown ml-auto" data-toggle="tooltip" title="Accout">
        <button type="submit" class="btn btn-dark" data-toggle="dropdown" data-target=".dropdown-menu">

          <p class="navbar-brand text-white ml-auto my-auto">Welcome,


            <?php foreach ($_SESSION['user'] as $uname) {
              $n = $uname['username'];
              echo $n . "!";
            } ?>
          </p>
        </button>
      </div>

      <div class="dropdown-menu dropdown-menu-right bg-dark">
        <form method="post">
          <button class="dropdown-item text-light" name="logout">Cancel Reservation</button>
        </form>
      </div>
      <?php

      if (isset($_POST['logout'])) {





        $sta = "Reserved";
        foreach ($_SESSION['user'] as $ema) {
          date_default_timezone_set("Asia/Taipei");
          $datee = date("y-m-d / h:ia");
          $get = $ema['userid'];
        }

        $removeguest = "DELETE FROM users WHERE user_id=$get and user_guest='Guest'";
        $removeguestresult = mysqli_query($con, $removeguest);

        $customer_table = mysqli_query($con, "SELECT * FROM user_tables WHERE utable_Status='Reserved'and utable_user_id='$get'");

        if (mysqli_num_rows($customer_table) > 0) {

          $ququ = "UPDATE user_tables SET utable_Status='Available', utable_Date_time_out='$datee' WHERE utable_Status='Reserved'and utable_user_id='$get'";
          $tresult = mysqli_query($con, $ququ);






          /*update tables*/
          $num = "SELECT * FROM tables";
          $table_result = $con->query($num);


          if (isset($_SESSION['user'])) {

            while ($row = mysqli_fetch_assoc($table_result)) {

              foreach ($_SESSION['user'] as $emai_id => $email_valuee) {



                if ($row['table_email'] == $email_valuee['userid']) {

                  $tah = $email_valuee['userid'];
                  $table_ttotal = $row["table_status"] - $row["table_status"];
                  $table_email_ttotal = $row["table_email"] - $email_valuee['userid'];

                  $table_saql = "UPDATE tables SET table_status= $table_ttotal, table_email=$table_email_ttotal WHERE table_email= $tah";
                }
              }
            }
          }

          if ($con->query($table_saql) === TRUE) {
            header("location:index.php");
            session_destroy();
          } else {
            echo "Error updating record: " . $con->error;
          }
        } else {
          header("location:index.php");
          session_destroy();
        }
      }




      ?>
    </nav>
    <?php

    if (isset($_POST['reserve'])) {
    ?>
      <script type="text/javascript">
        swal({
          title: 'Successful!',
          text: 'Successfully Reserved!',
          icon: 'success',
        });
      </script>


      <?php
      //array
      //print_r($_POST['productid']);
      if (isset($_SESSION['table-id'])) {


        $item_array_id = array_column($_SESSION['table-id'], "tableid");
        if (in_array($_POST['tableid'], $item_array_id)) {
          echo "<script>alert('Table is Already Reserved')</script>";
        } else {
          $count = count($_SESSION['table-id']);
          $item_array = array(
            'tableid' => $_POST['tableid']
          );
          $_SESSION['table-id'][$count] = $item_array;
      ?>
          <script type="text/javascript">
            swal({
              title: 'Successful!',
              text: 'Successfully Reserved!',
              icon: 'success',
            }).then(function(){
              window.location='main.php';
            });
          </script>


        <?php

        }
      } else {
        $item_array = array(
          'tableid' => $_POST['tableid']
        );
        $_SESSION['table-id']['0'] = $item_array;
        ?>
        <script type="text/javascript">
          swal({
            title: 'Successful!',
            text: 'Successfully Reserved!',
            icon: 'success',
          }).then(function(){
              window.location='main.php';
            });
        </script>


    <?php

      }


      /*Insert table*/

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

      foreach ($_SESSION['table-id'] as $tid) {
        foreach ($_SESSION['user'] as $uid) {


          $username = $uid['username'];
          $tableid = $tid['tableid'];
          $status = "Reserved";
          $user_iid = $uid['userid'];


          date_default_timezone_set("Asia/Taipei");
          $date = date("y-m-d / h:ia");
          $dd = date("y-m-d");

          $dup = mysqli_query($con, "select * from user_tables where utable_Username='$username' and utable_Status='$status'");
          if (mysqli_num_rows($dup) > 0) {
            $update = "UPDATE user_tables SET utable_Table_no='$tableiid' WHERE utable_user_id='$user_iid' and utable_Status='$status'";
            $updateresult = mysqli_query($con, $update);
          } else {

            $tquery = "INSERT INTO user_tables(utable_Table_no ,utable_Username, utable_Status , utable_Date_time , utable_user_id, utable_dd  ) VALUES ('$tableid' ,'$username' , '$status' , '$date' , '$user_iid','$dd')";

            $tresult = mysqli_query($con, $tquery);
          }
        }
      }




      /*Update table*/

      $num = "SELECT * FROM tables";
      $table_result = $con->query($num);

      if (isset($_SESSION['table-id'])) {
        if (isset($_SESSION['user'])) {


          while ($row = mysqli_fetch_assoc($table_result)) {

            foreach ($_SESSION['user'] as $emai_id => $email_value) {

              foreach ($_SESSION['table-id'] as $id => $value) {




                $ta = $value['tableid'];
                $table_total = $row["table_status"] = 1;
                $table_email_total = $row["table_email"] = $email_value['userid'];



                $table_sql = "UPDATE tables SET table_status= $table_total, table_email=$table_email_total  WHERE table_id= $ta";
              }
            }
          }
        }
      }
      if ($con->query($table_sql) === TRUE) {
      } else {
        echo "Error updating record: " . $con->error;
      }
    }


    ?>

  </section>

  <main role="main" data-spy="scroll" data-target="#myScrollspy" data-offset="1">

    <div id="myCarousel" class="carousel slide mt-0" data-ride="carousel">

      <ul class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"><img src=""></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ul>

      <div class="carousel-inner">
        <!-- CAROUSEL PIC #1 -->
        <div class="carousel-item">
          <img src="./images/1st.jpg">
          <div class="container">
            <div class="carousel-caption text-left">
            </div>
          </div>
        </div>

        <!-- CAROUSEL PIC #2 -->
        <div class="carousel-item active">
          <img src="./images/2nd.jpg">
          <div class="container">
            <div class="carousel-caption">
            </div>
          </div>
        </div>

        <!-- CAROUSEL PIC #3 -->
        <div class="carousel-item">
          <img src="./images/3rd.jpg">
          <div class="container">
            <div class="carousel-caption text-right">
              <h1></h1>

            </div>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>


    <!-- Marketing messaging and featurettes
  ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4 mx-auto">
          <img src="./images/nfc.png" width="140px" height="140px">
          <h2>Near-Field Communication</h2>
          <p>Innovating your fine dining experience using technologies. Connect using NCF to order using our website.</p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4">
          <img src="./images/order.png" width="140px" height="140px">
          <h2>Order Easily</h2>
          <p>No need to call the waiter. Just place your order on our website and we will immediately cook it for you.</p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4">
          <img src="./images/reserve.png" width="140px" height="140px">
          <h2>Easy Reservation</h2>
          <p>You will be able to see if your favorite spot is still available. Reserve a table and dine with us.</p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
    </div><!-- /.container -->



    <!-- START THE FEATURETTES -->

    <div class="row justify-content-center best-seller">
      <div class="d-flex my-4 text-white">
        <h1>BEST SELLERS</h1>
      </div>
    </div>
    <!-- BEST SELLER 1 -->
    <div class="container-fluid bg-1">
      <div class="row featurette">
        <div class="text-center col-md-6 m-3 order-md-2 mx-auto my-auto my-md-5">
          <h1 class="featurette-heading text-white">CHICKEN SISIG RICE BOWL</h1>
          <h2 class="text-white">Php 197.00</h2>
          <p class="lead text-white col-10 mx-auto">Start your day with a bowl full of your favorite dish. Grab it now to complete your energy! There is a whole new day waiting for you.</p>
          <!-- <button type="button" class="btn btn-danger btn-lg">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button> -->
        </div>
      </div>
    </div>

    <!-- BEST SELLER 2 -->
    <div class="row featurette bg-2">
      <div class="text-center text-white col-md-5 m-3 order-md-2 mx-auto my-auto my-md-4">
        <h1 class="featurette-heading">ALL-IN-ONE-BUNDLE 7</h1>
        <h2>Php 2,199.00</h2>
        <p class="lead">Family bonding? Celebrating an ocassion? It doesn't matter because at Don Covido's, we got the bundle for you.
          Enjoy bundle 7 with a whole fried chicken, 3 fried fish, pancit canton and java rice</p>
        <!--<button type="button" class="btn btn-danger btn-lg">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button> -->
      </div>
    </div>

    <!-- BEST SELLER 3 -->
    <div class="container-fluid bg-3">
      <div class="row featurette">
        <div class="text-center text-white col-md-5 m-3 order-md-2 mx-auto my-auto my-md-5">
          <h1 class="featurette-heading">HALO HALO</h1>
          <h2>Php 175.00</h2>
          <p class="lead col-7 mx-auto">Beat the heat with our best selling dessert-Halo Halo!</p>
          <!--<button type="button" class="btn btn-danger btn-lg">Add to cart<span class="ml-2"><i class="fa fa-shopping-cart"></i></span></button>-->
        </div>
      </div>
    </div>

    <!-- /END THE FEATURETTES -->


    <!-- MENU -->
    <?php
    include './php/menu-home.php';
    ?>


    <!----- TABLES ----->
    <div class="text-center py-4 table">
      <h1 class="text-white">RESERVE A TABLE</h1>
    </div>
    <div class="album bg-tables">
      <div class="container-fluid">
        <!-- COUPLE -->
        <div class="d-flex justify-content-center" id="couple">

        </div>
        <!-- FAMILY -->
        <div class="d-flex justify-content-center" id="family">

        </div>
      </div>
    </div>
    </div>
  </main>


  <!-- FOOTER -->
  <center>
    <div class="container-fluid bg-dark">
      <div class="container justify-content-center">
        <div class="row">
          <div class="col-12">
            <img src="./images/logo_transparent.png" width="200px" height="auto" class="mx-auto">
          </div>
          <div class="col-12 justify-content-center pb-2">
            <span class="mx-2"><a href="#" class="text-white"><i class="fab fa-facebook"></i></a></span>
            <span class="mx-2"><a href="#" class="text-white"><i class="fab fa-twitter"></i></a></span>
            <span class="mx-2"><a href="#" class="text-white"><i class="fab fa-instagram"></i></a></span>
          </div>
          <div class="col-12 justify-content-center mt-2">
            <p class="text-white">Thank you for dining with us!</p>
            <p class="text-white">&copy; Est. 2020 Don Covido's, Inc. &middot; <a href="policy.php">Terms & Policy</a></p>
          </div>
        </div>
      </div>
    </div>
  </center>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')
  </script>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

</html>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>





<script>
  $(document).ready(function() {


    function getData() {
      $.ajax({
        type: 'POST',
        url: 'hometable.php',
        success: function(data) {
          $('#couple').html(data);
        }
      });
    }
    getData();
    setInterval(function() {
      getData();
    }, 1000); // it will refresh your data every 1 sec

  });


  function session_checking() {
    $.post("block.php", function(data) {

      if (data == "block") {
        swal({
          title: 'Block',
          text: 'You Are Now Block!',
          icon: 'warning',
        }).then(function() {

          window.location = "home.php";
        });

      }

    });
  }

  var validateSession = setInterval(session_checking, 1000);
</script>

<script>
  $(document).ready(function() {


    function getData() {
      $.ajax({
        type: 'POST',
        url: 'hometables.php',
        success: function(data) {
          $('#family').html(data);
        }
      });
    }
    getData();
    setInterval(function() {
      getData();
    }, 1000); // it will refresh your data every 1 sec

  });
</script>