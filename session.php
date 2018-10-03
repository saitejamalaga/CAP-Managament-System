<?php
   include('db.php');
   session_start();
   $date1=date('Y-m-d');
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select `username`,`name` from `login` where `username` = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   

   $name=$row['name'];

   if(!isset($_SESSION['login_user'])){
      
       echo "<script>
      window.location='index.htm';
    </script>";
   } 
?>