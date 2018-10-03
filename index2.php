<?php
  
  //include("header.php");
  include("db.php");
  include("session.php");

  date_default_timezone_set('Asia/Kolkata');
$date=date('d-m-Y ');
$startDate = strtotime($date); 
$m= date('m', $startDate); 
$d= date('d', $startDate);  
$day=date('l');


$mons = array(1 => "January", 2 => "February", 03 => "March", 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "Septmeber", 10 => "October", 11 => "November", 12 => "December");
$dat = getdate();
$month = $dat['mon'];
$month_name= $mons[$month];

  $flag=0;  // To display Messgae of Success
  $flag1=0;  // To display Message of No Updations
  $flag2=0;   // To display Message of Selecting any option
  $date1=date('Y-m-d');

  $sec=isset($_POST['sec']) ? $_POST['sec'] : '';
  $per=isset($_POST['per']) ? $_POST['per'] : '';
  $date2=isset($_POST['dat']) ? $_POST['dat'] : '';



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
     else if($month=='12')
    {
        $var='points_a';
        return $var;
    }
    else{
        
    }
  }
  if(isset($_POST['submit']))
  {
      
      
          
	  
         $date1=isset($_POST['date']) ? $_POST['date'] : '';
         $sec1=isset($_POST['section']) ? $_POST['section'] : '';
         $per1=isset($_POST['period']) ? $_POST['period'] : '';
       
		  $array=isset($_POST['character_status']) ? $_POST['character_status'] : '';//For Checking whether any checkbox has been clicked ...if Yes the $ array will																				be ture and else if will be executed.
	    $array1=isset($_POST['attitude_status']) ? $_POST['attitude_status'] : '';
		  $array2=isset($_POST['dresscode_status']) ? $_POST['dresscode_status'] : '';
	   
	      $null=isset($_POST['no_updations']) ? $_POST['no_updations'] : '';//Checking Whether No Updations has been clicked or not..if yes the if will be executed .
                         
	      if($null)
        {
             
              if($per1)
              {
                  $test0=mysqli_query($conn,"UPDATE `faculty_status` SET `NUpdations`='1',`status`='1' WHERE `f_name`='$name' and `date`='$date1' and `month`='$m' and `period`='$per1'");
              }
              else
              {

                  
              }
             //Faculty status will be                                       updated
              
      if($test0)//Display Message of No Updations were made
        {
                
                
        $flag1=1;
        }
        }  
        else if($array1||$array2||$array)
        {
              
              
            if($per1)
              {
                  $test11=mysqli_query($conn,"UPDATE `faculty_status` SET `Updated`='1',`NUpdations`='0',`status`='1' WHERE `f_name`='$name' and `date`='$date1' and `month`='$m' and `period`='$per1' and `section`='$sec1'");
                  
              }
              else
              {
                  
              } 																											
				if($test11)//Display Message of No Updations were made
		        {
				 $flag=1;
		        }
				
	      }
	      else{
			$flag2=1;
        }

	     try{
		   
		       if($array){
       	       foreach($_POST['character_status'] as $id=>$character_status)
	           {
		            $student_name=$_POST['student_name'][$id];
		            $roll_number=$_POST['roll_number'][$id]; 
		         
	                $result=mysqli_query($conn,"insert into  cap_status(student_name,roll_number,attendance_status,date,month) values('$student_name','$roll_number','$character_status','$date1','$m')");
		            if($result)
		            {
			            
                        $month=calculate($m);
						$res=mysqli_query($conn,"SELECT `$month`,`character` FROM `student` WHERE student_name='$student_name'");
						while($row=mysqli_fetch_array($res))
						{
                            if($m=='07')
                            {
                                  $points= $row['points_d'];
                                  $change=$row['character'];
                            }
                            else if($m=='08')
                            {
                                $points=$row['points_j'];
                                 $change=$row['character'];
                            }
                            else if($m=='09')
                            {
                                $points=$row['points_f'];
                                 $change=$row['character'];
                            }
                            else if($m=='10')
                            {
                                $points=$row['points_m'];
                                 $change=$row['character'];
                            }
                            else if($m=='12')
                            {
                                $points=$row['points_a'];
                                 $change=$row['character'];
                            }
                            else
                            {
                                
                            }
						}
						$points=$points-1;
                        $change=$change-1;
						$res1= mysqli_query($conn," UPDATE `student` SET `$month`='$points',`character`='$change' WHERE student_name='$student_name'");
					}//if
	           }//for
		     }//if
         }//try block
         catch (Exception $e) {}
	  
	   try{
		
		        if($array1){
		        foreach($_POST['attitude_status'] as $id=>$attitude_status)
	             {
					$student_name=$_POST['student_name'][$id];
					$roll_number=$_POST['roll_number'][$id];		   
				 
					 $result=mysqli_query($conn,"insert into cap_status(student_name,roll_number,attendance_status,date,month) values('$student_name','$roll_number','$attitude_status','$date1','$m')");
					if($result)
					{
						$flag=1;
                         $month=calculate($m);
						$res=mysqli_query($conn,"SELECT `$month`,`attitude` FROM `student` WHERE student_name='$student_name'");
						while($row=mysqli_fetch_array($res))
						{
							 if($m=='07')
                            {
                                  $points= $row['points_d'];
                                  $change=$row['attitude'];
                            }
                            else if($m=='08')
                            {
                                $points=$row['points_j'];
                                 $change=$row['attitude'];
                            }
                            else if($m=='09')
                            {
                                $points=$row['points_f'];
                                 $change=$row['attitude'];
                            }
                            else if($m=='10')
                            {
                                $points=$row['points_m'];
                                  $change=$row['attitude'];
                            }
                            else if($m=='12')
                            {
                                $points=$row['points_a'];
                                $change=$row['attitude'];
                            }
                            else
                            {
                                
                            }
						}
						$points=$points-1;
                        $change=$change-1;
						$res1= mysqli_query($conn," UPDATE `student` SET `$month`='$points',`attitude`='$change' WHERE student_name='$student_name'");
					}//if
				}//try
			}//if
      }//try block
     catch (Exception $e) {}
	
	 try{
	
			if($array2){
			foreach($_POST['dresscode_status'] as $id=>$dresscode_status)
			{
				$student_name=$_POST['student_name'][$id];
				$roll_number=$_POST['roll_number'][$id]; 
				  				 
			  $result=mysqli_query($conn,"insert into cap_status(student_name,roll_number,attendance_status,date,month) values('$student_name','$roll_number','$dresscode_status','$date1','$m')");
				if($result)
				{
					$flag=1;
                     $month=calculate($m);
					$res=mysqli_query($conn,"SELECT `$month`,`dresscode` FROM `student` WHERE student_name='$student_name'");
					while($row=mysqli_fetch_array($res))
					{
						 if($m=='07')
                            {
                                  $points= $row['points_d'];
                                  $change=$row['dresscode'];
                            }
                            else if($m=='08')
                            {
                                $points=$row['points_j'];
                                 $change=$row['dresscode'];
                            }
                            else if($m=='09')
                            {
                                $points=$row['points_f'];
                                 $change=$row['dresscode'];
                            }
                            else if($m=='10')
                            {
                                $points=$row['points_m'];
                                  $change=$row['dresscode'];
                            }
                            else if($m=='12')
                            {
                                $points=$row['points_a'];
                                 $change=$row['dresscode'];
                            }
                            else
                            {
                                
                            }
						}
						$points=$points-1;
                        $change=$change-1;
						$res1= mysqli_query($conn," UPDATE `student` SET `$month`='$points',`dresscode`='$change' WHERE student_name='$student_name'");
				}//if
			}//for
		}//if
	}//try block
	catch (Exception $e) {}
   
 }//isset
?>
    <!-- Displaying Date-->
    <html>

    <head>
      
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!--<link rel="stylesheet" type="text/css" href="assets/css/newt.css">    -->
<!--checkboxescss-->
<link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
        <title>Index</title>
    </head>

    <body>

        <!--Displaying Heading-->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                <center>CAP MANAGMENT SYSTEM</center>
                    </a>

                </div>
            </div>
        </nav><br>

        <!--Displaying date and back button-->
        <div class="panel panel-success">

            <div class=" panel panel-heading  ">
                <div class="panel-tittle ">
                    <center>Date:
                        <?php echo date("d-m-y"); ?>
                    </center>
                </div>

                <a class="btn btn-warning pull-right" href="dashboard.php" style="position:relative; bottom:25px;">Back</a>
                <!--Back button used to go back-->
            </div>

            <!-- Displaying Bloack Module-->
            <!--Displaying Messages onclick of submit button-->
            <div>

        
      <?php
    
            if($flag) { 
                echo "<script type=\"text/javascript\">window.alert('Thank You !!Updated Sucessfully.');
                    window.location.href = 'dashboard.php';</script>"; 
        
        
        
        } 
    
    
        else if($flag1) {

                    echo "<script type=\"text/javascript\">window.alert('Thank You !!No Updations were made.');
                    window.location.href = 'dashboard.php';</script>"; 
                }
    
      else{
          }
      
    
    ?>


                    <?php if($flag2) { 
    
                     echo "<script type=\"text/javascript\">window.alert('Please Select any option.');</script>"; 
                            
                   } ?>

            </div>

            <!--Displaying Table-->
            

                                <form action="index1.php" method="POST">
                                    <!--Table for displaying data of students for the purpose of storing values -->
                                   <div class="card border-light">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card-body">
                    <table class="table table-bordered table-hover">


                                            <tr class="r th">
                                                <th>Serial Number</th>
                                                <th>Roll Number
                                                    <th>Student Name</th>
                                                    <th>CAP</th>
                                            </tr>
                      <input type="hidden" name="section" value="<?php echo $sec ;?>">
                      <input type="hidden" name="period" value="<?php echo $per ;?>">    <input type="hidden" name="date" value="<?php echo $date2 ;?>">
                                         

                                            <?php 
                                if($sec)
                                {
                                         $res3=mysqli_query($conn,"SELECT `section` from `faculty_status` where f_name='$name' and date='$date2' and period='$per' and section='$sec'");
                                }
                                else if($sec1){
                                         $res3=mysqli_query($conn,"SELECT `section` from `faculty_status` where f_name='$name' and date='$date1' and period='$per1' and section='$sec1'");
                                    
                                }
                                else{
                                     echo "<script type=\"text/javascript\">window.location.href = 'dashboard.php';</script>";
                                }
                           
                                while($row=mysqli_fetch_array($res3)){
                                $section=$row['section'];
                                    
                                $result=mysqli_query($conn,"select * from student  where section='$section'");
                   
                              if($result){
                                    }
					            $serialnumber=0;
					            $counter=0; $counter1=0; $counter2=0;   //Used in arrays
					            while($row=mysqli_fetch_array($result))
			                    {
					               	$serialnumber++;

					             ?>

                                            <tr class=" tr th">

                                                <td>
                                                    <?php echo $serialnumber; ?> </td>

                                                <td>
                                                    <a class="a" href="individual.php?name=<?php echo $row['student_name']; ?>" target="_blank">
                                                        <?php echo $row['student_name']; ?> </a>
                                                    <input type="hidden" value="<?php echo $row['student_name']; ?>" name="student_name[]">
                                                </td>

                                                <td>
                                                    <?php echo $row['roll_number']; ?>
                                                    <input type="hidden" value="<?php echo $row['roll_number']; ?>" name="roll_number[]">
                                                </td>

                                                <td>
                                                    <div class="pretty p-default p-curve p-pulse">
                                                        <input type="checkbox" name="character_status[<?php echo $counter; ?>]" value="Character">
                                                        <div class="state p-success-o"> <label>Dress Code</label></div>
                                                    </div>
                                                    <div class="pretty p-default p-curve p-pulse">
                                                        <input type="checkbox" name="attitude_status[<?php echo $counter1; ?>]" value="Attitude">
                                                        <div class="state p-info-o"> <label>Behaviour</label></div>
                                                    </div>
                                                    <div class="pretty p-default p-curve p-pulse">
                                                        <input type="checkbox" name="dresscode_status[<?php echo $counter2; ?>]" value="Dresscode">
                                                        <div class="state p-warning-o"> <label>Punctuality</label></div>
                                                    </div>
                                                </td>


                                            </tr>

                                            <?php
				
				  $counter++;
			      $counter1++;
				  $counter2++;
			   ?>

                                                <?php }
                              }
			    ?>

                                        </table>
                                        <!--For Submit Button-->
                                        <div class="">
                                            <div class="pretty p-default p-curve p-pulse ">
                                                <input type="checkbox" name="no_updations" value="1">
                                                <div class="state p-success-o">
                                                    <label class="lbl">No Updations Are there</label>
                                                    <!--No Updations Checkbox-->
                                                </div>
                                            </div>
                                            <input type="submit" name="submit" value="submit" class=" btn btn-success pull-right" >
                                            <!--Submit Button-->
                                        </div>
                                    </div>



                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </body>

    </html>
