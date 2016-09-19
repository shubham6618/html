<?php

	include 'connection.php';
	if (isset($_POST['register'])) {
		
		$title=mysql_real_escape_string(trim($_POST['title']));
		$first_name=mysql_real_escape_string(trim($_POST['firstName']));
		$last_name=mysql_real_escape_string(trim($_POST['lastName']));
		$email=mysql_real_escape_string(trim($_POST['email']));
		$mobile=mysql_real_escape_string(trim($_POST['mobile']));
		$password1=mysql_real_escape_string(trim($_POST['password1']));
		$password2=mysql_real_escape_string(trim($_POST['password2']));
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
   			 
		}
		else
			
			header("Location: index.php?msg=email");
		if ($password1 === $password2) {
			
		} else {
			
			header("Location: index.php?msg=password");
		}
		
	}



?>

