<?php

session_start();
include './php/dbconnect.php';



/*login failed*/





?>
<!doctype html>
<html lang="en">

<head>
  </script>
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

  </header>

  <main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->


    <div class="album py-5 bg-light">
      <div class="container">

        <form action="customer_feedback.php" method="post">
          <div class="container py-5" id="contact">
            <div class="row justify-content-center">
              <h1>FEEDBACK</h1>
            </div>

            <div class="form-group">
              <label>Name:</label>
              <input type="text" class="form-control" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label>Feedback:</label>
              <textarea class="form-control" rows="5" name="feedback" placeholder="Send us a feedback"></textarea>
            </div>


            <button type="submit" name="yes" class="btn btn-danger">Submit</button>
            <button type="submit" name="no" class="btn btn-danger">Cancel</button>
            <?php
            if (isset($_POST['yes'])) {

              $uname = $_POST['name'];
              $ufeedback = $_POST['feedback'];
              date_default_timezone_set("Asia/Taipei");
              $date = date("F j, Y");


              if ($uname == "" && $ufeedback == "") {
            ?>
                <script type="text/javascript">
                  swal({
                    title: 'Alert',
                    text: 'Input field is empty',
                    icon: 'info',
                  });
                </script>


              <?php
              } else {

                $query = "INSERT INTO user_feedback( user_name , user_feedback, user_date) VALUES ('$uname','$ufeedback' , '$date')";
                $result = mysqli_query($con, $query);
              ?>
                <script type="text/javascript">
                  swal({
                    title: 'Thank You!',
                    text: 'Successfully Sent!',
                    icon: 'success',
                  }).then(function() {
                    window.location = "front.php";
                  });
                </script>


              <?php
              }
            }



            if (isset($_POST['no'])) {
              ?>
              <script type="text/javascript">
                swal({
                  title: 'Thank You!',
                  text: 'Come Again',
                  icon: 'success',
                }).then(function() {
                  window.location = "front.php";
                });
              </script>


            <?php
            }
            ?>



          </div>
        </form>



      </div> <!-- /container -->


  </main>

  <!-- FOOTER -->
  <footer class="d-flex container justify-content-center mt-2">

  </footer>
  </main>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
  </script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>