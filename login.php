<?php
   
   include("db.php");
   session_start();
 

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT `name` , `password` FROM `login` WHERE username = '$myusername'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);
      $pass=$row['password'];
      $count = mysqli_num_rows($result);
      $pass1=md5($mypassword);
      // If result matched $myusername and $mypassword, table row must be 1 row
      
     if($count == 1) 
      {
       //  session_register("myusername");
          
              if($pass1==$pass)
              {
         
      // If result matched $myusername and $mypassword, table row must be 1 row
                    $_SESSION['login_user'] = $myusername;
                    if($myusername=="admin"){
                         echo "<script>
      window.location='control.php';
    </script>";
                      }             
                   else
                   {
                          echo "<script>
      window.location='dashboard.php';
    </script>";
                    }
              }
            else {      
     
              echo '<script type="text/javascript">';
      echo 'window.location="index.html";';
      echo '</script>';
             }
     
     }
       else{


        //echo "<script type='text/javascript'>alert(\"Wrong Username\")</script>";
          echo '<script type="text/javascript">';
      echo 'window.location="index.html";';
      echo '</script>';
  
       }
    
    
   }
?> 
