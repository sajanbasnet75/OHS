<?php
include("include/dbconnection.php");
?>
<!DOCTYPE html>
<html>
<head>
<<<<<<< HEAD
   <?php include("include/head.php"); ?>
=======
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>..ohs..</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css"/>
   
  <?php include("jquery-ajax-links.php");?>
  <script src="bootstrap/js/bootstrap.js"></script>
>>>>>>> origin/master
</head>
<body >
 <?php include('include/header.php'); ?>

<!--main navigation part with logo-->

 <!--contaiener of services options-->
<div class="container-fluid book-banners">
<div class="bg-color">
<?php
include("include/navig.php");
?>
       <div class="container banner-content " >
         <h1 id="welcome-text" class="text-center" style="margin-top:75px;">WELCOME TO OHS</h1> </br>
        <div class="row banner-choices container-fluid" >
            <a href="booking.php" class="opt1"> <div class="col-sm-2 col-xs-12  choices1 pull-left" id="choice-mob">
                  <div class="icon-main" id="icon-mob"><img src="images/find-doctor.png"alt="booking" class="img-responsive icon-pic" id="pic-mob" ></div> </br> </br> 
                   <button type="button" class="btn btn-primary"  >Book Appointment</button>
            </div> </a>
           
          <a href="#"><div class="col-sm-2 col-xs-12  choices1 pull-right" id="choice-mob">
                     <div class="icon-main" id="icon-mob"><img src="images/health-records.png"alt="icon" class="img-responsive icon-pic" id="pic-mob"></div> </br> </br> 
                        <button type="button" class="btn btn-primary" >Health Records</button>
            </div></a>

           <a href="#"><div class="col-sm-2 col-xs-12  choices1 pull-left" id="choice-mob">
                     <div class="icon-main" id="icon-mob"><img src="images/video.png"alt="icon" class="img-responsive icon-pic" id="pic-mob"></div> </br> </br> 
                       <button type="button" class="btn btn-primary" >Video Consult</button>
                    
           </div></a>

           
             <a href="#"><div class="col-sm-2 col-xs-12  choices1 pull-right" id="choice-mob">
                <div class="icon-main" id="icon-mob"><img src="images/payment.png"alt="icon" class="img-responsive icon-pic" id="pic-mob"></div> </br> </br> 
                  <button type="button" class="btn btn-primary" >Pay Online</button>
            </div></a>
       </div>     
    </div>
 
 </div>

</div>
</div>

<!--news part-->
<?php
include("include/news-headlines.php");
?>

 
</body>
</html>