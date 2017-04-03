<!--page for booking appointment-->
<?php
include("dbconnection.php");	

?>
<!DOCTYPE html>
<html>
<head>
  <?php 
   include("head.php");
   ?>
</head>
<body>
 <header class="main-header">
 <div class="header-top">
 <div class="container-fluid">
          <div class="col-sm-4 col-xs-4" id="top-lefts">         	
            	<a href="#"><i class="fa fa-phone" aria-hidden="true" style="color:#42b3e5;"></i>&nbsp (+977) 1234567896</a>
          </div>
          <div class="col-sm-4 col-xs-4" id="top-lefts"> 
                <a href="#"><i class="fa fa-envelope" aria-hidden="true" style="color:#42b3e5;"></i>&nbsp codemandu@domain.com</a>
          </div>
          <div class="col-sm-4 col-xs-4 pull-right" id="top-right">
            			      <a href="#"><span class="fa fa-facebook"></span></a>
                        <a href="#"><span class="fa fa-google-plus">&nbsp &nbsp</span></a>
                        <a href="#"><span class="fa fa-twitter">&nbsp &nbsp</span></a>
                       
                       </div>
 </div>
 </div>
</header>
<div class="container-fluid mybanner">
<div class="bg-color">
  <?php include('navig.php');?>
                
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
						<option value="Nureologist">Nureologist</option>
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
			if(isset($_GET['submit'])){
				$field=$_GET['field'];
				if($field=="all")
					$field="%";
				$key=$_GET['key'];
				if (empty($key))
					$key="%";
				$key='%'.$key.'%';
				$query="SELECT * FROM employee NATURAL JOIN employee_detail WHERE field LIKE '$field' AND name LIKE '$key'";
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