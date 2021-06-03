<?php


include 'dbconnect.php';
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$sql = "SELECT * FROM ptb";
$result = $con->query($sql);
$_SESSION['getdata']=$result;
if(mysqli_num_rows($_SESSION['getdata']) > 0){
            
        }return $_SESSION['getdata'];
	?>
  