<div class="container" style="padding: 2%; ">
  <div class="row">
  <div class="col-md-3"><b>Doctor</b></div>
  <div class="col-md-3"><b>Field</b></div>
  <div class="col-md-3">&nbsp;</div>
  <div class="col-md-3">&nbsp;</div>
  </div>
	<?php  while($row=mysqli_fetch_assoc($query_run)){?> 
    </br>
	<div class="row">
	<div class="col-md-3"><?php echo $row['name']; ?></div>
	<div class="col-md-3"><?php echo $row['field']; ?></div>
	<div class="col-md-3"><a href="docprofile.php?id=<?php echo $row['emp_id']?>">View profile</a></div>
	<div class="col-md-3"><a href="appointment.php?id=<?php echo $row['emp_id']?>">Make appointment</a></div>
	</div>
<?php
}?>