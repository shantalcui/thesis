<?php

session_start();

require_once ('./php/component.php');
include './php/dbconnect.php';
foreach ($_SESSION['admin']as $uid ) {
  $id = $uid['adminid'];
  
  }
  $logsql = "SELECT * FROM admin WHERE admin_id =$id";
  $logresult = mysqli_query($con, $logsql);
  if($id > 0){
  
  }
else{
      header("location:admin.php");
    }



    

if (isset($_POST['edit'])) {
  //echo $_POST['stockid'];
  //UPDATE QTY FROM PTB
if ($_GET['action'] == 'update') {

   
      
      $stockid=$_POST['stockid'];
      $stock=$_POST['stockqty'];
      $stockquery="UPDATE ptb SET pqty='$stock' WHERE id='$stockid'";
      $stockresult=mysqli_query($con,$stockquery);
    
   
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
?><!-- end navbar -->

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
            <a class="nav-link active" href="stocks.php">
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
    <div class="row">
      <h2 class="col-10">Stocks</h2>
      <button class="btn btn-primary col pt-2" data-toggle="modal" data-target="#myModal">Add a Product</button>
    </div>

  <!-- ADD PRODUCT FORM -->
  <div class="modal fade my-auto" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <form class="modal-content" action="stocks.php" method="POST">
        <div class="modal-header">
          <h2 class="modal-title">ADD PRODUCT FORM</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <!-- PRODUCT IMG -->
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label for="img" class="input-group-text">Product Image</label>
                <input type="file" id="img" name="img" required class="form-control">
              </div>
            </div>
          </div>
          <!-- PRODUCT NAME -->
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label for="name" class="input-group-text">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
            </div>
          </div>
          <!-- PRICE -->
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label for="price" class="input-group-text">Product Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
              </div>
            </div>
          </div>
          <!-- STOCK -->
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label for="stock" class="input-group-text">No. of Stocks</label>
                <input type="text" class="form-control" id="stock" name="stock" required>
              </div>
            </div>
          </div>
          <button type="Submit" name="add_new_product" class="btn btn-primary btn-large">Submit</button>
        </div>
        <?php
        //ADD PRODUCT
if (isset($_POST['add_new_product'])) {
  $product_img="./images/".$_POST['img'];
  $product_name=$_POST['name'];
  $product_price=$_POST['price'];
  $no_stock=$_POST['stock'];
  
  

  $newquery = "INSERT INTO ptb(pname, pqty, pprice, pimage) VALUES ('$product_name','$no_stock','$product_price','$product_img')";
  $newresult=mysqli_query($con,$newquery);  
    if($newresult){

     ?>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
      <script type="text/javascript">
          swal({
            title: 'Successful!',
            text: 'Successfully Add Product!',
            icon: 'success',
          }).then(function(){
        window.location = 'stocks.php';
        });
        </script>
    
    
      <?php
    
    
      
    
  }else{
    echo "bobo";
  }



}
        ?>
      </form>
    </div>
  </div><!-- end of add product form -->
    
    <br>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Products</th>
            <th>Price</th>
            <th>No. of Stocks</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        
              <?php
$sql = "SELECT * FROM ptb";
$result = $con->query($sql);
 
  
  while ($row = mysqli_fetch_assoc($result)) {
     
 
          stocks($row['pimage'], $row['pname'], $row['pprice'], $row['pqty'],$row['id']);
              }   
              ?>
           
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
  
  <!-- JAVASCRIPT -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
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
function noticetable()
                {
                    $.post( "./php/notice_reserved.php", function( rnt ) {

                        if(rnt == "Reserved")
                        {
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