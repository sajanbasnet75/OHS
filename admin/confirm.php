<?php
include("../include/dbconnection.php");
if (isset($_POST['submit'])) {
  if (isset($_POST['field'])&&!empty($_POST['field'])){
    if($_POST['field']=="all")
      $field='%';
    else 
      $field=$_POST['field'];
  }
  else 
     $field='%';
  if (isset($_POST['name'])&&!empty($_POST['name'])){
    $name=$_POST['name'];
  }
  else{
    $name='%';
  }
  if (isset($_POST['date'])&&!empty($_POST['date'])){
    $date=$_POST['date'];
  }
  else
    $date='%';
  $query1 = "SELECT e.name as emp , p.name as pat ,date,time, field,p.patient_id,a.emp_id,a.app_id FROM appointment a join users u join employee_detail e join patient_detail p WHERE a.emp_id like u.user_id and e.emp_id like u.user_id and a.patient_id like p.patient_id and field like '$field' and e.name like '%$name%' and date like '$date' and date>= CURDATE() and (payment IS NULL OR payment = 0)";
  $query_run1=mysqli_query($connect,$query1);
}
if (isset($_POST['cancel-submit'])) {
  if (!empty($_POST['data'])) {
    
    foreach ($_POST['data'] as $key ) {
      $query="update appointment set payment = 1 WHERE app_id = '$key' ";
      die();
      //$run=mysqli_query($connect,$query);
     
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
   include("head.php");
   ?><script>
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
<title>Appointment management</title>
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
    <div class="container well" style="width: 80%;">
    <?php
           if(isset($warning)){ ?>
            <div class="alert alert-warning alert-dismissable" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $warning;?>
            </div><?php
            } ?>
            <?php
           if(isset($success)){ ?>
            <div class="alert alert-success alert-dismissable" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $success;?>
            </div><?php
            } ?>
    <div class="row">
      <form action="#" method="POST" role="form">
        <legend><center>Confirm appoinments</center></legend>
        <div class="form-group col-md-1">
        </div>
        <div class="form-group col-md-3">
          <input type="text" class="form-control" name="date" placeholder="Date">
        </div>
        <div class="form-group col-md-3">
          <input type="text" class="form-control" name="name" placeholder="Doctor's name">
        </div>
        <div class="form-group col-md-3">
          <select name="field" id="input" class="form-control" title="specialist is required" >
            <option value='all'>All</option>
            <optgroup label="Top Specialist">
            <option value="Cardiologist">Cardiologist</option>
            <option value="Nureosurgeon">Nureosurgeon</option>
            <option value="Orthopedician">Orthopedician</option>
            <option value="Oncologist">Oncologist</option>
            <option value="Dentist">Dentist</option>                
            </optgroup>
            <optgroup label="Other Specialist"><hr>
            <option value="Nureologist">Nureologist</option>
            <option value="Psychiatrist">Psychiatrist</option>
            <option value="Pediatrician">Pediatrician</option>
            <option value="Allergist">Allergist</option>
            <option value="Anesthesiologist">Anesthesiologist</option>                
            </optgroup>
          </select>
          </div>
        <button type="submit" class="btn btn-primary col-md-1" name="submit">Submit</button>
      </form>
    </div>
    
    <?php 
      if (isset($query_run1)&&isset($_POST['submit'])) {
      if (mysqli_num_rows($query_run1)==NULL) {
        echo '<h2 style="margin-left:5%;">No result found</h2>';
      }
      else {
    ?>
    <div style="margin:2%;">
    <div class="row">
      <div class="col-md-3">Doctor</div>
      <div class="col-md-2">Date</div>
      <div class="col-md-1">Time</div>
      <div class="col-md-3">Field</div>
      <div class="col-md-2">Patient</div>
      <div class="col-md-1">&nbsp;</div>
    </div>
    <form action="#" method="POST">
    <?php while($row=mysqli_fetch_assoc($query_run1)){ ?>
    <div class="row">
      <div class="col-md-3"><?php echo $row['emp']; ?></div>
      <div class="col-md-2"><?php echo $row['date']; ?></div>
      <div class="col-md-1"><?php echo $row['time']; ?></div>
      <div class="col-md-3"><?php echo $row['field']; ?></div>
      <div class="col-md-2"><?php echo $row['pat'];  ?></div>
      <div class="col-md-1"><input type="checkbox" name="data[]" value="<?php echo $row['app_id'];  ?>"></div>
    </div>
    <?php }?>
    <input type="submit" name="cancel-submit" value="Confirm Checked" class="btn btn-primary" style="float: right; margin-right: 5%; margin-top: 5%;">
    </form>
    <?php } } ?>
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

 
</body>
</html>