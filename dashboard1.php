<?php
 include 'db.php';
 include 'header.php';
 include 'session.php';
  $date1=date('Y-m-d');
 $result=false;


 if(isset($_POST['post']))
 {
  $tid=$_POST['post'];

  $sql1=$conn->query("select * from `faculty_status` where `tid`='$tid'");
  $row=mysqli_fetch_array($sql1);
  $sec=$row['section'];

  $query11=mysqli_query($conn,"select `fname`,`sub` from `syllabus` where `sec`='$sec' AND `fname`!='$name'");

  
  ?>

  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    VTA CAP
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
 
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="red" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">        
            <center><img class="img-circle" src="assets/img/cap.jpg" width="120" height="120"></center>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  active">
            <a class="nav-link" href="dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="material-icons">language</i>
              <p>Discipline</p>
            </a>
          </li>
           
           <li class="nav-item ">
            <a class="nav-link" href="logout.php">
              <i class="material-icons">person</i>
              <p>Logout</p>
            </a>
          </li>    
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="">Adjust Class</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-ico+9n icon-bar"></span>
          </button>
         
        </div>
      </nav>
<br><br>
     
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Adjust Your Period </h4>
                  <p class="card-category">Faculty Form</p>
                </div>
                <form method="POST" action="dashboard.php">
                <div class="card-body">
                  
                    <div class="row">
             
                        <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date (disabled)</label>
                          <input type="text" class="form-control" name="date"  value="<?php echo $row['date'];?>" disabled required>
                        </div>
                      </div>

                       <div class="col-md-3">
                        <div class="form-group">
                          <form>
                          <label class="bmd-label-floating">Section (disabled)</label>
                          <input type="text" class="form-control" name="sec"  value="<?php echo $row['section'];?>" disabled required>
                          </form>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <form>
                          <label class="bmd-label-floating">Period (disabled)</label>
                          <input type="text" class="form-control" name="sec"  value="<?php echo $row['period'];?>" disabled required>
                          </form>
                        </div>
                      </div>

                 </div>
                     

                      <div class="row">
                          <div class="col-md-3"></div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Select the faculty</label>
                           <select label="" name="type" class="form-control" required>
                             <option disabled selected value> -- select an option -- </option>
                           <?php
                           while ($row1=mysqli_fetch_array($query11)) {
                             # code...
                             ?>

                              <option value="<?php echo $row1['fname'];?>"><?php echo $row1['fname'];?></option>
                             

                             <?php
                           }

                           ?>

                           </select>
                           <input type="hidden" name="id" value="<?php echo $tid; ?>">
                         
                        </div>
                      </div>
                     
                      </div>
                  <!-- <div id="txtHint"><b>Person info will be listed here...</b></div>-->
                   <center> <button type="submit" name="submit" class="btn btn-primary">Adjust</button></center>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
           </form>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="" target="_blank">VTA </a> CSE Department.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
</body>

</html>


  <?php
 
 }
 else
 
 echo "<script>
      window.location='https://infinityfree.net/errors/404/';
    </script>";
?>
