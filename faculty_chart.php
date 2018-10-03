<?php
   include("header1.php");
   include("session.php");
   include('db.php');


  $name1=$_GET['name'];
  
  $res1=mysqli_query($conn,"SELECT * FROM `faculty` WHERE (faculty='$name1' and month='06')");
                     while($row=mysqli_fetch_array($res1))
          { 
                              
                                $tln_j= $row['tln'];
                                $tup_j= $row['tup'];
                                $tnup_j=$row['tnu'];
                                $tnln_j=$row['tnln']; 

          }
        $res2=mysqli_query($conn,"SELECT * FROM `faculty` WHERE (faculty='$name1' and month='07')");
                     while($row=mysqli_fetch_array($res2))
          { 
                              
                                $tln_f= $row['tln'];
                                $tup_f= $row['tup'];
                                $tnup_f=$row['tnu'];
                                $tnln_f=$row['tnln']; 

          }
           $res3=mysqli_query($conn,"SELECT * FROM `faculty` WHERE (faculty='$name1' and month='08')");
                     while($row=mysqli_fetch_array($res3))
          { 
                              
                                $tln_m= $row['tln'];
                                $tup_m= $row['tup'];
                                $tnup_m=$row['tnu'];
                                $tnln_m=$row['tnln']; 
          }
           $res4=mysqli_query($conn,"SELECT * FROM `faculty` WHERE (faculty='$name1' and month='09')");
                     while($row=mysqli_fetch_array($res4))
          { 
                              
                                $tln_a= $row['tln'];
                                $tup_a= $row['tup'];
                                $tnup_a=$row['tnu'];
                                $tnln_a=$row['tnln']; 

          }
      
              

 
?>
<html>
  <head>




     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
       <div id="chart_div" style="width: 900px; height: 500px;"></div>   
      
    <script type="text/javascript">
      
       google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Month', 'Logins', 'Updations', 'No_updations', 'No Logins'],
         ['January',  <?php echo $tln_j ?>,<?php echo $tup_j?>,<?php echo $tnup_j?>,<?php echo $tnln_j?> ],
         ['February',  <?php echo $tln_f ?>,<?php echo $tup_f?>,<?php echo $tnup_f?>,<?php echo $tnln_f?> ],
         ['March', <?php echo $tln_m ?>,<?php echo $tup_m?>,<?php echo $tnup_m?>,<?php echo $tnln_m?> ],
         ['April',<?php echo $tln_a ?>,<?php echo $tup_a?>,<?php echo $tnup_a?>,<?php echo $tnln_a?> ]
      ]);

    var options = {
      title : 'Total Anaysis for <?php echo $name1;?>',
      vAxis: {title: 'Status'},
      hAxis: {title: 'Month'},
      seriesType: 'bars',
      series: {5: {type: 'line'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
      
      
      </script>   
    
  </head>
  <body>
    
     <div id="chart_div" style="width: 900px; height: 500px;"></div>
    
  </body>
</html>
