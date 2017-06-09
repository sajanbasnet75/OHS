
 <!--news main part-->
 <style type="text/css" media="screen">
   body{
    background-color: #fffff;
   }
   .headline{
    color:#0b3c5d; 
    font-weight:bold;
   font-size:35px;
   margin: 50px auto 10px auto;
   }
   .newsp{
      font-size:20px;
      font-family: Arial Narrow, sans-serif;
   margin: 4px auto 23px auto;
   
   }
   .news-box{
      padding: 15px 15px 15px 15px; 
    }
   .news-box-content{background:#f0f0f0; height:500px; padding:2px 2px 10px 1px;
    }
    .newsheadline_imagebox{height:220px;background:white;
     }
 </style>

<h1 class="news-headline text-center headline" ><span style="border-bottom:ridge 1px grey;">LATEST NEWS</span></h1>
<p class="text-center newsp" id="newsparag">Read our latest news from the company or general medical news.Feel free to ask questions in <br>comments for any news you find interesting.

</p>
<div class="container">
      <?php 
          $query="select * from news order by date DESC limit 3";
          $query_run=mysqli_query($connect,$query);
            while($row=mysqli_fetch_assoc($query_run)){;
        ?>
<div class="col-xs-12 col-sm-4 col-lg-4 news-box">
    <div class="news-box-content" id="news-box-contents">
    <!-- for images-->
    <div class="newsheadline_imagebox" id="newsheadline_imagebox"> 
         <?php echo" <img src='images/newsImg/".$row['image']." ' style='max-width:100%; max-height:100%;display: block;  margin: 0 auto;' >";?>
    </div>  
     <!-- for date and author-->
    <div class="text-muted text-capitalize " style="margin:3px 0px 3px 0px; padding:5px 1px 2px 14px;">    
    <?php 
    echo '<span class="fa fa-calendar-o ">&nbsp</span>';
    echo $row['date'];
    echo " / ";
    echo '<span class="fa fa-user ">&nbsp</span>';
    echo $row['author']; 
    ?>
    </div>

     <!-- for title-->
    <div class="text-capitalize " style="margin:2px 0px 2px 0px; padding:0px 10px 0px 10px;">
    <span style="font-size:25px; font-weight:600;">
    <a href="news.php?id=<?php echo $row['news_id'];?>" style="text-decoration:none; color:#000;">
    <?php
    echo $row['title'];
    ?>
    </a>
    </span>
    </div>
     <!-- for paragraph-->
    <div class="" id="news-par" style="margin:2px 0px 2px 0px; padding:0px 10px 0px 10px;">
    <p  style="font-family: Arial Narrow, sans-serif; font-size:17px;"><?php echo substr($row['detail'],0,300);?>...<a href="news.php?id=<?php echo $row['news_id'];?>">Read more</a></p>
    </div>
    </div>
</div>

<?php } ?>

</div>
<center><a href="latest-news.php" style="margin:15px; margin-bottom:25px;" class="btn btn-primary text-center" > Read More News</a></center>
