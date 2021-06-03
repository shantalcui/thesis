<?php
include './php/dbconnect.php';
session_start();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<?php
$sql = "SELECT * FROM tables";
$result = $con->query($sql);

          for ($row['table_id'] = 0; $row['table_id'] < 50; $row['table_id']++) {
            if ($row['table_id'] == 3) {
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
     
     
        
          
          <button class="couple mx-5 btn btn-lg text-success pt-4 <?php echo$type;?>" name="reserve" type="<?php echo $button;?>" disable><?php echo$row['table_name'];?></button>
          <input type='hidden' name='tableid'value='<?php echo$row['table_id'];?>'>
          
        
        
        </form>
        	<?php
                break;
              }
            }
          }
          ?>

