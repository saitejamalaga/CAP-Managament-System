<?php
  include("header1.php");
  include("session1.php");
  include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="assets/css/lead1.css">
  </head>	
<body>
 <h1><span class="blue">&lt;</span>Student<span class="blue">&gt;</span> <span class="yellow">Leaderboard</span></h1>
          <h2>For The Month Of <a href=""><?php echo $month_name;?></a></h2>

   <table class="container" >
	
	 <thead>
		<tr>
		    <th><h1>Serial Number</h1></th>
			<th><h1>Student name</h1></th>
			<th><h1>Roll Number</h1></th>
            <th><h1>Character</h1></th>
            <th><h1>Attitude</h1></th>
            <th><h1>Performance</h1></th>
			<th><h1>Points</h1></th>
		</tr>
	 </thead>
	
	 <tbody>

	  
		 <?php 
             if($m=='07')
             {
                  $result=mysqli_query($conn,"select * from student order by `points_d` DESC");
                    $serialnumber=0;
			   while($row=mysqli_fetch_array($result))
			   {
				$serialnumber++;

			    

			  ?>
		<tr>
			    <td> <?php echo $serialnumber; ?> </td>
			    <td> <?php echo $row['student_name']; ?></td>
			    <td> <?php echo $row['roll_number']; ?></td>
                <td> <?php echo $row['character'] ?> </td>
			    <td> <?php echo $row['attitude']; ?></td>
			    <td> <?php echo $row['dresscode']; ?></td>
 			    <td> <?php echo $row['points_d'];?> </td>
            
		</tr>
          <?php
           
             }
            }
             else if($m=='08')
             {
                  $result=mysqli_query($conn,"select * from student order by points_j DESC");
                   $serialnumber=0;
			   while($row=mysqli_fetch_array($result))
			   {
				$serialnumber++;

			    

			  ?>
		<tr>
			    <td> <?php echo $serialnumber; ?> </td>
			    <td> <?php echo $row['student_name']; ?></td>
			    <td> <?php echo $row['roll_number']; ?></td>
                <td> <?php echo $row['character'] ?> </td>
			    <td> <?php echo $row['attitude']; ?></td>
			    <td> <?php echo $row['dresscode']; ?></td>
 			    <td> <?php echo $row['points_j'];?> </td>
            
		</tr>
          <?php
             }
         }
             else if($m=='09')
             {
                  $result=mysqli_query($conn,"select * from student order by points_f DESC");
                   $serialnumber=0;
			   while($row=mysqli_fetch_array($result))
			   {
				$serialnumber++;

			    

			  ?>
		<tr>
			    <td> <?php echo $serialnumber; ?> </td>
			    <td> <?php echo $row['student_name']; ?></td>
			    <td> <?php echo $row['roll_number']; ?></td>
                <td> <?php echo $row['character'] ?> </td>
			    <td> <?php echo $row['attitude']; ?></td>
			    <td> <?php echo $row['dresscode']; ?></td>
 			    <td> <?php echo $row['points_f'];?> </td>
            
		</tr>
          <?php
             }
         }
             else if($m=='10')
             {
                  $result=mysqli_query($conn,"select * from student order by points_m DESC");
                  $serialnumber=0;
			   while($row=mysqli_fetch_array($result))
			   {
				$serialnumber++;

			  ?>
		<tr>
			    <td> <?php echo $serialnumber; ?> </td>
			    <td> <?php echo $row['student_name']; ?></td>
			    <td> <?php echo $row['roll_number']; ?></td>
                <td> <?php echo $row['character'] ?> </td>
			    <td> <?php echo $row['attitude']; ?></td>
			    <td> <?php echo $row['dresscode']; ?></td>
 			    <td> <?php echo $row['points_m'];?> </td>
            
		</tr>
          <?php
             }
         }
             else if($m=='11')
             {
                  $result=mysqli_query($conn,"select * from student order by points_a DESC");
                  $serialnumber=0;
			   while($row=mysqli_fetch_array($result))
			   {
				$serialnumber++;

			  ?>
		<tr>
			    <td> <?php echo $serialnumber; ?> </td>
			    <td> <?php echo $row['student_name']; ?></td>
			    <td> <?php echo $row['roll_number']; ?></td>
            <td> <?php echo $row['character'] ?> </td>
			    <td> <?php echo $row['attitude']; ?></td>
			    <td> <?php echo $row['dresscode']; ?></td>
 			    <td> <?php echo $row['points_a'];?> </td>
            
		</tr>
          <?php
             }
         }
             else{
                 
             }
      

	  ?>		 
		
	 </tbody>

    </table>
 </body> 
 </html>