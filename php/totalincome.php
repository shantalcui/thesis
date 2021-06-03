 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 							<h6 class="py-2"><b>Today</b></h6>
                            <h1 class="text-center display-4"><small>₱</small>
                            <?php
                            include 'dbconnect.php';

                            $sql = "SELECT  SUM(income_amount) AS income_amount
                            FROM income ";
                            $sqlresult = $con->query($sql);
                            $totalincome = mysqli_fetch_assoc($sqlresult);

                            echo $totalincome['income_amount'];                           
                             ?>


                            </h1>