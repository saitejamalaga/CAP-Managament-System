<?php
   include("header1.php");
   include("session1.php");
   include("db.php");

     $date1=date("Y-m-d");
    $prev1_date = date('Y-m-d', strtotime($date1 .' -1 day'));
	$prev2_date = date('Y-m-d', strtotime($date1 .' -2 day'));
  $value1=0;
  $value2=0;
  $value3=0;
  $value4=0;

 $result12=mysqli_query($conn,"select distinct `f_name` from faculty_status where `month`='$m'");
 if($result12){
                                           
                while($row=mysqli_fetch_array($result12))
                                            {
                                              
                                          
                                         $f_name=$row['f_name'];
                                                
                                
                                        $result1=mysqli_query($conn,"select * from faculty_status where `f_name`='$f_name' and `login`='1' and `month`='$m'");
                                        $count1=mysqli_num_rows($result1);
                                       
                                        $result2=mysqli_query($conn,"select * from faculty_status where `f_name`='$f_name' and `Updated`='1' and `month`='$m'");
                                        $count2=mysqli_num_rows($result2);
                                        
                                        $result3=mysqli_query($conn,"select * from faculty_status where `f_name`='$f_name' and `NUpdations`='1' and `month`='$m'");
                                        $count3=mysqli_num_rows($result3);
                                     
                                        $result4=mysqli_query($conn,"select * from faculty_status where `f_name`='$f_name' and `Nlogin`='1' and `month`='$m'");
                                        $count4=mysqli_num_rows($result4);



      $result4=mysqli_query($conn,"UPDATE `faculty` SET `tln`='$count1',`tup`='$count2',`tnu`='$count3',`tnln`='$count4' where faculty='$f_name' and month='$m'");
                                            }

 }





   $result=mysqli_query($conn,"SELECT distinct `faculty` from `faculty` where month='$m'");
   while($row=mysqli_fetch_array($result))
   {
     
       $fname=$row['faculty'];
       
       $result1=mysqli_query($conn,"SELECT  `tln`, `tup`, `tnu`, `tnln` FROM `faculty` where `faculty`='$fname' and `month`='$m'");
       while($row1=mysqli_fetch_array($result1))
       {
           $val1=$row1['tln'];
           $val2=$row1['tup'];
           $val3=$row1['tnu'];
           $val4=$row1['tnln'];
           $value1=$value1+$val1;
           $value2=$value2+$val2;
           $value3=$value3+$val3;
           $value4=$value4+$val4;
       }       
   }
   
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>CAP</title>
        <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="codedthemes">
        <meta name="keywords" content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
        <meta name="author" content="codedthemes">
        <!-- Favicon icon -->
        <link rel="shortcut icon" href="assets1/images/favicon.png" type="image/x-icon">
        <link rel="icon" href="assets1/images/favicon.ico" type="image/x-icon">
        <!-- Google font-->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
        <!-- themify -->
        <link rel="stylesheet" type="text/css" href="assets1/icon/themify-icons/themify-icons.css">
        <!-- iconfont -->
        <link rel="stylesheet" type="text/css" href="assets1/icon/icofont/css/icofont.css">
        <!-- simple line icon -->
        <link rel="stylesheet" type="text/css" href="assets1/icon/simple-line-icons/css/simple-line-icons.css">
        <!-- Required Fremwork -->
        <link rel="stylesheet" type="text/css" href="assets1/plugins/bootstrap/css/bootstrap.min.css">
        <!-- Style.css -->
        <link rel="stylesheet" type="text/css" href="assets1/css/main.css">
        <!-- Responsive.css-->
        <link rel="stylesheet" type="text/css" href="assets1/css/responsive.css"> </head>

    <body class="sidebar-mini fixed">
        <div class="loader-bg">
            <div class="loader-bar"> </div>
        </div>
        <div class="wrapper">
            <!-- Navbar-->
            <header class="main-header-top hidden-print">
                <a href="index.html" class="logo">CAP Management System</a>
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
                    <!-- Navbar Right Menu-->
                    <div class="navbar-custom-menu">
                        <ul class="top-nav">
                            <!--Notification Menu-->
                        
                            <!-- User Menu-->
                            <li class="">
                                <a href="logout.php" class="dropdown-toggle drop icon-circle drop-image"> <span><img class="img-circle " src="assets1/images/avatar-1.png" style="width:40px;" alt="User Image"></span> <span> Logout</span> </a>                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Side-Nav-->
            <aside class="main-sidebar hidden-print ">
                <section class="sidebar" id="sidebar-scroll">
                    <!-- Sidebar Menu-->
                    <ul class="sidebar-menu">
                        <li class="treeview">
                         <center>  <a href="#" class="logo"><img class="img-fluid able-logo" src="assets/images/cap_logo.jpg" alt="Theme-logo"></a></center>
                        
                        </li>
                        <li class="treeview">
                            <a class="waves-effect waves-dark" href="control.php"> <i class="icon-speedometer"></i><span> Dashboard</span> </a>
                        </li>
                        
                        <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-briefcase"></i><span>Student Details</span><i class="icon-arrow-down"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="student_points.php" target="_blank" class="waves-effect waves-dark" href="accordion.html"><i class="icon-arrow-right"></i> Leaderboard</a></li>
                                <li><a href="student_section.php" target="_blank" class="waves-effect waves-dark" href="button.html"><i class="icon-arrow-right"></i> Section Wise Analysis</a></li>
                                <li><a class="waves-effect waves-dark" target="_blank" href="student_overview.php"><i class="icon-arrow-right"></i> Student Overview Table</a></li>
                                <li class=""><a class="waves-effect waves-dark" href="bootstrap-ui.html"><i class="icon-arrow-right"></i> Graphs</a></li>
                                <li class=""><a class="waves-effect waves-dark" href="student_exam.php"><i class="icon-arrow-right"></i>Add Marks</a></li>
                            </ul>
                        </li>
                        <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-book-open"></i><span> Faculty Details</span><i class="icon-arrow-down"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="faculty_daily.php" class="waves-effect waves-dark"><i class="icon-arrow-right"></i> Faculty Daily Analysis</a></li>
                                <li class=""><a href="faculty_monthly.php" class="waves-effect waves-dark"><i class="icon-arrow-right"></i>Faculty Monthly Analysis</a></li>
                                <li ><a href="add_faculty.php" class="waves-effect waves-dark"><i class="icon-arrow-right"></i>Add Faculty</a></li></ul>
                        </li>
                        <li class="active treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-chart"></i><span> Charts</span><i class="icon-arrow-down"></i></a>
                            <ul class="treeview-menu">
                               <li><a class="waves-effect waves-dark" href="student_data.php"><i class="icon-arrow-right"></i> Student Charts</a></li>
                              <li class="active"><a class="waves-effect waves-dark" href="faculty_data.php"><i class="icon-arrow-right"></i>Faculty Charts</a></li>
                                <li><a class="waves-effect waves-dark" href="student_import.php"><i class="icon-arrow-right"></i>Update Marks & Export</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
            </aside>
            <!-- Sidebar chat start -->
            <div class="content-wrapper">
                <!-- Container-fluid starts -->
                <div class="container-fluid">
                    <!-- Main content starts -->
                    <!-- Header starts -->
                  
                    <div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header">
                                <h4></h4> </div>
                        </div>
                    </div>
                    <!-- Header ends -->
                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            <div class="card dashboard-product"> <span>Faculty</span>
                                <h2 class="dashboard-total-products">
                                    <?php echo $value1; ?>
                                </h2> <span class="label label-warning">Logins</span>
                                <div class="side-box"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="card dashboard-product"> <span>Faculty</span>
                                <h2 class="dashboard-total-products">
                                    <?php echo $value2; ?>
                                </h2> <span class="label label-primary">Updations</span>
                                <div class="side-box ">  </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="card dashboard-product"> <span>Faculty</span>
                                <h2 class="dashboard-total-products"><span><?php echo $value3; ?></span></h2> <span class="label label-success">No Updations</span>
                                <div class="side-box">  </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="card dashboard-product"> <span>Faculty</span>
                                <h2 class="dashboard-total-products"><span><?php echo $value4; ?></span></h2> <span class="label label-success">No Logins</span>
                                <div class="side-box">  </div>
                            </div>
                        </div>
                    </div>
                  
                        
                        
                        

                       
                           
                             
                             
        </div>
            
                    <!-- Main content starts -->
                    <!-- Header starts -->
                    <div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header">
                            <h4></h4> 
                            
                            </div>
                        </div>
                    </div>
                    <!-- Header ends -->
                        <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-primary">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Faculty Details</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-$m  ">
                        <div class="card ">
                            <div class="table-wrapper-2">
                                <div class="content ">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Faculty Name</th>
                                            </tr>
                                        </thead>
                                        <?php
                                       $result=mysqli_query($conn,"select distinct `faculty` from faculty where `month`='$m'");
                                        if($result){
                                            $serialnumber=0;
                                            while($row=mysqli_fetch_array($result))
                                            {
                                                $serialnumber++;
                                          
                                         $f_name=$row['faculty'];
                                                
                                
                                        $result1=mysqli_query($conn,"select * from faculty_status where `f_name`='$f_name' and `login`='1' and `month`='$m'");
                                        $count1=mysqli_num_rows($result1);
                                       
                                        $result2=mysqli_query($conn,"select * from faculty_status where `f_name`='$f_name' and `Updated`='1' and `month`='$m'");
                                        $count2=mysqli_num_rows($result2);
                                        
                                        $result3=mysqli_query($conn,"select * from faculty_status where `f_name`='$f_name' and `NUpdations`='1' and `month`='$m'");
                                        $count3=mysqli_num_rows($result3);
                                     
                                        $result4=mysqli_query($conn,"select * from faculty_status where `f_name`='$f_name' and `Nlogin`='1' and `month`='$m'");
                                        $count4=mysqli_num_rows($result4);
                                        ?>


                                            <tbody>
                                                <tr style="font-size:15px">
                                                    <td>
                                                        <?php echo $serialnumber;?>                                    
                                                    </td>
                                      <td>
                                         <a href="faculty_chart.php?name=<?php echo $f_name; ?>" target="_blank">
                                                        <?php echo $f_name;?></a>
                                        </td>
                                                    <td>
                                                        <?php echo $count1;?>
                                                        
                                                    </td>
                                                    <td>
                                                        <?php echo $count2;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $count3;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $count4;?>
                                                    </td>
                                                     <?php
                                                         $result4=mysqli_query($conn,"UPDATE `faculty` SET `tln`='$count1',`tup`='$count2',`tnu`='$count3',`tnln`='$count4' where faculty='$f_name' and month='$m'");
                                                       ?>
                                                </tr>
                                            </tbody>
                                            <?php
            
                         }
                                        }

             ?>


                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        <!-- Required Jqurey -->
        <!-- Required Jqurey -->
        <script src="assets1/plugins/jquery/dist/jquery.min.js"></script>
        <script src="assets1/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets1/plugins/tether/dist/js/tether.min.js"></script>
        <!-- Required Fremwork -->
        <script src="assets1/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- waves effects.js -->
        <script src="assets1/plugins/Waves/waves.min.js"></script>
        <!-- Scrollbar JS-->
        <script src="assets1/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets1/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>
        <!--classic JS-->
        <script src="assets1/plugins/classie/classie.js"></script>
        <!-- notification -->
        <script src="assets1/plugins/notification/js/bootstrap-growl.min.js"></script>
        <!-- custom js -->
        <script type="text/javascript" src="assets1/js/main.min.js"></script>
        <script type="text/javascript" src="assets1/pages/accordion.js"></script>
        <script type="text/javascript" src="assets1/pages/elements.js"></script>
        <script src="assets1/js/menu.min.js"></script>
    </body>

    </html>