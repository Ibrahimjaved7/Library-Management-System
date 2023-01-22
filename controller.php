<?php
include ('model.php');
include_once 'code.php';
include_once 'mailerClass/PHPMailerAutoload.php';



if (isset($_REQUEST['action'])) {
	if ($_REQUEST['action'] == 'adddata') {
		$addobj = new ModalOperations();
		$id = $addobj -> addformdata($_REQUEST['isbn'], $_REQUEST['bname'],$_REQUEST['desc'], $_REQUEST['author'], 
			$_REQUEST['edition'], $_REQUEST['publication'], $_REQUEST['img']);
		echo json_encode($id);	
	}
}

if (isset($_REQUEST['action'])) {
	if ($_REQUEST['action'] == 'removedata') {
		$rvmobj = new ModalOperations();
		$id = $rvmobj -> removeData($_REQUEST['isbn']);
		echo json_encode($id);	
	}
}

if (isset($_REQUEST['action'])) {

	if ($_REQUEST['action'] == 'getitems') {
		
		$dobj = new ModalOperations();
		
		$itemsarr = array();
		
		$campres = $dobj -> getitems();
		
		if ($campres -> num_rows > 0) {

		while ($row = $campres -> fetch_assoc()) {
			$itemsarr['b_id'][] = $row['Book_ID'];
			$itemsarr['isbn'][] = $row['ISBN'];
			$itemsarr['bname'][] = $row['Book_Name'];
			$itemsarr['author'][] = $row['Author'];
			$itemsarr['edition'][] = $row['Edition'];
			$itemsarr['publication'][] = $row['Year of Publication'];
			$itemsarr['quantity'][] = $row['Quantity'];
		}

		}
		
		echo json_encode($itemsarr);
	}	
}

if (isset($_REQUEST['action'])) {

	if ($_REQUEST['action'] == 'getbookName') {
		
		$dobj = new ModalOperations();
		
		$itemsarr = array();
		
		$campres = $dobj -> getbookitem($_REQUEST['bname']);
		
		if ($campres -> num_rows > 0) {

		while ($row = $campres -> fetch_assoc()) {
			$itemsarr['bname'][] = $row['Book_Name'];
		}

		}
		
		echo json_encode($itemsarr);
	}	
}


if (isset($_REQUEST['action'])) {

	if ($_REQUEST['action'] == 'getAllotbookName') {
		
		$dobj = new ModalOperations();
		
		$itemsarr = array();
		
		$campres = $dobj -> getAllotbookName($_REQUEST['rollno']);
		
		if ($campres -> num_rows > 0) {

		while ($row = $campres -> fetch_assoc()) {
			$itemsarr['bname'][] = $row['Book_Allot'];
		}

		}
		
		echo json_encode($itemsarr);
	}	
}



if (isset($_REQUEST['action'])) {

	if ($_REQUEST['action'] == 'getisbn') {
		
		$dobj = new ModalOperations();
		$id = $dobj -> getISBN($_REQUEST['bname']);
		$itemsarr = array();
		
		if ($id -> num_rows > 0) {

		while ($row = $id -> fetch_assoc()) {
			$itemsarr['isbn'][] = $row['ISBN'];
		}

		}
		
		echo json_encode($itemsarr);
	}	
}

if (isset($_REQUEST['action'])) {

	if ($_REQUEST['action'] == 'getBookData') {
		
		$dobj = new ModalOperations();
		$id = $dobj -> getBookData($_REQUEST['bname']);
		$itemsarr = array();
		
		if ($id -> num_rows > 0) {

		while ($row = $id -> fetch_assoc()) {
			$itemsarr['b_id'][] = $row['Book_ID'];
			$itemsarr['isbn'][] = $row['ISBN'];
			$itemsarr['bname'][] = $row['Book_Name'];
			$itemsarr['b_desc'][] = $row['book_description'];
			$itemsarr['author'][] = $row['Author'];
			$itemsarr['edition'][] = $row['Edition'];
			$itemsarr['publication'][] = $row['Year of Publication'];
			$itemsarr['img'][] = $row['book_image'];
		}

		}
		
		echo json_encode($itemsarr);
	}	
}

if (isset($_REQUEST['action'])) {
	if ($_REQUEST['action'] == 'addUpdateBook') {
		$addobj = new ModalOperations();
		$id = $addobj -> addUpdateBook($_REQUEST['isbn'], $_REQUEST['bname'],$_REQUEST['desc'], $_REQUEST['author'], 
			$_REQUEST['edition'], $_REQUEST['publication'], $_REQUEST['quantity'], $_REQUEST['img']);
		echo json_encode($id);	
	}
}



if (isset($_REQUEST['action'])) {

	if ($_REQUEST['action'] == 'displayDesc') {
		
		$dobj = new ModalOperations();
		
		$itemsarr = array();
		
		$campres = $dobj -> getitemsDesc($_REQUEST['bId']);
		
		if ($campres -> num_rows > 0) {

		while ($row = $campres -> fetch_assoc()) {
			$itemsarr['b_id'][] = $row['Book_ID'];
			$itemsarr['isbn'][] = $row['ISBN'];
			$itemsarr['bname'][] = $row['Book_Name'];
			$itemsarr['bdesc'][] = $row['book_description'];
			$itemsarr['author'][] = $row['Author'];
			$itemsarr['edition'][] = $row['Edition'];
			$itemsarr['publication'][] = $row['Year of Publication'];
			$itemsarr['img'][] = $row['book_image'];
		}

		}
		
		echo json_encode($itemsarr);
	}	
}

if (isset($_REQUEST['action'])) {
	if ($_REQUEST['action'] == 'addallotdata') {
		$addobj = new ModalOperations();
		$id = $addobj -> addAllotdata($_REQUEST['std_rollno'], $_REQUEST['std_name'], $_REQUEST['b_name'], $_REQUEST['date'], $_REQUEST['sat']);
		echo json_encode($id);	
	}
}

if (isset($_REQUEST['action'])) {
	if ($_REQUEST['action'] == 'changedata') {
		$chng = new ModalOperations();
		$chng -> changedata($_REQUEST['input1'], $_REQUEST['input2'], $_REQUEST['input3']);
	}
}

if (isset($_REQUEST['action'])) {

	if ($_REQUEST['action'] == 'getallotitems') {
		
		$dobj = new ModalOperations();
		
		$itemsarr = array();
		
		$campres = $dobj -> getAllotitems();
		
		if ($campres -> num_rows > 0) {

		while ($row = $campres -> fetch_assoc()) {
			$itemsarr['a_id'][] = $row['Allot_ID'];
			$itemsarr['rollno'][] = $row['Roll_No'];
			$itemsarr['sname'][] = $row['Student_Name'];
			$itemsarr['b_allot'][] = $row['Book_Allot'];
			$itemsarr['date'][] = $row['Allot Date'];
			$itemsarr['a_status'][] = $row['Allot_Status'];
		}

		}
		
		echo json_encode($itemsarr);
	}	
}


if (isset($_REQUEST['action'])) {

	if ($_REQUEST['action'] == 'getstdroll') {
		
		$dobj = new ModalOperations();
		$id = $dobj -> getStdRoll();
		$itemsarr = array();
		
		if ($id -> num_rows > 0) {

		while ($row = $id -> fetch_assoc()) {
			$itemsarr['id'][] = $row['roll_no'];
		}

		}
		
		echo json_encode($itemsarr);
	}	
}

if (isset($_REQUEST['action'])) {

	if ($_REQUEST['action'] == 'getstdName') {
		
		$dobj = new ModalOperations();
		$id = $dobj -> getStdName($_REQUEST['roll']);
		$itemsarr = array();
		
		if ($id -> num_rows > 0) {

		while ($row = $id -> fetch_assoc()) {
			$itemsarr['name'][] = $row['std_name'];
		}

		}
		
		echo json_encode($itemsarr);
	}	
}

if (isset($_REQUEST['action'])) {
	if ($_REQUEST['action'] == 'addstddata') {

		
		$name=$_REQUEST['name'];
		$email=$_REQUEST['email'];
		$message="You have being Registered Successfully";
		$body=' <p align="justify" class="lead"><strong>'.$message.'</strong></p>';
		$check=	send_email($email,"Registeration Successfull",$body);
		if($check)
		{
			$msg="Email has been sent";
			$sts="success";
		}
		else{
			$msg="Something went wrong";
			$sts="danger";
		}

		$addobj = new ModalOperations();
		$id = $addobj -> addstddata($_REQUEST['rollno'], $_REQUEST['name'], $_REQUEST['email'], $_REQUEST['add'], 
			$_REQUEST['lat'], $_REQUEST['lon']);
		echo json_encode($id);	
	}
}


if (isset($_REQUEST['action'])) {

	if ($_REQUEST['action'] == 'getstd') {
		
		$dobj = new ModalOperations();
		$id = $dobj -> getStd($_REQUEST['roll']);
		$itemsarr = array();
		
		if ($id -> num_rows > 0) {

		while ($row = $id -> fetch_assoc()) {
			$itemsarr['id'][] = $row['std_id'];
			$itemsarr['roll'][] = $row['roll_no'];
			$itemsarr['name'][] = $row['std_name'];
			$itemsarr['std_add'][] = $row['std_address'];
			$itemsarr['lat'][] = $row['latitude'];
			$itemsarr['lon'][] = $row['longitude'];
		}

		}
		
		echo json_encode($itemsarr);
	}	
}

if (isset($_REQUEST['action'])) {
	if ($_REQUEST['action'] == 'updateStdData') {
		$addobj = new ModalOperations();
		$id = $addobj -> updateData($_REQUEST['rollno'], $_REQUEST['name'], $_REQUEST['add'], 
			$_REQUEST['lat'], $_REQUEST['lon']);
		echo json_encode($id);	
	}
}

if (isset($_REQUEST['action'])) {
	if ($_REQUEST['action'] == 'removeStd') {
		$rvmobj = new ModalOperations();
		$id = $rvmobj -> removeStd($_REQUEST['roll']);
		echo json_encode($id);	
	}
}

if (isset($_REQUEST['action'])) {

	if ($_REQUEST['action'] == 'getstditems') {
		
		$dobj = new ModalOperations();
		
		$itemsarr = array();
		
		$campres = $dobj -> getStditems();
		
		if ($campres -> num_rows > 0) {

		while ($row = $campres -> fetch_assoc()) {
			$itemsarr['std_id'][] = $row['std_id'];
			$itemsarr['rollno'][] = $row['roll_no'];
			$itemsarr['sname'][] = $row['std_name'];
			$itemsarr['s_add'][] = $row['std_address'];
			
		}

		}
		
		echo json_encode($itemsarr);
	}	
}

?>