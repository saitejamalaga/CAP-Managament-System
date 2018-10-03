<?php

$conn=mysqli_connect("localhost","root","","vtacap");
$SQL = "SELECT  * from `student`";
$header = '';
$result ='';
$exportData = mysqli_query($conn,$SQL ) or die ( "Sql error : " . mysql_error( ) );
$fields = mysqli_num_rows( $exportData );



if ($exportData)
  {
  // Get field information for all fields

     for ( $i = 0; $i < $fields; $i++ ){

    $header .= mysqli_fetch_field($exportData). "\t";


     }
}
 


?>