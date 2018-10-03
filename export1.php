<?php  

include 'db.php';
include 'session.php';
date_default_timezone_set('Asia/Kolkata');
$date=date('d-m-Y ');

$startDate = strtotime($date); 
$m= date('m', $startDate);

$mons = array(1 => "January", 2 => "February", 03 => "March", 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "Septmeber", 10 => "October", 11 => "November", 12 => "December");
$dat = getdate();
$month = $dat['mon'];
$month_name= $mons[$month];







if(isset($_POST['syllabus']))
{
 
  
$setSql = "SELECT `fname`, `sub`, `sec`, `given`, `covered`, `units` FROM `syllabus` WHERE `fname`!='admin'";  
$setRec = mysqli_query($conn, $setSql);  
  
$columnHeader = '';  
$columnHeader = "Faculty_Name" . "\t" . "Subject" . "\t" . "Section" . "\t". "Given" . "\t". "Covered" . "\t". "Units" . "\t";  
  
$setData = '';  
  
while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Syllabus_report_$date.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
} 



if(isset($_POST['faculty']))
{
 
  
$setSql = "SELECT `faculty`, `tln`, `tup`, `tnu`, `tnln` FROM `faculty` WHERE `faculty`!='admin' AND `month`='$m'";  
$setRec = mysqli_query($conn, $setSql);  
  
$columnHeader = '';  
$columnHeader = "Faculty_Name" . "\t" . "Logins" . "\t" . "Updations" . "\t". "No_Updations" . "\t". "Not_Logins" . "\t";  
  
$setData = '';  
  
while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Faculty_report_$month_name.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
} 
  


if(isset($_POST['student']))
{
 
  
$setSql = "SELECT `roll_number`,`student_name`, `section`,`character`,`attitude`,`dresscode`,`points_d`, `points_j`, `points_f`, `points_m`, `points_a`,`year` FROM `student` ORDER By `year`";  
$setRec = mysqli_query($conn, $setSql);  
  
$columnHeader = '';  
$columnHeader = "Roll_Number" . "\t" . "Student_Name" . "\t" . "Section" . "\t". "Character" . "\t". "Attitude" . "\t". "Performance" . "\t". "1st Month" . "\t". "2nd Month" . "\t". "3rd Month" . "\t". "4th Month" . "\t". "5th Month" . "\t". "year" . "\t";  
  
$setData = '';  
  
while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Student_Report_$month_name.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
} 
?>  