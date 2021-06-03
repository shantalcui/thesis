
<?php 
if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];

    session_start();
	include 'dbcall.php';
	foreach ($_SESSION['takeout']as $usid ) {
  	$usid=$usid['takeout_id'];
  	}	
$selectminus="SELECT * FROM orders WHERE order_user_id='$usid' and order_status='' and order_name_id='".$id."'";
$selectminusstatement = mysqli_query($con,$selectminus);
$minusrow = mysqli_fetch_assoc($selectminusstatement);
if ($minusrow['order_qty']==1) {
    $minus=$minusrow['order_qty'];
}else{
    $minus=$minusrow['order_qty']-1;
}





    $addquery = "UPDATE orders SET order_qty=$minus WHERE order_user_id='$usid' and order_status=''and order_name_id='".$id."'";

    if (mysqli_query($con, $addquery))
    {
        echo "successfully minus";
    } 
    else 
    {
        echo "Error updating record: " . mysqli_error($con);
    }
    die;
}
?>