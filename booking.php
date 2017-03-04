<!--page for booking appointment-->
<?php sleep(1);
include("navig.php") ;?>

<div class="container-fluid bg-color ">
	<div class="container banner-content " >
	 <h1 id="welcome-text"><center style="margin-top:100px; margin-bottom:25px;">Find And Book Appointments</center></h1> </br>
		<form action="" method="POST" role="form">
			<div class="col-sm-4 ">
				<div class="select">
					<select name="" id="input" class="form-control specialist " required="required" title="specialist is required">
						<option > Select Specialist</option>
						<optgroup label="Top Specialist">
						<option value="1">Cardiologist</option>
						<option value="2">Nureosurgeon</option>
						<option value="3">Orthopedician</option>
						<option value="4">Oncologist</option>
						<option value="5">Dentist</option>              	
						</optgroup>
						<optgroup label="Other Specialist"><hr>
						<option value="1">Nureologist</option>
						<option value="2">Psychiatrist</option>
						<option value="3">Pediatrician</option>
						<option value="4">Allergist</option>
						<option value="5">Anesthesiologist</option>              	
						</optgroup>
					</select>
				</div>
		    </div>

			<div class="col-sm-7">
				<div class="select">
				   <input type="text" name="" id="input" class="form-control  specialist " placeholder="Enter The Doctor Name" required="required" title="Dr.name is required">
				</div>
			</div>
			<div class="col-sm-1">

				<button type="submit" class="select btn-block" style=" background-color: #06a5e0;"><img src="images/search-icon.png" width="46px" height="46px" /></button>

			</div>

		</form>
	</div>
</div>