<?php

	include 'connection.php';

	if(isset($_GET['chat']) && $_GET['chat'] == 'last'){		

		
		$sql_last_chat = "SELECT concat(u.first_name,' ',u.last_name) as name, g.id,g.u_id,g.chat FROM gupshup g, users u where g.u_id = u.id ORDER BY g.id DESC LIMIT 1";
			$exec = mysql_query($sql_last_chat) or die(mysql_error());
			if(mysql_num_rows($exec)>0){
				$chat = mysql_fetch_assoc($exec);
				echo json_encode(array("status"=>200, "chat" => $chat));
			}else{
				echo json_encode(array("status"=>404));
			}
	}else{
		$chat_id = mysql_real_escape_string($_GET['id']);		
		if($chat_id != ""){			
			$sql_last_chat = "SELECT concat(u.first_name,' ',u.last_name) as name, g.id,g.u_id,g.chat FROM gupshup g, users u where g.id > $chat_id and g.u_id = u.id ORDER BY g.id";
			error_log("1st :".$sql_last_chat,0);
		}else{
			$sql_last_chat = "SELECT concat(u.first_name,' ',u.last_name) as name, g.id,g.u_id,g.chat FROM gupshup g, users u where g.u_id = u.id";			
		}		
		$exec = mysql_query($sql_last_chat) or die(mysql_error());
		if(mysql_num_rows($exec)>0){				
			$chats = array();
			while($chat = mysql_fetch_assoc($exec)){
				$chats[] = $chat;
			}
			echo json_encode(array("status"=>200,"chats"=>$chats));
		}else{
			echo json_encode(array("status"=>404));
		}
	}	

?>