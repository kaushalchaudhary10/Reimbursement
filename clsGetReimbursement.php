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
   $getConveyance = $getRecords = array();
   
   if(isset($_POST['btnGetData'])) {

   	  // check connection
      if(!$conn){
        die('Could not Connect My Sql:' .mysqli_error());
	  }

	  // check isset table name is not ALL else retrive the data for all Reimbursement
	  if(isset($_POST['tableName']) AND ($_POST['tableName'] != 'All')) {
	  	$arrTable[] = $_POST['tableName'];
	  }else {
	  	$arrTable = array('Conveyance', 'Hotel', 'Food', 'Mobile', 'Internet', 'Others');
	  }

	  // iterarting the array table
	  foreach ($arrTable as $tableName) {
	  	
	  	// escaping the special character passed by user
      	$tableName = mysqli_real_escape_string($conn, $tableName);

      	// form select statement for selected Conveyance Type
      	$selectQuery = "SELECT * FROM tbl{$tableName} ";

      	// check whether date range is passed or not
      	if((isset($_POST['dtmFrom']) && !empty($_POST['dtmFrom'])) && (isset($_POST['dtmTo']) && !empty($_POST['dtmTo']))) {

      		$dtmFrom 	= mysqli_real_escape_string($conn, $_POST['dtmFrom']);
        	$dtmTo 	= mysqli_real_escape_string($conn, $_POST['dtmTo']);

        	$selectQuery .= "WHERE  {$tableName}_dtmFrom >='" . $dtmFrom . "' AND {$tableName}_dtmTo <= '" . $dtmTo . "';";
      	}

      	// Execute the select query for selected Conveyance Type
  	  	$result = $conn->query($selectQuery);
  	  	
  	  	// store the data in array formate with association of key and value
  	  	$getConveyance = $result->fetch_all(MYSQLI_ASSOC);

  	  	// check if not getting data for some Reimbursement
  	  	if(!empty($getConveyance)) {
  	  		array_push($getRecords, $getConveyance);
  	  	}

  	  	// free the memory result
  	  	mysqli_free_result($result);

  	  	// close the connect
  	  	// mysqli_close();
	  }
	  // echoing the result in JSON formate
	  echo json_encode($getRecords);
   }
?>