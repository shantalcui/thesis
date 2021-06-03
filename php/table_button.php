<?php

session_start();





if (isset($_POST['Reserve1'])){
//print_r($_POST['productid']);
  if (isset($_SESSION['table-id'])) {


    $item_array_id=array_column($_SESSION['table-id'], "tableid1");    
    if(in_array($_POST['tableid1'], $item_array_id)){
      echo "<script>alert('Table is Already Reserve bitch')</script>";
      
    }else{
      $count=count($_SESSION['table-id']);
      $item_array = array(
        'tableid1' =>$_POST['tableid1']);
    $_SESSION['table-id'][$count]=$item_array;


    }
    }else{
    $item_array = array(
      'tableid1' =>$_POST['tableid1']);
    $_SESSION['table-id']['0']=$item_array;   

  }
  
 

  
$con= mysqli_connect("localhost","root","","sum")or die("yawa".mysqli_error($con));
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

   $num = "SELECT * FROM tables";
  $table_result = $con->query($num);

  if (isset($_SESSION['table-id'])) {
  while ($row = mysqli_fetch_assoc($table_result)) {
  foreach ($_SESSION['table-id'] as $id => $value) {
  if ($row['table_id']==$value['tableid1']) {
    
  $ta=$value['tableid1'];
  $table_total= $row["table_status"]-$row["table_status"];
  
  $table_sql = "UPDATE tables SET table_status= $table_total WHERE table_id= 1";
  }
}
}
}
if ($con->query($table_sql) === TRUE) {
    header("location:../login.php");
  } else {
    echo "Error updating record: " . $con->error;
  }
}
  ?>

  <!-- TABLE 1 -->
     <form action="./php/table_button.php" method="post">
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="./images/couple.jpg" width="100%" height="auto">
            <div class="card-body">
              <h4 class="card-text">Couple's Table</h4>
              <p class="card-text text-muted">Available</p>
              <div class="row">
                <div class=" col-12 btn-group">
                 
                  <button type="submit" class="btn btn-danger" onclick="policy()">Reserve</button>

                </div>
              </div>
            </div>
          </div>
        </div>
    
    <!-- TABLE 2 -->
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="./images/family.jpg" width="100%" height="auto">
            <div class="card-body">
              <h4 class="card-text">Family Table</h4>
              <p class="card-text text-muted">Available</p>
              <div class="row">
               <div class="col-12 btn-group">
                  <button type="submit" class="btn btn-danger" onclick="policy()">Reserve</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    
    <!-- TABLE 3 -->
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="./images/business.jpg" width="100%" height="auto">
            <div class="card-body">
              <h4 class="card-text">Couple's Table</h4>
              <p class="card-text text-muted">Occupied</p>
              <div class="row">
               <div class="col-12 btn-group">
                  <button type="submit" class="btn btn-danger col-12">Reserve</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    
      </div>







   
        
      
  </main>
  </form>