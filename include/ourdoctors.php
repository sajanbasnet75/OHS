
 <!--news main part-->
 <style type="text/css" media="screen">
   .doc-box{
      padding: 15px 15px 15px 15px; }
  .doc-box-content{background:#ffffff; height:auto; padding:2px 2px 10px 1px;
    }
   </style>

<h1 class="news-headline text-center headline" ><span style="border-bottom:ridge 1px grey;">OUR DOCTORS</span></h1>
<p class="text-center newsp" id="newsparag">Get all the information about <br>our Doctors 

</p>
<div class="container" >
      <?php 
          $query="select * from employee_detail limit 4";
          $query_run=mysqli_query($connect,$query);
            while($row=mysqli_fetch_assoc($query_run)){;
        ?>
<div class="col-xs-12 col-sm-3 col-lg-3 doc-box">
    <div class="doc-box-content" id="news-box-contents" >
    <!-- for images-->
    <div  class="doc-box" style="height:220px;background:white;"> 
        <?php echo" <img src='images/doc_images/".$row['images']." ' style='max-width:100%; max-height:100%;display: block;  margin: 0 auto;' ;>";?>
    </div>  
    <div class="text-capitalize text-muted" style="margin:3px 0px 8px 0px; padding:5px 1px 2px 14px; font-size:18px;">    
    <?php 
     echo "<span class='fa fa-stethoscope' style='background:#5bc0de;border:solid 0px; border-radius:40%; padding:10px;'></span>";
     echo "&nbsp";
    echo $row['field']; 
    ?>
    </div>

     <!-- for name-->
    <div class="text-capitalize " style="margin:2px 0px 8px 0px; padding:0px 10px 0px 14px;">
    <span style="font-size:25px; font-weight:600;">
    <a href="news.php?id=<?php echo $row['news_id'];?>" style="text-decoration:none; color:#000;">
    <?php
    echo $row['name'];
    ?>
    </a>
    </span>
    </div>
     <!-- for history-->
    <div class="" style="margin:2px 0px 0px 0px; padding:0px 10px 0px 14px;">
    <?php echo $row['history']; ?>
    </div>
    <div style="margin:10px 2px 2px 2px; position:relative; top: 28px;">
    <center><a href="#" class="btn btn-info ">View Profile</a><center>
    </div>
  </div>
</div>

<?php } ?>
</div>
<center><a href="#" style="margin:15px; margin-bottom:25px; position:relative; top:38px;" class="btn btn-primary text-center" >All Doctors</a></center>
