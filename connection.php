<?php

$conn = mysqli_connect('localhost','root','password');
if (!$conn) {
	echo "Connection Failed...";
} else {
	mysqli_select_db("chat",$conn);
}



?>
