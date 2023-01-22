<!DOCTYPE html>
<html>
<head>
	<?php include_once 'inc/header.php'; ?>
</head>
<body class="hold-transition register-page">
	<?php include_once 'inc/nav.php'; ?>

	<div id="register_student" class="container">
		<h2 id="register_student_head" style="margin-left: -33%;">Register Student</h2>
		<button class="btn btn-outline-success" id="new_std" onclick='location.href="add_new_std.php"'>
			Add New Student
		</button><br>
		<button class="btn btn-outline-danger" id="delete_std" onclick='location.href="delete_std.php"'>
			Delete Student
		</button><br>
		<button class="btn btn-outline-info" id="update_std" onclick='location.href="update_std.php"'>
			Update Student
		</button><br>
		<button class="btn btn-outline-primary" id="veiw_std" onclick='location.href="veiw_std.php"'>
			Veiw All Student
		</button><br>
	</div>

	<div id="manage_books" class="container">
		<h2 id="manage_books_head">Manage Books</h2>
		<button class="btn btn-outline-success" id="new_book" onclick='location.href="add_new_book.php"'>
			Add New Books
		</button><br>
		<button class="btn btn-outline-danger" id="delete_book" onclick='location.href="delete_book.php"'>
			Delete Book	</button><br>
		<button class="btn btn-outline-info" id="update_book" onclick='location.href="update_book.php"'>
			Update Book	</button><br>
		<button class="btn btn-outline-primary" id="veiw_allot" onclick='location.href="view_books.php"'>
			View All Books
		</button><br>
	</div>

	<div id="manage_allotment" class="container">
		<h2 id="manage_allot_head" style="margin-left: -25%;">Manage Allotments</h2>
		<button class="btn btn-outline-success" id="new_allot" onclick='location.href="new_allot.php"'>
			Add New Allotment
		</button><br>
		<button class="btn btn-outline-info" id="allot_status" onclick='location.href="change_allot_status.php"'>
		Change Allotment Status
		</button>
		<br>
		<button class="btn btn-outline-primary" id="veiw_allot" onclick='location.href="view_Allot.php"'>
			View All Allotments
		</button><br>
	</div>

<?php include_once 'inc/footer.php'; ?>
</body>
</html>