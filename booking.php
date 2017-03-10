<!--page for booking appointment-->
<?php sleep(1);
include("navig.php") ;?>

<div class="container-fluid bg-color ">
	<div class="container banner-content " >
	 <h1 id="welcome-text"><center style="margin-top:100px; margin-bottom:25px;">Find And Book Appointments</center></h1> </br>
		<form action="search.php" method="GET" role="form">
			<div class="col-sm-4 ">
				<div class="select">
					<select name="field" id="input" class="form-control specialist " required="required" title="specialist is required" >
						<option value=""> Select Specialist</option>
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
				   <input type="text" name="key" id="input" class="form-control  specialist " placeholder="Enter The Doctor Name" title="Dr.name is required">
				</div>
			</div>
			<div class="col-sm-1">
				<button type="submit" class="select btn-block" name="submit" style=" background-color: #06a5e0;"><img src="images/search-icon.png" width="46px" height="46px" /></button>

			</div>

		</form>
	</div>
</div>