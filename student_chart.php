<?php
   include("header1.php");
   include('db.php');
   include 'session1.php';


   $name1=$_GET['name'];
  
  $res1=mysqli_query($conn,"SELECT * FROM `student` WHERE student_name='$name1'");

          while($row=mysqli_fetch_array($res1))
          {                              
                                $jan=$row['points_j'];
                                $feb=$row['points_f'];
                                $mar=$row['points_m'];
                                $apr=$row['points_a'];
          }         
?>
<html>
  <head> 
     
    
  </head>
  <body>
    
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript">
      
       google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

        google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Name', 'January', 'February', 'March', 'April'],
         ['POINTS',<?php echo $jan; ?>, <?php echo $feb; ?>,<?php echo $mar; ?>,<?php echo $apr; ?>]
      ]);

    var options = {
      title : 'Student Analysis ',
      vAxis: {title: 'Points'},
      hAxis: {title: 'Month'},
      seriesType: 'bars',
      series: {5: {type: 'line'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
      
      
      </script> 
       <div id="chart_div" style="width: 900px; height: 500px;"></div>
    
  </body>
</html>
