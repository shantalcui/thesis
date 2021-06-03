 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
include 'dbconnect.php';
session_start();
?>



<?php
       foreach ($_SESSION['user']as $e) {
  $e=$e['userid'];
 
 
}
 $bobo = mysqli_query($con,"SELECT * FROM orders WHERE order_status='' and order_user_id='$e' or order_status='Preparing' and order_user_id='$e'");

if (mysqli_num_rows($bobo)>0) {
?>
<a onclick="notif()" >
    
          
 <img src="https://img.icons8.com/fluent/30/ffffff/bell.png"/>
  </a>
 <?php
}else{
	?>
	<a onclick="notif()" >
	<img src="https://img.icons8.com/fluent/30/ffffff/bell.png"/ style='display: none'>
	  </a>
	<?php
}