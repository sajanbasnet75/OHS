<?php
include("dbconnection.php");
session_start();
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
<div class="container-fluid book-banners">
<div class="bg-color">
<?php
include("navig.php");
?>
       <div class="container">
          <?php
            if(isset($_GET['time'])&&isset($_GET['doc_id'])&&isset($_GET['date'])){
              $id=$_GET['doc_id'];
              $query="select name from employee_detail where emp_id like '$id'";
              $run=mysqli_query($connect,$query);
              $row=mysqli_fetch_assoc($run);
              ?>
              <div class="alert alert-success alert-dismissable" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              Your appointment with Dr.<?php echo $row['name'];?> has been made on '<?php echo $_GET['date'];?>' at '<?php echo $_GET['time'];?>'
            </div>
            <div class="well">
              Would you like to pay now?
              <a href="" class="btn btn-default">Yes</a>
              <a href="booking.php" class="btn btn-default" >Not now</a>
            </div>
              <?php
            }
            else
              echo 'k vako yo';
          ?>
       </div>
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