<?php

//$con = mysql_connect("localhost","root","12345678");
$con = mysql_connect("localhost","root","12345678");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("chat", $con);
?>
