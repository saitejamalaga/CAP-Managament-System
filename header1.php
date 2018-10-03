<?php

date_default_timezone_set('Asia/Kolkata');
$date=date('d-m-Y ');

//$date=date('30-08-2018');
$startDate = strtotime($date); 
$m= date('m', $startDate);
 
$d= date('d', $startDate);  
$day=date('l');


$mons = array(1 => "January", 2 => "February", 03 => "March", 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "Septmeber", 10 => "October", 11 => "November", 12 => "December");
$dat = getdate();
$month = $dat['mon'];
$month_name= $mons[$month];


?>

<html>
 <head>
 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

     
<!--checkboxescss-->
<link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
     
 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <!-- Latest compiled JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>



</html>