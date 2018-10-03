<?php
  include("header1.php");
   include("session1.php");
  include("db.php");

?>
    <!DOCTYPE html>
    <html>

    <head>
        <style>
            * {
                box-sizing: border-box;
            }
            
            #myInput {
                background-image: url('/css/searchicon.png');
                background-position: 10px 10px;
                background-repeat: no-repeat;
                width: 100%;
                font-size: 16px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ddd;
                margin-bottom: 12px;
            }
            .bg-yellow{
                background:		#B19CD9;
            }
           
            .bg-brown{
                background: #A0522D;
                color: aliceblue;
               
            }
            .text-success{
                color:	#8B0000;
            }
            .table {
  border: 2px solid #000000;
}
.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
   border: 1px solid #000000;
    text-align: center;
    
}
            
        </style>
    </head>

    <body>
        <div class="" >
        <center><h2>Student Overview Table</h2></center>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Roll Numbers.." title="Type in a number">
        <div class1="">
                    <table id="myTable" class="table table-bordered table-responsive " >
                        <thead>
                        <tr class="bg-primary">
                             <th rowspan="2">Sl no</th>
                            <th rowspan="2">Roll Number</th>
                            <th rowspan="2" >Name</th>
                           
                            <th rowspan="2">Section </th>
                            <th rowspan="2">Character</th>
                            <th rowspan="2">Attitude</th>
                            <th rowspan="2">Dresscode</th>
                           
                            <th colspan="6">MID-1</th>
                            <th colspan="6">MID-2</th>
                            <th colspan="6">Unit Test-1</th>
                            <th colspan="6">Unit Test-2</th>
                            <th colspan="6">Grand Test</th>
                            
                            <th colspan="5">Points</th>
                        </tr>
                            
                        <tr class="bg-brown">
                             
                            <th>P&S</th>
                            <th>SE</th>
                            <th>CO</th>
                            <th>MPI</th>
                            <th>JAVA</th>
                            <th>FLAT</th>
                            
                            <th>P&S</th>
                            <th>SE</th>
                            <th>CO</th>
                            <th>MPI</th>
                            <th>JAVA</th>
                            <th>FLAT</th>
                            
                            <th>P&S</th>
                            <th>SE</th>
                            <th>CO</th>
                            <th>MPI</th>
                            <th>JAVA</th>
                            <th>FLAT</th>
                            
                            <th>P&S</th>
                            <th>SE</th>
                            <th>CO</th>
                            <th>MPI</th>
                            <th>JAVA</th>
                            <th>FLAT</th>
                            
                            <th>P&S</th>
                            <th>SE</th>
                            <th>CO</th>
                            <th>MPI</th>
                            <th>JAVA</th>
                            <th>FLAT</th>
                            
                            <th>December</th>
                            <th>January</th>
                            <th>Feburary</th>
                            <th>Month</th>
                            <th>April</th>

                        </tr>
                        </thead>
                        <?php 
                          
                            $result=mysqli_query($conn,"select * from student");
                            $serialnumber=0;
                            while($row=mysqli_fetch_array($result))
                            {
                                $serialnumber++;

                            ?>
                            <tr>
                                <td> <?php echo $serialnumber; ?> </td>
                                <td class="text-primary">
                                      <?php echo $row['roll_number']; ?>
                                </td>
                                <td>
                                    <?php echo $row['student_name']; ?>
                                </td>
                                 <td  class="text-success" style="font-size:13px;">
                                    <?php  echo $row['section'];?>
                                   
                                </td>
                                <td>
                                    <?php  echo $row['character']; ?>
                                </td>
                                <td>
                                    <?php  echo $row['attitude']; ?>
                                </td>
                                <td>
                                    <?php  echo $row['dresscode']; ?>
                                </td>
                                
                                <td class="bg-danger"> <?php  echo $row['m1/s1']; ?></td>
                                <td class="bg-danger"><?php  echo $row['m1/s2']; ?></td>
                                <td class="bg-danger"><?php  echo $row['m1/s3']; ?></td>
                                <td class="bg-danger"><?php  echo $row['m1/s4']; ?></td>
                                <td class="bg-danger"><?php  echo $row['m1/s5']; ?></td>
                                <td class="bg-danger"><?php  echo $row['m1/s6']; ?></td>
                                <td class="bg-info"> <?php  echo $row['m2/s1']; ?></td>
                                <td class="bg-info"><?php  echo $row['m2/s2']; ?></td>
                                <td class="bg-info"><?php  echo $row['m2/s3']; ?></td>
                                <td class="bg-info"><?php  echo $row['m2/s4']; ?></td>
                                <td class="bg-info"><?php  echo $row['m2/s5']; ?></td>
                                <td class="bg-info"><?php  echo $row['m2/s6']; ?></td>
                                <td class="bg-warning"> <?php  echo $row['u1/s1']; ?></td>
                                <td class="bg-warning"><?php  echo $row['u1/s2']; ?></td>
                                <td class="bg-warning"><?php  echo $row['u1/s3']; ?></td>
                                <td class="bg-warning"><?php  echo $row['u1/s4']; ?></td>
                                <td class="bg-warning"><?php  echo $row['u1/s5']; ?></td>
                                <td class="bg-warning"><?php  echo $row['u1/s6']; ?></td>
                               
                                <td class="bg-yellow"> <?php  echo $row['u2/s1']; ?></td>
                                <td class="bg-yellow"><?php  echo $row['u2/s2']; ?></td>
                                <td class="bg-yellow"><?php  echo $row['u2/s3']; ?></td>
                                <td class="bg-yellow"><?php  echo $row['u2/s4']; ?></td>
                                <td class="bg-yellow"><?php  echo $row['u2/s5']; ?></td>
                                <td class="bg-yellow"><?php  echo $row['u2/s6']; ?></td>
                               
                                <td class="bg-success"> <?php  echo $row['gt/s1']; ?></td>
                                <td class="bg-success"><?php  echo $row['gt/s2']; ?></td>
                                <td class="bg-success"><?php  echo $row['gt/s3']; ?></td>
                                <td class="bg-success"><?php  echo $row['gt/s4']; ?></td>
                                <td class="bg-success"><?php  echo $row['gt/s5']; ?></td>
                                <td class="bg-success"><?php  echo $row['gt/s6']; ?></td>
                                
                                
                                       
                            
                                  <td class="bg-warning"><?php echo $row['points_d'];?></td>
                                 <td class="bg-warning"><?php echo $row['points_j'];?></td>
                                  <td class="bg-warning"><?php echo $row['points_f'];?></td>
                              <td class="bg-warning"><?php echo $row['points_m'];?></td>
                            <td class="bg-warning"><?php echo $row['points_a'];?></td>
                                
                            </tr>
                            <?php
      
        }

       ?>
                    </table>
                </div>
        </div>
         
        <script>
            function myFunction() {
                var input, filter, table, tr, td, i;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        }
                        else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
    </body>

    </html>