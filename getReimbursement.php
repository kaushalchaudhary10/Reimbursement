<!DOCTYPE html>
<html>
<head>
	<title>
		Reimbursement Form
	</title>
</head>
<body>
	<center>
		<p> Get Details of Reimbursement</p>
		<form action="clsGetReimbursement.php" method="POST">
			<div>
				<select name="tableName" id="cmdtableName">
					<option value="All" selected>All</option>
					<option value="Conveyance">Conveyance</option>
					<option value="Hotel">Hotel</option>
					<option value="Food">Food</option>
					<option value="Mobile">Mobile</option>
					<option value="Internet">Internet</option>
					<option value="Others">Others</option>
				</select>
				<label> 
          			From
          			<input type="date" name="dtmFrom">
          		</label>
          		<label>
          			To
          			<input type="date" name="dtmTo">
          		</label><br><br>
          		<input type="submit" name="btnGetData" value="Get Data">
			</div>
		</form>
	</center>
</body>
</html>