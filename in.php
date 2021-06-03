<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<script src="jquery-3.5.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="./css/in.css">
</head>
<body >
<div class="container" >
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="user" class="form-control" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="pass" class="form-control" placeholder="password">
					</div>
					<div class="form-group">
						
						<button type="submit" class="btn float-right login_btn" name="login" >SIGN IN</button>
					</div>	
					</div>
				</form>
				
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="up.php">Sign Up</a>
				</div>
				
			</div>
		</div>
	</div>
</div>
</body>
</html>

<?php

$con= mysqli_connect("localhost","root","","nfc")or die("yawa".mysqli_error($con));
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['login'])) {
	$email=$_POST['user'];
	$password=$_POST['pass'];
	
	$query = "select * from users where user_email='$email' and user_password='$password'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result) > 0){


		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row["user_id"];
			$email = $row["user_email"];
			session_start();
			$_SESSION['user_id'] = $id;
			$_SESSION['user_email'] = $email;
		}	
		
		echo"<script>
      

        Swal.fire({
  title: 'Ordered',
  width: 600,
  padding: '3em',
  background: '#fff url(https://media.giphy.com/media/xTiTnF6v2Th2GPmZ7q/giphy.gif)',
 


      }).then(function(){
      	window.location = 'in.php';
      	})
    </script>";
			}
			else
			{
				echo"<script>alert('login failed')</script>";
				
			}

}

?>