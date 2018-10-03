<?php
// Array with names
include 'db.php';

// get the q parameter from URL
$q = $_REQUEST["q"];

$sql1=$conn->query("select `student_name` from `student` where `roll_number`='$q'");
$row=mysqli_fetch_array($sql1);
$hint=$row['student_name'];

// lookup all hints from array if $q is different from "" 

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>