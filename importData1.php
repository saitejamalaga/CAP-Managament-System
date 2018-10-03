<?php
//load the database configuration file
include 'db.php';
include 'session1.php';
include 'header.php';

if(isset($_POST['importSubmit'])){
    $exam=$_POST['select'];
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    

     if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            
            //parse data from csv file line by line

           while(($line=fgetcsv($csvFile))){
                //check whether member already exists in database with same email
                
                
           
               
         if($exam=='stu'){
                    
           $sql1 = "INSERT INTO `student`(`roll_number`, `student_name`, `section`) VALUES ('$line[0]','$line[1]','$line[2]')";
           $result=mysqli_query($conn,$sql1);

         }
        elseif ($exam=='log') {

         $pas=$line[2];
         $password_hs=md5($pas);
         
 		
         $log = "INSERT INTO `login`(`name`, `username`, `password`) VALUES ('$line[0]','$line[1]','$password_hs')";
         $result=mysqli_query($conn,$log);
          
         $sql1 = "INSERT INTO `faculty`(`faculty`, `tln`, `tup`, `tnu`, `tnln`, `month`) VALUES ('$line[0]','0','0','0','0','06')";
         $result=mysqli_query($conn,$sql1);
           
         $sql2 = "INSERT INTO `faculty`(`faculty`, `tln`, `tup`, `tnu`, `tnln`, `month`) VALUES ('$line[0]','0','0','0','0','07')";
         $result=mysqli_query($conn,$sql2);
          
         $sql3 = "INSERT INTO `faculty`(`faculty`, `tln`, `tup`, `tnu`, `tnln`, `month`) VALUES ('$line[0]','0','0','0','0','08')";
         $result=mysqli_query($conn,$sql3);
            
         $sql4 = "INSERT INTO `faculty`(`faculty`, `tln`, `tup`, `tnu`, `tnln`, `month`) VALUES ('$line[0]','0','0','0','0','09')";
         $result=mysqli_query($conn,$sql4);

         $sql5 = "INSERT INTO `faculty`(`faculty`, `tln`, `tup`, `tnu`, `tnln`, `month`) VALUES ('$line[0]','0','0','0','0','10')";
         $result=mysqli_query($conn,$sql5);
         }
         elseif ($exam="time") {

         $log= "INSERT INTO `timetable`(`Day`, `Class`, `Period`, `Faculty`, `section`) VALUES ('$line[0]','$line[1]','$line[2]','$line[3]','$line[4]')";
         $result=mysqli_query($conn,$log);
         }
         elseif ($exam="sat") {

         $log= "INSERT INTO `timetable`(`Day`, `Class`, `Period`, `Faculty`, `section`) VALUES ('$line[0]','$line[1]','$line[2]','$line[3]','$line[4]')";
         $result=mysqli_query($conn,$log);
         }
         else{
                    //insert member data into database
                   echo "Student Entry Not found";
            }
            }

            //close opened csv file
            fclose($csvFile);
        
            $qstring = '?status=succ';
         }else{
            $qstring = '?status=err';
         }
    }else{
        $qstring = '?status=invalid_file';
    }
}

header("location: student_import.php".$qstring);
?>
