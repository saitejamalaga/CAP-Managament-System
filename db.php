<?php
  
   $conn=mysqli_connect("localhost","root","","vtacap");//Connecting to database
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   } 
  
?>