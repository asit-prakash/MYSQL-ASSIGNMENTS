<html>
<head>
	<title>EMPLOYEE DETAILS</title>
</head>
<body>
	<form id="emp" method="POST" action="">
	Enter Firstname:
	<input
		type="text"
		placeholder="Enter Firstname"
		name="firstname"
		id="firstname">
	<br><br>
	Enter Lastname:
	<input
		type="text"
		placeholder="Enter Lastname"
		name="lastname"
		id="lastname">
	<br><br>
	Enter Codename:
	<input
		type="text"
		placeholder="Enter Codename"
		name="codename"
		id="codename">
	<br><br>
	Enter Domain:
	<input
		type="text"
		placeholder="Enter Domain"
		name="domain"
		id="domain">
	<br><br>
	Enter Salry:
	<input
		type="text"
		placeholder="Enter Salary"
		name="salary"
		id="salary">
	<br><br>
	Enter Graduation Marks:
	<input
		type="text"
		placeholder="Enter Marks in %"
		name="marks"
		id="marks">
	<br><br>
	<input
		type="submit"
		name="submit"
		value="SUBMIT"
		id="submit">
	</form>
	<?php
		include_once 'mysql.php';
		
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$codename=$_POST['codename'];
			$domain=$_POST['domain'];
			$salary=$_POST['salary'];
			$marks=$_POST['marks'];

			$result=mysqli_query($conn,"SELECT count(*) as total from EMPLOYEE_DETAILS_TABLE");
			$data=mysqli_fetch_assoc($result);
			//echo $data['total'];
			

			$empcode="SU_" . $firstname;
			$countinc=++$data['total'];
			$empid="RU".$countinc;
			//echo $empid;

			//INSERT INTO EMPLOYEE_CODE_TABLE
			$sql1="INSERT INTO EMPLOYEE_CODE_TABLE (EMPLOYEE_CODE,EMPLOYEE_CODE_NAME,EMPLOYEE_DOMAIN)
	 				VALUES ('$empcode','$codename','$domain')";
	 		if (mysqli_query($conn, $sql1)) 
	 		{
				echo "New record created successfully in EMPLOYEE_CODE_TABLE!" . "<br>";
	 		}
	 		else 
	 		{
				echo "Error: " . $sql1 . "" . mysqli_error($conn) . "<br>";
			}

	 		//INSERT INTO EMPLOYEE_DETAILS_TABLE
			$sql2="INSERT INTO EMPLOYEE_DETAILS_TABLE(EMPLOYEE_ID,EMPLOYEE_FIRST_NAME,EMPLOYEE_LAST_NAME,GRADUATION_PERCENTILE)
	 				VALUES ('$empid','$firstname','$lastname','$marks')";
	 		if (mysqli_query($conn, $sql2)) 
	 		{
				echo "New record created successfully in EMPLOYEE_DETAILS_TABLE!" . "<br>";
	 		}
	 		else 
	 		{
				echo "Error: " . $sql2 . "" . mysqli_error($conn) . "<br>";
			}

	 		//INSERT INTO EMPLOYEE_SALARY_TABLE
			$sql3="INSERT INTO EMPLOYEE_SALARY_TABLE (EMPLOYEE_ID,EMPLOYEE_SALARY,EMPLOYEE_CODE)
	 				VALUES ('$empid','$salary','$empcode')";
	 		if (mysqli_query($conn, $sql3)) 
	 		{
				echo "New record created successfully in EMPLOYEE_SALARY_TABLE!" . "<br>";
	 		}
	 		else 
	 		{
				echo "Error: " . $sql3 . "" . mysqli_error($conn) . "<br>";
			}
		 }
	?>
</body>
</html>
