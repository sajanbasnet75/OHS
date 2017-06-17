<!--page for booking appointment-->
<?php
include("include/dbconnection.php");	

?>
<!DOCTYPE html>
<html>
<head>
  <?php 
   include("include/head.php");
   ?>
</head>
<body>
 <?php include('include/header.php'); ?>
<div class="container-fluid mybanner">
<div class="bg-color">
  <?php include('include/navig.php');?>
                
 <div class="container banner-content " >
	 <h1 id="welcome-text"><center style="margin-top:100px; margin-bottom:25px;">Find And Book Appointments</center></h1> </br>
		<form action="" method="GET" role="form">
			<div class="col-sm-4 ">
				<div class="select">
					<select name="field" id="input" class="form-control specialist " required="required" title="specialist is required" >
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
						<option value="Neurologist">Neurologist</option>
						<option value="Psychiatrist">Psychiatrist</option>
						<option value="Pediatrician">Pediatrician</option>
						<option value="Allergist">Allergist</option>
						<option value="Anesthesiologist">Anesthesiologist</option>              	
						</optgroup>
					</select>
				</div>
		    </div>
		    <div>
		    	
		    </div>

			<div class="col-sm-7">
				<div class="select">
				   <input type="text" name="key" id="input" class="form-control  specialist " placeholder="Enter Doctor's Name">
				</div>
			</div>
			<div class="col-sm-1">
				<button type="submit" class="select btn-block" name="submit" style=" background-color: #06a5e0;"><img src="images/search-icon.png" width="46px" height="46px" /></button>

			</div>

		</form>
		</div>
		<?php
			if(isset($_GET['submit'])||isset($_GET['field'])){
				$field=mysqli_real_escape_string($connect,$_GET['field']);
				if($field=="all")
					$field="%";
				if(isset($_GET['key'])){
				$key=mysqli_real_escape_string($connect,$_GET['key']);
				if (empty($key))
					$key="%";
				$key='%'.$key.'%';
				}
				else
					$key='%';
				$query="SELECT * FROM users u JOIN employee_detail e WHERE u.user_id = e.emp_id and field LIKE '$field' AND name LIKE '$key' LIMIT 25";
				$query_run=mysqli_query($connect,$query);
				if(mysqli_num_rows($query_run)==NULL){
					echo'<h4 style="margin-left:12%; margin-top:1%;">No result found</h4>';
				}
				else{ 
					include("doctorlist.php");				         
	         	}
	         }
	     if(isset($_GET['spec'])){
				$spec=mysqli_real_escape_string($connect,$_GET['spec']);
				$query="SELECT * FROM employee_detail WHERE field LIKE '$spec' LIMIT 25";
				$query_run=mysqli_query($connect,$query);
				if(mysqli_num_rows($query_run)==NULL){
					echo'<h4 style="margin-left:4%">No result found</h4>';
				}
				else{ 
					include("doctorlist.php");				         
	         	}
	     }
	     
	    ?>

</div>
</div>
<?php  include("top_specialist.php"); ?>
</body>
</html>