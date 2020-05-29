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


   
	// if(isset($_POST['data'])) {

   	  $selectQuery = $tableName = '';

   	  // check connection
      if(!$conn){
        die('Could not Connect My Sql:' .mysqli_error());
	  }
	  	
	  // escaping the special character passed by user
	  // if(isset($_POST['tableName'])) {
	  	$tableName = mysqli_real_escape_string($conn, $tableName);
	  	$tableName = "Conveyance";
	  	switch($tableName) {
	  		case "Conveyance" :
	  		$arrRequiredField = array('Conveyance_strID', 'Conveyance_dtmFrom', 'Conveyance_dtmTo',
	  			'Conveyance_strpurpose', 'Conveyance_strmode', 'Conveyance_intKM', 'Conveyance_strInvoiceNumber', 'Conveyance_mnyAmout', 'Conveyance_strAttachment', 'Conveyance_strShortDesc');

	  		break;

	  		case "Hotel" :
	  		$arrRequiredField = array('Hotel_strID', 'Hotel_dtmFrom', 'Hotel_dtmTo',
	  			'Hotel_strHotelName', 'Hotel_strInvoiceNumber', 'Hotel_mnyAmout', 'Hotel_strAttachment');
	  		break;

	  		case "Food" :
	  		$arrRequiredField = array('Food_strID', 'Food_dtmFrom', 'Food_dtmTo',
	  			'Food_strInvoiceNumber', 'Food_mnyAmout', 'Food_strAttachment');
	  		break;

	  		case "Mobile" :
	  		$arrRequiredField = array(`Mobile_strID`, `Mobile_dtmFrom`, `Mobile_dtmTo`, `Mobile_strInvoiceNumber`, `Mobile_mnyAmout`, `Mobile_strAttachment`);
	  		break;

	  		case "Internet" :
	  		$arrRequiredField = array(`Internet_strID`, `Internet_dtmFrom`, `Internet_dtmTo`, `Internet_strInvoiceNumber`, `Internet_mnyAmout`, `Internet_strAttachment`);
	  		break;

	  		case "Others" :
	  		$arrRequiredField = array(`Others_strID`, `Others_dtmFrom`, `Others_dtmTo`, `Others_strDescription`, `Others_strInvoiceNumber`, `Others_mnyAmout`, `Others_strAttachment`);
	  		break;
	  	}
	  	foreach($arrRequiredField as $columnName) {
	  		$arrRequiredValue[] = mysqli_real_escape_string($conn, $_POST[$columnName]);
	  	}
	  	$selectQuery = "INSERT INTO tbl{$tableName} (" . implode(",", $arrRequiredField) . ") VALUES( ". implode(",", $arrRequiredValue). ");";
      	
	  // }

      	// Execute the select query for selected Conveyance Type
  	  	$result = $conn->query($selectQuery);
  	  	
  	  	$getConveyance = $result->fetch_all(MYSQLI_ASSOC);
  	  	echo "importing data from tbl{$tableName} <br />";
  	  	print_r($getConveyance);
  	  	mysqli_free_result($result);
  	  	// mysqli_close();
	// }
?>