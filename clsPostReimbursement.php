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

  $selectQuery = $tableName = $errMessage = '';
  $arrRequiredField = $arrRequiredValue = array();

	if(isset($_POST['btnsubmit'])) {

   	  // check connection
      if(!$conn){
        die('Could not Connect My Sql:' .mysqli_error());
	  }
	  
	  // checking isset tableName
	  if(isset($_POST['tableName'])) {

	  	// escaping the special character passed by user
	  	$tableName = mysqli_real_escape_string($conn, $_POST['tableName']);

	  	// based on table Name getting the Required feild to form the query
	  	switch($tableName) {
	  	  case "Conveyance" :
	  		$arrRequiredField = 
	  		array('Conveyance_dtmFrom', 'Conveyance_dtmTo','Conveyance_strpurpose', 
	  		'Conveyance_strmode', 'Conveyance_intKM', 'Conveyance_strInvoiceNumber', 
	  		'Conveyance_mnyAmout', 'Conveyance_strAttachment', 'Conveyance_strShortDesc');
	  	  break;

	  	  case "Hotel" :
	  		$arrRequiredField = 
	  		array('Hotel_dtmFrom', 'Hotel_dtmTo', 'Hotel_strHotelName', 'Hotel_strInvoiceNumber', 
	  		'Hotel_mnyAmout', 'Hotel_strAttachment');
	  	  break;

	  	  case "Food" :
	  		$arrRequiredField = 
	  		array('Food_strInvoiceNumber', 'Food_mnyAmout', 'Food_strAttachment');
	  	  break;

	  	  case "Mobile" :
	  		$arrRequiredField = 
	  		array('Mobile_strInvoiceNumber', 'Mobile_mnyAmout', 'Mobile_strAttachment');
	  	  break;

	  	  case "Internet" :
	  		$arrRequiredField = 
	  		array('Internet_strInvoiceNumber', 'Internet_mnyAmout', 'Internet_strAttachment');
	  	  break;

	  	  case "Others" :
	  		$arrRequiredField = 
	  		array('Others_dtmFrom', 'Others_dtmTo', 'Others_strDescription', 
	  		'Others_strInvoiceNumber', 'Others_mnyAmout', 'Others_strAttachment');
	  	  break;
	  	}

	  	// escaping the special character enter by user and validation
	  	foreach($arrRequiredField as $columnName) {
	  	  $columnName = mysqli_real_escape_string($conn, $columnName);
	  	  if(stripos($columnName, '_int') !== false || stripos($columnName, '_mny') !== false) {
	  	  	$intValue = cleanInteger($_POST[$columnName]);
            $arrRequiredValue[$columnName] = $intValue;
          }else{
            $arrRequiredValue[str_replace(' ', '', $columnName)] = 
            "'" . addslashes($_POST[$columnName]) . "'";
          }
	  	}
	  	// form the insert Query
	  	$insertQuery = "INSERT INTO tbl{$tableName} (" . implode(",", $arrRequiredField). ") VALUES( ". implode(",", array_values($arrRequiredValue)). ");";
      	
	  }
      // save data to db and check
  	  if(mysqli_query($conn, $insertQuery)) {
  	  	$errMessage = 'Data Inserted Successully';
  	  }else {
  	  	$errMessage = 'Query error . ' . mysqli_error($conn);
  	  }

  	  return $errMessage;
	}

  // if dataType is int, and value is blank then it should be null instead of emmpty
  function cleanInteger($str) {
    if(strlen($str) < 1) {
      return 'null';
    }else{
      return $str;
    }
  }
?>