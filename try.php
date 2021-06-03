<?php 
session_start();
include './php/dbcall.php';
if(isset($_GET['email']) && !empty($_GET['email']))
{
	$email = $_GET['email'];
	

	$walkinquery="select * from users order by user_id desc limit 1";
$walkinqueryresult=mysqli_query($con,$walkinquery);
$userrow=mysqli_fetch_array($walkinqueryresult);
$lastuserid=$userrow['user_firstname'];
if ($lastuserid == "") 
{
  $walkin="Guest1";
}else
{
  $walkin=substr($lastuserid, 5);
  $walkin=intval($walkin);
  $walkin="Guest" . ($walkin+1);
}

 $walkinsql="insert into users(user_firstname,user_email,user_guest)VALUES('$walkin','$email','Guest')";
 if (mysqli_query($con,$walkinsql)){

$selectwalkinquery = "select * from users where user_firstname='$walkin'";
$selectwalkinqueryresult=mysqli_query($con,$selectwalkinquery);
  if(mysqli_num_rows($selectwalkinqueryresult) > 0){


    while ($row = mysqli_fetch_assoc($selectwalkinqueryresult)) {
      $id = $row["user_id"];
      $email = $row["user_email"];
      $name=$row["user_firstname"];
      
      
      if (isset($_SESSION['user'])) {
        
              $count=count($_SESSION['user']);
             $item_array = array(
              'useremail' =>$email,
              'username' =>$name,
              'userid' =>$id);

             $_SESSION['user'][$count]=$item_array;


            }
         else{
            $item_array = array(
            'useremail' =>$email,
            'username' =>$name,
              'userid' =>$id);
            $_SESSION['user']['0']=$item_array;   

          }
      }

      ?>
      <script type="text/javascript">
          swal({
            title: 'Successful!',
            text: 'Successfully Login!',
            icon: 'success',
          });
        </script>
    
    
      <?php
    }
      else
      {
         ?>
              <script type="text/javascript">
                swal({
                  title: 'Failed!',
                  text: 'Incorrect username or password!',
                  icon: 'error',
                  button: 'Back',
                }).then(function(){
        window.location = 'login.php';
         });
              </script>
              <?php
        
      }
    }
}
?>