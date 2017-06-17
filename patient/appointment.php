<?php
include("../include/dbconnection.php");
  if(!isset($_SESSION['id'])){
    $error='You have to log in before you make your appointment.';
  }
  if(isset($_GET['doc_id'])){
  $_SESSION['doc_id']=$_GET['doc_id'];
  }
  if(isset($_SESSION['doc_id'])){
  $id=$_SESSION['doc_id'];
  }
  if(isset($_GET['time'])){
    $pat_id=$_SESSION['id'];
    $date=$_GET['date'];
    $time=$_GET['time'];
    $query="INSERT INTO appointment (app_id,emp_id, patient_id, time, date,payment,report) VALUES (DEFAULT,'$id','$pat_id','$time','$date','NULL' ,'NULL')";
    mysqli_query($connect,$query);
    header('Location:success.php?date='.$date.'&doc_id='.$id.'&time='.$time);
  }
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
   include("head.php");
   ?><script type="text/javascript" src="../jquery/reg.js"></script>
<link rel="stylesheet" type="text/css" href="../css/reg.css"><script>
  $(document).ready(function(){
    var date_input=$('input[name="date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
      orientation:"top",
      startDate:'0',
      endDate:'+7d',
    })
  })
</script>
   <title>Doctor Schdedule</title>
</head>
<body >
 <?php include('../include/header.php'); ?>

<!--main navigation part with logo-->

 <!--contaiener of services options-->
<div class="container-fluid mybanner">
<div class="bg-color">
<?php
include("navig.php");
?>
    <div class="container ">
      <?php if(isset($error)){ ?>
            <div class="alert alert-warning alert-dismissable" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $error;?>
            </div><?php
            } ?>
      <div class="container well" style="width: 30%;"><form action="#" method="GET">
        Date:<input type="text" name="date" required="">
        <input type="submit" name="submit" value="Search">
      </form></div>
      <?php 
        if (isset($_GET['submit'])) {
          $date=mysqli_real_escape_string($connect,$_GET['date']);
          $query="SELECT * FROM users NATURAL JOIN doc_schedule where day like DAYOFWEEK('$date') and emp_id like '$id'";//day like DAYOFWEEK('$date') and
          $query_run=mysqli_query($connect,$query);
          $row=mysqli_fetch_assoc($query_run);
          $data=array('8-9','9-10','10-11','11-12','12-13','13-14','14-15','15-16','16-17');
          if(mysqli_num_rows($query_run)!=NULL)
          $time=explode('-',$row['time']);
          ?>
          <div style=" margin-top: 50px;">
          <div class="row">
        
            <?php foreach ($data as $key) {
              if(mysqli_num_rows($query_run)!=NULL){
              $em=explode('-',$key);
              if($em[0]>=$time[0]&&$em[1]<=$time[1]){
                $query="select * from appointment where emp_id like '$id' and time like '$key' and date like '$date'";
                $query_run1=mysqli_query($connect,$query);
                if(mysqli_num_rows($query_run1)<5){
                  echo '<div ><a class="btn btn-success col-sm-1" href="appointment.php?date='.$date.'&doc_id='.$id.'&time='.$key.'">'.$key.'</a></div>';
                }
                else
                  echo '<div class="btn btn-warning col-sm-1">'.$key.'</div>';
              }
              else
              echo '<div class="btn btn-default col-sm-1">'.$key.'</div>';        
            } 
            else echo '<div class="btn btn-default col-sm-1">'.$key.'</div>'; 
            }?>
            
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
include("news-headlines.php");
?>

 
</body>
</html>