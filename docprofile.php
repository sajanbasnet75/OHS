<?php
  include("dbconnection.php");
  $id=$_GET['id'];
  $query="SELECT * FROM employee NATURAL JOIN employee_detail WHERE emp_id LIKE '$id'";
  $query_run=mysqli_query($connect,$query);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>..ohs..</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet"  href="bootstrap/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css"/>
   
  <?php include("jquery-ajax-links.php");?>
  <script src="bootstrap/js/bootstrap.js"></script>
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
if(mysqli_num_rows($query_run)==NULL)
 echo '<h4 style="margin-left:4%">No result found</h4>';
else{
  $row=mysqli_fetch_assoc($query_run);
?>
       <div class="container">
         <div class="row">
           <div class="col-md-3">Name</div>
           <div class="col-md-9"><?php echo $row['name']; ?></div>
         </div>
         <div class="row">
           <div class="col-md-3">Field</div>
           <div class="col-md-9"><?php echo $row['field']; ?></div>
         </div>
         <div class="row">
           <div class="col-md-3">DOB</div>
           <div class="col-md-9"><?php echo $row['dob']; ?></div>
         </div>
         <div class="row">
           <div class="col-md-3">History</div>
           <div class="col-md-9"><?php echo $row['history']; ?></div>
         </div>
         <div class="row">
           <div class="col-md-3">Email</div>
           <div class="col-md-9"><?php echo $row['email']; ?></div>
         </div>
       </div>  
       <?php 
     }

       ?>
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