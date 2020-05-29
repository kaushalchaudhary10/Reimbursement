<?php

require_once 'config/localConfig.php';

global $database_name, $dir_path;

$templine = '';

if(isset($_POST["submit"]))
{
	// Check connection
    if(!$conn){
        die('Could not Connect My Sql:' .mysqli_error());
	}

	$lines = file("$dir_path/table/tblReimbursementSchema.sql");
	// print_r($lines);die;
	// Loop through each line
	foreach ($lines as $line) {
		// Skip it if it's a comment
		if (substr($line, 0, 2) == '--' || $line == '')
	    	continue;

		// Add this line to the current segment
		$templine .= $line;
		// If it has a semicolon at the end, it's the end of the query
		if (substr(trim($line), -1, 1) == ';') {
	    	// Perform the query
	    	$conn->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . $conn->error . '<br /><br />');
	    	// Reset temp variable to empty
	    	$templine = '';
		}
	}
	
	unlink("$dir_path/table/tblReimbursementSchema.sql");
}
?>
