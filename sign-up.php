<!DOCTYPE html>
<html>
	 <head>
	 	<title>
	 		Don Covido's | Sign Up
	 	</title>
	 	<!-- ICONS -->
	 	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	 	<!-- BOOTSTRAP -->
			<!-- CSS -->
			<link rel="stylesheet" href="./css/styles.css">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
			<!-- JS, Popper.js, and jQuery -->
			<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		<!-- FONTS -->
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
		<!-- FONTAWESOME -->
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	 </head>

	 <body>
	 <!--
		<section id="header">
			<nav class="navbar navbar-expand-md fixed-top">
				<button class="nav-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" 
				aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle Navigation">
					<i class="fas fa-bars"></i>
				</button>
				
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<ul class="navbar-nav mx-auto">
						<li class="nav-item">
							<a class="nav-link" href="Home.html">Home</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="Menu.html">Menu</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="Tables.html">Vacant Tables</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="About.html">About</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="Contact.html">Contact Us</a>
						</li>
					</ul>
				</div>
			</nav>
		</section> 
	-->
		
		<!-- BODY -->
			<div class="container mx-auto">
				<div class="login_box">
					<h2>REGISTER</h2>
					<form  method="post" action="sign-up.php">
						<div class="input-group">
							<input type="text" name="fname" autocomplete="off" required>
							<label>Username</label>
						</div>
						<div class="input-group">
							<input type="text" name="email" autocomplete="off" required>
							<label>Email</label>
						</div>
						
						<div class="input-group">
							<input type="password" name="pass" autocomplete="off" required>
							<label>Password</label>
						</div>
						
						<div class="input-group">
							<input type="text" name="contact" autocomplete="off" required>
							<label>Contact NO.</label>
						</div>
						<div class="row">
						  <small class="col-12 text-white">By creating an account you agree to our</small>
						  <a href="#" class="col-12">Terms & Policy.</a>
						</div>
						<div class="row">
						  <button type="submit" class="btn col-12" name="submit" onclick="msg()">Submit</button>
						 
						  
						</div>
					</form>
				</div>
			</div>
	 </body>
	  
</html>
<?php

include 'php/dbconnect.php';



if(isset($_POST['submit'])){
	
	$fname=$_POST['fname'];
	$email=$_POST['email'];
	$password=$_POST['pass'];
	$contact=$_POST['contact'];
	
	

	$query = "INSERT INTO users(user_firstname, user_email, user_password, user_contact) VALUES ('$fname','$email','$password','$contact')";
	$result=mysqli_query($con,$query);	
		if($result){

		echo

		"
		<script>
				alert('Successfully created an account');
				window.location = 'login.php';
		</script>
		";
		
		
			
		
	}else{
		echo "bobo";
	}
}
?>
