<?php
include("../include/dbconnection.php");
if (isset($_POST['submit'])) {
  if (isset($_POST['field'])&&!empty($_POST['field'])){
    if($_POST['field']=="All")
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
  if (isset($_POST['date'])&&!empty($_POST['date(format)'])){
    $date=$_POST['date'];
  }
  else
    $date='%';

  $query = "SELECT * FROM appointment a join users u join employee_detail e WHERE a.emp_id like u.user_id and e.emp_id like u.user_id and field like '$field' and name like '$name' and date like '$date'";
  $query_run=mysqli_query($connect,$query);
}
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
   include("head.php");
   ?>
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
    <div class="row">
      <form action="#" method="POST" role="form">
        <legend><center>Manage appoinments</center></legend>
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
            <option value="">Select Specialist</option>
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
    <div class="row">
      <div class="col-md-1">&nbsp;</div>
      <div class="col-md-3">Doctor</div>
      <div class="col-md-2">Date</div>
      <div class="col-md-1">Time</div>
      <div class="col-md-3">Field</div>
      <div class="col-md-2">&nbsp;</div>
    </div>
    <div class="row">
      <div class="col-md-2">Doctor</div>
      <div class="col-md-2">Date</div>
      <div class="col-md-2">Time</div>
      <div class="col-md-2">Field</div>
      <div class="col-md-2">&nbsp;</div>
    </div>
    </div>   
</div>
 
 </div>

</div>
</div>

<!--news part-->
<?php
include("../include/news-headlines.php");
?>

 
</body>
</html>