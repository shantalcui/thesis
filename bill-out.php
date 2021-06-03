<?php
session_start();
include './php/dbcall.php';
require_once('./php/component.php');
foreach ($_SESSION['user'] as $uid) {
  $uname = $uid['username'];
  $tblreserve = mysqli_query($con, "select * from user_tables where utable_Username='$uname' and utable_Status='Reserved'");

  if (mysqli_num_rows($tblreserve) > 0) {
  } else {
    header("location:login.php");
    unset($_SESSION['user']);
    unset($_SESSION['table-id']);
  }
}

$cancel = "SELECT * FROM orders WHERE   order_username ='$uname' and order_status='Served'";
          $cancelresult = $con->query($cancel);
        
        if (mysqli_num_rows($cancelresult) > 0) {

         
        } else {
          header("location:main_cart.php");
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
    ?>
  </header>

  <div class="container">
    <div class="py-5 text-center">
      <h1 class="mt-5">BILL OUT</h1>
      <h2 class="text-muted">ORDER SUMMARY</h2>
    </div>

    <div class="row text-dark">
      <div class="col-11 col-md-8 mx-auto">
        <ul class="list-group mb-3" id="all">



         

          
        </ul>


        <?php
        foreach ($_SESSION['user'] as $ema) {


          $get = $ema['userid'];
        }
        ?>



        <?php
        foreach ($_SESSION['user'] as $uisd) {

          $nm = $uisd['username'];

          $billoutbtn = "SELECT * FROM orders WHERE   order_username ='$nm' and order_status='Served'";
          $billoutbtnresult = $con->query($billoutbtn);
        }
        if (mysqli_num_rows($billoutbtnresult) > 0) {

          billoutbutton("button", "");
        } else {
          billoutbutton("submit", "disabled");
        }
        ?>

   
            
           
         

        <li>

          <div class="row" id="bill">


          </div>
          <div class="row" id="cardbutton">



          </div>



        </li>
        <!-- Modal -->
        <div class="modal fade" id="payment" role="dialog">
          <div class="modal-dialog">
            <form method="post">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Mode of Payment</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body row">

                  <button type="submit" class="btn btn-large col" name="cash">
                    <span><img src="https://img.icons8.com/plasticine/70/ffffff/money.png"/></span>
                    <br>
                    <span>Cash</span>
                  </button>
                  <button type="submit" class="btn btn-large col" name="card">
                    <span><img src="https://img.icons8.com/bubbles/70/000000/bank-card-back-side.png"/></span>
                    <br>
                    <span>Card</span>
                  </button>

            </form>


            <?php

            
            if (isset($_POST['cash'])) {
                $pointsuser="SELECT * FROM users WHERE user_id=$get";
                $pointsuserresult=mysqli_query($con,$pointsuser);
                $pointrow = mysqli_fetch_assoc($pointsuserresult);
                $change=$_SESSION['gtotal'];

               if ($pointrow['user_points']>0) {

              

              $ququ = "UPDATE user_tables SET user_payment='Cash',utable_change='$change' WHERE utable_Status='Reserved'and utable_user_id='$get'";
              $tresult = mysqli_query($con, $ququ);
            ?>
              <script type="text/javascript">
                swal({
                  title: "You Have Points of ₱<?php echo$pointrow['user_points'];?>",
                  text: "Do you want to use your Points?",
                  icon: "warning",
                buttons: ["No", "Yes"],
                })
                .then((willDelete) => {
                if (willDelete) {
                 swal("Points use", {
                  icon: "success",
                  });

                var xmlhttp = new XMLHttpRequest();
                
                
                
                xmlhttp.open("GET", "./php/yes.php", true);
                xmlhttp.send();

                
                } else {
                  swal("Points Not Use",{
                    icon: "error",
                  });
                  var xmlhttp = new XMLHttpRequest();
                
                
                
                xmlhttp.open("GET", "./php/no.php", true);
                xmlhttp.send();
                }
              });
                            
                            </script>
             <?php
                } 

              else{
              

              $ququ = "UPDATE user_tables SET user_payment='Cash',utable_change='$change' WHERE utable_Status='Reserved'and utable_user_id='$get'";
              $tresult = mysqli_query($con, $ququ);
            ?>
              <script type="text/javascript">
                swal({
                  title: "Pay with Cash!",
                  text: "Please ready your cash and wait for an employee.",
                  icon: "success",
                });
              </script>




            <?php
            }
          }

            ?>
            <?php

            if (isset($_POST['card'])) {
               $pointsuser="SELECT * FROM users WHERE user_id=$get";
                $pointsuserresult=mysqli_query($con,$pointsuser);
                $pointrow = mysqli_fetch_assoc($pointsuserresult);

              if ($pointrow['user_points']>0) {

              

              $ququ1 = "UPDATE user_tables SET user_payment='Paying' WHERE utable_Status='Reserved'and utable_user_id='$get'";
              $tresult1 = mysqli_query($con, $ququ1);
            ?>
              <script type="text/javascript">
                swal({
                  title: "You Have Points of ₱<?php echo$pointrow['user_points'];?>",
                  text: "Do you want to use your Points?",
                  icon: "warning",
                buttons: ["No", "Yes"],
                })
                .then((willDelete) => {
                if (willDelete) {
                 swal("Points use", {
                  icon: "success",
                  });

                var xmlhttp = new XMLHttpRequest();
                
                
                
                xmlhttp.open("GET", "./php/yes.php", true);
                xmlhttp.send();

                
                } else {
                  swal("Points Not Use",{
                    icon: "error",
                  });
                  var xmlhttp = new XMLHttpRequest();
                
                
                
                xmlhttp.open("GET", "./php/no.php", true);
                xmlhttp.send();

                }
              });
                            
                            </script>
             <?php
                }
                else{ 

              

              $ququ1 = "UPDATE user_tables SET user_payment='Paying' WHERE utable_Status='Reserved'and utable_user_id='$get'";
              $tresult1 = mysqli_query($con, $ququ1);
            ?>
              <script type="text/javascript">
                swal({
                  title: "Pay with Card!",
                  text: "Click The Card Button.",
                  icon: "success",
                });
              </script>

            <?php
            }
            }

            ?>



          </div>
        </div><!-- end modal content-->

      </div>
    </div><!-- end modal -->

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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>

</html>
 <script>
function mydiscount() {
  
  
                  swal({
                  title: "Verifying",
                  text: "Please wait for an employee.",
                  icon: "success",
                });

                   var xmlhttp = new XMLHttpRequest();
                
                
                
                xmlhttp.open("GET", "./php/verify.php", true);
                xmlhttp.send();
    
  
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
   function bill_show()
 {
                    $.post( "billshow.php", function( shows ) {

                        if(shows == "Cash")
                        {
                             swal({
                              title: 'RECEIPT',
                              text: 'Click ok to proceed to receipt!',
                              icon: 'info',
                            }).then(function(){

                              window.location="main_receipt.php";
                            });
                              var bill_show_done = new XMLHttpRequest();
    
                              bill_show_done.open("GET", "./php/billshow_off.php", true);
                              bill_show_done.send();
                            
                        }

                    });
                }

                var bill_show_validateSession = setInterval(bill_show, 1000);


</script>

<script>



   function blocking_bill_out()
                {
                    $.post( "block.php", function( data ) {

                        if(data == "block")
                        {
                             swal({
                              title: 'Block',
                              text: 'You Are Now Block!',
                              icon: 'warning',
                            }).then(function(){

                              window.location="bill-out.php";
                            });
                            
                        }

                    });
                }

                var validateSession = setInterval(blocking_bill_out, 1000);


function billingdones()
                {
                    $.post( "./php/billingdone.php", function( data ) {

                        if(data == "yes")
                        {
                               swal({
                              title: 'Transaction is over!',
                              text: 'Cant go Back',
                              icon: 'warning',
                            }).then(function(){

                              window.location="main_receipt.php";
                            });
                            
                        }

                    });
                }

 var billingSession = setInterval(billingdones, 1000);
</script>


<script>
  $(document).ready(function() {


    function cardbutton() {
      $.ajax({
        type: 'POST',
        url: 'cardbutton.php',
        success: function(data) {
          $('#cardbutton').html(data);
        }
      });
    }
    cardbutton();
    setInterval(function() {
      cardbutton();
    }, 1000); // it will refresh your data every 1 sec

  });
</script>



<script>
  $(document).ready(function() {


    function count() {
      $.ajax({
        type: 'POST',
        url: './php/count.php',
        success: function(data) {
          $('#count').html(data);
        }
      });
    }
    count();
    setInterval(function() {
      count();
    }, 1000); // it will refresh your data every 1 sec

  });
</script>

<script>
  $(document).ready(function() {


    function vatdisto() {
      $.ajax({
        type: 'POST',
        url: './php/vatdisto.php',
        success: function(data) {
          $('#all').html(data);
        }
      });
    }
    vatdisto();
    setInterval(function() {
      vatdisto();
    }, 1000); // it will refresh your data every 1 sec

  });
</script>