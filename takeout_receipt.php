<?php

session_start();

require_once('PHPMailer/PHPMailerAutoload.php');
require_once ('./php/component.php');
include './php/dbcall.php';
$admin_sql = "SELECT * FROM admin WHERE admin_login= 'login'";
$admin_sql_tresult=mysqli_query($con,$admin_sql);
$adminrow = mysqli_fetch_assoc($admin_sql_tresult);
$admin=$adminrow['admin_name'];






            
    
//login failed

 foreach ($_SESSION['takeout']as $uid ) {
  $uname=$uid['takeoutname'];
  $tid=$uid['takeout_id'];
  $outid=$uid['takeoutid'];
  }
   

 if($uname> 0){
  
 }else{
  header("location:takeout_front.php");
      session_destroy();
 }




date_default_timezone_set("Asia/Taipei");
$yes=date("y/m/d--h:i:s A");
$query="select * from user_receipt order by id desc limit 1";
$queryresult=mysqli_query($con,$query);
$row=mysqli_fetch_array($queryresult);
$lastid=$row['user_receipt_or'];
foreach ($_SESSION['takeout'] as $ename) {
    
    $tqty=0;
    $i=$ename['takeout_id'];
    $tname=$ename['takeoutname'];
    $yesid=$ename['takeoutid'];
    $namequery="select * from take_out_number where take_out_number_userid='$i'";
    $namequeryresult=mysqli_query($con,$namequery);
    $rowz=mysqli_fetch_array($namequeryresult);
    
      $name=$rowz['take_out_number_name'];
    
    
  }

$cartquery = "SELECT COUNT(*) AS SUM FROM orders WHERE order_user_id='$tid' and  order_status='Served'";
$cartqueryresult=mysqli_query($con,$cartquery);
$cartrow = mysqli_fetch_assoc($cartqueryresult);
$coutnt=$cartrow['SUM'];




if ($lastid == " ") 
{
  $reno="OR490191";
}else
{
  $reno=substr($lastid, 7);
  $reno=intval($reno);
  $reno="OR49019" . ($reno+1);
}



?>

<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") 
{
  
             
             $totalqty=0;


  foreach ($_SESSION['takeout'] as $email) 
  {
  $unme=$email['takeout_id'];
  
  $billoutsqlqty = "SELECT * FROM orders WHERE order_user_id ='$unme' and order_status='Served'";
  $billoutsqlqtylresult = $con->query($billoutsqlqty);

   while ($qtyrow = mysqli_fetch_assoc($billoutsqlqtylresult)) {
    $totalqty=$totalqty+$qtyrow['order_qty'];
    $etake=$email['takeoutemail'];
    $user=$email['takeoutname'];
    $udii=$email['takeout_id'];
    
     date_default_timezone_set("Asia/Taipei");
     $date=date("M d,Y");
     $time=date("h:ia");
     
     }
  
}
  
  if (!$con)
   {
    die("connection failed" . mysqli_connect_error());
  }else
  {




    $v=$_SESSION['yes_vat'];
    $d=$_SESSION['yes_dis'];
    $total=$_SESSION['yes_total'];
    $user_tender=$_SESSION['tender'];
    $user_change=$_SESSION['change'];
    $resql="insert into user_receipt(  user_receipt_or ,user_name, user_email ,user_torder,user_tqty,user_subtotal,user_tender,user_change, user_table,user_vat,user_discount,  receipt_date ,receipt_time )VALUES('$reno','$user','$etake','$coutnt','$totalqty','$total','$user_tender','$user_change','','$v','$d','$date','$time')";
    if (mysqli_query($con,$resql)) 
    {
      echo "Recorded";
    }else
    {
      echo " NOT Recorder";
    }
  }


//update order OR
if ($_GET['action']=='update') {
   # code...
 $s=$_GET['id'];
 $d=$_GET['date'];
date_default_timezone_set("Asia/Taipei");
         $ddate=date("h:ia");

               $orderquery="UPDATE orders SET user_or='$reno',order_cashier='$admin', order_status='Paid',order_date_out='$ddate' WHERE order_user_id='$udii' and order_status='$s' and order_date_out='$d'";
                  $utresult=mysqli_query($con,$orderquery);

                  

 }    




            

           
          
      





function Send_Mail($to,$subject,$body)
{
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'don.covidos@gmail.com';
$mail->Password = 'DummyAccount';
$mail->SetFrom('no-reply@howcode.org');
$mail->Subject = $subject;
$mail->Body = $body;

$mail->AddAddress($to);

$mail->Send();
}
 
$body = $_POST['w3review'];
 $euser=$_POST['emailuser'];
 Send_Mail($euser,'Subject',$body);


$removetakeout= "DELETE FROM take_out_number WHERE take_out_number_id=$outid";
$removeguestresult=mysqli_query($con,$removetakeout);
 
header("location:customer_feedback.php");
session_destroy();
}

?>

<!doctype html>
<html lang="en">
  <head>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <title>Don Covido's | Bill Out</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="./css/form-validation.css" rel="stylesheet">
  </head>
  
  <body class="bg-dark text-white">
  <header>
 
</header>
  
   
    
  
  <!-- RECEIPT -->
  <div class="container shan">
    <div class="pt-5 pb-3 text-center">
      <!--<img class="d-block mx-auto mb-4" src="../images/logo.png" width="200" height="auto">-->
       <form action="<?php echo($_SERVER['PHP_SELF']);?>?action=update&id=Served&date=' '" method="POST">
      <h1 class="mt-5">RECEIPT</h1>
      <h2 class="text-muted" name="id" id="id" readonly><?php echo$reno;?></h2>
    </div>

    <div class="row text-dark">
      <div class="col-12 col-md-8 mx-auto">
        
        <ul class="receipt mb-3 bg-white">
          <h3 class="text-center pt-2 mb-0 mr-3 font-weight-bold">Don Covido's</h3>
          <h6 class="bottom text-center pt-0 pb-2 mr-3">Southcrest vill., San Agustin 2, City of Dasmarinas</h6>

          <h6><?php echo$reno;?></h6>
          <h6>CUSTOMER NAME: <?php echo $name;?></h6>
          <h6><?php echo "DATE: ".$yes;?></h6>
          <h6>CASHIER: <?php echo $admin;?></h6>

          <li class="bottom row d-flex mb-3 mr-3 justify-content-between lh-condensed">
            <div class="col-1 pt-3">
              <h5 class="my-0 font-weight-bold text-left">QTY</h5>
            </div>
            <div class="col-5 pt-3">
              <h5 class="my-0 font-weight-bold text-left">DESC</h5>
            </div>
            <div class="col-2 pt-3">
              <h5 class="my-0 font-weight-bold text-right">AMT</h5>
            </div>
          </li>
		

		
          

           <?php     

 
          $total=$tpprice=$vat=$vvat=$dis=$ddis=0;
       

          
          foreach ($_SESSION['takeout']as $uisd ) {
          
          $usname=$uisd['takeout_id'];    
          $yesid=$uisd['takeoutid'];    
          $billoutsql = "SELECT * FROM orders WHERE  order_user_id ='$usname' and order_status='Served'";
          $billoutsqlresult = $con->query($billoutsql);

          while ($row = mysqli_fetch_assoc($billoutsqlresult)) {
          
         
    
      
          
      
    
          $n=$row['order_name'];
          $p=$row['order_price'];
          $q=$row['order_qty'];

    
      
      $tpprice=($row["order_qty"] * (int)$row['order_price']);
       
       echo "
            <li class='row d-flex mb-3 mr-3 justify-content-between lh-condensed'>
            <div class='col-1 pt-1'>
              <h6 class='my-0 font-weight-bold text-left'>$q</h6>
            </div>
            <div class='col-4 pt-1'>
              <h6 class='my-0 font-weight-bold text-left'>$n</h6>
            </div>
            <div class='col-3 pt-1'>
            <p class=\"my-0 font-weight-bold text-center\">₱$tpprice</p>
           
              
            </div>
          </li>




            ";
            $userquery = "select * from take_out_number WHERE take_out_number_id=$yesid";
              $userqueryresult = mysqli_query($con, $userquery);
              $yesrows = mysqli_fetch_array($userqueryresult);




              if ($yesrows['take_out_age'] <= 49) {
                $vat = (0.12 * (int)$tpprice);
                $vvat = $vvat + $vat;
                $total=$total+$tpprice+$vat;

                $_SESSION['yes_total']=$total;

                $_SESSION['yes_vat'] = $vvat;
                $_SESSION['yes_dis'] = $ddis;;
              } else {
                $dis = ((int)$tpprice * 0.2);
                $ddis = $ddis + $dis;
                 $total=$total+($tpprice-$dis);
                $_SESSION['yes_total']=$total;

                $_SESSION['yes_vat'] = $vvat;
                $_SESSION['yes_dis'] = $ddis;;
              }
            




            
            
            


         
         
          

        
        }
      
      
    }
  
  
     ?>



     <!-- VAT -->
          <li class="top row d-flex pt-3 mr-3 justify-content-between">
            <small class="col font-weight-bold text-right">VAT 12%</small>
            <small class="col-4 font-weight-bold text-right"><?php echo"₱" .$_SESSION['yes_vat'];?><!--(VAT=AMOUNT*0.12)--><!--PAG MAY SENIOR DISCOUNT PHP0.00 NA YUNG VAT--></small>
          </li>
          <!-- DISCOUNT -->
          <li class="row d-flex mr-3 justify-content-between">
            <small class="col font-weight-bold text-right">Discount 20%</small>
            <small class="col-4 font-weight-bold text-right"><?php echo "₱" .$_SESSION['yes_dis'];?><!--(DISCOUNT=AMOUNT*0.2)--></small>
          </li>
          <!-- TOTAL AMOUNT -->
          <li class="row d-flex mt-1 mb-n2 mr-3 justify-content-between">
            <h5 class="col font-weight-bold text-right">AMOUNT</h5>
            <h6 class="col-4 font-weight-bold text-right">
            <?php
      echo "₱".$_SESSION['yes_total'];


        ?> 
              </h6>
          </li>
          <!-- TENDERED -->
          <li class="row d-flex mr-3 justify-content-between">
            <small class="col font-weight-bold text-right">Amount Tendered</small>
            <small class="col-4 font-weight-bold text-right">₱<?php 
              foreach ($_SESSION['takeout']as $tender) {
                $tender=$tender['takeoutid']; 
              }
              $querytender="SELECT * FROM take_out_number WHERE take_out_number_id='$tender'";
              $querytenderresult=mysqli_query($con,$querytender);
              $tender_row = mysqli_fetch_assoc($querytenderresult);
              $_SESSION['tender']=$tender_row['take_out_amount'];
              $_SESSION['change']=$tender_row['take_out_change'];
              echo $tender_row['take_out_amount'];

            ?></small>
          </li>
          <!-- CHANGE -->
          <li class="bottom row d-flex pb-3  mb-3 mr-3 justify-content-between">
            <small class="col font-weight-bold text-right">Change</small>
            <small class="col-4 font-weight-bold text-right">₱<?php
            echo $tender_row['take_out_change'];
            ?></small>
          </li>

          <li class="row d-flex mr-3 justify-content-center">
            <h5 class=" col-12 text-center font-weight-bold">THANK YOU FOR DINING WITH US!</h5>
            <img src="./images/barcode.png" width="200" height="80" class="col-5  pb-3">
          </li>
        </ul>


        
    
        

        

      <div class="row">
      <button type="submit" class="btn btn-danger font-weight-bold col-12" name="ok" >OK</button>
    </div>
    <textarea id="emailuser" name="emailuser" style='display: none'><?php foreach ($_SESSION['takeout'] as  $dsa) {
       $dsap=$dsa['takeoutemail'];   echo $dsap; }?></textarea>
     <textarea id="w3review" name="w3review" style='display: none'>

    
      <div class="container">
    <div class="pt-5 pb-3 text-center">
    
      <h1 class="mt-5">RECEIPT</h1>
      
    </div>

    <div class="row text-dark">
      <div class="col-12 col-md-8 mx-auto">
        
        <ul class="receipt mb-3 bg-white">
          <h3 class="text-center pt-2 mb-0 mr-3 font-weight-bold">Don Covido's</h3>
          <h6 class="bottom text-center pt-0 pb-2 mr-3">Southcrest vill., San Agustin 2, City of Dasmarinas</h6>

          <h6><?php echo$reno;?></h6>
          <h6>CUSTOMER NAME: <?php echo $name;?></h6>
          <h6><?php echo "DATE: ".$yes;?></h6>
          <h6>CASHIER: <?php echo $admin;?></h6>

          <li class="bottom row d-flex mb-3 mr-3 justify-content-between lh-condensed\">
            <div class="col-1 pt-3">
              <h5 class="my-0 font-weight-bold text-left">TOTAL QTY: <?php  
              $qty=0;
                $billoutqty = "SELECT * FROM orders WHERE order_user_id ='$i' and order_status='Served'";
                $billoutqtyresult = $con->query($billoutqty);

                while ($tqtyrow = mysqli_fetch_assoc($billoutqtyresult)) {
                $qty=$qty+$tqtyrow['order_qty'];}
              echo $qty;?></h5>
            </div>
            <div class="col-5 pt-3">
              <h5 class="my-0 font-weight-bold text-left">---DESCRIPTION---</h5>
            </div>
            
            
          </li>
<?php 
foreach ($_SESSION['takeout'] as $u) 
  {
    $ui=$u['takeout_id'];
  
$sql = "SELECT * FROM orders WHERE order_user_id='$ui' and order_status='Served'";
$result = $con->query($sql);
  }
  while ($uuu = mysqli_fetch_assoc($result)) {
   
takeoutb($uuu['order_name']);

}



    ?>
         <li class="top row d-flex pt-3 mr-3 justify-content-between">
            <small class="col font-weight-bold text-right">VAT 12%</small>
            <small class="col-4 font-weight-bold text-right"><?php echo"₱" .$_SESSION['yes_vat'];?></small>
          </li>
         
          <li class="row d-flex mr-3 justify-content-between">
            <small class="col font-weight-bold text-right">Discount 20%</small>
            <small class="col-4 font-weight-bold text-right"><?php  echo "₱" .$_SESSION['yes_dis'];?></small>
          </li>
          <li class="bottom row d-flex mb-3 mr-3 justify-content-between">
           <small class="col font-weight-bold text-right">Amount</small>
            <small class="col-4 font-weight-bold text-right">₱<?php
      echo $_SESSION['yes_total'];


        ?> 
             </small>
          </li>
          <!-- TENDERED -->
          <li class="row d-flex mr-3 justify-content-between">
            <small class="col font-weight-bold text-right">Amount Tendered</small>
            <small class="col-4 font-weight-bold text-right">₱<?php
            echo $tender_row['take_out_amount'];

            ?></small>
          </li>
          <!-- CHANGE -->
          <li class="bottom row d-flex pb-3  mb-3 mr-3 justify-content-between">
            <small class="col font-weight-bold text-right">Change</small>
            <small class="col-4 font-weight-bold text-right">₱<?php
            echo $tender_row['take_out_change'];
            ?></small>
          </li> 
          </ul>
   

</textarea>
</form>



  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2020 Don Covido's</p>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="form-validation.js"></script></body>
</html>
