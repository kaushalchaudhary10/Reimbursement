<?php 
	require_once 'clsPostReimbursement.php';
	if(isset($_POST['btnsubmit'])) {
		global $errMessage;
		echo $errMessage;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Reimbursement Form
	</title>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js">		
	</script>

	<style type="text/css">
		.required {
			color: red;
		}
		input[type="radio"]{
  			margin: 0 10px 0 10px;
		}
	</style>
</head>
<body>
	<center>
		<p> 
			Reimbursement Form 
		</p>
		<div>
			
			<label> Select Month</label>
			<input type="month" id="start" name="start" min="2020-01" value="2020-05"><br>
			
			<label for="chkConveyance">
				<input type="radio" id="Conveyance" name="reimbursementType" value="Conveyance">
	  			Conveyance
	  		</label>

	  		<label for="chkHotel">
	  			<input type="radio" id="Hotel" name="reimbursementType" value="Hotel">
	  			Hotel
	  		</label>

	  		<label for="chkFood">
	  			<input type="radio" id="Food" name="reimbursementType" value="Food">
	  			Food
	  		</label><br>

  			<label for="chkMobile">
  				<input type="radio" id="Mobile" name="reimbursementType" value="Mobile">
  				Mobile
  			</label>

  			<label for="chkInternet">
  				<input type="radio" id="Internet" name="reimbursementType" value="Internet">
  				Internet
  			</label>

  			<label for="chkOthers">
  				<input type="radio" id="Others" name="reimbursementType" value="Others">
  				Others
  			</label>
			
			<div id="dvConveyance" style="display: none" > 
				<form action="reimbursement.php" method="POST" id="frmConveyance" name="frmConveyance">
          			<label> 
          				From <span class="required">*</span> 
          				<input type="date" name="Conveyance_dtmFrom">
          			</label>
          			<label>
          				To <span class="required">*</span>
          				<input type="date" name="Conveyance_dtmTo">
          			</label>
          			<label>
          				Purpose <span class="required">*</span>
          				<select name="Conveyance_strpurpose" id="cmbPurpose" onchange="hide_shrtDiscription()">
	  						<option value="market_visit">Market Visit</option>
	  						<option value="otherCity">Other City Travel</option>
	  						<option value="training">Training</option>
	  						<option value="others">Others</option>
						</select>
					</label>
          			<label>
          				Mode <span class="required">*</span>
	          			<select name="Conveyance_strmode" id="cmbMode" onchange="hide_shrtDiscription()">
		  					<option value="bike">Bike</option>
		  					<option value="bus">Bus</option>
		  					<option value="taxi">Taxi</option>
		  					<option value="train">Train</option>
		  					<option value="auto">Auto</option>
		  					<option value="others">Others</option>
						</select>
					</label><br>
	          		<label>
	          			Km
	          			<input type="text" name="Conveyance_intKM">
	          		</label>
	          		<label>
	          			InvNo
	          			<input type="text" name="Conveyance_strInvoiceNumber">
	          		</label>
	          		<label>
	          			Amt <span class="required">*</span>
	          			<input type="text" name="Conveyance_mnyAmout">
	          		</label>
	          		<label>
	          			Attachement
	          			<input type="file" name="Conveyance_strAttachment" id="flConveyance">
	          		</label>
	          		<label id = 'shrtDescription' style='display:none'>
	          			Short Descriptions
	          			<input type="text" name="Conveyance_strShortDesc" id="txtShrtDesc">
	          		</label>
	          		<hr>
	          		<input type="hidden" name="tableName" value="Conveyance" id="hdnConveyance">
	          		<input type="submit" name="btnsubmit" value="submit">
	          		<input type="submit" name="btnGet" value="Get" formaction="getReimbursement.php">
	          	</form>
          	</div> 

          	<div id="dvHotel" style="display: none"> 
          		<form action="reimbursement.php" method="POST" id="frmHotel">
	          		<label> 
	          			From Date <span class="required">*</span> 
	          			<input type="date" name="Hotel_dtmFrom">
	          		</label>
	          		<label>
	          			To Date <span class="required">*</span> 
	          			<input type="date" name="Hotel_dtmTo">
	          		</label>
	          		<label>
	          			Hotel Name <span class="required">*</span>
	          			<input type="text" name="Hotel_strHotelName">
	          		<label><br>
	          			InvNo <span class="required">*</span> 
	          			<input type="text" name="Hotel_strInvoiceNumber"></label>
	          		<label>
	          			Amt <span class="required">*</span> 
	          			<input type="text" name="Hotel_mnyAmout"></label>
	          		<label>
	          			Attachement <span class="required">*</span> 
	          			<input type="file" name="Hotel_strAttachment" id="flHotel">
	          		</label>
	          		<hr>
	          		<input type="hidden" name="tableName" value="Hotel" id="hdnHotel">
	          		<input type="submit" name="btnsubmit" value="submit">
	          		<input type="submit" name="btnGet" value="Get" formaction="getReimbursement.php">
          		</form>
          	</div> 

          	<div id="dvFood" style="display: none"> 
          		<form action="reimbursement.php" method="POST" id="frmFood">
	          		<label>
	          			InvNo <span class="required">*</span> 
	          			<input type="text" name="Food_strInvoiceNumber">
	          		</label>
	          		<label>
	          			Amt <span class="required">*</span> 
	          			<input type="text" name="Food_mnyAmout">
	          		</label>
	          		<label>
	          			Bill Attachement <span class="required">*</span>
	          			<input type="file" name="Food_strAttachment" id="flFood">
	          		</label>
	          		<hr>
	          		<input type="hidden" name="tableName" value="Food" id="hdnFood">
	          		<input type="submit" name="btnsubmit" value="submit">
	          		<input type="submit" name="btnGet" value="Get" formaction="getReimbursement.php">
	          	</form>
          	</div> 

          	<div id="dvMobile" style="display: none"> 
          		<form action="reimbursement.php" method="POST" id="frmMobile">
	          		<label>
	          			InvNo <span class="required">*</span> 
	          			<input type="text" name="Mobile_strInvoiceNumber">
	          		</label>
	          		<label>
	          			Amt <span class="required">*</span> 
	          			<input type="text" name="Mobile_mnyAmout">
	          		</label>
	          		<label>
	          			Attachement <span class="required">*</span> 
	          			<input type="file" name="Mobile_strAttachment" id="flMobile">
	          		</label>
	          		<hr>
	          		<input type="hidden" name="tableName" value="Mobile" id="hdnMobile">
	          		<input type="submit" name="btnsubmit" value="submit">
	          		<input type="submit" name="btnGet" value="Get" formaction="getReimbursement.php">
	          	</form>
          	</div> 

          	<div id="dvInternet" style="display: none">
          		<form action="reimbursement.php" method="POST" id="frmInternet">
	          		<label>
	          			InvNo <span class="required">*</span> 
	          			<input type="text" name="Internet_strInvoiceNumber">
	          		</label>
	          		<label>
	          			Amt <span class="required">*</span> 
	          			<input type="text" name="Internet_mnyAmout">
	          		</label>
	          		<label>
	          			Attachement <span class="required">*</span> 
	          			<input type="file" name="Internet_strAttachment" id="flInternet">
	          		</label>
	          		<hr>
	          		<input type="hidden" name="tableName" value="Internet" id="hdnInternet">
	          		<input type="submit" name="btnsubmit" value="submit">
	          		<input type="submit" name="btnGet" value="Get" formaction="getReimbursement.php">
	          	</form>
          	</div> 

          	<div id="dvOthers" style="display: none"> 
          		<form action="reimbursement.php" method="POST" id="frmOthers">
	          		<label>
	          			From Date <span class="required">*</span> 
	          			<input type="date" name="Others_dtmFrom">
	          		</label>
	          		<label>
	          			To Date <span class="required">*</span> 
	          			<input type="date" name="Others_dtmTo">
	          		</label>
	          		<label>
	          			Description <span class="required">*</span> 
	          			<input type="text" name="Others_strDescription"><br>
	          		</label>
	          		<label>
	          			InvNo
	          			<input type="text" name="Others_strInvoiceNumber">
	          		</label>
	          		<label>
	          			Amt <span class="required">*</span> 
	          			<input type="text" name="Others_mnyAmout">
	          		</label>
	          		<label>
	          			Attachement
	          			<input type="file" name="Others_strAttachment" id="flOthers">
	          		</label>
	          		<hr>
	          		<input type="hidden" name="tableName" value="Others" id="hdnOthers">
	          		<input type="submit" name="btnsubmit" value="submit">
	          		<input type="submit" name="btnGet" value="Get" formaction="getReimbursement.php">
	          	</form>
          	</div>
          	
		</div>

		<script type="text/javascript">

  			$("input[name='reimbursementType']:radio")
    		.change(function() {
      			$("#dvConveyance").toggle($(this).val() == "Conveyance");
      			$("#dvHotel").toggle($(this).val() == "Hotel"); 
      			$("#dvFood").toggle($(this).val() == "Food"); 
      			$("#dvMobile").toggle($(this).val() == "Mobile"); 
      			$("#dvInternet").toggle($(this).val() == "Internet"); 
      			$("#dvOthers").toggle($(this).val() == "Others"); 
      		});

      		function hide_shrtDiscription() {
      			var valpurpose 	= document.getElementById("cmbPurpose").value;
      			var valmode 	= document.getElementById("cmbMode").value;

				if(valpurpose == "others" || valmode == "others") {
					document.getElementById('shrtDescription').style.display = 'block';
				}else{
					document.getElementById('shrtDescription').style.display = 'none';
				}
			}
		</script>
	</center>
</body>
</html>