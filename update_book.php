<!DOCTYPE html>
<html>
<head>
	<?php include_once 'inc/header.php'; ?>
</head>
<body onload="getbookName()">
	<?php include_once 'inc/nav.php'; ?>
	<div class="container" style="margin-top: 2%;">
		<h2 style="text-align: center;">Update Book Record</h2>
		<hr style="width: 25%">
	</div>

	<div class="container">
		<form id="myform">
			<label>
				Book Name
			</label>
			<br>
			<select id="selectBox" onchange="getbookdata()">
				<option value=""></option>
			</select>
			<br>
			<span style="display: none;" id="form_book_update">
			<label>
				Book ISBN
			</label>
			<br>
			<input type="text" id="isbn" required>
			<br>
			<label>
				Book Description
			</label>
			<br>
			<textarea style="width: 65%;" id="Description" required></textarea>
			<br>
			<label>
				Book Author
			</label>
			<br>
			<input type="text" id="b_author" required>
			<br>
			<label>
				Book Edition
			</label>
			<br>
			<input type="number" id="edition" required>
			<br>
			<label>
				Year of Publication
			</label>
			<br>
			<input type="date" id="publication" required>
			<br>
			<label>
				Quantity
			</label>
			<br>
			<input type="number" id="Quantity" required>
			<br>
			<input accept=".jpg,.png,.jpeg" name="f" type="file" id="book_img">
			<input type="submit"  value="Submit" id="sbtbtn" class="btn btn-success" onclick="updateBook();">
			</span>
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