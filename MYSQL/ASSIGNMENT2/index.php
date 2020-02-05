<html>
<head>
	<title>EMPLOYEE DETAILS</title>
	<link rel="stylesheet" type="text/css" href="mysql2.css">
</head>
<body>
	<?php include 'validation.php';?>
	<form id="emp" method="POST" action="">
	Enter Firstname:
	<input
		type="text"
		placeholder="Enter Firstname"
		name="firstname"
		id="firstname"
		required>
		<span class="error">* <?php echo $firstnameErr;?></span>
	<br><br>
	Enter Lastname:
	<input
		type="text"
		placeholder="Enter Lastname"
		name="lastname"
		id="lastname"
		required>
		<span class="error">* <?php echo $lastnameErr;?></span>
	<br><br>
	Enter Codename:
	<input
		type="text"
		placeholder="Enter Codename"
		name="codename"
		id="codename"
		required>
		<span class="error">* <?php echo $codenameErr;?></span>
	<br><br>
	Enter Domain:
	<input
		type="text"
		placeholder="Enter Domain"
		name="domain"
		id="domain"
		required>
		<span class="error">* <?php echo $domainErr;?></span>
	<br><br>
	Enter Salary:
	<input
		type="text"
		placeholder="Enter Salary"
		name="salary"
		id="salary"
		required>
		<span class="error">* <?php echo $salaryErr;?></span>
	<br><br>
	Enter Graduation Marks:
	<input
		type="text"
		placeholder="Enter Marks in %"
		name="marks"
		id="marks"
		maxlength="4"
		required>
		<span class="error">* <?php echo $marksErr;?></span>
	<br><br>
	<input
		type="submit"
		name="submit"
		value="SUBMIT"
		id="submit">
	</form>
</body>
</html>

