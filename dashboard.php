<?php
    include("header.php");
    include('session.php');
    include('db.php');   
$result1=false;

   $date1=date('Y-m-d');
     $prev1_date = date('Y-m-d', strtotime($date1 .' -1 day'));
    $prev2_date = date('Y-m-d', strtotime($date1 .' -2 day'));


//Adjusting the class to some other faculty
  if(isset($_POST['submit']))
  {
    if(isset($_POST['type']))
    {
      $tid=$_POST['id'];
      $faname=$_POST['type'];
      $sql1=$conn->query("select * from `faculty_status` where `tid`='$tid'");
      $row=mysqli_fetch_array($sql1);
      $dat=$row['date'];
      $cls=$row['section'];
      $per=$row['period'];

     $query1=mysqli_query($conn,"select `sub` from `syllabus` where `sec`='$cls' AND `fname`='$faname'");
     $row1=mysqli_fetch_array($query1);
     $sec=$row1['sub'];
  


   $result1=mysqli_query($conn,"INSERT INTO `faculty_status`(`f_name`, `login`, `Updated`, `NUpdations`, `Nlogin`, `date`, `month`, `class`, `section`, `period`, `status`) VALUES ('$faname','0','0','1','1','$dat','$m','$sec','$cls','$per','0')");
        
        $query1=mysqli_query($conn,"DELETE from `faculty_status` where `tid`='$tid'");
    }
  }

    
  /*..Daily Status for faculty*/ 
 $test=mysqli_query($conn,"SELECT  `Class`,`section`, `Period`, `Faculty`, `section` FROM `timetable` where day='$day'");
  $result=mysqli_query($conn,"SELECT * from `faculty_status` where date='$date1'");
  $count=mysqli_num_rows($result);
   if($count==0){
                    
      if($test)
      {
            while($row=mysqli_fetch_array($test))
            {
               $class=$row['Class'];
               $section=$row['section'];
               $period=$row['Period'];
               $fname=$row['Faculty'];
               
                $test1=mysqli_query($conn,"INSERT INTO `faculty_status`(`f_name`, `login`, `Updated`, `NUpdations`, `Nlogin`, `date`, `month`, `class`, `section`, `period`) VALUES ('$fname','0','0','1','1','$date1','$m','$class','$section','$period')");               
               
                                  
            }
          
      }
   }

/*Updating the value of update for logged in faculty*/
 
$test2=mysqli_query($conn,"UPDATE `faculty_status` SET `login`=1,`Nlogin`=0 WHERE  `f_name`='$name' and  `date`='$date1'");
?><!DOCTYPE html>
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
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" href="user.php">
              <i class="material-icons">language</i>
              <p>Discipline</p>
            </a>
          </li>

<?php
$query1=mysqli_query($conn,"select `status` from `syllabus` where `fname`='admin'");
$row1=mysqli_fetch_array($query1);
$status=$row1['status'];
if($status==1)
{
  ?>
      <li class="nav-item ">
            <a class="nav-link" href="syllabus.php">
              <i class="material-icons">library_books</i>
              <p>Syllabus</p>
            </a>
          </li>

  <?php
}
?>
     
        
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
            <a class="navbar-brand" href="">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
         
        </div>
      </nav>
      <!-- End Navbar -->
 <div class="content">
                <div class="container-fluid">

                  <?php
                   $query1=mysqli_query($conn,"select * from `syllabus` where `fname`='$name' AND `status`='0'");
                   $count=mysqli_num_rows($query1);

      if($status && $count)
      {
        ?>
       <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  
                  <div class="alert alert-danger" data-notify="container">
                    <i class="material-icons" data-notify="icon">add_alert</i>
                    <span data-notify="message"><center>Please Complete Your Syllabus Form!</center></span>
                  </div>

                </div>
              </div>
          
        <?php
      }

       ?>
    
      <?php 
      if($result1)
      {
        ?>
       <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  
                  <div class="alert alert-success alert-with-icon" data-notify="container">
                    <i class="material-icons" data-notify="icon">add_alert</i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span data-notify="message">Successfully adjusted the class for <?php echo $faname;?></span>
                  </div>

                </div>
              </div>
            </div>
        <?php
      }

       ?>
              <div class="row">
                <div class="col-md-12">
                  
                  <div class="alert alert-info" data-notify="container">
                    <i class="material-icons" data-notify="icon">add_alert</i>
                    <span data-notify="message"><center><b> Welcome </b><b><?php echo $name?></b></center></span>
                  </div>

                </div>
              </div>
          


                    <div class="row">
                        <div class="col-md-12 body">



                            <link rel="stylesheet" href="assets/css/tet.css" type="text/css">
                            <script src="assets/js/text.js" type="text/javascript"></script>


                            <h2 class="">
                                <center style="color: white">Roles & Responsibilities</center>
                            </h2>

                            <h3 class="ani" >
                                <a href="" style="color: red" class="typewrite" data-period="2000" data-type='[ "Staff is the responsible for monitoring student’s punctuality, behaviour, attendance and dress code.", "Each section will be mentored by C.A.P Section  Incharge.", "Every month C.A.P ranks will be displayed in the  notice board.", "Thank You for your support!!" ]'>
                                    <span class="wrap"></span>
                                    </a>
                            </h3>


                        </div>
                    </div><br><br>


          <div class="row">
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <center><h4 class="card-title mt-0"> Time Table Overview</h4>
                  <p class="card-category"> For the date of <?php echo $date1; ?></p></center>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
                         <th>Section</th>
                                                                        <th>Class</th>
                                                                        <th>Period</th>
                                                                        <th>Date</th>
                                                                        <th></th>
                      </thead>
                      <tbody>
                                                 <?php
     $result=mysqli_query($conn,"SELECT `section`,`Class`,`period`,`date`,`tid` from `faculty_status` where 
                    `f_name`='$name' and `date`='$date1' and status='0'");
      
           
              ?>
                        <tr>
                                                                        <?php 
                while ($row=mysqli_fetch_array($result))
                {
                ?>
 <tr>

                                                                        <td>
                                                                            <form action="index1.php" method="POST">
                                                                                <input type="hidden" name="per" value="<?php echo $row[2]; ?>">
                                                                                <input type="hidden" name="dat" value="<?php echo $row[3]; ?>">
                                                                                <input type="submit" value="<?php echo $row[0]; ?>" class="btn btn-success btn-fill" name="sec">

                                                                            </form>
                                                                        </td>


                                                                        <td class="">
                                                                            <?php echo strtoupper("$row[1]"); ?>
                                                                        </td>
                                                                        <td class="">
                                                                            <?php echo $row[2]; ?>
                                                                        </td>
                                                                        <td class="">
                                                                            <?php echo $row[3]; ?>
                                                                        </td>
                                                                        <td>
                                                                         
  <!-- Trigger the modal with a button -->
<form method="POST" action="dashboard1.php">
    <button type="submit" class="btn btn-warning btn-fill" name="post" value="<?php echo $row[4]; ?>">Adjust</button>
</form>

  <!-- Modal -->
 
                                                                        </td>
                                                                       

                                                                    </tr>

                                                                    <?php
                      }
                    ?>
                      </tbody>
                    </table>
                  </div>
                </div>
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