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
		
		if ($password1 === $password2) {
			$password=md5($password1);
			$sql_register="INSERT INTO chat (title,first_name,last_name,email,mobile,password,is_active,create_dt) values('$title','$first_name','$last_name','$email','$mobile','$password',1,NOW())";
			$exec =mysqli_query($sql_register);
			if ($exec) {
					header("Location: chat.php");
			} 
			else {
						
			}
							

					} else {
			
			header("Location: index.php?msg=password");
		}
		
	}



?>

