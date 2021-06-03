<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<style type="text/css">
	* {
		font-family: 'Montserrat', sans-serif;
	}

	.navbar-nav a {
		color: #ffffff;
		margin: 0 20px;
	}

	.navbar-toggler {
		color: #ffffff;
		border: none !important;
		border: none !important;
		outline: none !important;
	}

	.navbar-toggler .fa {
		color: #ffffff;
		font-size: 26px;
	}

	.nav-link:hover {
		color: #ffffff;
		font-weight: 600;
		border-bottom: 1px solid #ffffff;
		margin-bottom: -1px;
	}
</style>
<nav class="navbar navbar-expand-md fixed-top bg-dark px-0 text-white">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle Navigation">
		<img class="px-0 ml-2" src="https://img.icons8.com/material-sharp/24/ffffff/menu--v3.png" />
	</button>

	<a class="navbar-brand text-white ml-3" href="#">Don Covido's</a>

	<!--			
	  <form>
		<div class="input-md-group input-group-sm d-none">
		  <input type="search" class="form-control" id="search" name="search" placeholder="Search menu">
		  <div class="input-group-append">
		    <button class="btn btn-danger rounded" type="submit">Search</button>
		  </div>
		</div>
	  </form>
	  -->
	<div class="collapse navbar-collapse" id="navbarMenu">
		<ul class="navbar-nav mx-auto">
			<li class="nav-item">
				<a class="nav-link" href="main.php">Menu</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="about.php">About</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="contact.php">FeedBack</a>
			</li>
		</ul>
	</div>

	<div class="d-block mx-md-3">

		<a href="main_cart.php" data-toggle="tooltip" title="Cart">
			<img src="https://img.icons8.com/material-sharp/25/ffffff/shopping-cart.png" />

			<sup class="badge badge-pill badge-danger" id="count"></sup>

		</a>
	</div>

	<div class="mx-md-2">
		<a href="bill-out.php" data-toggle="tooltip" title="Bill-Out">
			<img class="px-0 mx-0" src="https://img.icons8.com/ios-filled/27/ffffff/mastercard-credit-card.png" />
		</a>
	</div>

	<div class="dropdown mx-md-2" data-toggle="tooltip" title="Accout">
		<button type="submit" class="btn btn-dark" data-toggle="dropdown" data-target=".dropdown-menu">
			<img class="px-0 mx-0" src="https://img.icons8.com/material-sharp/25/ffffff/user-male-circle.png" />
		</button>
	</div>

	<div class="dropdown-menu dropdown-menu-right bg-dark">
		<button class="dropdown-item text-light" onclick="points()">Points</button>
		<div class="dropdown-divider"></div>
		<form method="post">
			<button class="dropdown-item text-light" name="logout">Logout</button>
		</form>
	</div>
</nav>

<?php

if (isset($_POST['logout'])) {




?>
	<script type="text/javascript">
		var SwalColors = {

			black: "#000000"
		};

		function SwalOverlayColor(color) {
			setTimeout(function() {
				$(".swal-overlay").css({
					"background-color": SwalColors[color]
				});
			}, 200);
		}

		SwalOverlayColor("black");

		swal({
			title: "Logout",
			text: "Thank You Come Again",
			icon: "success",
		}).then(function() {
			window.location = "index.php";
		});
	</script>




<?php


	$sta = "Reserved";
	foreach ($_SESSION['user'] as $ema) {
		date_default_timezone_set("Asia/Taipei");
		$date = date("y-m-d / h:ia");
		$get = $ema['userid'];
		$tsa = "Available";

		$stockquery = "UPDATE orders SET order_status='Not Paid',order_time='Not Paid',order_date_out='Not Paid' WHERE order_user_id='$get' and order_status='Preparing' or order_user_id='$get' and order_status='Served' or order_user_id='$get' and order_status=''";

		$stockresult = mysqli_query($con, $stockquery);


		$ququ = "UPDATE user_tables SET utable_Status='Available', utable_Date_time_out='$date' WHERE utable_Status='$sta'and utable_user_id='$get'";
		$tresult = mysqli_query($con, $ququ);


		$removeguest = "DELETE FROM users WHERE user_id=$get and user_guest='Guest'";
		$removeguestresult = mysqli_query($con, $removeguest);
	}




	/*update tables*/
	$num = "SELECT * FROM tables";
	$table_result = $con->query($num);

	if (isset($_SESSION['table-id'])) {
		if (isset($_SESSION['user'])) {

			while ($row = mysqli_fetch_assoc($table_result)) {

				foreach ($_SESSION['user'] as $emai_id => $email_value) {

					foreach ($_SESSION['table-id'] as $id => $value) {

						if ($row['table_email'] == $email_value['userid']) {

							$ta = $email_value['userid'];
							$table_total = $row["table_status"] - $row["table_status"];
							$table_email_total = $row["table_email"] - $email_value['userid'];

							$table_sql = "UPDATE tables SET table_status= $table_total, table_email=$table_email_total WHERE table_email= $ta";
						}
					}
				}
			}
		}
	}
	if ($con->query($table_sql) === TRUE) {
		header("location:index.php");
		session_destroy();
	} else {
		echo "Error updating record: " . $con->error;
	}
}
foreach ($_SESSION['user'] as $points) {
	$points = $points['userid'];
}
$ptsuser = "SELECT * FROM users WHERE user_id=$points";
$ptsuserresult = mysqli_query($con, $ptsuser);
$pointu = mysqli_fetch_assoc($ptsuserresult);



?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {


		function getData() {
			$.ajax({
				type: 'POST',
				url: 'count.php',
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


	function points() {
		swal({
			title: "Your Points",
			text: "₱<?php echo $pointu['user_points']; ?>",
			icon: "info",
		});
	}
</script>