<?php
  include("header1.php");
  include("session1.php");
  include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
      <link rel="stylesheet" type="text/css" href="assets/css/week.css">
  </head>	
<body>


<section>
  <!--for demo wrap-->
  <h1>Section Wise Analysis</h1>
  <div class="tbl-header">
    
	 <table cellpadding="0" cellspacing="0" border="0">
       <thead>
        <tr>
          <th>Serial Number</th>
          <th>Section</th>
          <th></th>
        </tr>
      </thead>
    </table>

  </div>
  
  <div class="tbl-content">
   
	<table cellpadding="0" cellspacing="0" border="0">

	  <?php $result=mysqli_query($conn,"select distinct section from student order by section");
			  $serialnumber=0;
			  while($row=mysqli_fetch_assoc($result))
			  {
				$serialnumber++;

			  ?>
      <tbody>
        <tr>
         
		  <td> <?php echo $serialnumber; ?> </td>
			     <td> <?php echo $row['section']; ?></td>
			 	 <td>
                    <form method="post" action="sec_student.php">
						<input type="hidden" name="date" value="<?php echo $row['section']; ?>">
					    <input type="submit" name="submit" value="Open" class="btn btn-primary">
                    </form>
				 </td>
          
        </tr>   
      </tbody>
	       <?php
			
			  }

			 ?>
   </table>
    </div>
</section>
 </body> 
 </html>