<?php
 include 'db.php';
 include 'header.php';
 include 'session.php';
  $date1=date('Y-m-d');
 $result=false;

  function calculate($month)
  {
      
     if($month=='08')
    {
        $var='points_j';
        return $var;
    }
    else if($month=='09')
    {
        $var='points_f';
        return $var;
    }
    else if($month=='10')
    {
        $var='points_m';
        return $var;
    }
    else if($month=='07')
    {
        $var='points_d';
        return $var;
    }
     else if($month=='11')
    {
        $var='points_a';
        return $var;
    }
    else{
        
    }
  }

 if(isset($_POST['submit']))
 {
  $number=$_POST['roll'];
  $type=$_POST['type'];
  $sql1=$conn->query("select `student_name` from `student` where `roll_number`='$number'");
  $row=mysqli_fetch_array($sql1);
  $student_name=$row['student_name'];
  $result=mysqli_query($conn,"insert into  cap_status(faculty,student_name,roll_number,attendance_status,date,month) values('$name','$student_name','$number','$type','$date1','$m')");
    if($result)
                {
                  
                        $month=calculate($m);
                           $res=mysqli_query($conn,"SELECT `$month` FROM `student` WHERE roll_number='$number'");
            while($row=mysqli_fetch_array($res))
            {
                            if($m=='07')
                            {
                                  $points= $row['points_d'];
                                 
                            }
                            else if($m=='08')
                            {
                                $points=$row['points_j'];
                                
                            }
                            else if($m=='09')
                            {
                                $points=$row['points_f'];
                     
                            }
                            else if($m=='10')
                            {
                                $points=$row['points_m'];
                                
                            }
                            else if($m=='11')
                            {
                                $points=$row['points_a'];
                               
                            }
                            else
                            {
                                
                            }
            }
            $points=$points-1;
            $res1= mysqli_query($conn," UPDATE `student` SET `$month`='$points' WHERE roll_number='$number'");
          }
 }
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
  <script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               // document.getElementById("txtHint").innerHTML = this.responseText;
                document.getElementById("txtHint1").value = this.responseText;
            }
        }
        xmlhttp.open("GET", "getuser.php?q="+str, true);
        xmlhttp.send();
    }
}
</script>
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
          <li class="nav-item  ">
            <a class="nav-link" href="dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active">
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
            <a class="navbar-brand" href="">Indisciplinary Activity</a>
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
      <?php 
      if($result)
      {
        ?>
       <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  
                  <div class="alert alert-info alert-with-icon" data-notify="container">
                    <i class="material-icons" data-notify="icon">add_alert</i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span data-notify="message">Successfully reduced marks for <?php echo $student_name?></span>
                  </div>

                </div>
              </div>
            </div>
        <?php
      }

       ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Credit Reduce</h4>
                  <p class="card-category">Student Form</p>
                </div>
                <form method="POST" action="">
                <div class="card-body">
                  
                    <div class="row">
             
                        <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name (disabled)</label>
                          <input type="text" class="form-control" name="sname" id="txtHint1" value="" disabled required>
                        </div>
                      </div>
                   
                 </div>
                     
                      <div class="row">
                          <div class="col-md-3"></div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <form>
                          <label class="bmd-label-floating">Enter Roll Number</label>
                          <input type="text" class="form-control" name="roll" onkeyup="showHint(this.value)" required="">
                          </form>
                        </div>
                      </div>
                     
                      </div>

                      <div class="row">
                          <div class="col-md-3"></div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Enter the reason</label>
                         <select abel=" " name="type" class="form-control" required>
                             <option disabled selected value> -- select an option -- </option>
  <option value="Misbehaviour">Misbehaviour</option>
  <option value="Mobilephone">Using Mobilephone</option>
  <option value="Roaming">Roaming in Coridors</option>
  <option value="dress">Dresscode</option>
</select>
                        </div>
                      </div>
                     
                      </div>
                  <!-- <div id="txtHint"><b>Person info will be listed here...</b></div>-->
                   <center> <button type="submit" name="submit" class="btn btn-primary">Reduce Marks</button></center>
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