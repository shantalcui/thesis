<style type="text/css">
    * {
        font-family: 'Montserrat', sans-serif;
    }

    .navbar-nav a {
        color: #ffffff;
        margin: 0 20px;
    }

    .navbar-toggler {
        color: #ffffff;
        border: none !important;
        border: none !important;
        outline: none !important;
    }

    .navbar-toggler .fa {
        color: #ffffff;
        font-size: 26px;
    }

    .nav-link:hover {
        color: #ffffff;
        font-weight: 600;
        border-bottom: 1px solid #ffffff;
        margin-bottom: -1px;
    }
</style>
<nav class="navbar navbar-expand-md fixed-top bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle Navigation"><img class="px-0 ml-2" src="https://img.icons8.com/material-sharp/24/ffffff/menu--v3.png" />
    </button>

    <a class="navbar-brand text-white" href="#">Don Covido's</a>

    <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="takeout_main.php">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="takeout_about.php">About</a>
            </li>
            
        </ul>
    </div>

    <div class="d-block">

        <a href="takeout_cart.php" data-toggle="tooltip" title="Cart">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABvUlEQVRIieWWPWsUURSGn7MGUwQ/GguVWInYCQtuWgsttIyVjW16a/+Bf8DClGqhiY3aqb8goCDEQghEEJJGCSEqIT4WO0t217l3Zyazjb7NMPeec95zzrz3zIX/DQGg3gEuFGvHgfWIeD51dvWto9hWZ6fJ2Rlwj62fAW5Pk3gE6qy6Zft4r54Y5uoMv0TEL+DRFGq6ApzPWqjz6n7LFb+plJ76okXSA7VblfhGi8TLlUgL4lA/tUC6p86XcXTKFiNC4GHlTNN4EBFfanmop9XdI1S7pZ5MxS+tGCAivgNPamU7ivsRsdPIU+02rPajeiwXO1lxgYUG+W4DdyPiIGcUqQ31LLAOnAI2gCX+nunj+AmsRcSPermOEi8Pte5m40AJzGT2rhXPD8C+er1B/G8RsVbLQ315hKM0wLtU/Jy47gGbtbKtgaS4oP9/BrrAXMP4yVbnvjH072E94CuwOumIFGd3ETgHvIqIz7VTVRfsD/kBJl7+1NUh+z2114T4aYlYLmXsL5fYP07Z58RVNix+Z+zL9iYNnBIP7Y21+lkFn5WxVl9N2U5S9UXgFofiylWM2uFQXK8bieufxR9XYEnHtdokswAAAABJRU5ErkJggg==">
            <sup class="badge badge-pill badge-danger" id="takeout_count"></sup>

        </a>
    </div>
            <div class="dropdown" data-toggle="tooltip" title="Accout">
        <button type="submit" class="btn btn-dark" data-toggle="dropdown" data-target=".dropdown-menu"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="30" height="30"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M75.7875,1.3975c-12.65812,0.22844 -22.01062,4.00438 -27.6275,11.395c-6.65156,8.76125 -7.86094,22.10469 -3.655,39.56c-1.54531,1.89469 -2.71437,4.77031 -2.2575,8.6c0.91375,7.57875 3.85656,10.69625 6.3425,11.9325c1.1825,5.95281 4.46125,12.64469 7.6325,15.8025v1.6125c0.02688,3.49375 0.12094,6.51719 -0.215,10.4275c-2.10969,4.8375 -9.11062,7.67281 -17.2,10.8575c-13.4375,5.28094 -30.24781,11.81156 -31.4975,32.68l-0.215,3.655h111.4775l-10.965,-9.5675l-5.16,-4.515l4.515,-5.2675l9.03,-10.32l5.16,4.515l15.695,13.6525l4.085,-5.16c-5.63031,-13.18219 -26.59281,-19.00062 -36.8725,-23.865c-2.45906,-1.24969 -4.56875,-2.60687 -6.02,-4.1925c-0.61812,-0.67187 -1.10187,-1.47812 -1.505,-2.4725c-0.33594,-3.91031 -0.36281,-6.96062 -0.3225,-10.4275v-1.6125c3.07719,-3.14437 6.24844,-9.84969 7.4175,-15.8025c2.48594,-1.24969 5.42875,-4.35375 6.3425,-11.9325c0.45688,-3.74906 -0.65844,-6.59781 -2.15,-8.4925c1.98875,-6.81281 6.08719,-24.55031 -0.9675,-35.905c-2.94281,-4.75687 -7.43094,-7.75344 -13.33,-8.9225c-3.23844,-4.09844 -9.37937,-6.235 -17.7375,-6.235zM166.625,109.7575l-28.81,36.6575l-21.1775,-18.49l-4.515,5.16l26.66,23.22l33.2175,-42.355z"></path></g></g></svg></button>
      </div>
      
      <div class="dropdown-menu dropdown-menu-right bg-dark">
        <form method="post">


           <button class="dropdown-item text-light" disabled><?php foreach ($_SESSION['takeout'] as $no) {
               $no_takeout=$no['takeoutname'];
               $id=$no['takeout_id'];
               $tid=$no['takeoutid'];

           } 
         
            
         

           echo$no_takeout; ?></button> 
        <button class="dropdown-item text-light" name="logout">Logout</button> 
        </form>
      </div>
    </nav>
<?php

if (isset($_POST['logout'])) {

$removetakeout= "DELETE FROM take_out_number WHERE take_out_number_id=$tid";
$removeguestresult=mysqli_query($con,$removetakeout);

$stockquery="UPDATE orders SET order_status='Not Paid',order_time='Not Paid',order_date_out='Not Paid' WHERE order_user_id='$id' and order_status='Preparing' or order_user_id='$id' and order_status='Served' or order_user_id='$id' and order_status='Served'";

$stockresult=mysqli_query($con,$stockquery);
 ?>
<script type="text/javascript">
 var SwalColors = {
  
  blue: "#000000"
};

function SwalOverlayColor(color){
  setTimeout(function(){
    $(".swal-overlay").css({"background-color":SwalColors[color]});
  },200);
}

SwalOverlayColor("blue");

                swal({
                  title: "Logout",
                  text: "Thank You Come Again",
                  icon: "success",
                }).then(function(){
                  window.location="takeout_front.php";
                });
              </script>




            <?php

session_destroy();




   
}




?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {


        function getData() {
            $.ajax({
                type: 'POST',
                url: 'takeout_count.php',
                success: function(data) {
                    $('#takeout_count').html(data);
                }
            });
        }
        getData();
        setInterval(function() {
            getData();
        }, 1000); // it will refresh your data every 1 sec

    });


    
</script>