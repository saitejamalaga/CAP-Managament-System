<?php
 include 'db.php';
 include 'header.php';
 include 'session.php';
 $date1=date('Y-m-d');

if(isset($_POST['submit']))
 {
    $given=$_POST['given'];
    $covered=$_POST['covered'];
    $units=$_POST['units'];
    $sub=$_POST['sub'];
    $sec=$_POST['sec'];
 
    
    $query1=mysqli_query($conn,"UPDATE `syllabus` SET `given`='$given',`covered`='$covered',`units`='$units',`status`='1' WHERE `fname`='$name' AND `sec`='$sec' AND `sub`='$sub'");
 }

$query1=mysqli_query($conn,"select `status` from `syllabus` where `fname`='admin'");
$row1=mysqli_fetch_array($query1);
$status=$row1['status'];
if($status==1)
{
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
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        
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
      <li class="nav-item active">
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
            <a class="navbar-brand" href="">Syllabus Coverage</a>
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
          
         <?php
             $query=mysqli_query($conn,"select * from `syllabus` where `fname`='$name' and `status`='0'");
 $count=mysqli_num_rows($query);
             $i=1;
             while($row=mysqli_fetch_array($query))
             {

               switch ($i) {
        case 1:
        case 4:
          $color = 'warning';
          break;
         // eventually you can manage default 
         // case 1:
       case 2:
        case 5:
          $color = 'success';
          break;

          case 3:
        case 6:
          $color = 'info';
          break;

        default:
          $color = 'primary';
          break;
  
      }

      
?> <div class="row">
            <div class="col-md-12">
              <div class="card">
               <form method="POST" action="">

                <div class="card-header card-header-<?php echo $color;?>">
                  <h4 class="card-title">For the section of <?php echo $row['sec']?></h4>
                  <p class="card-category">For the subject of <?php echo $row['sub']?></p>

                  <input type="hidden" name="sec" value="<?php echo $row['sec']?>">
                  <input type="hidden" name="sub" value="<?php echo $row['sub']?>">

                </div>

                <div class="card-body">
                  
                    <div class="row">
             
                        <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Percentage Given as per schedule</label>
                          <input type="text" class="form-control" name="given" required>
                        </div>
                      </div>
                   
                   </div>

                    <div class="row">
             
                        <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Percentage Covered as per schedule</label>
                          <input type="text" class="form-control" name="covered" required>
                        </div>
                      </div>
                   
                   </div>



                     <div class="row">
                      
                        <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Enter Number Of Hours Required</label>
                   <input type="number" class="form-control" name="units" value="0" required>
                        </div>
                      </div>
                     
                      </div>
<center> <button type="submit" name="submit" class="btn btn-primary">Submit Data</button></center>

                 </div>
                 </form>  
               




 </div>
</div>
</div>


<?php
             $i++;}

         ?>



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

  <script>
            $('input[type="text"]').keyup(function(e) {
                var num = $(this).val();
                if (e.which!=8) {
                    num = sortNumber(num);
                   if(isNaN(num)||num<0 ||num>100) {
                       alert("Only Enter Number Between 0-100");
                       $(this).val(sortNumber(num.substr(0,num.length-1)) + "%");
                   }
                else
                    $(this).val(sortNumber(num)+"%");
                }
                else {
                    if(num < 2)
                        $(this).val("");
                    else
                        $(this).val(sortNumber(num.substr(0,num.length-1)) + "%");
                }
            });
            function sortNumber(n){
                var newNumber="";
                for(var i = 0; i<n.length; i++)
                    if(n[i] != "%")
                        newNumber += n[i];
                return newNumber;
            }
        </script>
</body>

</html>
    <?php
}
else
{
  echo "<script>
      window.location='https://infinityfree.net/errors/404/';
    </script>";
}

?>
 

 