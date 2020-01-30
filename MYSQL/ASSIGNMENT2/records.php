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

				$result=mysqli_query($conn,"SELECT EMPLOYEE_ID AS TOTAL FROM EMPLOYEE_DETAILS_TABLE 
											ORDER BY EMPLOYEE_ID DESC LIMIT 1");
				$data=mysqli_fetch_assoc($result);
				$maxid=filter_var($data['TOTAL'],FILTER_SANITIZE_NUMBER_INT);
				//echo $maxid;
				$empcode="SU_" . $firstname;
				$empid="RU".++$maxid;
				//echo $empid;

				mysqli_query($conn,"START TRANSACTION");
				//INSERT INTO EMPLOYEE_CODE_TABLE
				$query1="INSERT INTO EMPLOYEE_CODE_TABLE (EMPLOYEE_CODE,EMPLOYEE_CODE_NAME,EMPLOYEE_DOMAIN)
		 				VALUES ('$empcode','$codename','$domain')";
		 		$sql1=mysqli_query($conn, $query1);
		 		if ($sql1) 
		 		{
					echo "New record created successfully in EMPLOYEE_CODE_TABLE!" . "<br>";
		 		}
		 		else 
		 		{
					echo "Error: " . $sql1 . "" . mysqli_error($conn) . "<br>";
				}

		 		//INSERT INTO EMPLOYEE_DETAILS_TABLE
				$query2="INSERT INTO EMPLOYEE_DETAILS_TABLE(EMPLOYEE_ID,EMPLOYEE_FIRST_NAME,EMPLOYEE_LAST_NAME,GRADUATION_PERCENTILE)
		 				VALUES ('$empid','$firstname','$lastname','$marks')";
		 		$sql2=mysqli_query($conn, $query2);
		 		if ($sql2) 
		 		{
					echo "New record created successfully in EMPLOYEE_DETAILS_TABLE!" . "<br>";
		 		}
		 		else 
		 		{
					echo "Error: " . $sql2 . "" . mysqli_error($conn) . "<br>";
				}

		 		//INSERT INTO EMPLOYEE_SALARY_TABLE
				$query3="INSERT INTO EMPLOYEE_SALARY_TABLE (EMPLOYEE_ID,EMPLOYEE_SALARY,EMPLOYEE_CODE)
		 				VALUES ('$empid','$salary','$empcode')";
		 		$sql3=mysqli_query($conn, $query3);
		 		if ($sql3) 
		 		{
					echo "New record created successfully in EMPLOYEE_SALARY_TABLE!" . "<br>";
		 		}
		 		else 
		 		{
					echo "Error: " . $sql3 . "" . mysqli_error($conn) . "<br>";
				}
				if ($sql1 and $sql2 and $sql3) 
				{
				   mysqli_query($conn,"COMMIT"); //Commits the current transaction
				   echo "data commited ";
				} 
				else 
				{        
				   mysqli_query($conn,"ROLLBACK");//Even if any one of the query fails, the changes will be undone
				   echo "data rollbacked";
				}
			}
			else
			{
				echo "Please enter data in correct format" . "<br>";
			}

			/*$table1="SELECT * FROM EMPLOYEE_CODE_TABLE";
			$table2="SELECT * FROM EMPLOYEE_DETAILS_TABLE";
			$table3="SELECT * FROM EMPLOYEE_SALARY_TABLE";

			function show_table($table)
			{
				include 'mysql.php';
				$result1=mysqli_query($conn,$table);
				if(mysqli_num_rows($result1)>0)
				{
			        echo "<table border = '2px solid black'>";
			            $i = 1;
			        while($row = mysqli_fetch_assoc($result1))
			        {
			        	//print_r($row);
			            if($i == 1)
			            {
			                echo "<tr>";
			                foreach($row as $column => $data)
			                {
			                    echo "<td>".$column."</td>";
			                }
			                echo "</tr>";
			                $i=0;
			        	}
			        	else
			       		{
			                echo "<tr>";
			                foreach($row as $column=>$data)
			                {

			                    echo "<td>".$data."</td>";
			                    
			                }
			                echo "</tr>";	
			            }    
		       		}
		        echo "</table>";
		    	}
		    	else
		    	{
		        	echo "Empty Table";
		    	}
			}
			show_table($table1);
			echo "<br>";
			show_table($table2);
			echo "<br>";
			show_table($table3);
			echo "<br>";*/
		 }
	?>
