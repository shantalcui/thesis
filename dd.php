<?php
header('Content-Type: application/json');

$conn= mysqli_connect("localhost","root","","sum")or die("yawa".mysqli_error($con));

$sqlQuery = "SELECT monthly_id,month_m,monthly_gross_sales FROM monthly ORDER BY monthly_id";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>