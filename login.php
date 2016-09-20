<?php
	session_start(); // session initiated

	if(isset($_POST['submit1']) && isset($_POST['email']) && isset($_POST['password'])){	
		include 'connection.php'; //connection file included	
		$email = mysql_real_escape_string(trim($_POST['email']));
		$password = mysql_real_escape_string(trim($_POST['password']));

		// creating query string
		$password = md5($password);
		$sql_check_user = "SELECT `email`,`password` FROM users WHERE `email` = '$email' AND `password` = '$password' LIMIT 1";		
		// executing query sting
		$exec_check_user = mysql_query($sql_check_user) or die(mysql_error());
		if(mysql_num_rows($exec_check_user)>0){	// checking if record available in executed query
			$sql_get_details = "SELECT `id`, CONCAT(`first_name`,' ',`last_name`) AS name,`email`,`is_active` FROM users WHERE `email` = '$email' LIMIT 1";
			$exec_get_details = mysql_query($sql_get_details) or die(mysql_error());
			if(mysql_num_rows($exec_get_details)>0){
				$details = mysql_fetch_assoc($exec_get_details);
				// setting session
				$_SESSION['u_id'] =  $details['id'];
				$_SESSION['name'] =  $details['name'];
				$_SESSION['email'] =  $details['email'];	
				error_log($_SESSION['u_id'].' '.$_SESSION['email'],0);			
				updateStatus($exec_get_details['id']); // calling update status function to update online status
				header("Location:chat.php"); // redirecting chat page
				exit();
			}
		}else{
			header("Location:index.php?msg=authfailed"); // redirecting to login/registration page
			exit();
		}		
	}else{
		
		header("Location:index.php?msg=required"); // redirecting to login/registration page
		exit();
	}


	function updateStatus($id){
		// updating status to 1 after login
		$sql_update_status = "UPDATE `users` SET `is_active` = 1 WHERE `id` = $id";
		mysql_query($sql_update_status);	
		$_SESSION['is_active'] = 1;	// settng 1 as online to session
	}
?>