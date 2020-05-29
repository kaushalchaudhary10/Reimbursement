<?php 
/****************** This is the class file for Reimbursement Application ******************
Description :  API prepared as per the given usecase. Below are the implementations performed -                           
1. Usecase#2: API to Fetch the All Reimbursement details Date wise         
2. Usecase#3: API to Fetch 1 Reimbursement Entry

Author      : Kaushal Chaudhary 
Version     : 1.0 
CreationDate: 29th May, 2020 
******************************************************************************************/
	
   require_once 'config/localConfig.php';

   $dtmFrom = $dtmTo = '';
   
   // if(isset($_GET['submit'])) {

   	  // check connection
      if(!$conn){
        die('Could not Connect My Sql:' .mysqli_error());
	  }

	  if(isset($_GET['tableName'])) {
	  	$arrTable[] = $_GET['tableName'];
	  }else {
	  	$arrTable = array('Conveyance', 'Hotel', 'Food', 'Mobile', 'Internet', 'Others');
	  }
	  
	  // iterarting by passed table or whole table
	  foreach ($arrTable as $tableName) {
	  	
	  	// escaping the special character passed by user
      	$tableName = mysqli_real_escape_string($conn, $tableName);

      	// form select statement for selected Conveyance Type
      	$selectQuery = "SELECT * FROM tbl{$tableName} ";

      	// echo $selectQuery;
      	if(isset($_GET['dtmFrom']) && isset($_GET['dtmTo'])) {

      		$dtmFrom 	= mysqli_real_escape_string($conn, $_GET['dtmFrom']);
        	$dtmTo 	= mysqli_real_escape_string($conn, $_GET['dtmTo']);

        	$selectQuery .= "WHERE  {$tableName}_dtmFrom >='" . $dtmFrom . "' AND {$tableName}_dtmTo <= '" . $dtmTo . "';";
      	}else{
      		$selectQuery .= " LIMIT 1;";
      	}

      	
      	// Execute the select query for selected Conveyance Type
  	  	$result = $conn->query($selectQuery);
  	  	
  	  	$getConveyance = $result->fetch_all(MYSQLI_ASSOC);
  	  	echo "importing data from tbl{$tableName} <br />";
  	  	print_r($getConveyance);
  	  	mysqli_free_result($result);
  	  	// mysqli_close();
	  }
   	  

   // }
?>