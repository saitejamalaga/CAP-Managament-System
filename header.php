<?php

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


?>
