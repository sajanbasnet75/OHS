<?php
include("../include/dbconnection.php");
if(!isset($_SESSION['id']))
  header('Location:../../ohs');
$id =$_SESSION['id'];
$query="select * from users where user_id like '$id'";
    $query_run=mysqli_query($connect,$query);
    $row=mysqli_fetch_assoc($query_run);
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
   include("head.php");
   ?>
</head>
<body >
 <?php include('../include/header.php'); ?>

<!--main navigation part with logo-->

 <!--contaiener of services options-->
<div class="container-fluid book-banners">
<div class="bg-color">
<?php
include("navig.php");
?>
       <div class="container banner-content " >
         <h1 id="welcome-text" class="text-center " style="margin-top:75px; margin-bottom:20px;">WELCOME <span class="text-capitalize text-info"><?php echo $row['username'];?></span></h1> </br>
        <div class="row banner-choices container-fluid" >
            <a href="booking.php" class="opt1"> <div class="col-sm-2 col-xs-6  choices1 pull-left" id="choice-mob">
                  <div class="icon-main" id="icon-mob"><img src="../images/find-doctor.png"alt="booking" class="img-responsive icon-pic" id="pic-mob" ></div> </br> </br> 
                   <button type="button" class="btn btn-primary"  >Book Appointment</button>
            </div> </a>
           
          <a href="#"><div class="col-sm-2 col-xs-6  choices1 pull-right" id="choice-mob">
                     <div class="icon-main" id="icon-mob"><img src="../images/health-records.png"alt="icon" class="img-responsive icon-pic" id="pic-mob"></div> </br> </br> 
                        <button type="button" class="btn btn-primary" >Health Records</button>
            </div></a>

           <a href="appointment.php"><div class="col-sm-2 col-xs-6  choices1 pull-left" id="choice-mob">
                     <div class="icon-main" id="icon-mob"><img src="../images/video.png"alt="icon" class="img-responsive icon-pic" id="pic-mob"></div> </br> </br> 
                       <button type="button" class="btn btn-primary" >Manage appointment</button>
                    
           </div></a>

           
             <a href="#"><div class="col-sm-2 col-xs-6  choices1 pull-right" id="choice-mob">
                <div class="icon-main" id="icon-mob"><img src="../images/payment.png"alt="icon" class="img-responsive icon-pic" id="pic-mob"></div> </br> </br> 
                  <button type="button" class="btn btn-primary" >Pay Online</button>
            </div></a>
       </div>     
    </div>
 
 </div>

</div>
</div>

<!--news part-->
<?php
include("../include/news-headlines.php");
?>

 
</body>
</html>