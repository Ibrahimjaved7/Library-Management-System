<!DOCTYPE html>
<html>
<head>
	<?php include_once 'inc/header.php'; ?>

</head>
<body>
	<?php include_once 'inc/nav.php'; ?>
	<div class="container" style="margin-top: 2%;">
		<h2 style="text-align: center;">Add Student Record</h2>
		<hr style="width: 25%">
	</div>

	<div class="container">
		<form id="myform">
			<label>
				Roll No
			</label>
			<br>
			<input type="text" id="rollno" required>
			<br>
			<label>
				Student Name
			</label> 
			<br>
			<input type="text" id="std_name" required>
			<br>
			<label>
				student Email
			</label>
			<br>
			<input type="Email" id="email" placeholder="" value="" required>
			<br>
			<label>
				student Address
			</label>
			<br>
			<input type="text" id="pac-input" placeholder="" value="Pakistan" required>
			<br>
			<input type="hidden" id="lattitude" />
			<input type="hidden" id="longitude" />	
			<div class="row">
				<div id="map" style="margin-bottom: 10px">
						
				</div>
			</div>
				
			<div class="row">		  
				<input type="hidden" id="lattitude" />
			    <input type="hidden" id="longitude" />
			</div>
			<input type="button" value="Submit" class="btn btn-success" id="sbtbtn" onclick="add_new_std();">
		</form>
		<br><br>
	</div>

	<div class="container" id="return_back_home" style="border: none;">
		<button class="btn btn-outline-danger" id="return_back" onclick='location.href="index.php"'>
			Return Back
		</button><br>
	</div>
	
	<?php include_once 'inc/footer.php'; ?>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIScuh5bEdKup46Me9H6VpFJpL6vN8YEQ&libraries=places&callback=initAutocomplete" async defer></script>
</body>
</html>