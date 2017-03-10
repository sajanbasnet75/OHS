<?php
include("dbconnection.php");
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
   include("head.php");
   ?>
</head>
<body >
 <header class="main-header">
 <div class="header-top">
 <div class="container-fluid">
          <div class="col-sm-4 col-xs-4" id="top-lefts">         	
            	<a href="#"><i class="fa fa-phone" aria-hidden="true" style="color:#42b3e5;"></i>&nbsp (+977) 1234567896</a>
          </div>
          <div class="col-sm-4 col-xs-4" id="top-lefts"> 
                <a href="#"><i class="fa fa-envelope" aria-hidden="true" style="color:#42b3e5;"></i>&nbsp codemandu@domain.com</a>
          </div>
          <div class="col-sm-4 col-xs-4 pull-right" id="top-right">
            			      <a href="#"><span class="fa fa-facebook"></span></a>
                        <a href="#"><span class="fa fa-google-plus">&nbsp &nbsp</span></a>
                        <a href="#"><span class="fa fa-twitter">&nbsp &nbsp</span></a>
                       
                       </div>
 </div>
 </div>
</header>

<!--main navigation part with logo-->

 <!--contaiener of services options-->
<div class="container-fluid mybanner">
<div class="bg-color">
     <?php  
          include("navig.php");
          include("dbconnection.php");
          if(isset($_GET['submit'])){
            $field=$_GET['field'];
            if($field=="all")
              $field="%";
            $key=$_GET['key'];
            if (empty($key)) {
              $key="%";
            }
            $query="SELECT * FROM employee NATURAL JOIN employee_detail WHERE field LIKE '$field' AND name LIKE '$key'";
            $query_run=mysqli_query($connect,$query);
            if(mysqli_num_rows($query_run)==NULL)
                echo'<h4 style="margin-left:4%">No result found</h4>';
            else{ ?>
                <div class="container" style="padding: 2%; ">
                  <div class="row">
                    <div class="col-md-3"><b>Doctor</b></div>
                    <div class="col-md-3"><b>Field</b></div>
                    <div class="col-md-3">&nbsp;</div>
                    <div class="col-md-3">&nbsp;</div>
                  </div>
                  </br>
                <?php
                while($row=mysqli_fetch_assoc($query_run)){
                  ?>
                  <div class="row">
                    <div class="col-md-3"><?php echo $row['name']; ?></div>
                    <div class="col-md-3"><?php echo $row['field']; ?></div>
                    <div class="col-md-3"><a href="docprofile.php?id=<?php echo $row['emp_id']?>">View profile</a></div>
                    <div class="col-md-3"><a href="appointment.php?id=<?php echo $row['emp_id']?>">Make appointment</a></div>

                  </div>
                  
                
                <?php
              }
            }
            echo "</div>";
          }
          
          

     ?>
    
 
 </div>

</div>

<!--news part-->
<?php
include("news-headlines.php");
?>

 
</body>
</html>