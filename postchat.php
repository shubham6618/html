<?php
	
	session_start();
	include 'connection.php';

		$message = mysql_real_escape_string(trim($_POST['msg']));		
		$u_id = $_SESSION['u_id'];
		$sql_chat = "INSERT INTO `gupshup`(u_id,chat,sent_time) values($u_id,'$message', NOW())";		
		$exec_chat = mysql_query($sql_chat) or die(mysql_error());							
		echo json_encode(array("status" => 200, "id" => mysql_insert_id()));				

?>