<?php
session_start();
?>


<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
    <title>Don Covido's</title>

</head>


<!-- LAYOUT -->
<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <!-- SIGN IN -->
        <form action="login.php" method="post" class="sign-in-form"> 
          <h2 class="title">Sign In</h2>
          <div class="input-field">
            <img src="https://img.icons8.com/ios-glyphs/50/ffffff/user-male.png" width="25" height="auto" style="margin-top: 13px; margin-left: 15px;"/>
            <input type="text" name="user_login" placeholder="Username" autocomplete="off" autofocus>
          </div>

          <div class="input-field">
            <img src="https://img.icons8.com/metro/50/ffffff/lock-2.png" width="25" height="auto"  style="margin-top: 13px; margin-left: 15px;"/>
            <input type="password" name="pass_login" placeholder="Password" autocomplete="off">
          </div>
          <input type="submit" name="login" value="Login" class="btn solid">
           <input type="button" value="Guest" class="btn solid" onclick="Guest()">
        </form>


        <!-- SIGN UP -->
        <form action="login.php" method="post" class="sign-up-form">
          <h2 class="title">Sign Up</h2>
          <div class="input-field">
            <img src="https://img.icons8.com/ios-glyphs/50/ffffff/user-male.png" width="25" height="auto" style="margin-top: 13px; margin-left: 15px;"/>
            <input type="text" name="user_signup" placeholder="Username" autocomplete="off" required>
          </div>

          <div class="input-field">
            <img src="https://img.icons8.com/ios-filled/50/ffffff/email-open.png" width="25" height="auto" style="margin-top: 13px; margin-left: 15px;"/>
            <input type="email" name="email_signup" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email Address" autocomplete="off">
          </div>

          <div class="input-field">
            <img src="https://img.icons8.com/metro/50/ffffff/lock-2.png" width="25" height="auto" style="margin-top: 13px; margin-left: 15px;"/>
            <input type="password" name="pass_signup" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" autocomplete="off" required>
          </div>

          

          <button type="submit" name="submit" class="btn">Submit</button>

        </form>
      </div>
    </div>
  
  <div class="panels-container">
    <div class="panel left-panel">
      <div class="content">
        <img src="./images/logo_transparent.png" width="200" height="auto">
        <h1>Welcome to Don Covido's!</h1>
        <h3>Life is Too Short For Average Food!</h3>
        <p>Don't have an account?</p>
        <button class="btn btn1" id="sign-up-btn">SIGN UP</button>
      </div>
    </div>
    
    <div class="panel right-panel">
      <div class="content">
        <img src="./images/logo_transparent.png" width="200" height="auto">
        <h1>Welcome to Don Covido's!</h1>
        <h3>Life is Too Short For Average Food!</h3>
        <p>Already have an account?</p>
        <button class="btn btn1" id="sign-in-btn">SIGN IN</button>
      </div>
    </div>
  </div>
  </div>
  
  <!-- JAVASCRIPT FOR ANIMATION -->
  <script type="text/javascript">
    const sign_in_btn = document.querySelector("#sign-in-btn");
    const sign_up_btn = document.querySelector("#sign-up-btn");
    const container = document.querySelector(".container");

    sign_up_btn.addEventListener('click', () => {
      container.classList.add("sign-up-mode");
    });

    sign_in_btn.addEventListener('click', () => {
      container.classList.remove("sign-up-mode");
    });
  </script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
  <script src="./js/login.js" async></script>
</body>
</html>
<script>
  function Guest(){

               
                swal({
                  title: "Dear Customer",
                  text: "Do You want to have a copy of receipt?",
                  icon: "info",
                  buttons: ["No", "Yes"],
                })
                .then((willDelete) => {
                if (willDelete) {
                   
                 swal("Enter your Email here:", {
                    content: "input",
                  })
                  .then((value) => {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.open("GET", "try.php?email="+value, true);
                    xmlhttp.send();
                    if (value=="") {
                      swal({
                      title: 'Email field is empty',
                      text: 'Try Again',
                      icon: 'warning',
                    });
                    }else{
                       swal({
                      title: 'Successful!',
                      text: 'Successfully Login!',
                      icon: 'success',
                    }).then(function(){
                    window.location = 'home.php';
                    });
                    }
                  });

                
                    
                
                } else {
                   var xmlhttp = new XMLHttpRequest();
                   xmlhttp.open("GET", "up.php", true);
                   xmlhttp.send();
                   swal({
                      title: 'Successful!',
                      text: 'Successfully Login!',
                      icon: 'success',
                    }).then(function(){
                    window.location = 'home.php';
                    });
                 
                }
              });
                            
                            
              
  }
</script>

<!-- LOGIN -->
<?php 

include 'php/dbconnect.php';


if(isset($_POST['login'])){

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $email=validate($_POST['user_login']);
  $password=validate($_POST['pass_login']);


$userblock = "select * from users where user_firstname='$email' and user_password='$password'";
$userblockresult=mysqli_query($con,$userblock);
$userblocker= mysqli_fetch_assoc($userblockresult);
if ($userblocker['user_block']=="block") {
              ?>
              <script type="text/javascript">
                swal({
                  title: 'Failed!',
                  text: 'You Are Block',
                  icon: 'error',
                  button: 'Back',
                }).then(function(){
        window.location = 'login.php';
         });
              </script>
              <?php
  header("Location: login.php");
}else{
$query = "select * from users where user_firstname='$email' and user_password='$password'";
$result=mysqli_query($con,$query);
  if(mysqli_num_rows($result) > 0){


    while ($row = mysqli_fetch_assoc($result)) {
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
          }).then(function(){
        window.location = 'home.php';
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




 




<!-- SIGNUP -->
<?php
include 'php/dbconnect.php';
if(isset($_POST['submit'])){
  


  $user_signup = $_POST['user_signup'];
  $email_signup = $_POST['email_signup'];
  $pass_signup = $_POST['pass_signup'];
  
  
 
  
  
  
  $dup=mysqli_query($con,"select * from users where user_firstname='$user_signup' and user_email='$email_signup'");
       if (mysqli_num_rows($dup)>0) {
              ?>
               <script type="text/javascript">
        swal({
          title: 'Error!',
          text: 'Account already exists!',
          icon: 'error',
        });
      </script>
    <?php
              }else{


                $query = "INSERT INTO users(user_firstname,user_email, user_password,user_block) VALUES ('$user_signup','$email_signup','$pass_signup','Not Blocked')";
  $result=mysqli_query($con,$query);  
    
      ?><script type="text/javascript">
          swal({
            title: 'Successful!',
            text: 'Successfully created an account!',
            icon: 'success',
          });
        </script>
    <?php
    
    
      
    
  }
    
  

}
?>
  
  

  