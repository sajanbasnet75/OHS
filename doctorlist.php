<div class="container" style="padding: 2%; ">
  	<?php  while($row=mysqli_fetch_assoc($query_run)){?> 
    </br>
	<div class="row">
		<div class="col-xs-12 col-md-4">
        <?php echo $row['field']; ?>
		<h2 ><?php echo $row['name']; ?></h2>
		<h5><a href="docprofile.php?id=<?php echo $row['emp_id']?>">View profile</a></br></h5>
		<h3><a href="appointment.php?id=<?php echo $row['emp_id']?>">Make appointment</a></h3>
		</div>
	</div>
<?php
}?>
</div>