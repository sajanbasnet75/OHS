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
border-right:solid #cfcfdf;
} 
.more-news{
padding:13px;
} 
.news_headerr{font-family: 'Tangerine', serif; font-size: 55px;}
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

<div class="container news-block">
<?php  
        if(isset($_GET['id'])){
          $id=$_GET['id'];
          $query="select * from news where news_id = $id";
          $query_run=mysqli_query($connect,$query);
          $row=mysqli_fetch_assoc($query_run);
        }
       ?>
<div class="col-sm-8 col-lg-8 col-md-8 col-xs-12 news-body" id="news-body">
      
     <div class="text-capitalize " style="margin:2px 0px 10px 0px; padding:0px 10px 0px 10px;">
      <span  class="news_headerr" id="news_headerr">
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
    echo " / ";
    echo '<span class="fa fa-user ">&nbsp</span>';
    echo $row['author']; 
    ?>
    </div>

     <div class="" style="width:auto;"> <!-- for images-->
             <center><?php echo" <img class='card-img img-responsive' src='images/newsImg/".$row['image']." '  >";?></center>
     </div>  
      
      <div class="" style="margin:2px 0px 2px 0px; padding:10px 10px 10px 10px;">
          <p  style=" font-family: 'Tangerine', serif;
        font-size: 22px;"><?php echo $row['detail'];?></p>
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
         <?php echo" <img src='images/newsImg/".$row['image']." ' class='img-responsive' >";?>

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
