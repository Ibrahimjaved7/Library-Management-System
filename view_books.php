<!DOCTYPE html>
<html>
<head>
	<?php include_once 'inc/header.php'; ?>
</head>
<body onload="view_book()">
	<?php include_once 'inc/nav.php'; ?>
	<div class="container" style="margin-top: 2%;">
		<h2 style="text-align: center;">View All Book</h2>
		<hr style="width: 25%">
	</div>

	<div id="myid">

	</div>

	<div class="container" id="desc" style="display: none;">
		<div class="row">
			<div class="col-sm-4">
				<img src="" id="b_image">
			</div>
			<div class="col-sm-8" id="desc_body">
				
			</div>
		</div>
		<button class="btn btn-outline-danger" id="return_back_table" onclick="display_book_table()">
			Return Back
		</button><br>
	</div>

	<div class="container" id="return_back_home" style="border: none;">
		<button class="btn btn-outline-danger" id="return_back" onclick='location.href="index.php"'>
			Return Back
		</button><br>
	</div>
	
	<?php include_once 'inc/footer.php'; ?>
</body>
</html>