<?php 
include 'db.php';
include 'session.php';
if(isset($_POST['submit']))
{

 require_once('./include/mysqli_connect.php');

 header("Content-Disposition: attachment; filename='Syllabus.xls'");

 header("Content-Type: application/vnd.ms-excel");

function dataFilter(&$str_val)
{
	$str_val = preg_replace("/\t/", "\\t", $str_val);
	$str_val = preg_replace("/\r?\n/", "\\n", $str_val);
	if(strstr($str_val, '"')) $str_val = '"' . str_replace('"', '""', $str_val) . '"';
}

$post_list = array();

//get rows query
$query = mysqli_query($con, "SELECT * FROM syllabus WHERE `fname`!='admin'");

//number of rows
$rowCount = mysqli_num_rows($query);

$sno = 1;
if($rowCount > 0){
	while($row = mysqli_fetch_array($query)){
		$post_list[] = array( "Faculty_Name"=>$row[0],  "Subject"=>$row[1],  "Section"=>$row[2],  "Given"=>$row[3],  "Covered"=>$row[4],  "Units"=>$row[5] );
		$sno++;
	}
}


$title_flag = false;
foreach($post_list as $post) {
	if(!$title_flag) {
		// Showing column names 
		echo implode("\t", array_keys($post)) . "\n";
		$title_flag = true;
	}
	// data filtering
	array_walk($post, 'dataFilter');
	echo implode("\t", array_values($post)) . "\n";

}
}

?>