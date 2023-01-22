<!DOCTYPE html>
<html>
<head>
	<?php include_once 'inc/header.php'; ?>
</head>
<body>
	<?php include_once 'inc/nav.php'; ?>
	<center>
    <?php echo @$msg; ?>
    
  	</center>
	<div class="container" style="margin-top: 2%;">
		<h2 style="text-align: center;">Add new book</h2>
		<hr style="width: 25%">
	</div>

	<div class="container">
		<form id="myform" method="post" enctype="multipart/form-data">
			<label>
				Book Name
			</label>
			<br>
			<input type="text" id="b_name" required>
			<br>
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
			<input accept=".jpg,.png,.jpeg" name="f" type="file" id="book_img">
			<button type="" name="upload_btn" id="sbtbtn1" class="btn btn-success">Submit</button>
		</form>
		<br><br>
	</div>

	<div class="container" id="return_back_home" style="border: none;">
		<button class="btn btn-outline-danger" id="return_back" onclick='location.href="index.php"'>
			Return Back
		</button><br>
	</div>
	<?php 
			if (isset($_REQUEST['upload_btn'])) {
		    $f=$_FILES['f'];
		    //print_r($f);
		    $name=$f['name'];
		    $allowed=["jpg","png","jpeg", "JPG", "PNG", "JPEG"];
		    $path="uploads/".$name;
		    $size=($f['size'])/(1024*1024);
		    if($size>25){
		      $msg="Only allowed less than 25MB files";
		      $sts="warning";
		    }else{
		      
		      if(move_uploaded_file($f['tmp_name'], $path)){
		        $msg="File Uploaded Successfully";
		        }else{
		          $msg="Error in uploading";
		        }
		    
		  }
		  
		}
		    
	?>
	<?php include_once 'inc/footer.php'; ?>
	<script type="text/javascript">
	document.getElementById("sbtbtn1").addEventListener("click", add_new_book);
		
	</script>
</body>
</html>