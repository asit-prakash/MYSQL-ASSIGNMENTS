<?php
		$firstnameErr = $lastnameErr = $codenameErr = $domainErr = $salaryErr = $marksErr = "";//name-input-Error variable
		$fname_in = $lname_in = $codename_in = $domain_in = $salary_in = $marks_in = "";//name-input variable
		$firstname_check = $lastname_check = $codenamecheck = $domaincheck = $salarycheck = $markscheck = ""; //name-input-patter-check variable
        
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
			$codename_in = test_input($_POST["codename"]);
			$codename_check=preg_match("/^[A-Z@~@_-]*$/",$codename_in);
			if (!$codename_check)
			{
				$codenameErr = "Only letters and '@','_','-','~' are allowed";
			}   
   			   $domain_in = test_input($_POST["domain"]);
               $domain_check=preg_match("/^[a-zA-Z]+$/",$domain_in);
	    	if (!$domain_check)
	    	{
	    		$domainErr = "Only letters allowed";
   			}
   			   $salary_in = test_input($_POST["salary"]);
               $salarycheck=preg_match("/^[0-9]+(\.[0-9]+)?$/",$salary_in);
	    	if (!$salarycheck)
	    	{
	    		$salaryErr = "Only numbers allowed";
   			}
   			   $marks_in = test_input($_POST["marks"]);
               $markscheck=preg_match("/^[0-9]+(\.[0-9]+)?$/",$marks_in);
	    	if (!$markscheck)
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