<?php
session_start();


$con= mysqli_connect("localhost","root","","sum")or die("yawa".mysqli_error($con));
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
/*update user_tables*/
if ($_GET['action']=='logout') {
 $sta="Reserved";
foreach ($_SESSION['user']as $ema) {
date_default_timezone_set("Asia/Taipei");
         $date=date("y-m-d / h:ia");
         $get=$ema['userid'];
         $tsa="Available";




$ququ = "UPDATE user_tables SET utable_Status='Available', utable_Date_time_out='$date' WHERE utable_Status='$sta'and utable_user_id='$get'";
$tresult=mysqli_query($con,$ququ);

}
}



/*update tables*/
   $num = "SELECT * FROM tables";
  $table_result = $con->query($num);

  if (isset($_SESSION['table-id'])) {
    if (isset($_SESSION['user'])) {

  while ($row = mysqli_fetch_assoc($table_result)) {

    foreach ($_SESSION['user']as $emai_id => $email_value) {

  foreach ($_SESSION['table-id'] as $id => $value) {

  if ($row['table_email']==$email_value['userid']) {
    
  $ta=$email_value['userid'];
  $table_total= $row["table_status"]-$row["table_status"];
  $table_email_total= $row["table_email"]-$email_value['userid'];
  
  $table_sql = "UPDATE tables SET table_status= $table_total, table_email=$table_email_total WHERE table_email= $ta";
  }
}



}
}
}
}if ($con->query($table_sql) === TRUE) {
    header("location:../login.php");
    session_destroy();
  } else {
    echo "Error updating record: " . $con->error;
  }
  ?>
  

  
  
	

