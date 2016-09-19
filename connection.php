<?php

$conn = mysqli_connect('localhost','root','12345678');
if (!$conn) {
	echo "Connection Failed...";
} else {
	mysqli_select_db("chat",$conn);
}



?>
