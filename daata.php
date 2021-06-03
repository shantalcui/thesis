<?php
header('Content-Type: application/json');

$conn= mysqli_connect("localhost","root","","sum")or die("yawa".mysqli_error($con));

$sqlQuery = "SELECT daily_id,daily_date,daily_gross_sales FROM daily ORDER BY daily_id";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>