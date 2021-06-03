<?php
include 'dbconnect.php';
session_start();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<h2 class="text-center mt-3">History</h2>
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Transaction</th>
                                    <th>Date/Time</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $incomesql="SELECT * FROM income";
                                $incomesqlresult = mysqli_query($con,$incomesql);
                                while ($row = mysqli_fetch_assoc($incomesqlresult)) {
                                   
                                ?>
                                <tr>
                                    <td><?php echo$row['income_Transaction'];?></td>
                                    <td><?php echo$row['income_Date_Time'];?></td>
                                    <td class="text-success">+Php  <?php echo$row['income_amount'];?></td>
                                </tr>
                                <?php
                                }
                               

                                ?>
                            </tbody>
                        </table>