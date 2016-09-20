<?php
	session_start(); // session initiated
	include 'connection.php'; //connection file included
	// trimming and preventing from sql injection
	$title = mysql_real_escape_string(trim($_POST['title']));
	$first_name = mysql_real_escape_string(trim($_POST['first_name']));
	$last_name = mysql_real_escape_string(trim($_POST['last_name']));
	$email = mysql_real_escape_string(trim($_POST['email']));
	$mobile = mysql_real_escape_string(trim($_POST['mobile']));
	$password1 = mysql_real_escape_string(trim($_POST['password1']));
	$password2 = mysql_real_escape_string(trim($_POST['password2']));

	if($title != "" && $first_name != "" && $last_name != "" && $email != "" && $mobile != "" && $password1 != "" && $password2 != ""){

		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) { // checking for valid email address		
			$password = md5($password1);	
			$sql_register = "INSERT INTO `users`(title,first_name,last_name,email,password,is_active,create_dt) values('$title','$first_name','$last_name','$email','$password',1,NOW())";
			error_log("Register :".$sql_register,0);
			$sql_exec = mysql_query($sql_register) or die(mysql_query());

			// creating session
			$_SESSION['name'] = $first_name. ' '. $last_name;
			$_SESSION['email'] = $email;
			$_SESSION['is_active'] = 1; // settng 1 as online to session
			header("Location:chat.php"); // redirecting to chat.php 
		}else{
			header("Location:index.php?msg=invalidemail"); // redirecting to index.php
		}
	}else{
		header("Location:index.php?msg=required"); // redirecting to index.php
	}
?>