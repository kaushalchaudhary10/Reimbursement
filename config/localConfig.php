<?php 
	
	// Database name
	$database_name = 'Reimbursement';
	//folder path
	$GLOBALS['dir_path'] = dirname(dirname(__FILE__));
	// Connection string
	$conn = mysqli_connect('localhost', 'test', 'test1234');
	// Check connection
	if(!$conn) {
		echo 'Connection error '. mysqli_connect_error();
	}

	// Creating database
	if (!mysqli_select_db($conn, $database_name)) {
  	  
  	  $sql = "CREATE DATABASE $database_name";

  	  if (!$conn->query($sql) === TRUE) {
        echo 'Error creating database: ' . $conn->error . "\n"; 
  	  } 
	}

	mysqli_select_db($conn, $database_name);
?>