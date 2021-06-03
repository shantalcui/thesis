<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Don Covido's</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
    	<form class="nav-item text-nowrap" method="post">
      <button  class="btn btn-primary btn-sm" name="signout">Sign out <?php  if (isset($_POST['signout'])) {
        foreach ($_SESSION['admin'] as $key) {
        $admin=$key['adminid'];
        $admin_sql = "UPDATE admin SET admin_login='' WHERE admin_id= $admin";
        $admin_sql_tresult=mysqli_query($con,$admin_sql);
        }
        


        header("location:./admin.php");unset($_SESSION['admin']);}  ?></button>
      </form>
    </li>
  </ul>
</nav>