<html>
<head>
	<title>EMPLOYEE DETAILS</title>
	<link rel="stylesheet" type="text/css" href="mysql2.css">
</head>
<body>
	<?php
		$firstnameErr = $lastnameErr = $domainErr = $salaryErr = $marksErr = "";//name-input-Error variable
		$fname_in = $lname_in = $domain_in = $salary_in = $marks_in = "";//name-input variable
		$firstname_check = $lastname_check = $domaincheck = $salarycheck = $markscheck = ""; //name-input-patter-check variable
        
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
            $fname_in = test_input($_POST["firstname"]);
            $firstname_check=preg_match("/^[a-zA-Z]+$/",$fname_in);
	    	// check if name only contains letters
	    	if (!$firstname_check)
	    	{
	    		$firstnameErr = "Only letters allowed";
   			}
               $lname_in = test_input($_POST["lastname"]);
               $lastname_check=preg_match("/^[a-zA-Z]+$/",$lname_in);
	    	if (!$lastname_check)
	    	{
	    		$lastnameErr = "Only letters allowed";
   			}
   			   $domain_in = test_input($_POST["domain"]);
               $domain_check=preg_match("/^[a-zA-Z]+$/",$domain_in);
	    	if (!$domain_check)
	    	{
	    		$domainErr = "Only letters allowed";
   			}
   			   $salary_in = test_input($_POST["domain"]);
               $salary_check=preg_match("/^[0-9]*$/",$salary_in);
	    	if (!$domain_check)
	    	{
	    		$salaryErr = "Only numbers allowed";
   			}
   			   $marks_in = test_input($_POST["domain"]);
               $marks_check=preg_match("/^[0-9]*$/",$marks_in);
	    	if (!$marks_check)
	    	{
	    		$marksErr = "Only numbers allowed";
   			}

		}
		function test_input($data) 
		{
		  $data = trim($data);//remove extra spaces
		  $data = stripslashes($data);//remove slashes
		  $data = htmlspecialchars($data);//convert special characters into html entities
		  return $data;//return pure data
		}
		?>
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
		id="codename">
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
	<?php
		include_once 'mysql.php';
		
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if($firstnameErr == "" && $lastnameErr == "" && $domainErr == "" &&
				 $salaryErr == "" && $marksErr == "")
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
			else
			{
				echo "incorrect data format";
			}
			
		 }
	?>
</body>
</html>

