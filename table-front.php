<?php
session_start();


include './php/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="./css/home.css" rel="stylesheet">
    <title>Available Tables</title>
</head>

<body>
    <div>
        <div class="text-center py-4 mt-n5 table">
            <h1 class="text-white">AVAILABLE TABLES</h1>
        </div>
        <div class="album bg-tables justify-content-center" style="background-size: 100vh; background-position: top center;">
            <div class="container-fluid">
                <!-- COUPLE -->
                <!-- COUPLE -->
        <div class="d-flex justify-content-center" id="couple">
          
        </div>
        <!-- FAMILY -->
        <div class="d-flex justify-content-center" id="family">
         
        </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   <script>
    $(document).ready(function(){
 

        function getData(){
            $.ajax({
                type: 'POST',
                url: 'hometable.php',
                success: function(data){
                    $('#couple').html(data);
                }
            });
        }
        getData();
        setInterval(function () {
            getData(); 
        }, 1000);  // it will refresh your data every 1 sec

    });
</script>

<script>
    $(document).ready(function(){
 

        function getData(){
            $.ajax({
                type: 'POST',
                url: 'hometables.php',
                success: function(data){
                    $('#family').html(data);
                }
            });
        }
        getData();
        setInterval(function () {
            getData(); 
        }, 1000);  // it will refresh your data every 1 sec

    });
</script>