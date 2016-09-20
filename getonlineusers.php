<?php

	include 'connection.php';
	$sql = "SELECT first_name, is_active FROM users";
	$exec = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($exec)>0){
		$usersList = array();
		while($users = mysql_fetch_assoc($exec)){
			$usersList[] = $users;
		}
		echo json_encode($usersList);
	}else{
		echo "404";
	}

?>