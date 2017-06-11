<?php
include("include/dbconnection.php");
  if(!isset($_SESSION['id'])){
    $_SESSION['requestURL']=$_SERVER['REQUEST_URI'];
    $h=$_SESSION['requestURL'];
    $a=explode('/', $h);
    $_SESSION['requestURL0']=$a[0];
    $_SESSION['requestURL1']=$a[1];
    $_SESSION['requestURL2']=$a[2];
    $_SESSION['error']='You have to log in before you make your appointment.';
    header('Location:logreg.php');
  }
  if(isset($_GET['doc_id'])){
  $_SESSION['doc_id']=$_GET['doc_id'];
  }
  if(isset($_SESSION['doc_id'])){
  $id=$_SESSION['doc_id'];
  }
  if(isset($_GET['time'])){
    $pat_id=1;
    $date=$_GET['date'];
    $time=$_GET['time'];
    $query="INSERT INTO appointment (emp_id, patient_id, day, time, date,payment) VALUES ('$id','$pat_id',DAYOFWEEK('$date'),'$time','$date','NULL')";
    mysqli_query($connect,$query);
    header('Location:success.php?date='.$date.'&doc_id='.$id.'&time='.$time);
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <?php 
   include("include/head.php");
   ?>
</head>
<body >
 <?php include('include/header.php'); ?>

<!--main navigation part with logo-->

 <!--contaiener of services options-->
<div class="container-fluid mybanner">
<div class="bg-color">
<?php
include("include/navig.php");
?>
    <div class="container ">
      <?php if(isset($error)){ ?>
            <div class="alert alert-warning alert-dismissable" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $error;?>
            </div><?php
            } ?>
      <form action="#" method="GET">
        Date:<input type="date" name="date" required="">
        <input type="submit" name="submit" value="Search" placeholder="Search">
      </form>
      <?php 
        if (isset($_GET['submit'])) {
          $date=$_GET['date'];
          $query="SELECT * FROM employee NATURAL JOIN doc_schedule where emp_id like '$id'";//day like DAYOFWEEK('$date') and
          $query_run=mysqli_query($connect,$query);
          $row=mysqli_fetch_assoc($query_run);
          $data=array('8-9','9-10','10-11','11-12','12-13','13-14','14-15','15-16');
          $time=explode('-',$row['time']);
          ?>
          <div style=" margin-top: 50px;">
          <div class="row">
        
            <?php foreach ($data as $key) {
              $em=explode('-',$key);
              if($em[0]>=$time[0]&&$em[1]<=$time[1]){
                $query="select * from appointment where emp_id like '$id' and time like '$key' and date like '$date'";
                $query_run=mysqli_query($connect,$query);
                if(mysqli_num_rows($query_run)<5){
                  echo '<div ><a class="btn btn-success col-sm-1" href="appointment.php?date='.$date.'&doc_id='.$id.'&time='.$key.'">'.$key.'</a></div>';
                }
                else
                  echo '<div class="btn btn-warning col-sm-1">'.$key.'</div>';
              }
              else
              echo '<div class="btn btn-default col-sm-1">'.$key.'</div>';        
            } ?>
            
          </div></div>
          <div  style="margin-top:50px;">
            <div class="row"><div class="btn btn-success col-sm-1"></div>Appoinement available</div>
            <div class="row"><div class="btn btn-default col-sm-1"></div>Doctor not available</div>
            <div class="row"><div class="btn btn-warning col-sm-1"></div>Appointment not available</div>
          </div>
          <?php
        }
      ?>
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