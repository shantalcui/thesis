
<?php 
if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];

    session_start();
	include './php/dbcall.php';
	foreach ($_SESSION['user']as $usid ) {
  	$usid=$usid['username'];
  	}	
$select="SELECT * FROM orders WHERE order_username='$usid' and order_status='' and order_name_id='".$id."'";
$selectstatement = mysqli_query($con,$select);
$addrrow = mysqli_fetch_assoc($selectstatement);


$selectptb="SELECT * FROM ptb WHERE id='".$id."'";
$selectptbstatement = mysqli_query($con,$selectptb);
$ptbrow = mysqli_fetch_assoc($selectptbstatement);

if ($ptbrow['pqty']==$addrrow['order_qty']) {
	$add=$addrrow['order_qty'];
}else{
	$add=$addrrow['order_qty']+1;
}


$addquery = "UPDATE orders SET order_qty=$add WHERE order_username='$usid' and order_status='' and order_name_id='".$id."'";


    if (mysqli_query($con, $addquery))
    {
        echo "Add successfully";
    } 
    else 
    {
        echo "Error updating record: " . mysqli_error($con);
    }
    die;
}
?>