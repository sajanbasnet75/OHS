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
       <div class="container" style="width: 50%; background-color: WHITE;">
       <?php  
        if(isset($_GET['id'])){
          $id=$_GET['id'];
          $query="select * from news where news_id = $id";
          $query_run=mysqli_query($connect,$query);
          $row=mysqli_fetch_assoc($query_run);
        }
       ?>
       <legend style="text-align: center;"><?php echo $row['title'];?></legend>
       <div class="header">Date:<?php echo $row['date'];?></div><br>
       <div class="body">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['detail'];?></div>
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