<?php
//ob_start();
session_start();
session_destroy(); 
$id = $_GET['id'];
logOut();
function logOut(){
	$sql_update = "UPDATE users SET is_active = 0 WHERE id = $id";
	mysql_query($sql_update);
	header('Location:index.php?msg=logout');
	exit();
}
header('Location:index.php?msg=logoutfailed');
exit();



?>