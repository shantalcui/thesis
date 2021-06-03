

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
		<meta name="generator" content="Jekyll v4.1.1">
		<title>Don Covido's | Admin</title>

		<link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">

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
		<link href="./css/admin.css" rel="stylesheet">
	</head>
  
	 <body class="bg-dark">
		<form class="form-signin" method="post">
			<div class="text-center mb-4">
				<img class="mb-4" src="./images/logo_transparent.png" width="200" height="auto">
				<h1 class="h3 mb-3 font-weight-normal text-light">Admin Login</h1>
			</div>

			<div class="form-label-group">
				<input type="text" id="inputEmail" class="form-control" placeholder="User" name="user" required autofocus>
				<label for="inputEmail">User</label>
			</div>

			<div class="form-label-group">
				<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required>
				<label for="inputPassword">Password</label>
			</div>

			
			
			
			<button type="submit" class="btn btn-lg btn-primary btn-block" name="login" >SIGN IN</button>
			<p class="mt-5 mb-3 text-muted text-center">&copy; 2020</p>
			 
		</form>
		 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
	</body>
</html>
<?php

$con= mysqli_connect("localhost","root","","sum")or die("yawa".mysqli_error($con));
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['login'])) {
	$user=$_POST['user'];
	$password=$_POST['pass'];

	
	$query = "select * from admin where admin_name='$user' and admin_pass='$password'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result) > 0){


		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row["admin_id"];
			$user = $row["admin_name"];
			$admin_sql = "UPDATE admin SET admin_login='login' WHERE admin_id= $id";
		 $admin_sql_tresult=mysqli_query($con,$admin_sql);
			session_start();
			if (isset($_SESSION['admin'])) {
        
              $count=count($_SESSION['admin']);
             $item_array = array(
              'adminuser' =>$user,
              'adminid' =>$id);
             $_SESSION['admin'][$count]=$item_array;


            }
         else{
            $item_array = array(
            'adminuser' =>$user,
              'adminid' =>$id);
            $_SESSION['admin']['0']=$item_array;   

          }

		}	
		
		?><script type="text/javascript">
          swal({
            title: 'Successful!',
            text: 'Successfully Login!',
            icon: 'success',
          }).then(function(){
        window.location = 'dashboard.php';
        });
        </script>
        
    <?php
			}
			else
			{
				?>
				<script type="text/javascript">
                swal({
                  title: 'Failed!',
                  text: 'Incorrect username or password!',
                  icon: 'error',
                  button: 'Back',
                });
              </script>
				<?php
			}

}

?>