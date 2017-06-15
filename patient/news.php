<?php
include("../include/dbconnection.php");
date_default_timezone_set("Asia/Kathmandu");
if(isset($_POST['submit_comments'])){
  $comment=mysqli_real_escape_string($connect,$_POST['written_comments']);
  $id=$_SESSION['id'];
  $name=$_SESSION['username'];
  $news_idd=$_GET['id'];
  $dates= date('Y M d');
    $time=date("h:i:sa");
    $dateandtime=$dates.' at '.$time;
    $query="INSERT INTO news_comments (news_id,user_id,comments,date) VALUES('$news_idd','$id','$comment','$dateandtime')";
    mysqli_query($connect,$query) or die(mysql_error());

}
?>

<!DOCTYPE html>
<html>
<head>
   <?php include("head.php"); ?>
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
 <?php include('../include/header.php'); ?>
<!--main navigation part with logo-->
 <!--contaiener of services options-->
<div class="bg-color">
<?php
include("navig.php");
?>

<div class="container news-block">
<?php  
        if(isset($_GET['id'])){
          $id=$_GET['id'];
          $query="select * from news where news_id = $id";
          $query_run=mysqli_query($connect,$query);
          $row=mysqli_fetch_assoc($query_run);
        }
       ?>
<div class="col-sm-8 col-lg-8 col-md-8 col-xs-12 news-body" style="border-right:solid #cfcfdf;">
      
     <div class="text-capitalize " style="margin:2px 0px 10px 0px; padding:0px 10px 0px 10px;">
      <span style=" font-family: 'Tangerine', serif; font-size: 55px;">
      <?php
      echo "<span style='border-bottom:ridge 2px grey;'>";
      echo $row['title'];
      echo"</span>";
      ?>
      </span>
      </div>

      <div class="text-muted text-capitalize " style="margin:10px 0px 25px 0px; padding:5px 1px 2px 14px;">    
    <?php 
    echo '<span class="fa fa-calendar-o ">&nbsp</span>';
    echo $row['date'];
    echo " &nbsp &nbsp";
    echo '<span class="fa fa-user ">&nbsp</span>';
    echo $row['author']; 
    ?>
    </div>

     <div class="" style="width:auto;"> <!-- for images-->
             <center><?php echo" <img class='card-img img-responsive' src='../images/newsImg/".$row['image']." '  >";?></center>
     </div>  
      
      <div class="" style="margin:2px 0px 2px 0px; padding:10px 10px 10px 10px;">
          <p  style=" font-family: 'Tangerine', serif;
        font-size: 22px;"><?php echo $row['detail'];?></p>
    </div>
     <div class="" style="background:#f6feff; padding:15px;">
     <h4 class="text-muted text-left" style="border-bottom:solid 1px grey;">Comments</h4>
     <div style="border-bottom:solid 1px grey;">
            <?php 
           $news_ids=$_GET['id'];
          $query="SELECT * from news_comments join users WHERE news_id=$news_ids AND news_comments.user_id=users.user_id order by date DESC limit 20";
          $query_run=mysqli_query($connect,$query);
            while($rown=mysqli_fetch_assoc($query_run)){;
        ?>
      <div class="row" style="padding:15px;">
        <div style="margin:1px 0px 1px 0px;">
        <div class="col-md-2 col-sm-12 col-xs-12 text-capitalize text-info " style="font-size:15px"><?php echo $rown['username'];?></div>
        <div class="col-md-10 col-sm-12 col-xs-12 text-gray-dark" style="">
        <?php echo $rown['comments']; ?>
             <div class="text-muted">
        <?php 
               echo $rown['date'];
             ?>
        </div>
      </div>
      </div>
      </div> 
  <?php } ?>
  </div>
  
       <?php
            if(!isset($_SESSION['id'])){
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
  
  <div class="col-sm-4 col-lg-4 col-md-4 col-xs-12 more-news" >
   <h3 class="" style="border-bottom:dotted 1px black;">More News and Articles</h3>
    
    <?php  
       $more_head=6;
     $query1="select * from news where news_id != $id order by date DESC limit $more_head";
          $query_run1=mysqli_query($connect,$query1);
          while($row=mysqli_fetch_array($query_run1)){
     ?>
           
           <div class="row"  style="margin:0px 0px 2px 0px; padding:10px 0px 10px 0px;">
           <div class="" style="width:auto;"> <!-- for images-->
         <?php echo" <img src='../images/newsImg/".$row['image']." ' class='img-responsive' >";?>

           </div>
           <a href="news.php?id=<?php echo $row['news_id'];?>" style="text-decoration:none; color:#000;">
           <h4 class="text-capitalize"><?php echo $row['title']; ?></h4>
           </a>
           <hr>
           </div>


     <?php }?> 
     <a href="latest-news.php"><div class="btn-danger text-center more-headlines"><b>More Headlines</b></div></a>
   
  </div>

</div>
</div>
</body>
