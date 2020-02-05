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
				$empcode="SU_" . $firstname;
				mysqli_query($conn,"START TRANSACTION");
				//INSERT INTO EMPLOYEE_CODE_TABLE
				$query1="INSERT INTO EMPLOYEE_CODE_TABLE (EMPLOYEE_CODE,EMPLOYEE_CODE_NAME,EMPLOYEE_DOMAIN)
		 				VALUES ('$empcode','$codename','$domain')";
		 		$sql1=mysqli_query($conn, $query1);
		 		if ($sql1) 
		 		{
					//echo "New record created successfully in EMPLOYEE_CODE_TABLE!" . "<br>";
		 		}
		 		else 
		 		{
					//echo "Error: " . $sql1 . "" . mysqli_error($conn) . "<br>";
					echo "codename is already taken,please choose another one";
				}

		 		//INSERT INTO EMPLOYEE_DETAILS_TABLE
				$query2="INSERT INTO EMPLOYEE_DETAILS_TABLE(EMPLOYEE_FIRST_NAME,EMPLOYEE_LAST_NAME,GRADUATION_PERCENTILE)
		 				VALUES ('$firstname','$lastname','$marks')";
		 		$sql2=mysqli_query($conn, $query2);
		 		if ($sql2) 
		 		{
					//echo "New record created successfully in EMPLOYEE_DETAILS_TABLE!" . "<br>";
		 		}
		 		else 
		 		{
					echo "Error: " . $sql2 . "" . mysqli_error($conn) . "<br>";
				}

				 //INSERT INTO EMPLOYEE_SALARY_TABLE
				$lastid=mysqli_insert_id($conn);//it will get last inserted employee id
				$query3="INSERT INTO EMPLOYEE_SALARY_TABLE (EMPLOYEE_ID,EMPLOYEE_SALARY,EMPLOYEE_CODE,EMPLOYEE_CODE_NAME)
		 				VALUES ('$lastid','$salary','$empcode','$codename')";
		 		$sql3=mysqli_query($conn, $query3);
		 		if ($sql3) 
		 		{
					//echo "New record created successfully in EMPLOYEE_SALARY_TABLE!" . "<br>";
		 		}
		 		else 
		 		{
					echo "Error: " . $sql3 . "" . mysqli_error($conn) . "<br>";
				}
				$emp_code_id="RU".$lastid;
				$query4="INSERT INTO EMPLOYEE_ID_CODE_TABLE (EMPLOYEE_ID_CODE,EMPLOYEE_ID)
		 				VALUES ('$emp_code_id','$lastid')";
		 		$sql4=mysqli_query($conn, $query4);
		 		if ($sql4) 
		 		{
					//echo "New record created successfully in EMPLOYEE_ID_CODE_TABLE!" . "<br>";
		 		}
		 		else 
		 		{
					echo "Error: " . $sql4 . "" . mysqli_error($conn) . "<br>";
				}
				if ($sql1 and $sql2 and $sql3 and $sql4) 
				{
				   mysqli_query($conn,"COMMIT"); //Commits the current transaction
				   echo "Your data has been successfully submitted";
				   include 'show_tables.php';
				} 
				else 
				{        
				   mysqli_query($conn,"ROLLBACK");//Even if any one of the query fails, the changes will be undone
				   //echo "data rollbacked";
				}
			}
			else
			{
				echo "Please enter data in correct format" . "<br>";
			}
		}
	?>