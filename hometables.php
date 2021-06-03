<?php
include './php/dbconnect.php';
session_start();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<?php
$sql = "SELECT * FROM tables ORDER BY table_id DESC LIMIT 2;";
$result = $con->query($sql);

          
              while ($row = mysqli_fetch_assoc($result)) {
                if ($row['table_status'] == 0) {

                  $type = "";
                  $button = "submit";
                } else {

                  $type = "disabled";
                  $button = "button";
                }


                
                ?>
                <form action="home.php" method="post">
     
     
        
           <button class="family mx-1 btn btn-lg text-success display-1 <?php echo$type;?>" name="reserve" type="<?php echo $button;?>"><?php echo$row['table_name'];?></button>
          
          
          <input type='hidden' name='tableid'value='<?php echo$row['table_id'];?>'>
          
        
        
        </form>
                <?php
                
              
          }
          ?>

