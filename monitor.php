<?php
  
  include("header.php");
  include("session1.php");
  include("db.php");
  if(isset($_POST['submit']))
  {
    $dat=$_POST['date'];
      
$startDate = strtotime($dat); 
$m= date('m', $startDate);
 
$d= date('d', $startDate);  
$day=date('l');

  }
if(isset($_POST['clear']))
{
    $name=$_POST['name'];
    $sec=$_POST['section'];
    $per=$_POST['period'];
    $class=$_POST['class'];
    $dat1=$_POST['date'];
    echo "string";
    echo $dat1;   
    $sql="DELETE FROM `faculty_status` WHERE `fname`='$name' AND `date`='$dat1' AND `class`='$class' AND `section`='$sec' AND 
    `period`='$per'";
    $query=mysqli_query($conn,$sql);
 
}
?>
    <html>

    <head>
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

    </head>

    <body>

        <div class="col-md-12">
            <div class="panel panel-primary">

                <div class=" panel-heading">
                    <h3 class="panel-title">Cancel Periods On
                        <?php echo $day; ?>
                    </h3>
                </div>

                <div class=" panel-body">
                    <div class="col-md-12 ">
                        <div class="card">
                            <div class="table-wrapper-2">
                                <div class="content">

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Serial Number</th>
                                                <th>Faculty Name</th>
                                                <th>Section</th>
                                                <th>Period</th>
                                                <th>Class</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <?php 
        
        $result=mysqli_query($conn,"select * from `timetable` where day='$day'");
        $serialnumber=0;
        while($row=mysqli_fetch_array($result))
        {
        $serialnumber++;
        ?>
                                        <tbody>
                                            <tr>

                                                <td>
                                                    <?php echo $serialnumber; ?> </td>
                                                <td>
                                                    <?php echo $row['Faculty']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['section']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['Period']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['Class']; ?>
                                                </td>
                                                <td>
                                                     <form action="" method="post">
                                                        <input type="hidden" name="name" value="<?php echo $row['Faculty']; ?>">
                                                         <input type="hidden" name="date" value="<?php echo $dat; ?>">
                                                        <input type="hidden" name="section" value="<?php echo $row['section']; ?>">
                                                        <input type="hidden" name="period" value="<?php echo $row['Period']; ?>">
                                                        <input type="hidden" name="class" value="<?php echo $row['Class']; ?>">
                                                         <button class="btn btn-danger" name="clear">Clear</button>
                                                     </form>
                                                    
                                                </td>


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
    </body>
