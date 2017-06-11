
<?php
include("include/dbconnection.php");
?>
<!DOCTYPE html>
<html>
<head>
   <?php include("include/head.php"); ?>
   <title>News</title>
<style type="text/css" media="screen">
.news-block{
margin:30px auto 10px auto;
}
.news-body{
padding:10px;
} 
.more-news{
padding:13px;
} 
</style>
</head>
<body >
 <?php include('include/header.php'); ?>
<!--main navigation part with logo-->
 <!--contaiener of services options-->
<div class="bg-color">
<?php
include("include/navig.php");
?>

<div id="top"><div>
<div  style="min-height:100%;">
	
<!--main navigation part with logo-->

 <!--container of services options-->
<div class="container-fluid mybanner">
<div class="bg-color">


<div class="container" style="padding: 2%; ">
 <?php

$query="SELECT * FROM employee_det natural join employeeBio WHERE id=" . $_GET["id"];
$query_run=mysqli_query($connect,$query);

// Associative array
$row=mysqli_fetch_assoc($query_run);

 ?>
  <div class="row">
   <div class="col-md-3">
		<img src="<?php echo 'images/'.$row['image'];?>" class="img-responsive img-rounded"  alt="No Image."/>
  			<div class="row"> 
  			<div class="col-md-12" style="font: 20px sans-serif;"><?php echo $row["email"]?></div>
 		  	</div>
 		  	<div class="row">
  		  	<div class="col-md-12" style="font: 20px sans-serif;"><?php echo $row["phone"]?></div>
  		  	</div>
  	</div>
	<div class="col-md-9 color"> 
    <!--<div id="topBar">
    <a href ="#" id="load_home"> About </a>
</div>-->  
		<div id ="content"><div class="col-md-10" style="font: 40px sans-serif;color: #AD3000;"><?php echo $row["fname"]." ".$row["lname"]."  "?></div>
			<div class="col-md-2"><a href="update.php?id=<?php echo $row['id']?>" class="btn btn-default">Update profile</a><hr></div> 
  			<div class="row">
				<div class="col-md-12 " style="font: 30px sans-serif; color: #007CFF;"><?php echo $row["field"]?></div>
			</div>
       <div>
		   <div class="col-md-12 " style="font: 20px sans-serif;"><p class="text-justify"><?php echo $row["Bio"]?><br><br><br></p></div>
       </div>
       <div class="row">
				<div class="col-md-12 " style="font: 25px sans-serif;">Education<br></div>
		</div>
       <div class="row">
				<div class="col-md-12 " style="font: 20px sans-serif;"><?php echo $row["Education"]?><br><br><br><br></div>
	   </div>
      <div class="row">
				<div class="col-md-12 " style="font: 25px sans-serif;">Certifications<br></div>
		</div>
       <div class="row">
				<div class="col-md-12 " style="font: 20px sans-serif;"><?php echo $row["Certifications"]?></div>
	   </div>
       </div>
<!--
<script>
$(document).ready( function() {
    $("#load_home").on("click", function() {
        $("#content").load("update.php");
    });
});
</script>-->
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
<!--
</div>
<nav class="navbar navbar-default navbar-fixed-bottom">
<div class="container">
    <span>Winning!</span>
</div>
</nav>
-->
<button onclick="#top">top</button>
</body>
</html>