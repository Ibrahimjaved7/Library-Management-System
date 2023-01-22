<!DOCTYPE html>
<html>
<head>
	<?php include_once 'inc/header.php'; ?>
</head>
<body onload="getstdRoll();">
	<?php include_once 'inc/nav.php'; ?>
	<div class="container" style="margin-top: 2%;">
		<h2 style="text-align: center;">Change allotment Status</h2>
		<hr style="width: 25%">
	</div>

	<div class="container">
		<form id="myform" method="get">
			<label>
				Student Roll No
			</label>
			<br>
			<select id="selectBox" onchange="getAllotbookName();">
				<option value=""></option>
			</select>
			<br>
			<label>
				Book Name
			</label>
			<br>
			<select id="bname">
				<option value=""></option>
			</select>
			<br>
			<label>
				Status
			</label>
			<br>
			<select id="status">
				<option value=""></option>
				<option value="Active">Active</option>
				<option value="Inactive">Inactive</option>
			</select>
			<br>
			<input type="button" value="Submit" class="btn btn-success" id="sbtbtn" onclick="change_status();">
		</form>
	</div>

	<div class="container" id="return_back_home" style="border: none;">
		<button class="btn btn-outline-danger" id="return_back" onclick='location.href="index.php"'>
			Return Back
		</button><br>
	</div>
	
	<?php include_once 'inc/footer.php'; ?>
</body>
</html>