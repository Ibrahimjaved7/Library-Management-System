<?php
class ModalOperations {

	public function addformdata($isbn, $bname, $desc, $author, $edition, $publication, $img) {	
		// Create connection
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
		$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}
		// prepare and bind
		$stmt = $conn -> prepare("INSERT INTO `books`(`ISBN`,`Book_Name`,`book_description`, `Author`, `Edition`, 
			`Year of Publication`, `Book_image`) VALUES (?,?,?,?,?,?,?)");
		$stmt -> bind_param("sssssss", $isbn, $bname,$desc, $author, $edition, $publication,$img);
		$stmt -> execute();
		$id = $conn -> insert_id;
		$stmt -> close();
		$conn -> close();
		return $id;
	}

	public function removeData($isbn) {	
		// Create connection
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
		$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}
		// prepare and bind
		$stmt = $conn -> prepare("DELETE FROM books WHERE ISBN=$isbn");
		$stmt -> execute();
		$stmt -> close();
		$sql = "UPDATE `allotments` SET `Allot_Status`='closed' WHERE `Roll_No`= '".$roll."'";
		$conn -> query($sql);
		$conn -> close();
	}

	public function getitems() {

			// Create connection
			$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
			$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
			// Check connection
			if ($conn -> connect_error) {
				return false;
			}
			
			$sql = "SELECT * From `books`";
			$result = $conn -> query($sql);
			$conn -> close();
			return $result;
		}

public function getBookData($bname) {

			// Create connection
			$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
			$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
			// Check connection
			if ($conn -> connect_error) {
				return false;
			}
			
			$sql = "SELECT * From `books` WHERE `Book_Name`='".$bname."'";
			$result = $conn -> query($sql);
			$conn -> close();
			return $result;
		}

		public function getbookitem($bname) {

			// Create connection
			$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
			$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
			// Check connection
			if ($conn -> connect_error) {
				return false;
			}
			
			$sql = "SELECT `Book_Name` From `books` WHERE `Quantity` > '0'";
			$result = $conn -> query($sql);
			$conn -> close();
			return $result;
		}

public function getAllotbookName($rollno) {

			// Create connection
			$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
			$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
			// Check connection
			if ($conn -> connect_error) {
				return false;
			}
			
			$sql = "SELECT `Book_Allot` From `allotments` WHERE `Roll_No`='".$rollno."'";
			$result = $conn -> query($sql);
			$conn -> close();
			return $result;
		}


public function getISBN($bname) {

			// Create connection
			$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
			$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
			// Check connection
			if ($conn -> connect_error) {
				return false;
			}
			
			$sql = "SELECT `ISBN` From `books` WHERE `Book_Name`='".$bname."'";
			$result = $conn -> query($sql);
			$conn -> close();
			return $result;
	}

	public function addUpdateBook($isbn, $bname, $desc, $author, $edition, $publication, $quantity, $img) {	
		// Create connection
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
		$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}
		// prepare and bind
		$stmt = $conn -> prepare("UPDATE `books` SET `ISBN` = ?,`Book_Name`=?,`book_description`=?, `Author`=?, `Edition`=?,
			`Year of Publication`=?, `Quantity`=?, `Book_image`=? WHERE `ISBN`=?");
		$stmt -> bind_param("sssssssss", $isbn, $bname,$desc, $author, $edition, $publication,$quantity,$img, $isbn);
		$stmt -> execute();
		$stmt -> close();
		$conn -> close();
	}


	public function getitemsDesc($bID) {

			// Create connection
			$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
			$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
			// Check connection
			if ($conn -> connect_error) {
				return false;
			}
			
			$sql = "SELECT * From `books` WHERE `Book_ID`='".$bID."'";
			$result = $conn -> query($sql);
			$conn -> close();
			return $result;
		}

	public function addAllotdata($std_rollno, $std_name, $b_name, $date, $sat) {	
			// Create connection
			$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
			$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
			// Check connection
			if ($conn -> connect_error) {
				return null;
			}
			// prepare and bind
			$stmt = $conn -> prepare("INSERT INTO `allotments`(`Roll_No`,`Student_Name`,`Book_Allot`,`Allot Date`, 
				`Allot_Status`) VALUES (?,?,?,?,?)");
			$stmt -> bind_param("sssss", $std_rollno, $std_name, $b_name, $date, $sat);
			$stmt -> execute();
			$id = $conn -> insert_id;
			$stmt -> close();
			$sql = "UPDATE `books` SET `Quantity`= `Quantity` - 1 WHERE `Book_Name`= '".$b_name."'";
			$result = $conn -> query($sql);
			$conn -> close();
			return $id;
		}

	public function changedata($input1, $input2, $input3) {	
		// Create connection
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
		$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}


		if ($input3 === "Inactive") 
		{
			$stmt = $conn -> prepare("UPDATE `allotments` SET `Allot_Status`=? WHERE `Roll_No`= ?");
			$stmt -> bind_param("ss", $input3, $input1);
			$stmt -> execute();
			$stmt -> close();
			$sql = "UPDATE `books` SET `Quantity`= `Quantity` + 1 WHERE `Book_Name`= '".$input2."'";
			$result = $conn -> query($sql);
			$conn -> close();
		}

		if ($input3 === "Active"){
			$stmt = $conn -> prepare("UPDATE `allotments` SET `Allot_Status`=? WHERE `Roll_No`= ?");
			$stmt -> bind_param("ss", $input3, $input1);
			$stmt -> execute();
			$stmt -> close();
			$sql = "UPDATE `books` SET `Quantity`= `Quantity` - 1 WHERE `Book_Name`= '".$input2."'";
			$result = $conn -> query($sql);
			$conn -> close();
		}
		
	}

	public function getAllotitems() {

			// Create connection
			$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
			$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
			// Check connection
			if ($conn -> connect_error) {
				return false;
			}
			
			$sql = "SELECT * From `allotments`";
			$result = $conn -> query($sql);
			$conn -> close();
			return $result;
		}

	public function getStdRoll() {

			// Create connection
			$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
			$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
			// Check connection
			if ($conn -> connect_error) {
				return false;
			}
			
			$sql = "SELECT `roll_no` From `student`";
			$result = $conn -> query($sql);
			$conn -> close();
			return $result;
	}

	public function getStdName($roll) {

			// Create connection
			$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
			$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
			// Check connection
			if ($conn -> connect_error) {
				return false;
			}
			
			$sql = "SELECT `std_name` From `student` WHERE `roll_no`='".$roll."'";
			$result = $conn -> query($sql);
			$conn -> close();
			return $result;
	}


	public function addstddata($rollno, $name, $email, $add, $lat, $lon) {	
		// Create connection
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
		$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}
		// prepare and bind
		$stmt = $conn -> prepare("INSERT INTO `student`(`roll_no`,`std_name`, `std_address`, `latitude`, 
			`longitude`) VALUES (?,?,?,?,?)");
		$stmt -> bind_param("sssss", $rollno, $name, $add, $lat, $lon);
		$stmt -> execute();
		$stmt -> close();
		$conn -> close();

	}

	public function getStd($roll) {

			// Create connection
			$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
			$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
			// Check connection
			if ($conn -> connect_error) {
				return false;
			}
			
			$sql = "SELECT * From `student` WHERE `roll_no`='".$roll."'";
			$result = $conn -> query($sql);
			$conn -> close();
			return $result;
	}

	public function updateData($rollno, $name, $add, $lat, $lon){	
		// Create connection
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
		$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}
		// prepare and bind
		$stmt = $conn -> prepare("UPDATE `student` SET `roll_no` = ?,`std_name` = ?, `std_address` = ?, 
			`latitude` = ?,`longitude` = ? where `roll_no` = ?");
		$stmt -> bind_param("ssssss", $rollno, $name, $add, $lat, $lon, $rollno);
		$stmt -> execute();
		$stmt -> close();
		$conn -> close();
	}


	public function removeStd($roll) {	
		// Create connection
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
		$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}
		// prepare and bind
		$sql = "DELETE FROM `student` WHERE `roll_no`='".$roll."'";
		$result = $conn -> query($sql);
		$sql = "UPDATE `allotments` SET `Allot_Status`='closed' WHERE `Roll_No`= '".$roll."'";
		$conn -> query($sql);
		$conn -> close();
	}

	public function getStditems() {

			// Create connection
			$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/A3/inc/' . 'config.ini');
			$conn= new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
			// Check connection
			if ($conn -> connect_error) {
				return false;
			}
			
			$sql = "SELECT * From `student`";
			$result = $conn -> query($sql);
			$conn -> close();
			return $result;
		}

}

?>