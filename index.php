<?php
include("dbconnection.php");
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
  <?php include("jquery-ajax-links.php");?>
  <script src="bootstrap/js/bootstrap.js"></script>

</head>
<body>
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
<?php
include("navig.php");
?>
 <!--contaiener of services options-->
<div class="container-fluid mybanner">
       <div class="container banner-content" >
         <h1 id="welcome-text"><center style="margin-top:85px;">WELCOME TO OHS</center></h1> </br>
        <div class="row banner-choices ">
            <a href="#"><div class="col-sm-2 col-xs-12 pull-left choices1" id="choice-mob">
                  <div class="icon-main "><img src="images/booking.png"alt="booking" class="img-responsive icon-pic"></div> </br> </br> 
                   <button type="button" class="btn btn-primary"  >Book Appointment</button>
            </div></a>
           
           <a href="#"><div class="col-sm-2 col-xs-12 pull-right choices1" id="choice-mob">
                <div class="icon-main"><img src="images/payment.png"alt="icon" class="img-responsive icon-pic"></div> </br> </br> 
                  <button type="button" class="btn btn-primary" >Pay Online</button>
            </div></a>
           <a href="#"><div class="col-sm-2 col-xs-12 pull-left choices1" id="choice-mob">
                     <div class="icon-main"><img src="images/find-doctor.png"alt="icon" class="img-responsive icon-pic"></div> </br> </br> 
                    <button type="button" class="btn btn-primary" >Find A Doctor</button>
            </div></a>
           <a href="#"><div class="col-sm-2 col-xs-12 pull-right choices1" id="choice-mob">
                     <div class="icon-main"><img src="images/booking.png"alt="icon" class="img-responsive icon-pic"></div> </br> </br> 
                      <button type="button" class="btn btn-primary" >Heath</button>
          </div></a>
           <a href="#"><div class="col-sm-2 col-xs-12 pull-left choices1" id="choice-mob">
                     <div class="icon-main"><img src="images/video.png"alt="icon" class="img-responsive icon-pic"></div> </br> </br> 
                       <button type="button" class="btn btn-primary" >Video Tutorial</button>
                    
           </div></a>
           <a href="#"><div class="col-sm-2 col-xs-12 pull-right choices1" id="choice-mob">
                     <div class="icon-main"><img src="images/health-records.png"alt="icon" class="img-responsive icon-pic"></div> </br> </br> 
                        <button type="button" class="btn btn-primary" >Health Records</button>
            </div></a>
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