<!DOCTYPE html>
<html>
<head>
	<?php include_once 'inc/header.php'; ?>
</head>
<body onload="view_std()">
	<?php include_once 'inc/nav.php'; ?>
	<div class="container" style="margin-top: 2%;">
		<h2 style="text-align: center;">View All Student</h2>
		<hr style="width: 25%">
	</div>

	<div id="myid" style="width: 80%; margin-left: 10%;">

	</div>

	<div class="container" id="return_back_home" style="border: none;">
		<button class="btn btn-outline-danger" id="return_back" onclick='location.href="index.php"'>
			Return Back
		</button><br>
	</div>
	
	<?php include_once 'inc/footer.php'; ?>
</body>
</html>