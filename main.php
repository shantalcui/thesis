<?php
session_start();
include './php/dbcall.php';
require_once('./php/component.php');

//login failed

foreach ($_SESSION['user']as $ucart ) {
  $uart = $ucart['userid'];
  $userblock = "SELECT * FROM users WHERE user_id='$uart'";
  $userblockresult = $con->query($userblock);
  $userb= mysqli_fetch_assoc($userblockresult);
  }
   if($uart> 0){
    if($userb['user_block']=="block"){

      $sta="Reserved";

date_default_timezone_set("Asia/Taipei");
         $date=date("y-m-d / h:ia");
        




$ququ = "UPDATE user_tables SET utable_Status='Available', utable_Date_time_out='$date' WHERE utable_Status='$sta'and utable_user_id='$uart'";
$tresult=mysqli_query($con,$ququ);
header("location:login.php");
session_destroy();









}


  
  

  }
else{
      header("location:login.php");
      session_destroy();
    }



$tblreserve=mysqli_query($con,"select * from user_tables where utable_user_id='$uart' and utable_Status='Reserved'");

if (mysqli_num_rows($tblreserve)>0) {
                
              }else{
header("location:home.php");


}





?>
<!doctype html>
<html lang="en">

<head>
  
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
  <title>Don Covido's | Menu</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/album/">

  <!-- Bootstrap core CSS -->
  <link href="./css/bootstrap.min.css" rel="stylesheet">

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
  <link href="./css/album.css" rel="stylesheet">
</head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

<body>
  <?php


if (isset($_POST['add'])) {
  //print_r($_POST['productid']);
 


$_SESSION['cartproductid']=$_POST['productid'];
$_SESSION['cartordername']=$_POST['ordername'];
$_SESSION['cartorderprice']=$_POST['orderprice'];
$_SESSION['cartqty']=$_POST['qty'];



           
          foreach ($_SESSION['user'] as $email => $uvalue) {        
           
              
              
              
                
                   
                   $user_iid=$uvalue['userid'];
                   
                   $useremail=$uvalue['useremail'];
                   $useruname=$uvalue['username'];

                   $orderqty=$_SESSION['cartqty'];
                   $ordernameid=$_SESSION['cartproductid'];
                   $ordername=$_SESSION['cartordername'];
                   
                }

    if ($orderqty==null) {

                ?>
              <script type="text/javascript">
                swal({
                  title: 'Item Is Not Added In Cart!',
                  text: 'Quantity is empty',
                  icon: 'info',
                  button: 'Back',
                });
              </script>
              <?php
                     
                   }else{             
                $sqltable="select * from user_tables where utable_Username='$useruname' and utable_Status='Reserved'";
                $sqltableresult=mysqli_query($con,$sqltable);
                $tables = mysqli_fetch_assoc($sqltableresult);

             $tableiid=$tables['utable_Table_no'];
                   

                   date_default_timezone_set("Asia/Taipei");
                    $date=date("y-m-d");
                    $ddate=date("y-m");
                    $time=date("h:ia");

                    

            

              $dup=mysqli_query($con,"select * from orders where order_name_id='$ordernameid' and order_name='$ordername' and order_table='$tableiid' and order_username='$useruname' and order_user='$useremail' and order_status='' or order_name_id='$ordernameid' and order_name='$ordername' and order_table='$tableiid' and order_username='$useruname' and order_user='$useremail' and order_status='Preparing'");
             if (mysqli_num_rows($dup)>0) {
             


                ?>
              <script type="text/javascript">
                swal({
                  title: 'Item Is Already In The Cart!',
                  text: 'Choose Another Item',
                  icon: 'error',
                  button: 'Back',
                });
              </script>
              <?php
              
           }
              else{
                $iiiid=$_SESSION['cartproductid'];
                $query="select * from ptb where id='$iiiid'";
                $queryresult=mysqli_query($con,$query);
                $rowx = mysqli_fetch_assoc($queryresult);
                  $p=$rowx['pprice'];
                  $image=$rowx['pimage'];
                  $tprice=($_SESSION['cartqty'] * (int)$rowx['pprice']);
              $query = "INSERT INTO orders(order_name_id,order_image,order_name, order_table,order_username,order_user,order_qty,order_price,order_tprice,order_status ,order_ddate,order_date , order_user_id ) VALUES ('$ordernameid','$image','$ordername' ,'$tableiid','$useruname','$useremail' , '$orderqty' ,'$p','$tprice','' ,'$ddate' , '$date' ,'$user_iid')";
              $utresult=mysqli_query($con,$query);
               /*update Product qty*/  

      
        
         
            
          
          
          ?>
      <script type="text/javascript">
          swal({
            title: 'Successfully Add To Cart!',
            text: 'Go For Another One?',
            icon: 'success',
          });
        </script>
    
    
      <?php
              
                 
                 }

            
         
            }  



}
?>
  <header>
    <?php
    include './php/navbar.php';
    ?>
  </header>





  <main role="main">

    <section class="jumbotron text-center bg-danger">
      <div class="container">
        <h1 class="text-white mb-n5">MENU</h1>
        <p class="lead text-muted"></p>
      </div>
    </section>





    <?php
    include './php/menu.php';


    ?>




    <div class="album py-5 bg-light">
      <div class="container">

        <!-- SWEET N SOUR -->
        <div id="Tab1" class="tabcontent">
          <div class="row">


            <?php
            
            for ($row['id'] = 0; $row['id'] < 50; $row['id']++) {
              if ($row['id'] == 4) {
                while ($row = mysqli_fetch_assoc($_SESSION['getdata'])) {
                  if ($row['pqty'] < 1) {




                    $type = "disabled";
                    $button = "button";
                    $status = "Out of Stack";
                    $btn = "text-danger";
                    $itemqty=0;
                  } else {
                    $type = "";
                    $button = "submit";
                    $status = "Available";
                    $btn = "text-success";
                    $itemqty=$row['pqty'];
                  }

                  component($row['pimage'], $row['pname'], $row['pprice'], $row['id'], $type, $button, $status, $btn,$itemqty);

                  break;
                }
              }
            }
            ?>

          </div>

        </div>

        <div id="Tab2" class="tabcontent">
          <div class="row">
            <?php
            $i = $row['id'] = '9';
            for ($row['id'] = 0; $row['id'] < 50; $row['id']++) {
              if ($row['id'] == $i) {
                while ($row = mysqli_fetch_assoc($_SESSION['getdata'])) {
                  if ($row['pqty'] < 1) {


                    $type = "disabled";
                    $button = "button";
                    $status = "Out of Stack";
                    $btn = "text-danger";
                    $itemqty=0;
                  } else {
                    $type = "";
                    $button = "submit";
                    $status = "Available";
                    $btn = "text-success";
                    $itemqty=$row['pqty'];
                  }
                  component($row['pimage'], $row['pname'], $row['pprice'], $row['id'], $type, $button, $status, $btn,$itemqty);
                  break;
                }
              }
            }
            ?>
          </div>
        </div>
        <div id="Tab3" class="tabcontent">
          <div class="row">
            <?php
            $i = $row['id'] = '18';
            for ($row['id'] = 0; $row['id'] < 50; $row['id']++) {
              if ($row['id'] == $i) {
                while ($row = mysqli_fetch_assoc($_SESSION['getdata'])) {
                  if ($row['pqty'] < 1) {


                    $type = "disabled";
                    $button = "button";
                    $status = "Out of Stack";
                    $btn = "text-danger";
                    $itemqty=0;
                  } else {
                    $type = "";
                    $button = "submit";
                    $status = "Available";
                    $btn = "text-success";
                    $itemqty=$row['pqty'];
                  }
                  component($row['pimage'], $row['pname'], $row['pprice'], $row['id'], $type, $button, $status, $btn,$itemqty);
                  break;
                }
              }
            }
            ?>

          </div>
        </div>
        <div id="Tab4" class="tabcontent">
          <div class="row">
            <?php
            $i = $row['id'] = '20';
            for ($row['id'] = 0; $row['id'] < 50; $row['id']++) {
              if ($row['id'] == $i) {
                while ($row = mysqli_fetch_assoc($_SESSION['getdata'])) {
                  if ($row['pqty'] < 1) {


                    $type = "disabled";
                    $button = "button";
                    $status = "Out of Stack";
                    $btn = "text-danger";
                    $itemqty=0;
                  } else {
                    $type = "";
                    $button = "submit";
                    $status = "Available";
                    $btn = "text-success";
                    $itemqty=$row['pqty'];
                  }
                  component($row['pimage'], $row['pname'], $row['pprice'], $row['id'], $type, $button, $status, $btn,$itemqty);
                  break;
                }
              }
            }
            ?>

          </div>
        </div>
        <div id="Tab5" class="tabcontent">
          <div class="row">
            <?php
            $i = $row['id'] = '33';
            for ($row['id'] = 0; $row['id'] < 50; $row['id']++) {
              if ($row['id'] == $i) {
                while ($row = mysqli_fetch_assoc($_SESSION['getdata'])) {
                  if ($row['pqty'] < 1) {


                    $type = "disabled";
                    $button = "button";
                    $status = "Out of Stack";
                    $btn = "text-danger";
                    $itemqty=0;
                  } else {
                    $type = "";
                    $button = "submit";
                    $status = "Available";
                    $btn = "text-success";
                    $itemqty=$row['pqty'];
                  }
                  component($row['pimage'], $row['pname'], $row['pprice'], $row['id'], $type, $button, $status, $btn,$itemqty);
                  break;
                }
              }
            }
            ?>

          </div>
        </div>

        





        <script>
          document.getElementById("defaultOpen").click();

          function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
            }

            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
          }

          function cartMsg() {
            alert("Reserve a table first.");
          }

          function reservedMsg() {
            alert("Successfully reserved a table.");
          }
        </script>
        <!-- BACK TO TOP -->
        <p class="float-right">
          <a href="#"><img src="https://img.icons8.com/fluent-systems-filled/40/ffffff/send-letter.png"/></a>
        </p>
  </main>






  <center>
    <div class="container-fluid bg-dark">
      <div class="container justify-content-center">
        <div class="row">
          <div class="col-12">
            <img src="./images/logo_transparent.png" width="200px" height="auto" class="mx-auto">
          </div>
          <p class="col-12 mx-auto text-white">Thank you for choosing Don Covido's!</p>
          <div class="col-12 justify-content-center pb-2">
            <span class="mx-2"><a href="https://web.facebook.com/groups/468554833488511" class="text-white"><i class="fab fa-facebook"></i></a></span>
            <span class="mx-2"><a href="" class="text-white"><i class="fab fa-twitter"></i></a></span>
            <span class="mx-2"><a href="" class="text-white"><i class="fab fa-instagram"></i></a></span>
          </div>
        </div>
      </div>
    </div>
  </center>



  <!-- FOOTER -->
  <footer class="d-flex container justify-content-center mt-2">
    <p>&copy; Est. 2020 Don Covido's, Inc. &middot; <a href="#">Policy</a></p>
  </footer>
  </main>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
  </script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
 

        function count(){
            $.ajax({
                type: 'POST',
                url: './php/count.php',
                success: function(data){
                    $('#count').html(data);
                }
            });
        }
        count();
        setInterval(function () {
            count(); 
        }, 1000);  // it will refresh your data every 1 sec

    });




      function blocking_main()
                {
                    $.post( "block.php", function( data ) {

                        if(data == "block")
                        {
                             swal({
                              title: 'Block',
                              text: 'You Are Now Block!',
                              icon: 'warning',
                            }).then(function(){

                              window.location="main.php";
                            });
                            
                        }

                    });
                }

                var validateSession = setInterval(blocking_main, 1000);
function billingdone_main()
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

 var billingSession = setInterval(billingdone_main, 1000);
</script>