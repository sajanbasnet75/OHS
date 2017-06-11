
<?php
include("include/dbconnection.php");
date_default_timezone_set("Asia/Kathmandu");
if(isset($_POST['submit_comments'])){
	$comment=$_POST['written_comments'];
	$name=$_SESSION['username'];
	$dates= date('Y M d');
    $time=date("h:i:sa");
    $dateandtime=$dates.' at '.$time;
    $query="INSERT INTO news_comments (name,comments,date) VALUES('$name','$comment','$dateandtime')";
    mysqli_query($connect,$query) or die(mysql_error());

}
?>
<!DOCTYPE html>
<html>
<head>
<title>OHS</title>
   <?php include("include/head.php"); ?>
</head>
<body >
 
<div class="container-fluid">
	<div class="col-md-8 col-sm-8" style="background:#f6feff; padding:15px;">
	   <h4 class="text-muted text-left" style="border-bottom:solid 1px grey;">Comments</h4>
     <div style="border-bottom:solid 1px grey;">
            <?php 
          $query="select * from news_comments order by date DESC limit 4";
          $query_run=mysqli_query($connect,$query);
            while($row=mysqli_fetch_assoc($query_run)){;
        ?>
		  <div class="row" style="padding:15px;">
		    <div style="margin:1px 0px 1px 0px;">
		    <div class="col-md-2 col-sm-12 col-xs-12 text-capitalize text-info " style="font-size:15px"><?php echo $row['name'];?></div>
		    <div class="col-md-10 col-sm-12 col-xs-12 text-gray-dark" style="">
		    <?php echo $row['comments']; ?>
             <div class="text-muted">
		    <?php 
               echo $row['date'];
             ?>
		    </div>
		  </div>
		  </div>
		  </div> 
	<?php } ?>
	<a class="btn text-right">Read more comments</a>
	</div>
	
       <?php
            if(!isset($_SESSION['id'])){
			 $_SESSION['redirectURL']=$_SERVER['REQUEST_URI'];
			echo "
               <a href='logreg.php' class='btn btn-info' style='margin:8px;'> Login to Comment</a> ";  
		      }
			else{
              	 echo '<form action="" method="POST" accept-charset="utf-8">
	 	               <textarea name="written_comments"placeholder="Write Comments" style="resize:none;width:100%; margin:10px 2px 5px 2px;"></textarea> 	
	                   <input type="submit" name="submit_comments" value="POST" class="pull-right btn btn-info">
	                   </form>';  
			}	                   
                   
       ?>

	</div>
</div>
</body>
</html>