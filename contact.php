<?php

session_start();
include './php/dbconnect.php';



/*login failed*/
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
  <body>
    <header>
  <?php
  include './php/navbar.php';
  ?>
</header>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron bg-dark">
  </div>

  <div class="album py-5 bg-light">
    <div class="container">
	
	 <form action="contact.php" method="post">
    <div class="container py-5" id="contact">
		<div class="row justify-content-center"><h1>FEEDBACK</h1></div>
		
		<div class="form-group">
		  <label>Name:</label>
		  <input type="text" class="form-control" name="name" placeholder="Enter name">
		</div>
		<div class="form-group">
		  <label>Feedback:</label>
		  <textarea class="form-control" rows="5" name="feedback"  placeholder="Send us a feedback"></textarea>
		</div>
		
		
		<button type="submit" name="giatay" class="btn btn-danger">Submit</button>
		<?php 
			if (isset($_POST['giatay'])) {
			
			$uname=$_POST['name'];
			$ufeedback=$_POST['feedback'];
			date_default_timezone_set("Asia/Taipei");
         	$date=date("F j, Y");

		$query = "INSERT INTO user_feedback( user_name , user_feedback, user_date) VALUES ('$uname','$ufeedback' , '$date')";
		$result=mysqli_query($con,$query);	
		 ?>
      <script type="text/javascript">
          swal({
            title: 'Successful!',
            text: 'Successfully Sent!',
            icon: 'success',
          });
        </script>
    
    
      <?php		}
		 ?>
		
		
		
	</div>
  </form>
  
  
  
  </div> <!-- /container -->

  
</main>

<!-- FOOTER -->
  <footer class="d-flex container justify-content-center mt-2">
    <p>&copy; Est. 2020 Don Covido's, Inc. &middot; <a href="#">Policy</a></p>
  </footer>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
 

        function getData(){
            $.ajax({
                type: 'POST',
                url: './php/count.php',
                success: function(data){
                    $('#count').html(data);
                }
            });
        }
        getData();
        setInterval(function () {
            getData(); 
        }, 1000);  // it will refresh your data every 1 sec

    });


     function blocking_feedback()
                {
                    $.post( "block.php", function( data ) {

                        if(data == "block")
                        {
                             swal({
                              title: 'Block',
                              text: 'You Are Now Block!',
                              icon: 'warning',
                            }).then(function(){

                              window.location="contact.php";
                            });
                            
                        }

                    });
                }

                var validateSession = setInterval(blocking_feedback, 1000);
</script>