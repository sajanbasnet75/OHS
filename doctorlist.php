<div class="container" style="padding: 2%; ">
  <div class="row">
  <div class="col-md-3 col-sm-3 col-xs-3 "><b>Doctor</b></div>
  <div class="col-md-3 col-sm-3 col-xs-3 "><b>Field</b></div>
  
  </div>
	<?php  while($row=mysqli_fetch_assoc($query_run)){?> 
    </br>
	<div class="row">
	<div class="col-md-3 col-sm-2 col-xs-2 text-capitalize"><?php echo $row['name']; ?></div>
	<div class="col-md-3 col-sm-2 col-xs-2 text-capitalize"><?php echo $row['field']; ?></div>
	<div class="col-md-3 col-sm-4 col-xs-4 "><a href="docprofile.php?id=<?php echo $row['emp_id']?>" class="btn btn-success">View profile</a></div>
	<div class="col-md-3 col-sm-4 col-xs-4 "><a href="appointment.php?doc_id=<?php echo $row['emp_id']?>" class="btn btn-info">Make appointment</a></div>
	</div>
<?php
}?>