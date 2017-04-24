
 <!--news main part-->
<center><h1 class="news-headline"> NEWS HEADLINES</h1></center>
<div class="">
   <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="background-color:#00102a;">
   	    <!--news header-->
        <?php 
          $query="select * from news order by date limit 6";
          $query_run=mysqli_query($connect,$query);
          for($i=0;$i<2;$i++){
            $row=mysqli_fetch_assoc($query_run);
        ?>
   	   <div class="news-header" style="color:red;">
   	      <h1><a href="news.php?id=<?php echo $row['news_id'];?>"><?php echo $row['title'];?></a></h1>         
          <p><?php echo $row['date'];?></p>
       </div>
        <!--news body-->
       <div class="news-body" style="color:yellow;">
          <p><?php echo substr($row['detail'],0,30);?>...<a href="news.php?id=<?php echo $row['news_id'];?>">Read more</a></p>
        </div><hr>
       <!--<div class="news-footer" style="color:green;">
       awdawdawd
       </div> -->
       <?php }?>
   </div>
<!--news main part ended-->	

   <!--news carsouel part-->
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="background-color:red;">
	<h1>More news</h1>
  <?php
  while($row=mysqli_fetch_assoc($query_run)){?>
  <div class="row"><a href="news.php?id=<?php echo $row['news_id'];?>"><?php echo $row['title'];?></a></div>
  <?php
  }
  ?>
</div>
