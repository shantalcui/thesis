
<?php
session_start();
include 'dbcall.php';
$walkinquery="select * from take_out_number order by take_out_number_id desc limit 1";
$walkinqueryresult=mysqli_query($con,$walkinquery);
$userrow=mysqli_fetch_array($walkinqueryresult);
$lastuserid=$userrow['take_out_number_name'];
if ($lastuserid == "") 
{
  $walkin="Takeout-1";
  $takeoutid=214517181;
}else
{
  $takeoutid=substr($lastuserid, 8);
  $takeoutid=intval($takeoutid);
  $takeoutid=21451718 . ($takeoutid+1);


  $walkin=substr($lastuserid, 8);
  $walkin=intval($walkin);
  $walkin="Takeout-" . ($walkin+1);
}

 $walkinsql="insert into take_out_number(take_out_number_userid ,take_out_number_name)VALUES('$takeoutid','$walkin')";
 if (mysqli_query($con,$walkinsql)){

$selectwalkinquery = "select * from take_out_number where take_out_number_name='$walkin'";
$selectwalkinqueryresult=mysqli_query($con,$selectwalkinquery);
  if(mysqli_num_rows($selectwalkinqueryresult) > 0){


    while ($row = mysqli_fetch_assoc($selectwalkinqueryresult)) {
      $id = $row["take_out_number_id"];
      $email = $row["take_out_number_email"];
      $name=$row["take_out_number_name"];
      $takeout_id=$row["take_out_number_userid"];
      
      
      if (isset($_SESSION['takeout'])) {
        
              $count=count($_SESSION['takeout']);
             $item_array = array(
              'takeoutemail' =>$email,
              'takeoutname' =>$name,
              'takeout_id' =>$takeout_id,
              'takeoutid' =>$id);

             $_SESSION['takeout'][$count]=$item_array;


            }
         else{
            $item_array = array(
            'takeoutemail' =>$email,
              'takeoutname' =>$name,
              'takeout_id' =>$takeout_id,
              'takeoutid' =>$id);
            $_SESSION['takeout']['0']=$item_array;   

          }
      }

      
    }
      
    }


?>