<?php
  
  include("header1.php");
  include("session1.php");
  include("db.php");
  if(isset($_POST['submit']))
  {
    $dat=$_POST['date'];
  }
?>
<article>
  <style>
            @import url(https://fonts.googleapis.com/css?family=Cinzel+Decorative:400,900);

body {
  font-family: 'Cinzel Decorative', cursive;
  background: url(assets/img/blue.jpg);
  background-size: cover;
  color: black;
}

h1 {
  font-size: 3em;
  text-align: center;
}
article {
  max-width: 600px;
  overflow: hidden;
  margin: 0 auto 50px;
}

.subtitle {
  margin: 0 0 2em 0;
}
.fancy {
  line-height: 0.5;
  text-align: center;
}
.fancy span {
  display: inline-block;
  position: relative;  
}
.fancy span:before,
.fancy span:after {
  content: "";
  position: absolute;
  height: 5px;
  border-bottom: 1px solid white;
  border-top: 1px solid white;
  top: 0;
  width: 600px;
}
.fancy span:before {
  right: 100%;
  margin-right: 15px;
}
.fancy span:after {
  left: 100%;
  margin-left: 15px;
}
  </style>
  <h1>CAP MANAGEMENT SYSTEM</h1>
  <p class="subtitle fancy"><span>Faculty Details</span></p>
  
</article>



 <div class="col-md-12">
            <div class="panel panel-primary">

                <div class=" panel-heading">
                    <h3 class="panel-title">Faculty Status On <?php echo $dat; ?></h3>
                </div>

                <div class=" panel-body">
                    <div class="col-md-12 ">
                        <div class="card">
                            <div class="table-wrapper-2">
                                <div class="content">

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Serial Number</th><th>Faculty Name</th><th>Logged in</th><th>Updated</th><th>Not Updated</th><th>Not Logged in</th>
                                            </tr>
                                        </thead>
                                      <?php 
        
        $result=mysqli_query($conn,"select * from faculty_status where date='$dat'");
        $serialnumber=0;
        while($row=mysqli_fetch_array($result))
        {
        $serialnumber++;
        ?>
        <tbody>
       <tr>

             <td> <?php echo $serialnumber; ?> </td>
       <td> <?php echo $row['f_name']; ?></td>
             <td> <?php echo $row['login']; ?></td>
       <td> <?php echo $row['Updated']; ?></td>
       <td> <?php echo $row['NUpdations']; ?></td>
             <td> <?php echo $row['Nlogin']; ?></td>
       
      </tr>
      </tbody>

                                        <?php
            
              }

             ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>














































