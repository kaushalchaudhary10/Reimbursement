# Reimbursement 

This utility pushes/get the contents from reimbursement form to database

# Requirements
- PHP 5.6+
- MySQL

# Instructions
Import the table/tblReimbursementSchema.sql file in the MySQL database.

Update localConfig.php to hold the appropriate MySQL Connection Credentials

Open the reimbursement.php in browser
```
step to be followed 

For Submitting Reimbursement details : 
1) Select any type of reimbursement
2) Fill the form
3) Click on Submit
4) Get the Message if Successful/Failure

For Retrieving the Reimbursement details  : 
1) Select any type of reimbursement 
2) click on Get button
3) Select Any Reimbursement type from the drop down (default Reimbursement Type is All)
	a) If "All" selected then it will fetch all reimbursement data in JSON format
	b) If select any particular reimbursement type then it will fetch data accordingly
4) Select Date Range "From" and "To"
	a) If selected it will find the data for that reimbursement type in between the date range
	b) If not selected then it will fetch all the selected reibursement type details
