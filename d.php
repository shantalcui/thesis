<?php
header('Content-Type: application/json');

$conn= mysqli_connect("localhost","root","","sum")or die("yawa".mysqli_error($con));

$sqlQuery = "SELECT weekly_id,weekly_week,weekly_gross_sale FROM weekly ORDER BY weekly_id";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>