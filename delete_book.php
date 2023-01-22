<!DOCTYPE html>
<html>
<head>
	<?php include_once 'inc/header.php'; ?>
</head>
<body onload="getbookName()">
	<?php include_once 'inc/nav.php'; ?>

	<div class="container" style="margin-top: 2%;">
		<h2 style="text-align: center;">Delete book</h2>
		<hr style="width: 25%">
	</div>

	<div class="container">
		<form id="myform">
			<label>
				Book Name
			</label>
			<br>
			<select id="selectBox" onchange="getisbn()">
				<option value=""></option>
			</select>
			<br>
			<label>
				Book ISBN
			</label>
			<br>
			<input type="text" id="isbn" required>
			<br>
			<input type="button" value="Submit" class="btn btn-success" id="sbtbtn" onclick="delete_book();">
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