<!DOCTYPE html>
<html>
<head>
	<?php include_once 'inc/header.php'; ?>
</head>
<body onload="getstdRoll()">
	<?php include_once 'inc/nav.php'; ?>
	<div class="container" style="margin-top: 2%;">
		<h2 style="text-align: center;">Update Student Record</h2>
		<hr style="width: 25%">
	</div>

	<div class="container">
		<form id="myform">
			<label>
				Roll No
			</label>
			<br>
			<select id="selectBox">
				<option value=""></option>
			</select>
			<br>
			<label>
				Student Name
			</label>
			<br>
			<input type="text" id="std_name" required disabled />
			<br>
			<label>
				student Address
			</label>
			<br>
			<input type="text" id="pac-input" required placeholder="" value="Pakistan" required disabled />
			<br>
			<div class="row">
				<div id="map" style="margin-bottom: 10px">
						
				</div>
			</div>
				
			<div class="row">		  
				<input type="hidden" id="lattitude" />
			    <input type="hidden" id="longitude" />
			</div>
			<input type="button" value="Submit" class="btn btn-success" id="sbtbtn" onclick="getstd()" />
			<input type="button" value="Submit" class="btn btn-info" id="sbtbtn1" onclick="updateStdData()" style="display : none" />
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