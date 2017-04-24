<?php
include("include/dbconnection.php");
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
  <script src="bootstrap/js/bootstrap.js"></script>
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
include("include/news-headlines.php");
?>

 
</body>
</html>