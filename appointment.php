<?php
include("dbconnection.php");
  $id=$_GET['id'];
  $query="SELECT * FROM employee NATURAL JOIN doc_schedule";
  $query_run=mysqli_query($connect,$query);
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
?>
    <div class="container">
      Yesma appoinment scheduling haru garne
    </div>       
    </div>
 
 </div>

</div>
</div>

<!--news part-->
<?php
include("news-headlines.php");
?>

 
</body>
</html>