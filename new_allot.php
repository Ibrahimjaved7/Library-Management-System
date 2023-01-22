<!DOCTYPE html>
<html>
<head>
	<?php include_once 'inc/header.php'; ?>
</head>
<body onload="getstdRoll();getbookName();">
	<?php include_once 'inc/nav.php'; ?>

	<div class="container" style="margin-top: 2%;">
		<h2 style="text-align: center;">Add new Allotment</h2>
		<hr style="width: 25%">
	</div>

	<div class="container">
		<form id="myform">
			<label>
				Roll No
			</label>
			<br>
			<select id="selectBox" onchange="getstdName();">
				<option value=""></option>
			</select>
			<br>
			<label>
				Student Name
			</label>
			<br>
			<input type="text" id="std_name" required>
			<br>
			<label>
				Book Name
			</label>
			<br>
			<select id="selectBook">
				<option value=""></option>
			</select>
			<br>
			<label>
				Date of Allotment
			</label>
			<br>
			<input type="date" id="allot_date" required>
			<br>
			<label>
				Allotment Status
			</label>
			<br>
			<select id="status">
				<option value=""></option>
				<option value="Active">Active</option>
				<option value="Inactive">Inactive</option>
			</select>
			<br>
			<input type="button" value="Submit" class="btn btn-success" id="sbtbtn" onclick="add_new_allot();">
		</form>
		<br><br>
	</div>

	<div class="container" id="return_back_home" style="border: none;">
		<button class="btn btn-outline-danger" id="return_back" onclick='location.href="index.php"'>
			Return Back
		</button><br>
	</div>
	
	<?php include_once 'inc/footer.php'; ?>

</body>
</html>