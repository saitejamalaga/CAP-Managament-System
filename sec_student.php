<?php
  
  include("header1.php");
  include("session1.php");
  include("db.php");
  
?>
<html>
<body>
    
    <div class="navbar navbar-inverse">

            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" style=color:white;>CAP Management System</a>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="panel panel-primary">

                <div class=" panel-heading">
                    <h3 class="panel-title">Student Details</h3>
                 <a class="btn btn-info pull-right" href="student_section.php" style="position:relative; bottom:25px;">Back</a>

                </div>

                <div class=" panel-body">
                    <div class="col-md-12 ">
                         <table class="table table-striped table-bordered">
                     
                    <thead class="bg-info">
                    <tr>
                        <th>Serial Number</th>
                        <th>Roll Number
                            <th>Student Name</th>
                            <th>CAP</th>
                    </tr>
                        </thead>

                    <?php 
              if($m=='07'){
                   $section=$_POST['date'];
                   $result=mysqli_query($conn,"select * from student where section='$section'");
                   $serialnumber=0;
			  while($row=mysqli_fetch_array($result))
			  {
				$serialnumber++;

			  ?>
                    <tr>
                        <td>
                            <?php echo $serialnumber; ?> </td>
                        <td>
                            <?php echo $row['student_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['roll_number']; ?>
                        </td>
                        <td class="bg-success">
                            <?php echo $row['points_d'];?> </td>

                    </tr>
                    <?php
			
			  }
              }
             else if($m=='08')
             {
                 $section=$_POST['date'];
                  $result=mysqli_query($conn,"select * from student where section='$section'");
                  $serialnumber=0;
                 while($row=mysqli_fetch_array($result))
              {
                $serialnumber++;

			  ?>
                        <tr>
                            <td>
                                <?php echo $serialnumber; ?> </td>
                            <td>
                                <?php echo $row['student_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['roll_number']; ?>
                            </td>
                            <td class="bg-success">
                                <?php echo $row['points_j'];?> </td>

                        </tr>
                        <?php
           
             }
         }
             else if($m=='09')
             {
                 $section=$_POST['date'];
                  $result=mysqli_query($conn,"select * from student where section='$section'");
                  $serialnumber=0;
              while($row=mysqli_fetch_array($result))
              {
                $serialnumber++;

			  ?>
                            <tr>
                                <td>
                                    <?php echo $serialnumber; ?> </td>
                                <td>
                                    <?php echo $row['student_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['roll_number']; ?>
                                </td>
                                <td class="bg-success">
                                    <?php echo $row['points_f'];?> </td>

                            </tr>
                            <?php
             }
         }
             else if($m=='10')
             {
                 $section=$_POST['date'];
                  $result=mysqli_query($conn,"select * from student where section='$section'");
                  $serialnumber=0;
              while($row=mysqli_fetch_array($result))
              {
                $serialnumber++;

			  ?>
                                <tr>
                                    <td>
                                        <?php echo $serialnumber; ?> </td>
                                    <td>
                                        <?php echo $row['student_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['roll_number']; ?>
                                    </td>
                                    <td class="bg-success">
                                        <?php echo $row['points_m'];?> </td>

                                </tr>
                                <?php
             }
         }
             else if($m=='11')
             {
                 $section=$_POST['date'];
                  $result=mysqli_query($conn,"select * from student where section='$section'");
                  $serialnumber=0;
              while($row=mysqli_fetch_array($result))
              {
                $serialnumber++;

			  ?>
                                    <tr>
                                        <td>
                                            <?php echo $serialnumber; ?> </td>
                                        <td>
                                            <?php echo $row['student_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['roll_number']; ?>
                                        </td>
                                        <td class="bg-success">
                                            <?php echo $row['points_a'];?> </td>

                                    </tr>
                                    <?php
             }}
             else{
                 
             }
             
			 
			 
		     

	  ?>
                             
                        </table>
                    </div>
                </div>
            </div>
    </div>
    </body>
    </html>
