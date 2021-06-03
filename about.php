<?php
session_start();
include './php/dbconnect.php';
/*login failed*/
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





    $ququ = "UPDATE user_tables SET utable_Status='Available', utable_Date_time_out='$date' WHERE utable_Status='$sta'and utable_user_id='$uart'";
    $tresult = mysqli_query($con, $ququ);
    header("location:login.php");
    session_destroy();
  }
} else {
  header("location:login.php");
  session_destroy();
}



$tblreserve = mysqli_query($con, "select * from user_tables where utable_user_id='$uart' and utable_Status='Reserved'");

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
  <title>Don Covido's | About Us</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/jumbotron/">

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

<body>
  <header>
    <<?php
      include './php/navbar.php';
      ?> </header>

      <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron bg-dark">
        </div>

        <div class="album py-5 bg-light">
          <div class="container">

            <!-- CUI -->
            <div class="row">
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                  <img src="./images/cui.jpg" width="100%" height="auto">
                  <div class="card-body">
                    <h4 class="card-text">CUI, SHANTAL MAE E.</h4>
                    <p class="card-text text-muted">LEADER / WEB DESIGNER</p>
                    <div class="d-flex justify-content-start align-items-center">
                      <div class="row mx-auto mb-n2 text-primary">
                        <span class="col-4"><a href="https://www.facebook.com/shantal.cui/"><img src="https://img.icons8.com/cute-clipart/40/000000/facebook-new.png" /></a></span>
                        <span class="col-4"><a href="https://www.facebook.com/messages/t/shantal.cui"><img src="https://img.icons8.com/cute-clipart/40/000000/facebook-messenger.png" /></a></span>
                        <span class="col-4"><a href="https://www.instagram.com/shan.mae/"><img src="https://img.icons8.com/cute-clipart/40/000000/instagram-new.png" /></a></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- GABRIEL -->
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                  <img src="./images/nel.jpg" width="100%" height="auto">
                  <div class="card-body">
                    <h4 class="card-text">GABRIEL, NEL JOHN</h4>
                    <p class="card-text text-muted">ASSISTANT LEADER / WEB DEVELOPER</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="row mx-auto mb-n2 text-primary">
                        <span class="col-4"><a href="https://www.facebook.com/shantal.cui/"><img src="https://img.icons8.com/cute-clipart/40/000000/facebook-new.png" /></a></span>
                        <span class="col-4"><a href="https://www.facebook.com/messages/t/shantal.cui"><img src="https://img.icons8.com/cute-clipart/40/000000/facebook-messenger.png" /></a></span>
                        <span class="col-4"><a href="https://www.instagram.com/shan.mae/"><img src="https://img.icons8.com/cute-clipart/40/000000/instagram-new.png" /></a></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- ANTOPINA -->
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                  <img src="./images/roi.jpg" width="100%" height="auto">
                  <div class="card-body">
                    <h4 class="card-text">ANTOPINA, ROI</h4>
                    <p class="card-text text-muted">ASSISTANT WEB DEVELOPER</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="row mx-auto mt-3 mb-n2 text-primary">
                        <span class="col-4"><a href="https://www.facebook.com/shantal.cui/"><img src="https://img.icons8.com/cute-clipart/40/000000/facebook-new.png" /></a></span>
                        <span class="col-4"><a href="https://www.facebook.com/messages/t/shantal.cui"><img src="https://img.icons8.com/cute-clipart/40/000000/facebook-messenger.png" /></a></span>
                        <span class="col-4"><a href="https://www.instagram.com/shan.mae/"><img src="https://img.icons8.com/cute-clipart/40/000000/instagram-new.png" /></a></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- MAGBANUA -->
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                  <img src="./images/pau.jpg" width="100%" height="auto">
                  <div class="card-body">
                    <h4 class="card-text">MAGBANUA, MARIA PAULA</h4>
                    <p class="card-text text-muted">HEAD DOCUMENTATION</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="row mx-auto mb-n2 text-primary">
                        <span class="col-4"><a href="https://www.facebook.com/shantal.cui/"><img src="https://img.icons8.com/cute-clipart/40/000000/facebook-new.png" /></a></span>
                        <span class="col-4"><a href="https://www.facebook.com/messages/t/shantal.cui"><img src="https://img.icons8.com/cute-clipart/40/000000/facebook-messenger.png" /></a></span>
                        <span class="col-4"><a href="https://www.instagram.com/shan.mae/"><img src="https://img.icons8.com/cute-clipart/40/000000/instagram-new.png" /></a></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- BARRERA -->
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                  <img src="./images/barrera.jpg" width="100%" height="auto">
                  <div class="card-body">
                    <h4 class="card-text">BARRERA, REINER</h4>
                    <p class="card-text text-muted">ASSISTANT DOCUMENTATION</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="row mx-auto mt-4 mb-n2 text-primary">
                        <span class="col-4"><a href="https://www.facebook.com/shantal.cui/"><img src="https://img.icons8.com/cute-clipart/40/000000/facebook-new.png" /></a></span>
                        <span class="col-4"><a href="https://www.facebook.com/messages/t/shantal.cui"><img src="https://img.icons8.com/cute-clipart/40/000000/facebook-messenger.png" /></a></span>
                        <span class="col-4"><a href="https://www.instagram.com/shan.mae/"><img src="https://img.icons8.com/cute-clipart/40/000000/instagram-new.png" /></a></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <hr>

            </div> <!-- /container -->

      </main>

      <footer class="container">
        <p>&copy; Don Covido's 2020</p>
      </footer>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>
        window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
      </script>
      <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {


    function getData() {
      $.ajax({
        type: 'POST',
        url: './php/count.php',
        success: function(data) {
          $('#count').html(data);
        }
      });
    }
    getData();
    setInterval(function() {
      getData();
    }, 1000); // it will refresh your data every 1 sec

  });


  function blocking_about() {
    $.post("block.php", function(data) {

      if (data == "block") {
        swal({
          title: 'Block',
          text: 'You Are Now Block!',
          icon: 'warning',
        }).then(function() {

          window.location = "about.php";
        });

      }

    });
  }

  var validateSession = setInterval(blocking_about, 1000);
</script>