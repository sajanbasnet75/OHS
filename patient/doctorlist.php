<hr>
<div class="container" style="padding:2px;">
  <div class="row">
  <div class="col-md-3 col-sm-3 col-xs-3 "><b>Doctor</b></div>
  <div class="col-md-3 col-sm-3 col-xs-3 "><b>Field</b></div>
  
  </div>
	<?php  while($row=mysqli_fetch_assoc($query_run)){?> 
    </br>
	<div class="row" style="">
	<div class="col-md-3 col-sm-3 col-xs-3 text-capitalize" ><?php echo $row['name']; ?></div>
	<div class="col-md-3 col-sm-3 col-xs-3 text-capitalize" ><?php echo $row['field']; ?></div>
	<div class="col-md-3 col-sm-3 col-xs-3 " ><a href="docprofile.php?id=<?php echo $row['emp_id']?>" class="btn btn-success">View profile</a></div>
	<div class="col-md-3 col-sm-3 col-xs-3 " ><a href="appointment.php?doc_id=<?php echo $row['emp_id']?>" class="btn btn-info">Make Appointment</a></div>
	</div>
<?php } ?>
</div>
<hr>