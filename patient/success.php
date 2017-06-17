<?php
include("../include/dbconnection.php");
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
       <div class="container">
          <?php
            if(isset($_GET['time'])&&isset($_GET['doc_id'])&&isset($_GET['date'])){
              $id=$_GET['doc_id'];
              $query="select name from employee_detail where emp_id like '$id'";
              $run=mysqli_query($connect,$query);
              $row=mysqli_fetch_assoc($run);
              ?>
              <div class="alert alert-success alert-dismissable" style="margin-top:60px;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" >&times;</a>
              Your appointment with Dr.<?php echo $row['name'];?> has been made on '<?php echo $_GET['date'];?>' at '<?php echo $_GET['time'];?>'
            </div>
            
              <?php
            }
          ?>
       </div>
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