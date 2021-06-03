<?php

session_start();
$con= mysqli_connect("localhost","root","","sum")or die("yawa".mysqli_error($con));
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

   $sql = "SELECT pqty FROM ptb";
  $product_result = $con->query($sql);
if (isset($_SESSION['cart'])) {
  if($row = $product_result->fetch_assoc()) {
  foreach ($_SESSION['cart'] as $id => $value) {
  if ($row['id']==$value['productid']) {


  $product_qty= $row['pqty']-$value["productqty"];
  $product_id = $value['productid'];
  $table_sql = "UPDATE ptb SET pqty= $product_qty WHERE table_id= $product_id";
  }
}
}else{
  echo "bobo";
}
}if ($con->query($table_sql) === TRUE) {
    echo "tangina mo";
  } else {
    echo "Error updating record: " . $con->error;
  }
  ?>
  

  
  
	

