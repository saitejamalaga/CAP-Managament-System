<?php
//load the database configuration file
include 'db.php';
include 'session1.php';
include 'header1.php';


function calculate($month,$m,$roll,$sum,$conn)
{

    if($month=='07')
    { 
        $sqli="select `points_d` from `student` where roll_number='$roll'";
        $result=mysqli_query($conn,$sqli);
        while ($row=mysqli_fetch_array($result))
        {
            $points=$row['points_d'];
        }
         echo $points;
        $points=$points+$sum;
        echo $points;
        $sql3="UPDATE `student` SET `points_d`='$points' where roll_number='$roll'";
        $result1=mysqli_query($conn,$sql3);
    }
    else if($month=='08')
    {
        $sqli="select `points_j` from `student` where roll_number='$roll'";
        $result=mysqli_query($conn,$sqli);
        while ($row=mysqli_fetch_array($result))
        {
            $points=$row['points_j'];
        }
        $points=$points+$sum;
        $sql3="UPDATE `student` SET `points_j`='$points' where roll_number='$roll'";
        $result1=mysqli_query($conn,$sql3);
    }
    else if($month=='09')
    {
        $sqli="select `points_f` from `student` where roll_number='$roll'";
        $result=mysqli_query($conn,$sqli);
        while ($row=mysqli_fetch_array($result))
        {
            $points=$row['points_f'];
        }
        $points=$points+$sum;
        $sql3="UPDATE `student` SET `points_f`='$points' where roll_number='$roll'";
        $result1=mysqli_query($conn,$sql3);
    }
    else if($month=='10')
    {
      $sqli="select `points_m` from `student` where roll_number='$roll'";
        $result=mysqli_query($conn,$sqli);
        while ($row=mysqli_fetch_array($result))
        {
            $points=$row['points_m'];
        }
        $points=$points+$sum;
        $sql3="UPDATE `student` SET `points_m`='$points' where roll_number='$roll'";
        $result1=mysqli_query($conn,$sql3);
    }
     else if($month=='11')
    {
       $sqli="select `points_a` from `student` where roll_number='$roll'";
        $result=mysqli_query($conn,$sqli);
        while ($row=mysqli_fetch_array($result))
        {
            $points=$row['points_a'];
        }
        $points=$points+$sum;
        $sql3="UPDATE `student` SET `points_a`='$points' where roll_number='$roll'";
        $result1=mysqli_query($conn,$sql3);
    }
    else{
        
    }
}

if(isset($_POST['importSubmit'])){
     $exam=$_POST['select'];
    $month=$_POST['month'];
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                //check whether member already exists in database with same email
                $sql1 = "SELECT * FROM student WHERE roll_number='$line[0]'";
                $result=mysqli_query($conn,$sql1);

                 if($result->num_rows > 0){

                        if($exam=='m1'){
                    
                     $sql = "UPDATE `student` SET `m1/s1`='$line[1]',`m1/s2`='$line[2]',`m1/s3`='$line[3]',`m1/s4`='$line[4]',`m1/s5`='$line[5]',`m1/s6`='$line[6]',`p1`='$line[7]',`p2`='$line[8]',`p3`='$line[9]',`p4`='$line[10]',`p5`='$line[11]',`p6`='$line[12]' where roll_number='$line[0]'";
                    
                      $result=mysqli_query($conn,$sql);
                      $sum=$line[7]+$line[8]+$line[9]+$line[10]+$line[11]+$line[12];   
                    
                      $var=calculate($month,$m,$line[0],$sum,$conn);                     
                    
                
            
                }
                else if($exam=='m2')
                {
                    
                    
                     $sql = "UPDATE `student` SET `m2/s1`='$line[1]',`m2/s2`='$line[2]',`m2/s3`='$line[3]',`m2/s4`='$line[4]',`m2/s5`='$line[5]',`m2/s6`='$line[6]',`p1`='$line[7]',`p2`='$line[8]',`p3`='$line[9]',`p4`='$line[10]',`p5`='$line[11]',`p6`='$line[12]' where roll_number='$line[0]'";
                     $result=mysqli_query($conn,$sql);
                     $sum=$line[7]+$line[8]+$line[9]+$line[10]+$line[11]+$line[12];   
                     $var=calculate($month,$m,$line[0],$sum,$conn);
                     
                     
                }
                else if($exam=='u1')
                {
                    
                     $sql = "UPDATE `student` SET `u1/s1`='$line[1]',`u1/s2`='$line[2]',`u1/s3`='$line[3]',`u1/s4`='$line[4]',`u1/s5`='$line[5]',`u1/s6`='$line[6]',`p1`='$line[7]',`p2`='$line[8]',`p3`='$line[9]',`p4`='$line[10]',`p5`='$line[11]',`p6`='$line[12]'  where roll_number='$line[0]'";
                     $result=mysqli_query($conn,$sql);
                     $sum=$line[7]+$line[8]+$line[9]+$line[10]+$line[11]+$line[12];   
                     $var=calculate($month,$m,$line[0],$sum,$conn);
                    
    
                }
                else if($exam=='u2'){
                    
                    $sql = "UPDATE `student` SET `u2/s1`='$line[1]',`u2/s2`='$line[2]',`u2/s3`='$line[3]',`u2/s4`='$line[4]',`u2/s5`='$line[5]',`u2/s6`='$line[6]',`p1`='$line[7]',`p2`='$line[8]',`p3`='$line[9]',`p4`='$line[10]',`p5`='$line[11]',`p6`='$line[12]' where roll_number='$line[0]'";
                     $result=mysqli_query($conn,$sql);
                     $sum=$line[7]+$line[8]+$line[9]+$line[10]+$line[11]+$line[12];   
                    $var=calculate($month,$m,$line[0],$sum,$conn);
                    
                    
                }
                else if($exam=='gt')
                {
                     $sql = "UPDATE `student` SET `gt/s1`='$line[1]',`gt/s2`='$line[2]',`gt/s3`='$line[3]',`gt/s4`='$line[4]',`gt/s5`='$line[5]',`gt/s6`='$line[6]',`p1`='$line[7]',`p2`='$line[8]',`p3`='$line[9]',`p4`='$line[10]',`p5`='$line[11]',`p6`='$line[12]' where roll_number='$line[0]'";
                     $result=mysqli_query($conn,$sql);
                     $sum=$line[7]+$line[8]+$line[9]+$line[10]+$line[11]+$line[12];               
                      $var=calculate($month,$m,$line[0],$sum,$conn);
                     
                }
                else if($exam=='at'){

                    

                     $sql = "UPDATE `student` SET `a/m1`='$line[1]',`a/m2`='$line[2]',`a/m3`='$line[3]',`a/m4`='$line[4]',`a/m5`='$line[5]',`p1`='$line[6]',`p2`='$line[7]',`p3`='$line[8]',`p4`='$line[9]',`p5`='$line[10]'  where roll_number='$line[0]'";
                     $result=mysqli_query($conn,$sql);
                     $sum=$line[7]+$line[8]+$line[9]+$line[10]+$line[6];               
                     $var=calculate1($month,$m,$line[0],$sum,$conn);
                    
                    
                }
                else{
                  
                }
                




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

//redirect to the listing page
header("Location: student_exam.php".$qstring);